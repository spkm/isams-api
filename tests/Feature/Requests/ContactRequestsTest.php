<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;
use spkm\IsamsApi\DTOs\StudentContact;
use spkm\IsamsApi\Requests\Students\Contacts\GetContactsBySchoolidRequest;
use spkm\IsamsApi\Requests\Students\Contacts\GetContactsRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('gets student contacts from their iSAMS endpoint', function (Request $request, string $url) {
    $sent = FakeIsams::send($request, ['contacts' => []])->getPendingRequest();

    expect($sent->getMethod())->toBe(Method::GET)
        ->and($sent->getUrl())->toBe($url)
        ->and($sent->query()->all())->toBe([]);
})->with([
    'every student\'s' => [new GetContactsRequest, 'https://isams.example.test/api/students/contacts'],
    'one student\'s' => [new GetContactsBySchoolidRequest('100001'), 'https://isams.example.test/api/students/100001/contacts'],
]);

it('asks for every student\'s contacts with only the page, page size, expansions and filter it was given', function () {
    $sent = FakeIsams::send(new GetContactsRequest(pageSize: 50, expand: 'countryIsoMappings'), ['contacts' => []])->getPendingRequest();

    expect($sent->query()->all())->toBe(['pageSize' => 50, 'expand' => 'countryIsoMappings']);
});

it('collects every student\'s contacts from the contacts key of each page', function () {
    FakeIsams::respondWith([GetContactsRequest::class => MockResponse::make(['contacts' => [['id' => 1], ['id' => 2]], 'totalPages' => 1])]);

    $contacts = FakeIsams::connector()->paginate(new GetContactsRequest)->collect()->all();

    expect($contacts)->toBe([['id' => 1], ['id' => 2]]);
});

it('asks for one student\'s contacts with the expansions and filter it was given', function () {
    $sent = FakeIsams::send(new GetContactsBySchoolidRequest('100001', expand: 'customFields', filter: 'private eq false'), ['contacts' => []])
        ->getPendingRequest();

    expect($sent->query()->all())->toBe(['expand' => 'customFields', '$filter' => 'private eq false']);
});

it('includes deceased contacts by sending includeDeceased=1 only when asked to', function () {
    $sent = FakeIsams::send(new GetContactsBySchoolidRequest('100001', includeDeceased: true), ['contacts' => []])
        ->getPendingRequest()
        ->createPsrRequest();

    // TODO: Characterised as-is, decide whether this is intended. includeDeceased is sent as 1, never as true or false, and is left out when false. Does iSAMS read 1 as true? (src/Requests/Students/Contacts/GetContactsBySchoolidRequest.php, defaultQuery())
    expect((string) $sent->getUri())->toBe('https://isams.example.test/api/students/100001/contacts?includeDeceased=1');
})->group('as-is');

/**
 * The details iSAMS always sends for a contact.
 */
function aContactsRequiredDetails(): array
{
    return [
        'id' => 501,
        'addressId' => 601,
        'billing' => true,
        'canShareWithOtherParents' => false,
        'contactOnly' => false,
        'deceased' => false,
        'includeInAllMailMerges' => true,
        'includeInMailMergeForBilling' => true,
        'includeInMailMergeForCorrespondence' => false,
        'includeInMailMergeForReports' => true,
        'parentalResponsibility' => 'Yes',
        'personGuid' => '6f1c2e9a-0b7d-4c1e-9f3a-2d8b5e7c4a10',
        'personId' => 701,
        'private' => false,
    ];
}

it('turns one student\'s contacts into StudentContact objects', function () {
    $contacts = FakeIsams::send(new GetContactsBySchoolidRequest('100001'), ['contacts' => [[
        ...aContactsRequiredDetails(),
        'additionalId' => 'A-1',
        'address1' => '1 Station Road',
        'address2' => 'Little Hamlet',
        'address3' => 'Upper Wood',
        'contactType' => 'Parent',
        'country' => 'United Kingdom',
        'county' => 'Surrey',
        'emailAddress' => 'jane.doe@example.test',
        'emergencyNotes' => 'Call mobile first',
        'fax' => '01234 000001',
        'forename' => 'Jane',
        'lastUpdated' => '2026-09-01T09:30:00',
        'lastUpdatedBy' => 'Registrar',
        'middleNames' => 'Anne',
        'mobileNumber' => '07700 900001',
        'nationalId' => 'N-1',
        'passportNumber' => 'P-1',
        'postcode' => 'ZZ1 1ZZ',
        'preferredPaymentMethod' => 'Direct Debit',
        'profession' => 'Engineer',
        'relationship' => 'Mother',
        'relationshipOfJointContact' => 'Father',
        'secondaryPersonGuid' => '0a9b8c7d-6e5f-4a3b-2c1d-0e9f8a7b6c5d',
        'secondaryPersonId' => 702,
        'surname' => 'Doe',
        'taxRegistrationNumber' => 'T-1',
        'telephoneNumber' => '01234 000002',
        'title' => 'Mrs',
        'town' => 'Anytown',
        'workTelephoneNumber' => '01234 000003',
    ]]])->dto();

    expect($contacts)->toBeInstanceOf(Collection::class)
        ->and($contacts->all())->toEqual([new StudentContact(
            id: 501,
            additionalId: 'A-1',
            address1: '1 Station Road',
            address2: 'Little Hamlet',
            address3: 'Upper Wood',
            addressId: 601,
            billing: true,
            canShareWithOtherParents: false,
            contactOnly: false,
            contactType: 'Parent',
            country: 'United Kingdom',
            county: 'Surrey',
            deceased: false,
            emailAddress: 'jane.doe@example.test',
            emergencyNotes: 'Call mobile first',
            fax: '01234 000001',
            forename: 'Jane',
            includeInAllMailMerges: true,
            includeInMailMergeForBilling: true,
            includeInMailMergeForCorrespondence: false,
            includeInMailMergeForReports: true,
            lastUpdated: '2026-09-01T09:30:00',
            lastUpdatedBy: 'Registrar',
            middleNames: 'Anne',
            mobileNumber: '07700 900001',
            nationalId: 'N-1',
            parentalResponsibility: 'Yes',
            passportNumber: 'P-1',
            personGuid: '6f1c2e9a-0b7d-4c1e-9f3a-2d8b5e7c4a10',
            personId: 701,
            postcode: 'ZZ1 1ZZ',
            preferredPaymentMethod: 'Direct Debit',
            private: false,
            profession: 'Engineer',
            relationship: 'Mother',
            relationshipOfJointContact: 'Father',
            secondaryPersonGuid: '0a9b8c7d-6e5f-4a3b-2c1d-0e9f8a7b6c5d',
            secondaryPersonId: 702,
            surname: 'Doe',
            taxRegistrationNumber: 'T-1',
            telephoneNumber: '01234 000002',
            title: 'Mrs',
            town: 'Anytown',
            workTelephoneNumber: '01234 000003',
        )]);
});

it('leaves a contact\'s other details empty when iSAMS leaves them out', function () {
    $contact = FakeIsams::send(new GetContactsBySchoolidRequest('100001'), ['contacts' => [aContactsRequiredDetails()]])->dto()->first();

    expect(array_keys(array_filter(get_object_vars($contact), fn ($detail) => $detail === null)))->toBe([
        'additionalId', 'address1', 'address2', 'address3', 'contactType', 'country', 'county', 'emailAddress',
        'emergencyNotes', 'fax', 'forename', 'lastUpdated', 'lastUpdatedBy', 'middleNames', 'mobileNumber', 'nationalId',
        'passportNumber', 'postcode', 'preferredPaymentMethod', 'profession', 'relationship', 'relationshipOfJointContact',
        'secondaryPersonGuid', 'secondaryPersonId', 'surname', 'taxRegistrationNumber', 'telephoneNumber', 'title', 'town',
        'workTelephoneNumber',
    ]);
});

it('logs the error iSAMS gives for one student\'s contacts and returns none', function () {
    Log::spy();
    FakeIsams::respondWith([GetContactsBySchoolidRequest::class => MockResponse::make(['message' => 'Student not found'], 404)]);

    $contacts = FakeIsams::connector()->send(new GetContactsBySchoolidRequest('100001'))->dto();

    expect($contacts)->toBeInstanceOf(Collection::class)->toBeEmpty();
    Log::shouldHaveReceived('error')->once()->with('Student not found', ['school_id' => '100001']);
});

it('returns no contacts when iSAMS answers without a contacts list or a message', function () {
    $contacts = FakeIsams::send(new GetContactsBySchoolidRequest('100001'), ['unexpected' => true])->dto();

    expect($contacts)->toBeInstanceOf(Collection::class)->toBeEmpty();
});

it('lets callers add their own properties to a student contact without deprecation notices', function () {
    $contact = FakeIsams::send(new GetContactsBySchoolidRequest('100001'), ['contacts' => [aContactsRequiredDetails()]])->dto()->first();
    $deprecations = [];

    set_error_handler(function (int $level, string $message) use (&$deprecations) {
        $deprecations[] = $message;

        return true;
    }, E_DEPRECATED);

    try {
        $contact->password = 'made-up-password';
    } finally {
        restore_error_handler();
    }

    expect($deprecations)->toBe([])
        ->and($contact->password)->toBe('made-up-password');
});
