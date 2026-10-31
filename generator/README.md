# The generator

`composer generate` builds everything under `generated/`, plus `generator/manifest.json` and `ENDPOINTS.md`, from two
sources and one file of corrections:

| Source | Read by | Builds |
|---|---|---|
| `spec/isams-v1.json` and `spec/isams-v2.json`: iSAMS's REST API spec, pinned | `RestGenerator` | the requests, models and enums under `generated/Requests` and `generated/Data`, the resources and `HasResources` under `generated/Resources`, the `Isams` facade and `generator/manifest.json` |
| `batch/nodes.php`: the node lists from iSAMS's Batch API documentation | `BatchGenerator` | the models under `generated/Data/Batch`, and the groups and `BatchMap` under `generated/Batch` |
| `overrides.php`: the corrections below | both, through `Corrections` | |

`Generator` runs both and has `EndpointsDocument` write `ENDPOINTS.md` from their calls. `Writer` writes the files that changed, deletes the ones no longer built and removes the directories that leaves
empty. `composer generate:check` fails when the committed files differ from what the generator builds; the pre-commit
hook runs it. The tests in `tests/Spec` check the generated code against the spec.

Never edit a generated file: change `overrides.php` (or the generator) and run `composer generate`.

## overrides.php

One array in five sections. `Corrections` reads it and refuses a key or setting the generator does not read, a value of
the wrong shape, settings nothing reads together, and anything that names something the spec does not have, so a
correction is never silently lost when the spec is updated. Problems are listed together, by kind: the file's shape
first, then what the spec lacks.

### What to generate

| Key | Value | Effect |
|---|---|---|
| `areas` | areas: the first part of a tag, such as `Students` | Operations in these areas get requests, models and resource methods; the rest are listed in the manifest as `pending`. |

### Naming rules

| Key | Value | Effect |
|---|---|---|
| `areaNames` | area => PHP name | The namespace segment for an area whose own words don't make one: `'HR' => 'HumanResources'` gives `Requests\HumanResources`. |
| `areaNouns` | area => words | Leading words dropped from a tag's resource when choosing its namespace: with `'Students' => ['Students', 'Student']`, the tag `Students - Student Passports` becomes `Requests\Students\Passports`. |
| `noiseWords` | area => words | Words iSAMS adds without meaning, left out of namespaces and class names: `'Cloud Portals' => ['Portals']`. |
| `ignoredTagSegments` | tag segments | Placeholders iSAMS puts in tags, left out of namespaces: `Undefined`. |
| `uncountable` | words | Words that are the same singular and plural, so `Alumni` is never made `Alumnus` or `Alumnis`. |
| `modules` | iSAMS module => namespace | The model namespace for a module (the second segment of a definition name, `iSAMS.Pupils.…`) where it differs from the module's name: `'Pupils' => 'Students'` puts those models in `Data\Students`. |
| `models` | definition => class name | A model's name before its kind suffix (`ForCreate`, `ForUpdate`, `ForPatch`, `Command`), where iSAMS's misleads: `…Get.DetentionSessions` holds one session, so it is `DetentionSession`. |
| `enums` | `Module\GeneratedName` => name | A better name for an enum: `'Gradebooks\Type' => 'MembershipType'`. |

### Corrections to the spec

| Key | Value | Effect |
|---|---|---|
| `properties` | definition => property => schema | Fields iSAMS sends that its spec leaves out, added to the model: `['deleted' => ['type' => 'boolean']]`. |

Corrections to one operation (`response`, `required`) are settings in `operations`, below. Record what you found in
[ISAMS-API-DIFFERENCES.md](../ISAMS-API-DIFFERENCES.md).

### Operations

`operations` maps an operationId (`v2:{operationId}` for an operation only in v2) to its settings:

| Setting | Value | Effect |
|---|---|---|
| `class` | class name ending in `Request` | Replaces the request class name built from the verb and the tag: `'TeachingSets_PostBySetidSchoolid' => ['class' => 'AddStudentToTeachingSetRequest']`. |
| `method` | method name | Replaces the resource method name built from the class name where it would be ambiguous: `['method' => 'forStudent']`. |
| `response` | `'file'`, `['definition' => D]` or `['list' => D, 'key' => K, 'paged' => bool]` | What iSAMS really answers where the spec is wrong: a shape name, one record of definition `D`, or a list of `D` under key `K` (`''` for a bare list), paged or not. |
| `required` | query parameter names | Parameters iSAMS requires that the spec marks optional; they become required constructor arguments. |
| `cacheable` | `true` | A GET whose answer rarely changes: the request is marked cacheable. |
| `safe` | `false` | A GET that makes iSAMS do something, such as running a workflow: never retried or cached. |
| `paginatable` | `true` or `false` | Forces paging on or off where the response and the `page` parameter alone decide wrongly. |
| `multipart` | formData part => definition | The model for a multipart part where the spec gives it no schema, or the wrong one. |
| `handwritten` | request class | A request written by hand, kept and reached from its resource instead of generating one. |
| `skip` | reason | The operation is not generated; the reason appears in the manifest. |

A skipped operation has no other settings, and a hand-written request reads only `method` and `response`.

### Batch API

| Key | Value | Effect |
|---|---|---|
| `batchMethods` | method => call name | The call name on its group where the one built from the method reads badly: `'DailyBulletin_GetTodaysDailyBulletins' => 'today'` is `Isams::batch()->dailyBulletin()->today()`. |
| `batchModels` | module => node => class name | The class for records several root nodes share, where the node's name misleads: the calendar's events hold `Type` nodes, which are `EventType`. |

## Adding an override

**iSAMS answers differently from its spec.** The sandbox checks (`vendor/bin/pest --testsuite=Sandbox`) show what
iSAMS sends. Correct a response with `response`, a parameter with `required` and a missing field with `properties`,
and add a line to ISAMS-API-DIFFERENCES.md.

**A generated name reads badly.** For a request, `class`; for a resource method, `method`; for a model, `models`; for
an enum, `enums`; for a Batch call or model, `batchMethods` or `batchModels`. For a whole area's names, the naming
rules: `areaNames`, `areaNouns`, `noiseWords`, `modules`.

**Two operations would get one name.** The generator refuses to build and names the setting to use.

**An operation should not be generated.** `skip` with the reason, or `handwritten` to keep a class of your own.

**A new area.** Add it to `areas`, run `composer generate`, and read the new entries in `generator/manifest.json` and
`ENDPOINTS.md` for names that need an override.

Then run `composer generate` and read the diff under `generated/`: every change should be one you meant.
