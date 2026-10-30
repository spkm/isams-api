# Where iSAMS's API differs from its documentation

This package is built from the REST API spec iSAMS publishes (Swagger 2.0, versions 1 and 2, pinned in
`generator/spec`) and the Batch API node lists on the iSAMS developer portal. Running the package's
[sandbox checks](README.md#checking-the-package-against-your-isams-sandbox) against iSAMS in October 2026 found the
places below where the API does something other than its documentation says. Each entry says what the documentation
says, what the API does, and how the package handles it, so that developers know what to expect and iSAMS can correct
its documentation.

The checks only read: write requests (POST, PUT, PATCH, DELETE), Cloud Portals and areas the checking client couldn't
read are as documented until someone checks them. See [Not yet checked](#not-yet-checked).

## REST API

### Responses

| Request | The spec says | The API sends | The package |
|---|---|---|---|
| `GET /api/systemconfiguration/sms/batch` | a `batches` list | a paged list under `smsBatches`, with `count`, `page`, `pageSize`, `totalCount` and `totalPages` | reads `smsBatches` and pages through it |
| `GET /api/medical/vaccinationtypes` | a `vaccinations` list of vaccinations | a `vaccinationTypes` list of `{id, name, deleted}` | reads `vaccinationTypes` as `MedicalVaccinationType`, with `deleted` |
| `GET /api/gradebooks` | a `gradebooks` list of gradebook overviews | a bare list of whole gradebooks | reads the list as `Gradebook` |
| `GET /api/rewardsAndConduct/moduleTypes/{moduleTypeId}/categories/{categoryId}` | a list of categories | one category | returns one `Category` |
| `GET /api/rewardsAndConduct/students/{schoolId}/rewards/{rewardId}` | a list of categories | one reward | returns one `Reward` |
| `GET /api/admissions/applicants/{schoolId}/customFields/{customFieldId}`, and the `alumni/` and `student/` versions | one custom field | a `customFields` list | returns the list |
| `GET /api/medical/students/{schoolId}/doctor`, `GET /api/wellbeing/configuration` | an object | `null` when there is none | returns `null` |
| `GET /api/registration/codechanges` | `changeDateStart` is optional | 422, "Please provide a Change start date.", without it | requires `changeDateStart` |
| Paged lists, such as `GET /api/students` | `pageSize` is optional, with no default stated | pages of 100 when `pageSize` is left out | asks for 100 a page |

Some fields in the spec's definitions aren't in the API's responses (for example `preferredSurname` on alumni and
applicants, and an employee's `absences`, `customFields` and `integrations` unless expanded). The package's models
leave them `null`.

### Filters

The spec documents `$filter` as a subset of OData v3, with property names in PascalCase. The API answers every filter it
can't apply with the same bare error, whatever the cause: a lower-case property name, an unknown property, an
unsupported function such as `startswith()`, or a malformed expression.

```json
{"message": "An error occurred.", "trackingNumber": "…"}
```

with status 500. The package's `Filter` writes property names in PascalCase, and its exception adds the rules to that
message.

### Errors

| Request | The API answers | Helpful? |
|---|---|---|
| A record that doesn't exist | 404 with a clear message, such as "Failed to read subject - Subject does not exist." | yes |
| An unknown `expand` value | 400, "expand is invalid. The '…' part of the 'expand' query string is not a valid option" | yes |
| A `page` that isn't a number | 400, "page is invalid." | yes |
| A `$filter` the API can't apply | 500, "An error occurred.", with a tracking number | no: nothing says the filter is the problem |
| A path the API doesn't have | 500 with an HTML "Runtime Error" page | no: not a 404, and not JSON |
| An area the client has no permission for | 401, "The user is not authorised for this request - Read permissions are required.", in some areas; 403, "… read activity permissions are required for {Module}.", in others; and in one area 403 with `"message": null` | partly: the status differs by area, and one gives no reason |
| An expired or forged token | 401, "Authorization has been denied for this request." | yes |
| A token request with a wrong client id or secret | 400, `{"error": "invalid_client"}` | yes (standard OAuth) |
| A token request for a scope the client isn't allowed | 400, `{"error": "invalid_scope"}` | yes (standard OAuth) |
| A slow request, such as `GET /api/registration/natureofabsence` with no date range | 408, "The request timed out.", with a tracking number | partly: it doesn't say to narrow the request |
| A record in the wrong state, such as an applicant's documents for someone who isn't an applicant | 422 naming the state | yes |

Some 404 and 422 messages repeat ids from the request, such as a register id and a school id. Since the package puts
iSAMS's message in its exceptions, those ids can reach your logs.

The package names the request in every exception (`iSAMS responded 404 to GET /api/teaching/subjects/7: …`), adds
the tracking number to server errors, and explains the filter error and the HTML error page. It treats both forms of
permission refusal as `MissingPermissionException`, 408 as a server error, and refused token requests as
`UnauthorizedException`, with OAuth's reason. See [Errors](README.md#errors).

## Batch API

### Filters

- The filter names are the module and element names in the example on the developer portal's filtering page, and
  they often differ from the method's names. `Pupil_GetPassports` and `ContactAdvanced_GetContacts` are filtered under
  `StudentManager`, `Cover_GetAll…` under `CoverManager`, `ExternalExams_…` under `ExamsManager`, and `Tracking_…`
  under `TrackingManager`. Attribute names vary in case, such as `SystemStatusesToInclude` under `StudentManager` and
  `systemStatusesToInclude` under `PupilRegisters`.
- The API ignores filters it doesn't recognise: a filter under an unknown module still returns 200 with the method's
  records. A misnamed filter is only noticed for a method that requires one, which then fails with
  `FiltersRequiredException`, so the names were confirmed for the required filters (calendar events, cover, contacts,
  passports, registration and the other date-range methods).
- `ExternalExams_GetExamResults` ignores its filter. The documented `ExamResultsFiltered` element, `ExamResults`, and
  `ExamCycleIdsToInclude` in either case all return every result, even for an exam cycle that doesn't exist. The
  package offers no filter for it.
- An empty filter element doesn't satisfy a required filter: `SchoolReports_GetReports`,
  `SchoolReports_GetReportCycles` and `Tracking_GetExternalData` answered `FiltersRequiredException` to one. The
  package refuses a call whose required filter has no values before sending it.
- `PupilRegisters_GetSENRegister` requires a filter, although the node list marks it optional.
- A request that runs every method allocated to a key (no `MethodsToRun`) fails with 400 `FiltersRequiredException` if
  any allocated method requires a filter, such as `Calendar_GetEvents`.
- An unknown method in `MethodsToRun` answers 403 `MethodsNotAllocatedToKeyException`, not an unknown-method error.
- Errors from the JSON feed (`json.ashx`) are JSON but labelled `Content-Type: application/xml`. The package reads
  them either way.

### Records

| Method | The node list says | The API sends | The package |
|---|---|---|---|
| `ExternalExams_GetExamResults` | `CycleId` | `Cycle` | reads `cycle` |
| `ExternalExams_GetExamArrangements` | `SeparateInvigilation` | `SeperateInvigilation` | reads `seperateInvigilation` |
| `ExternalExams_GetExamEntries` | (not listed) | `Editor` | reads `editor` |
| `ControlPanel_GetGroupedModules` | one `Group`, with modules only | a list of `Group`s, each with `Name` and `Description` | reads a list of groups |
| `ControlPanel_GetModulePermissions` | `ModuleId` once | `ModuleId` twice, one empty; and `Author` (not listed) | reads the id that has a value, and `author` |
| `Tracking_GetExternalDataList` | `Ordinal` as a bit | a number | reads a number |
| `Pupil_GetCustomPupilGroupMembership` (and `…Filtered`) | `PupilId`, `CustomGroupID` | `PupilID`, `CustomGroupId` | reads `pupilID`, `customGroupId` |
| `Pupil_GetCustomPupilGroups` | `AuthorId` | `AuthorID` | reads `authorID` |
| `Registration_GetRegistrationPeriods` | `RegistratonRuleId` (sic) | `RegistrationRuleId`, and `Divisions` (not listed) | reads `registrationRuleId`; `divisions` isn't modelled yet |
| `RewardsAndConduct_GetFields` | (not listed) | each value's `LastEdited` | reads `lastEdited` |
| `RewardsAndConduct_GetRewardsTypes` | (not listed) | `Description` | reads `description` |
| `Teaching_GetDepartmentsAndSubjects` | `Divisions` holding a `DivisionName` | `Divisions` holding `Division` nodes, each with a `DivisionName` | reads a list of divisions |
| `Timetable_GetPupilTimetables` | one `Pupil` | a list of `Pupil`s | reads a list of pupils |
| `HumanResources_GetCurrentStaffWithCustomFields` | (not listed) | each custom field's `Order` | reads `order` |
| `SENManager_GetTypes` | `NeedStartDate` as a date | a day/month/year string (`dd/mm/yyyy`) | reads it as a date |

Elements with no value are left out of responses, so a field the node list documents may not appear on every record.
The package's models leave it `null`.

## Not yet checked

- Write requests (POST, PUT, PATCH, DELETE), including JSON Patch, the custom-field merge patch and `Location` headers
  on creation: the checks only read.
- Cloud Portals, which need the `iSAMS.CloudPortals.Api` scope.
- Endpoints in areas the checking client wasn't permitted to read, and endpoints needing an id that no list provided.
- The `Pupil_GetPassports` filter, which returned no passports for any system status.
