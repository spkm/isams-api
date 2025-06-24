<?php

namespace spkm\IsamsApi\Requests\Students\Contacts;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\IsamsApi\DTOs\StudentContact;

/**
 * The 'contacts' property is an array of StudentContact objects.
 */
class GetContactsBySchoolidRequest extends Request
{
    protected Method $method = Method::GET;

    public string $resultKey = 'contacts';

    public function resolveEndpoint(): string
    {
        return "/api/students/{$this->schoolId}/contacts";
    }

    /**
     * @param  string  $schoolId  The unique identifier of a student to retrieve the contacts for.
     * @param  bool  $includeDeceased  Specifies if deceased contacts should be included.
     * @param  null|mixed  $expand  Possible values:
     *
     * `customFields` - include student contact's custom fields.
     * @param  null|mixed  $filter  The filter to be applied to result set, in the style of OData V3.
     */
    public function __construct(
        protected string $schoolId,
        protected bool $includeDeceased = false,
        protected mixed $expand = null,
        protected mixed $filter = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['includeDeceased' => $this->includeDeceased, 'expand' => $this->expand, '$filter' => $this->filter]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        $contacts = collect();
        $json = $response->json();
        if ($this->isMissingStudentError($json)) {
            $this->logApiError($json);

            return $contacts;
        }

        $data = $json[$this->resultKey];

        foreach ($data as $contact) {
            $contacts->add(
                new StudentContact(
                    id: $contact['id'],
                    additionalId: $contact['additionalId'] ?? null,
                    address1: $contact['address1'] ?? null,
                    address2: $contact['address2'] ?? null,
                    address3: $contact['address3'] ?? null,
                    addressId: $contact['addressId'],
                    billing: $contact['billing'],
                    canShareWithOtherParents: $contact['canShareWithOtherParents'],
                    contactOnly: $contact['contactOnly'],
                    contactType: $contact['contactType'] ?? null,
                    country: $contact['country'] ?? null,
                    county: $contact['county'] ?? null,
                    deceased: $contact['deceased'],
                    emailAddress: $contact['emailAddress'] ?? null,
                    emergencyNotes: $contact['emergencyNotes'] ?? null,
                    fax: $contact['fax'] ?? null,
                    forename: $contact['forename'] ?? null,
                    includeInAllMailMerges: $contact['includeInAllMailMerges'],
                    includeInMailMergeForBilling: $contact['includeInMailMergeForBilling'],
                    includeInMailMergeForCorrespondence: $contact['includeInMailMergeForCorrespondence'],
                    includeInMailMergeForReports: $contact['includeInMailMergeForReports'],
                    lastUpdated: $contact['lastUpdated'] ?? null,
                    lastUpdatedBy: $contact['lastUpdatedBy'] ?? null,
                    middleNames: $contact['middleNames'] ?? null,
                    mobileNumber: $contact['mobileNumber'] ?? null,
                    nationalId: $contact['nationalId'] ?? null,
                    parentalResponsibility: $contact['parentalResponsibility'],
                    passportNumber: $contact['passportNumber'] ?? null,
                    personGuid: $contact['personGuid'],
                    personId: $contact['personId'],
                    postcode: $contact['postcode'] ?? null,
                    preferredPaymentMethod: $contact['preferredPaymentMethod'] ?? null,
                    private: $contact['private'],
                    profession: $contact['profession'] ?? null,
                    relationship: $contact['relationship'] ?? null,
                    relationshipOfJointContact: $contact['relationshipOfJointContact'] ?? null,
                    secondaryPersonGuid: $contact['secondaryPersonGuid'] ?? null,
                    secondaryPersonId: $contact['secondaryPersonId'] ?? null,
                    surname: $contact['surname'] ?? null,
                    taxRegistrationNumber: $contact['taxRegistrationNumber'] ?? null,
                    telephoneNumber: $contact['telephoneNumber'] ?? null,
                    title: $contact['title'] ?? null,
                    town: $contact['town'] ?? null,
                    workTelephoneNumber: $contact['workTelephoneNumber'] ?? null,
                )
            );
        }

        return $contacts;
    }

    protected function isMissingStudentError(array $json): bool
    {
        return isset($json['message'])
            && $json['message'] === 'Failed to read student contacts - Student does not exist.';
    }

    protected function logApiError(array $json): void
    {
        Log::error($json['message'], ['school_id' => $this->schoolId]);
    }
}
