<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\CalendarManager\Categories\Category;
use spkm\IsamsApi\Data\Batch\CalendarManager\Types\Type;

class CalendarGroup extends BatchGroup
{
    /**
     * @return Collection<int, Category>
     */
    public function categories(): Collection
    {
        return $this->run('Calendar_GetCategories', Category::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\Events\Event>
     */
    public function events(DateTimeInterface $startDate, DateTimeInterface $endDate): Collection
    {
        return $this->run('Calendar_GetEvents', \spkm\IsamsApi\Data\Batch\CalendarManager\Events\Event::class, ['module' => 'Calendar', 'element' => 'Events', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\EventsNextMonth\Event>
     */
    public function eventsNextMonth(): Collection
    {
        return $this->run('Calendar_GetEventsNextMonth', \spkm\IsamsApi\Data\Batch\CalendarManager\EventsNextMonth\Event::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\EventsNextWeek\Event>
     */
    public function eventsNextWeek(): Collection
    {
        return $this->run('Calendar_GetEventsNextWeek', \spkm\IsamsApi\Data\Batch\CalendarManager\EventsNextWeek\Event::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\EventsNextYear\Event>
     */
    public function eventsNextYear(): Collection
    {
        return $this->run('Calendar_GetEventsNextYear', \spkm\IsamsApi\Data\Batch\CalendarManager\EventsNextYear\Event::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\EventsThisMonth\Event>
     */
    public function eventsThisMonth(): Collection
    {
        return $this->run('Calendar_GetEventsThisMonth', \spkm\IsamsApi\Data\Batch\CalendarManager\EventsThisMonth\Event::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\EventsThisWeek\Event>
     */
    public function eventsThisWeek(): Collection
    {
        return $this->run('Calendar_GetEventsThisWeek', \spkm\IsamsApi\Data\Batch\CalendarManager\EventsThisWeek\Event::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\EventsThisYear\Event>
     */
    public function eventsThisYear(): Collection
    {
        return $this->run('Calendar_GetEventsThisYear', \spkm\IsamsApi\Data\Batch\CalendarManager\EventsThisYear\Event::class);
    }

    /**
     * @return Collection<int, Type>
     */
    public function types(): Collection
    {
        return $this->run('Calendar_GetTypes', Type::class);
    }
}
