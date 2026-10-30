<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\CalendarManager\Categories\Category;
use spkm\IsamsApi\Data\Batch\CalendarManager\Types\Type;

class CalendarGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, Category>
     */
    public function categories(): LazyCollection
    {
        return $this->run('Calendar_GetCategories', Category::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\Events\Event>
     */
    public function events(DateTimeInterface $startDate, DateTimeInterface $endDate): LazyCollection
    {
        return $this->run('Calendar_GetEvents', \spkm\IsamsApi\Data\Batch\CalendarManager\Events\Event::class, ['module' => 'Calendar', 'element' => 'Events', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\EventsNextMonth\Event>
     */
    public function eventsNextMonth(): LazyCollection
    {
        return $this->run('Calendar_GetEventsNextMonth', \spkm\IsamsApi\Data\Batch\CalendarManager\EventsNextMonth\Event::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\EventsNextWeek\Event>
     */
    public function eventsNextWeek(): LazyCollection
    {
        return $this->run('Calendar_GetEventsNextWeek', \spkm\IsamsApi\Data\Batch\CalendarManager\EventsNextWeek\Event::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\EventsNextYear\Event>
     */
    public function eventsNextYear(): LazyCollection
    {
        return $this->run('Calendar_GetEventsNextYear', \spkm\IsamsApi\Data\Batch\CalendarManager\EventsNextYear\Event::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\EventsThisMonth\Event>
     */
    public function eventsThisMonth(): LazyCollection
    {
        return $this->run('Calendar_GetEventsThisMonth', \spkm\IsamsApi\Data\Batch\CalendarManager\EventsThisMonth\Event::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\EventsThisWeek\Event>
     */
    public function eventsThisWeek(): LazyCollection
    {
        return $this->run('Calendar_GetEventsThisWeek', \spkm\IsamsApi\Data\Batch\CalendarManager\EventsThisWeek\Event::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\CalendarManager\EventsThisYear\Event>
     */
    public function eventsThisYear(): LazyCollection
    {
        return $this->run('Calendar_GetEventsThisYear', \spkm\IsamsApi\Data\Batch\CalendarManager\EventsThisYear\Event::class);
    }

    /**
     * @return LazyCollection<int, Type>
     */
    public function types(): LazyCollection
    {
        return $this->run('Calendar_GetTypes', Type::class);
    }
}
