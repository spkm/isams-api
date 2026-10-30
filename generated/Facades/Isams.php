<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \spkm\IsamsApi\Resources\AdmissionsResource admissions()
 * @method static \spkm\IsamsApi\Resources\AgentResource agent()
 * @method static \spkm\IsamsApi\Resources\BillingResource billing()
 * @method static \spkm\IsamsApi\Resources\BulletinResource bulletin()
 * @method static \spkm\IsamsApi\Resources\CloudPortalsResource cloudPortals()
 * @method static \spkm\IsamsApi\Resources\CurriculumResource curriculum()
 * @method static \spkm\IsamsApi\Resources\DisciplineResource discipline()
 * @method static \spkm\IsamsApi\Resources\EstatesResource estates()
 * @method static \spkm\IsamsApi\Resources\ExclusionsResource exclusions()
 * @method static \spkm\IsamsApi\Resources\GradebooksResource gradebooks()
 * @method static \spkm\IsamsApi\Resources\HumanResourcesResource humanResources()
 * @method static \spkm\IsamsApi\Resources\MedicalCentreResource medicalCentre()
 * @method static \spkm\IsamsApi\Resources\NewsResource news()
 * @method static \spkm\IsamsApi\Resources\OtherSchoolsResource otherSchools()
 * @method static \spkm\IsamsApi\Resources\RegistrationResource registration()
 * @method static \spkm\IsamsApi\Resources\RewardsAndConductResource rewardsAndConduct()
 * @method static \spkm\IsamsApi\Resources\SchoolResource school()
 * @method static \spkm\IsamsApi\Resources\StorageResource storage()
 * @method static \spkm\IsamsApi\Resources\StudentRegistersResource studentRegisters()
 * @method static \spkm\IsamsApi\Resources\StudentsResource students()
 * @method static \spkm\IsamsApi\Resources\SystemConfigurationResource systemConfiguration()
 * @method static \spkm\IsamsApi\Resources\TeachingResource teaching()
 * @method static \spkm\IsamsApi\Resources\TimetableResource timetable()
 * @method static \spkm\IsamsApi\Resources\WellbeingManagerResource wellbeingManager()
 * @method static \spkm\IsamsApi\IsamsConnector connection(string $name)
 * @method static \spkm\IsamsApi\Batch\IsamsBatchConnector batch(string $key = 'default', ?string $connection = null)
 * @method static bool isAvailable(?string $connection = null)
 * @method static \Saloon\Http\Response send(\Saloon\Http\Request $request, ?\Saloon\Http\Faking\MockClient $mockClient = null, ?callable $handleRetry = null)
 * @method static \spkm\IsamsApi\IsamsPaginator paginate(\Saloon\Http\Request $request)
 * @method static \spkm\IsamsApi\IsamsPaginator paginateEndpoint(string $path, string $resultKey, array<string, mixed> $query = [])
 * @method static \Saloon\Http\Response get(string $path, array<string, mixed> $query = [])
 * @method static \Saloon\Http\Response post(string $path, array<mixed>|\JsonSerializable $body = [], array<string, mixed> $query = [])
 * @method static \Saloon\Http\Response put(string $path, array<mixed>|\JsonSerializable $body = [], array<string, mixed> $query = [])
 * @method static \Saloon\Http\Response patch(string $path, array<mixed>|\JsonSerializable $body = [], array<string, mixed> $query = [])
 * @method static \Saloon\Http\Response delete(string $path, array<string, mixed> $query = [])
 */
class Isams extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'isams';
    }
}
