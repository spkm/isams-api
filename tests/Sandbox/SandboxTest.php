<?php

use Saloon\Config;
use Saloon\Http\Response;
use spkm\IsamsApi\Batch\BatchApiException;
use spkm\IsamsApi\Batch\BatchFilters;
use spkm\IsamsApi\Batch\BatchMap;
use spkm\IsamsApi\Batch\BatchRequest;
use spkm\IsamsApi\IsamsApiException;
use spkm\IsamsApi\IsamsConnector;
use spkm\IsamsApi\Requests\IsamsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\GetStudentDoctorRequest;
use spkm\IsamsApi\Requests\Students\GetStudentRequest;
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetCurrentStudentPhotoRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\GetSubjectRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\GetSubjectsRequest;
use spkm\IsamsApi\Requests\WellbeingManager\Configuration\GetWellbeingConfigurationRequest;
use spkm\IsamsApi\Support\Filter;
use spkm\IsamsApi\Tests\Helpers\Sandbox;
use spkm\IsamsApi\Tests\Helpers\Spec;

/*
|--------------------------------------------------------------------------
| Sandbox checks
|--------------------------------------------------------------------------
|
| Real requests to your own iSAMS sandbox, run only with `vendor/bin/pest --testsuite=Sandbox` and the ISAMS_SANDBOX_*
| variables set (see the README). Reads only, unless ISAMS_SANDBOX_ALLOW_WRITES is true. They report, rather than
| assert, how iSAMS's answers differ from the package's models: field names, JSON types, statuses and iSAMS's error
| texts.
|
*/

beforeEach(function () {
    if (! Sandbox::configured()) {
        $this->markTestSkipped('Set ISAMS_SANDBOX_BASE_URL, ISAMS_SANDBOX_CLIENT_ID and ISAMS_SANDBOX_CLIENT_SECRET to run the sandbox checks.');
    }

    Config::allowStrayRequests();
});

afterEach(function () {
    Config::preventStrayRequests();
});

/**
 * Whether iSAMS answered with data, refused because the endpoint isn't available to these credentials or this
 * school (a module it doesn't have), or failed.
 */
function sandboxOutcome(Response $response): string
{
    $json = str_contains((string) $response->header('Content-Type'), 'json');

    return match (true) {
        $response->successful() => 'ok',
        in_array($response->status(), [401, 403, 404, 405, 501], true) || ! $json => 'unavailable',
        default => 'error',
    };
}

/**
 * A short description of an error response: status, content type and iSAMS's message.
 */
function sandboxErrorText(Response $response): string
{
    if ($response->successful()) {
        return $response->status().' '.($response->header('Content-Type') ?: 'no content type').' (successful)';
    }

    return $response->status().' '.($response->header('Content-Type') ?: 'no content type').': '.sandboxRedact($response->body());
}

/**
 * iSAMS's text, shortened, without tags or extra spacing, and with quoted values left out so that the same error reads
 * the same for any record.
 */
function sandboxRedact(string $text): string
{
    $text = (string) preg_replace(['/\s+/', "/'[^']*'/"], [' ', "'…'"], strip_tags($text));

    return mb_substr(trim($text), 0, 240);
}

/**
 * Reports how a successful response differs from its request's model.
 */
function sandboxCompare(string $label, IsamsRequest $request, Response $response): void
{
    $model = $request->dtoClass();

    if ($model === null) {
        return;
    }

    $json = json_decode($response->body(), true);

    if ($json === null && $response->body() !== '') {
        Sandbox::line("$label: iSAMS answered ".$response->status().' with '.($response->header('Content-Type') ?: 'no content type').', not JSON');

        return;
    }

    $records = $request->resultKey === '' ? $json : ($json[$request->resultKey] ?? null);

    if (! is_array($records)) {
        Sandbox::line("$label: expected '".($request->resultKey ?: 'a record')."', iSAMS sent ".Sandbox::jsonType($json).' with keys '.implode(', ', is_array($json) ? array_map('strval', array_keys($json)) : []));

        return;
    }

    $records = array_is_list($records) ? $records : [$records];
    Sandbox::report($label, Sandbox::compare(array_values(array_filter($records, 'is_array')), $model));
}

/**
 * @return array<string, array{string}> label => [request class]
 */
function sandboxListRequests(): array
{
    return collect(Spec::manifest()['operations'])
        ->filter(fn (array $operation) => $operation['source'] === 'generated' && $operation['method'] === 'GET' && ! str_contains($operation['path'], '{') && ! str_contains($operation['class'], '\\CloudPortals\\'))
        ->filter(function (array $operation) {
            $parameters = (new ReflectionClass($operation['class']))->getConstructor()?->getParameters() ?? [];

            return collect($parameters)->every(fn (ReflectionParameter $parameter) => $parameter->isDefaultValueAvailable()) && (new $operation['class'])->isSafe();
        })
        ->mapWithKeys(fn (array $operation) => [class_basename($operation['class']) => [$operation['class']]])
        ->sortKeys()
        ->all();
}

/**
 * Builds a request from known path values, a page size of 1 where it takes one, and defaults; null when a required
 * argument can't be supplied.
 *
 * @param  class-string<IsamsRequest>  $class
 * @param  array<string, int|string>  $values
 */
function sandboxBuild(string $class, array $values): ?IsamsRequest
{
    $arguments = [];

    foreach ((new ReflectionClass($class))->getConstructor()?->getParameters() ?? [] as $parameter) {
        $name = $parameter->getName();
        $type = ltrim((string) $parameter->getType(), '?');

        if (array_key_exists($name, $values)) {
            $arguments[$name] = $type === 'int' ? (int) $values[$name] : (string) $values[$name];
        } elseif ($name === 'pageSize' || $name === 'page') {
            $arguments[$name] = 1;
        } elseif (! $parameter->isDefaultValueAvailable()) {
            return null;
        }
    }

    return new $class(...$arguments);
}

it('reads each list iSAMS offers without arguments into the package\'s models', function (string $class) {
    /** @var IsamsRequest $request */
    $request = new $class;
    $response = Sandbox::connector()->send($request);
    $label = class_basename($class);

    match (sandboxOutcome($response)) {
        'ok' => sandboxCompare($label, $request, $response),
        'unavailable' => Sandbox::line("UNAVAILABLE $label: ".sandboxErrorText($response)),
        default => Sandbox::line("ERROR $label: ".sandboxErrorText($response)),
    };

    expect($response->status())->toBeInt();
})->with(sandboxListRequests());

it('reads each endpoint that needs ids, filling them from the first record of the list above it', function () {
    $isams = Sandbox::connector();
    $operations = Spec::manifest()['operations'];
    $byPath = collect($operations)->filter(fn (array $operation) => $operation['method'] === 'GET' && in_array($operation['source'], ['generated', 'handwritten'], true))->mapWithKeys(fn (array $operation) => [$operation['path'] => $operation['class']]);
    $firsts = [];
    $first = function (string $template, array $values) use ($isams, $byPath, &$firsts): ?array {
        $path = (string) preg_replace_callback('/\{(\w+)\}/', fn (array $match) => rawurlencode((string) ($values[$match[1]] ?? '')), $template);

        if (! array_key_exists($path, $firsts)) {
            $request = isset($byPath[$template]) ? sandboxBuild($byPath[$template], $values) : null;
            $response = $request !== null ? $isams->send($request) : $isams->get($path);
            $firsts[$path] = $response->successful() ? Sandbox::firstRecord($response->json()) : null;
        }

        return $firsts[$path];
    };
    $tally = ['ok' => 0, 'unavailable' => 0, 'error' => 0, 'skipped' => 0];
    $skipped = [];

    foreach ($operations as $id => $operation) {
        if ($operation['source'] !== 'generated' || $operation['method'] !== 'GET' || ! str_contains($operation['path'], '{') || str_contains($operation['class'], '\\CloudPortals\\')) {
            continue;
        }

        $values = [];
        preg_match_all('/\{(\w+)\}/', $operation['path'], $parameters, PREG_OFFSET_CAPTURE);

        foreach ($parameters[1] as [$name, $offset]) {
            $record = $first(substr($operation['path'], 0, $offset - 2), $values);
            $value = $record[$name] ?? $record['id'] ?? null;
            $value ??= match ($name) {
                'schoolId' => $first('/api/students', [])['schoolId'] ?? null,
                'employeeId' => $first('/api/humanresources/employees', [])['id'] ?? null,
                default => null,
            };

            if (! is_int($value) && ! is_string($value)) {
                $skipped[] = "$name";

                continue 2;
            }

            $values[$name] = $value;
        }

        $request = sandboxBuild($operation['class'], $values);

        if ($request === null || ! $request->isSafe()) {
            $skipped[] = $request === null ? 'a required query value' : 'not safe';

            continue;
        }

        $response = $isams->send($request);
        $label = class_basename($operation['class']);
        $outcome = sandboxOutcome($response);
        $tally[$outcome]++;

        match ($outcome) {
            'ok' => sandboxCompare($label, $request, $response),
            'unavailable' => Sandbox::line("UNAVAILABLE $label: ".sandboxErrorText($response)),
            default => Sandbox::line("ERROR $label: ".sandboxErrorText($response)),
        };
    }

    $tally['skipped'] = count($skipped);
    Sandbox::line('Endpoints with ids: '.json_encode($tally).'; skipped for want of: '.json_encode(array_count_values($skipped)));

    expect($tally['ok'] + $tally['unavailable'] + $tally['error'])->toBeGreaterThan(0);
});

it('pages as the package expects', function () {
    $isams = Sandbox::connector();
    $unpaged = $isams->send(new GetStudentsRequest);
    $json = $unpaged->json();
    Sandbox::line('Students without a page size: '.$unpaged->status().', keys '.implode(', ', array_keys($json)).', page '.json_encode($json['page'] ?? null).', pageSize '.json_encode($json['pageSize'] ?? null).', count '.json_encode($json['count'] ?? null).', records '.count($json['students'] ?? []).', all of them: '.json_encode(count($json['students'] ?? []) === ($json['totalCount'] ?? null)));

    $noneResponse = $isams->send(new GetStudentsRequest(page: 1, pageSize: 5, filter: Filter::where('surname', 'eq', 'No-Such-Surname-Sandbox')));
    $none = $noneResponse->json();
    Sandbox::line('Students matching nothing: '.$noneResponse->status().', page '.json_encode($none['page'] ?? null).', totalPages '.json_encode($none['totalPages'] ?? null).', totalCount '.json_encode($none['totalCount'] ?? null).', records '.count($none['students'] ?? []));

    $sent = 0;
    $isams->middleware()->onRequest(function () use (&$sent) {
        $sent++;
    });
    $student = $isams->students()->all()->first();
    Sandbox::line('Isams::students()->all()->first(): '.($student === null ? 'no student' : class_basename($student)).' after '.$sent.' request(s)');

    expect($sent)->toBeInt();
});

it('downloads a student\'s current photo as a file', function () {
    $isams = Sandbox::connector();
    $schoolId = Sandbox::firstRecord($isams->send(new GetStudentsRequest(page: 1, pageSize: 1))->json())['schoolId'] ?? null;
    $response = $isams->send(new GetCurrentStudentPhotoRequest((string) $schoolId));

    Sandbox::line('Current student photo: '.$response->status().', '.($response->header('Content-Type') ?: 'no content type').', has a body: '.json_encode($response->body() !== ''));

    expect($response->status())->toBeInt();
});

it('reads Cloud Portals lists when the credentials have the Cloud Portals scope', function () {
    try {
        $portals = Sandbox::connector(['iSAMS.CloudPortals.Api']);
    } catch (Throwable $exception) {
        Sandbox::line('Cloud Portals: the token request was refused: '.class_basename($exception).': '.mb_substr($exception->getMessage(), 0, 240));
        expect(true)->toBeTrue();

        return;
    }

    $tally = ['ok' => 0, 'unavailable' => 0, 'error' => 0];

    foreach (Spec::manifest()['operations'] as $operation) {
        if ($operation['source'] !== 'generated' || $operation['method'] !== 'GET' || str_contains($operation['path'], '{') || ! str_contains($operation['class'], '\\CloudPortals\\')) {
            continue;
        }

        $request = sandboxBuild($operation['class'], []);

        if ($request === null || ! $request->isSafe()) {
            continue;
        }

        $response = $portals->send($request);
        $outcome = sandboxOutcome($response);
        $tally[$outcome]++;

        match ($outcome) {
            'ok' => sandboxCompare(class_basename($operation['class']), $request, $response),
            default => Sandbox::line(strtoupper($outcome).' '.class_basename($operation['class']).': '.sandboxErrorText($response)),
        };
    }

    Sandbox::line('Cloud Portals lists: '.json_encode($tally));
    expect(true)->toBeTrue();
});

it('shows what iSAMS sends for REST errors, and what the package makes of them', function () {
    $isams = Sandbox::connector();
    $probes = [
        'an unknown subject' => fn () => $isams->send(new GetSubjectRequest(987654321)),
        'an unknown student' => fn () => $isams->send(new GetStudentRequest('NO-SUCH-STUDENT')),
        'a malformed filter' => fn () => $isams->send(new GetStudentsRequest(page: 1, pageSize: 1, filter: 'Surname eq')),
        'a filter on a lower-case field' => fn () => $isams->send(new GetStudentsRequest(page: 1, pageSize: 1, filter: "surname eq 'No-Such-Surname-Sandbox'")),
        'a filter on a PascalCase field' => fn () => $isams->send(new GetStudentsRequest(page: 1, pageSize: 1, filter: "Surname eq 'No-Such-Surname-Sandbox'")),
        'a filter with an unsupported operator' => fn () => $isams->send(new GetStudentsRequest(page: 1, pageSize: 1, filter: "startswith(Surname, 'No')")),
        'a filter on an unknown field' => fn () => $isams->send(new GetStudentsRequest(page: 1, pageSize: 1, filter: "noSuchField eq 'x'")),
        'an unknown expansion' => fn () => $isams->send(new GetStudentsRequest(page: 1, pageSize: 1, expand: 'noSuchExpansion')),
        'a page that is not a number' => fn () => $isams->get('/api/students', ['page' => 'abc', 'pageSize' => 1]),
        'an unknown path' => fn () => $isams->get('/api/no-such-endpoint'),
        'a forged token' => fn () => $isams->send((new GetSubjectsRequest)->withTokenAuth('forged-token')),
    ];

    foreach ($probes as $label => $probe) {
        $response = $probe();
        $exception = IsamsApiException::fromResponse($response);
        Sandbox::line("ERROR PROBE $label: ".sandboxErrorText($response).' | package: '.class_basename($exception).': '.sandboxRedact($exception->getMessage()));
    }

    $schoolId = (string) (Sandbox::firstRecord($isams->send(new GetStudentsRequest(page: 1, pageSize: 1))->json())['schoolId'] ?? '');

    foreach (['Wellbeing configuration' => new GetWellbeingConfigurationRequest, 'a student\'s doctor' => new GetStudentDoctorRequest($schoolId)] as $label => $request) {
        $body = $isams->send($request)->body();
        Sandbox::line("BODY PROBE $label: the JSON literal null: ".json_encode(trim($body) === 'null').', length '.strlen($body));
    }

    try {
        new IsamsConnector('made-up-client', 'made-up-secret', (string) getenv('ISAMS_SANDBOX_BASE_URL'));
        Sandbox::line('ERROR PROBE made-up client credentials: a token was issued');
    } catch (Throwable $exception) {
        Sandbox::line('ERROR PROBE made-up client credentials: package: '.$exception::class.': '.mb_substr(preg_replace('/\s+/', ' ', $exception->getMessage()) ?? '', 0, 300));
    }

    expect(true)->toBeTrue();
});

it('reads each Batch API method allocated to the key into the package\'s models', function () {
    if (! Sandbox::batchConfigured()) {
        $this->markTestSkipped('Set ISAMS_SANDBOX_BASE_URL, ISAMS_SANDBOX_BATCH_KEY and ISAMS_SANDBOX_BATCH_SECRET to check a batch key.');
    }

    ini_set('memory_limit', '2G');
    $batch = Sandbox::batchConnector();
    $facts = require dirname(__DIR__, 2).'/generator/batch/nodes.php';
    $tally = ['ok' => 0, 'not allocated' => 0, 'error' => 0];

    foreach (BatchMap::METHODS as $method => [$module, $root]) {
        $filters = BatchFilters::make()->methods($method);
        $filter = $facts['methodFilters'][$method] ?? null;

        if ($filter !== null && $filter['required']) {
            $attributes = [];

            foreach ($filter['attributes'] as $attribute => $type) {
                $attributes[$attribute] = match (true) {
                    $attribute === 'StartDate' => now()->subDays(30),
                    $attribute === 'EndDate' => now(),
                    str_contains(strtolower($attribute), 'systemstatuses') => [0, 1],
                    default => null,
                };
            }

            $filters->filter($filter['module'], $filter['element'], array_filter($attributes, fn (mixed $value) => $value !== null));
        }

        usleep(250_000);
        $request = new BatchRequest($filters);
        $response = $batch->send($request);

        if ($response->status() === 429) {
            Sandbox::line("Batch $method: throttled (429); stopping");

            break;
        }

        try {
            $records = $request->createDtoFromResponse($response)->get($module, $root)->filter(fn (mixed $record) => is_array($record))->values();
        } catch (BatchApiException $exception) {
            $allocated = $exception->name() !== 'MethodsNotAllocatedToKeyException';
            $tally[$allocated ? 'error' : 'not allocated']++;

            if ($allocated) {
                Sandbox::line("BATCH ERROR $method: ".$exception->getStatus().' '.$exception->name().': '.sandboxRedact((string) $exception->description()));
            }

            continue;
        }

        $tally['ok']++;
        $model = BatchMap::ROOTS[$module][$root]['model'];
        Sandbox::report("Batch $method ({$records->count()} records)", Sandbox::compare($records->take(200)->all(), $model));
        unset($records, $response);
    }

    Sandbox::line('Batch methods: '.json_encode($tally));
    expect($tally['ok'] + $tally['not allocated'] + $tally['error'])->toBeGreaterThan(0);
});

it('shows whether iSAMS applies the exam results filter', function () {
    if (! Sandbox::batchConfigured()) {
        $this->markTestSkipped('Set the ISAMS_SANDBOX_BATCH_* variables to check a batch key.');
    }

    ini_set('memory_limit', '2G');
    $batch = Sandbox::batchConnector();
    $count = function (BatchFilters $filters) use ($batch): string {
        $request = new BatchRequest($filters);

        try {
            return (string) $request->createDtoFromResponse($batch->send($request))->get('ExamsManager', 'ExamResults')->count();
        } catch (BatchApiException $exception) {
            return $exception->getStatus().' '.$exception->name();
        }
    };

    Sandbox::line('Exam results without a filter: '.$count(BatchFilters::make()->methods('ExternalExams_GetExamResults')));
    Sandbox::line('Exam results for an exam cycle that does not exist: '.$count(BatchFilters::make()->methods('ExternalExams_GetExamResults')->filter('ExamsManager', 'ExamResultsFiltered', ['ExamCycleIdsToInclude' => [0]])));

    expect(true)->toBeTrue();
});

it('shows how iSAMS applies batch filters and shapes the records that differ from the docs', function () {
    if (! Sandbox::batchConfigured()) {
        $this->markTestSkipped('Set the ISAMS_SANDBOX_BATCH_* variables to check a batch key.');
    }

    ini_set('memory_limit', '2G');
    $batch = Sandbox::batchConnector();
    $records = function (string $method, ?array $filter = null) use ($batch) {
        [$module, $root] = BatchMap::METHODS[$method];
        $filters = BatchFilters::make()->methods($method);

        if ($filter !== null) {
            $filters->filter(...$filter);
        }

        $request = new BatchRequest($filters);

        try {
            return $request->createDtoFromResponse($batch->send($request))->get($module, $root);
        } catch (BatchApiException $exception) {
            return $exception->getStatus().' '.$exception->name().': '.sandboxRedact((string) $exception->description());
        }
    };
    $count = fn (mixed $result) => is_string($result) ? $result : (string) $result->count();
    $shape = function (mixed $value, int $depth = 0) use (&$shape): string {
        if (! is_array($value) || $depth > 2) {
            return Sandbox::jsonType($value);
        }

        if (array_is_list($value)) {
            return 'list of '.count($value).' ['.$shape($value[0] ?? null, $depth + 1).']';
        }

        return '{'.implode(', ', array_map(fn (string $key) => $key.': '.$shape($value[$key], $depth + 1), array_map('strval', array_keys($value)))).'}';
    };

    Sandbox::line('Exam results under ExamsManager/ExamResults for exam cycle 0: '.$count($records('ExternalExams_GetExamResults', ['ExamsManager', 'ExamResults', ['ExamCycleIdsToInclude' => [0]]])));
    Sandbox::line('Exam results under ExamsManager/ExamResults with examCycleIdsToInclude 0: '.$count($records('ExternalExams_GetExamResults', ['ExamsManager', 'ExamResults', ['examCycleIdsToInclude' => [0]]])));
    Sandbox::line('Exam results under ExamsManager/ExamResultsFiltered with examCycleIdsToInclude 0: '.$count($records('ExternalExams_GetExamResults', ['ExamsManager', 'ExamResultsFiltered', ['examCycleIdsToInclude' => [0]]])));

    foreach (['-1,0,1,2,3' => [-1, 0, 1, 2, 3], '1' => [1], '0' => [0], '-1' => [-1]] as $label => $statuses) {
        Sandbox::line("Passports for system statuses $label: ".$count($records('Pupil_GetPassports', ['StudentManager', 'Passports', ['SystemStatusesToInclude' => $statuses]])));
    }

    foreach (['ControlPanel_GetModulePermissions', 'ControlPanel_GetGroupedModules', 'ExternalExams_GetExamResults', 'ExternalExams_GetExamArrangements'] as $method) {
        $result = $records($method);
        Sandbox::line("Structure of $method's first record: ".(is_string($result) ? $result : $shape($result->first())));
    }

    expect(true)->toBeTrue();
});

it('shows the format of batch values the models can\'t read, and whether the exam results filter works', function () {
    if (! Sandbox::batchConfigured()) {
        $this->markTestSkipped('Set the ISAMS_SANDBOX_BATCH_* variables to check a batch key.');
    }

    ini_set('memory_limit', '2G');
    $batch = Sandbox::batchConnector();
    $get = function (string $method, ?array $filter = null) use ($batch) {
        [$module, $root] = BatchMap::METHODS[$method];
        $filters = BatchFilters::make()->methods($method);

        if ($filter !== null) {
            $filters->filter(...$filter);
        }

        $request = new BatchRequest($filters);

        return $request->createDtoFromResponse($batch->send($request))->get($module, $root);
    };
    $format = fn (mixed $value) => is_string($value) ? (string) preg_replace(['/\d/', '/[A-Za-z]/'], ['9', 'a'], $value) : Sandbox::jsonType($value);

    $formats = $get('SENManager_GetTypes')->pluck('needStartDate')->filter()->map($format)->unique()->values()->all();
    Sandbox::line('SEN types needStartDate formats: '.implode(' | ', $formats));

    $moduleIds = $get('ControlPanel_GetModulePermissions')->take(50)->map(fn (array $record) => is_array($record['moduleId'] ?? null) ? implode(',', array_map(fn (mixed $item) => Sandbox::jsonType($item), $record['moduleId'])) : Sandbox::jsonType($record['moduleId'] ?? null))->unique()->values()->all();
    Sandbox::line('Module permissions moduleId element types: '.implode(' | ', $moduleIds));

    $cycleId = $get('ExternalExams_GetExamCycles')->first()['id'] ?? null;

    foreach (['ExamResultsFiltered', 'ExamResults'] as $element) {
        foreach (['ExamCycleIdsToInclude', 'examCycleIdsToInclude'] as $attribute) {
            Sandbox::line("Exam results under ExamsManager/$element $attribute for one real exam cycle: ".$get('ExternalExams_GetExamResults', ['ExamsManager', $element, [$attribute => [$cycleId]]])->count());
        }
    }

    expect(true)->toBeTrue();
});

it('runs filtered batch calls under the filter names the package sends', function () {
    if (! Sandbox::batchConfigured()) {
        $this->markTestSkipped('Set the ISAMS_SANDBOX_BATCH_* variables to check a batch key.');
    }

    $batch = Sandbox::batchConnector();
    $calls = [
        'pupil()->passports()' => fn () => $batch->pupil()->passports(systemStatusesToInclude: [0, 1]),
        'contactAdvanced()->contacts()' => fn () => $batch->contactAdvanced()->contacts(contactTypes: ['Mother', 'Father'], systemStatusesToInclude: [0, 1]),
        'schoolReports()->reportCycles()' => fn () => $batch->schoolReports()->reportCycles(reportYear: (int) date('Y')),
        'schoolReports()->reports()' => fn () => $batch->schoolReports()->reports(),
        'pupil()->currentPupils()' => fn () => $batch->pupil()->currentPupils(),
    ];

    foreach ($calls as $label => $call) {
        try {
            Sandbox::line("Batch $label: ".$call()->count().' records');
        } catch (BatchApiException $exception) {
            Sandbox::line("Batch $label: ".$exception->getStatus().' '.$exception->name().': '.$exception->title().': '.sandboxRedact((string) $exception->description()));
        }
    }

    expect(true)->toBeTrue();
});

it('shows what the Batch API sends for errors, and what the package makes of them', function () {
    if (! Sandbox::batchConfigured()) {
        $this->markTestSkipped('Set the ISAMS_SANDBOX_BATCH_* variables to check a batch key.');
    }

    $batch = Sandbox::batchConnector();
    $probes = [
        'an unknown method' => new BatchRequest(BatchFilters::make()->methods('NoSuch_GetNothing')),
        'a filtered method without its filter' => new BatchRequest(BatchFilters::make()->methods('Pupil_GetPassports')),
        'a filter for an unknown module' => new BatchRequest(BatchFilters::make()->methods('Pupil_GetCurrentPupils')->filter('NoSuchModule', 'Nothing', ['StartDate' => now()])),
    ];

    foreach ($probes as $label => $request) {
        $response = $batch->send($request);
        $text = sandboxErrorText($response);

        try {
            $request->createDtoFromResponse($response);
            Sandbox::line("BATCH ERROR PROBE $label: $text | package: no exception");
        } catch (BatchApiException $exception) {
            Sandbox::line("BATCH ERROR PROBE $label: $text | package: ".sandboxRedact($exception->getMessage()));
        }
    }

    expect(true)->toBeTrue();
});
