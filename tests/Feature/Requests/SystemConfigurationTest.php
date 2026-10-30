<?php

use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Data\SystemConfiguration\ContactType;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemWithCensusData;
use spkm\IsamsApi\Requests\SystemConfiguration\List\ContactTypes\GetContactTypesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\GetListByTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\ListGroup\CreateCustomListGroupItemRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\Sms\GetSmsBatchMessagesRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('reads any of the school\'s lists by naming its type in the path', function () {
    $isams = FakeIsams::respondWith([GetListByTypeRequest::class => MockResponse::make(['items' => [['id' => 1, 'name' => 'Made-up item', 'listType' => 'Titles']]])]);

    $items = FakeIsams::connector()->systemConfiguration()->list()->getListByType('Titles')->dto();

    expect($items->first())->toBeInstanceOf(GlobalListItemWithCensusData::class)
        ->and($items->first()->name)->toBe('Made-up item')
        ->and(FakeIsams::received($isams, GetListByTypeRequest::class)->getUrl())->toEndWith('/api/systemconfiguration/list/Titles');
});

it('reads the contact types with the parental responsibility each one has by default', function () {
    $types = FakeIsams::send(new GetContactTypesRequest, ['contactTypes' => [['id' => 2, 'name' => 'Guardian', 'parentalResponsibilityDefault' => 'Yes']]])->dto();

    expect($types->first())->toBeInstanceOf(ContactType::class)
        ->and($types->first()->parentalResponsibilityDefault)->toBe('Yes');
});

it('adds an item to a custom list group and reports where iSAMS stored it', function () {
    $isams = FakeIsams::respondWith([CreateCustomListGroupItemRequest::class => MockResponse::make(status: 201, headers: ['Location' => 'https://isams.example.test/api/systemconfiguration/listgroup/custom/Example/12'])]);

    $created = FakeIsams::connector()->systemConfiguration()->listGroup()->createCustomListGroupItem('Example', new GlobalListItemForCreate(name: 'Made-up item'))->dto();

    expect($created->id)->toBe('12')
        ->and(json_decode((string) FakeIsams::received($isams, CreateCustomListGroupItemRequest::class)->createPsrRequest()->getBody(), true))->toBe(['name' => 'Made-up item']);
});

it('serves the school\'s lists from the cache once caching is on, but not SMS batches', function () {
    config(['isams-api.cache.enabled' => true]);
    $isams = FakeIsams::respondWith([
        GetContactTypesRequest::class => MockResponse::make(['contactTypes' => []]),
        GetSmsBatchMessagesRequest::class => MockResponse::make(['batches' => []]),
    ]);
    $systemConfiguration = FakeIsams::connector()->systemConfiguration();

    foreach ([1, 2] as $time) {
        $systemConfiguration->listContactTypes()->getContactTypes();
        $systemConfiguration->sms()->getSmsBatchMessages();
    }

    expect(FakeIsams::queriesReceived($isams, GetContactTypesRequest::class))->toHaveCount(1)
        ->and(FakeIsams::queriesReceived($isams, GetSmsBatchMessagesRequest::class))->toHaveCount(2);
});
