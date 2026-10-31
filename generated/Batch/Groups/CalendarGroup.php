<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\CalendarManager\Categories\Category;
use spkm\IsamsApi\Data\Batch\CalendarManager\Event;
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
     * @return LazyCollection<int, Event>
     */
    public function events(DateTimeInterface $startDate, DateTimeInterface $endDate): LazyCollection
    {
        return $this->run('Calendar_GetEvents', Event::class, ['module' => 'Calendar', 'element' => 'Events', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return LazyCollection<int, Event>
     */
    public function eventsNextMonth(): LazyCollection
    {
        return $this->run('Calendar_GetEventsNextMonth', Event::class);
    }

    /**
     * @return LazyCollection<int, Event>
     */
    public function eventsNextWeek(): LazyCollection
    {
        return $this->run('Calendar_GetEventsNextWeek', Event::class);
    }

    /**
     * @return LazyCollection<int, Event>
     */
    public function eventsNextYear(): LazyCollection
    {
        return $this->run('Calendar_GetEventsNextYear', Event::class);
    }

    /**
     * @return LazyCollection<int, Event>
     */
    public function eventsThisMonth(): LazyCollection
    {
        return $this->run('Calendar_GetEventsThisMonth', Event::class);
    }

    /**
     * @return LazyCollection<int, Event>
     */
    public function eventsThisWeek(): LazyCollection
    {
        return $this->run('Calendar_GetEventsThisWeek', Event::class);
    }

    /**
     * @return LazyCollection<int, Event>
     */
    public function eventsThisYear(): LazyCollection
    {
        return $this->run('Calendar_GetEventsThisYear', Event::class);
    }

    /**
     * @return LazyCollection<int, Type>
     */
    public function types(): LazyCollection
    {
        return $this->run('Calendar_GetTypes', Type::class);
    }
}
