<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\DailyBulletin\TodaysDailyBulletins;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Bulletin extends BatchData
{
    protected const LISTS = [
        'linkedCategories' => LinkedCategory::class,
        'files' => File::class,
        'linkedDivisions' => LinkedDivision::class,
        'linkedYears' => LinkedYear::class,
    ];

    /**
     * @param  Collection<int, LinkedCategory>  $linkedCategories
     * @param  Collection<int, File>  $files
     * @param  Collection<int, LinkedDivision>  $linkedDivisions
     * @param  Collection<int, LinkedYear>  $linkedYears
     */
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?int $editorId = null,
        public ?string $author = null,
        public ?string $editor = null,
        public ?int $groupedBulletinId = null,
        public ?CarbonImmutable $date = null,
        public ?string $title = null,
        public ?string $body = null,
        public ?bool $important = null,
        public ?bool $staffOnly = null,
        public ?bool $authorised = null,
        public ?bool $authorisedEmailSent = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?CarbonImmutable $created = null,
        public Collection $linkedCategories = new Collection,
        public Collection $files = new Collection,
        public Collection $linkedDivisions = new Collection,
        public Collection $linkedYears = new Collection,
    ) {
    }
}
