<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use spkm\IsamsApi\Resources\CloudPortals\School\AccountCommunicationHistoryResource;
use spkm\IsamsApi\Resources\CloudPortals\School\AccountResource;
use spkm\IsamsApi\Resources\CloudPortals\School\ActivitiesResource;
use spkm\IsamsApi\Resources\CloudPortals\School\AddressResource;
use spkm\IsamsApi\Resources\CloudPortals\School\AddressesResource;
use spkm\IsamsApi\Resources\CloudPortals\School\AttendanceRecordsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\BookmarkResource;
use spkm\IsamsApi\Resources\CloudPortals\School\CalendarResource;
use spkm\IsamsApi\Resources\CloudPortals\School\CommunicationHistoryResource;
use spkm\IsamsApi\Resources\CloudPortals\School\CommunicationResource;
use spkm\IsamsApi\Resources\CloudPortals\School\ConsentRegistersResource;
use spkm\IsamsApi\Resources\CloudPortals\School\ContactsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\DisciplineRecordsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\DivisionsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\EmailOptionsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\EmailSubscriptionsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\ExamsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\FormsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\GradebooksResource;
use spkm\IsamsApi\Resources\CloudPortals\School\HousesResource;
use spkm\IsamsApi\Resources\CloudPortals\School\InteractiveElectronicFormsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\InternalExamsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\LeaveRequestsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\LinkMigrationResource;
use spkm\IsamsApi\Resources\CloudPortals\School\NotificationsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\OutstandingFormsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\OutstandingTasksResource;
use spkm\IsamsApi\Resources\CloudPortals\School\PhotoGalleriesResource;
use spkm\IsamsApi\Resources\CloudPortals\School\RewardsAndConductResource;
use spkm\IsamsApi\Resources\CloudPortals\School\SchoolsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\SmsSubscriptionsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\TeachingGroupsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\TermsResource;
use spkm\IsamsApi\Resources\CloudPortals\School\YearGroupsResource;

class SchoolResource extends BaseResource
{
    public function account(): AccountResource
    {
        return new AccountResource($this->connector);
    }

    public function accountCommunicationHistory(): AccountCommunicationHistoryResource
    {
        return new AccountCommunicationHistoryResource($this->connector);
    }

    public function activities(): ActivitiesResource
    {
        return new ActivitiesResource($this->connector);
    }

    public function address(): AddressResource
    {
        return new AddressResource($this->connector);
    }

    public function addresses(): AddressesResource
    {
        return new AddressesResource($this->connector);
    }

    public function attendanceRecords(): AttendanceRecordsResource
    {
        return new AttendanceRecordsResource($this->connector);
    }

    public function bookmark(): BookmarkResource
    {
        return new BookmarkResource($this->connector);
    }

    public function calendar(): CalendarResource
    {
        return new CalendarResource($this->connector);
    }

    public function communication(): CommunicationResource
    {
        return new CommunicationResource($this->connector);
    }

    public function communicationHistory(): CommunicationHistoryResource
    {
        return new CommunicationHistoryResource($this->connector);
    }

    public function consentRegisters(): ConsentRegistersResource
    {
        return new ConsentRegistersResource($this->connector);
    }

    public function contacts(): ContactsResource
    {
        return new ContactsResource($this->connector);
    }

    public function disciplineRecords(): DisciplineRecordsResource
    {
        return new DisciplineRecordsResource($this->connector);
    }

    public function divisions(): DivisionsResource
    {
        return new DivisionsResource($this->connector);
    }

    public function emailOptions(): EmailOptionsResource
    {
        return new EmailOptionsResource($this->connector);
    }

    public function emailSubscriptions(): EmailSubscriptionsResource
    {
        return new EmailSubscriptionsResource($this->connector);
    }

    public function exams(): ExamsResource
    {
        return new ExamsResource($this->connector);
    }

    public function forms(): FormsResource
    {
        return new FormsResource($this->connector);
    }

    public function gradebooks(): GradebooksResource
    {
        return new GradebooksResource($this->connector);
    }

    public function houses(): HousesResource
    {
        return new HousesResource($this->connector);
    }

    public function interactiveElectronicForms(): InteractiveElectronicFormsResource
    {
        return new InteractiveElectronicFormsResource($this->connector);
    }

    public function internalExams(): InternalExamsResource
    {
        return new InternalExamsResource($this->connector);
    }

    public function leaveRequests(): LeaveRequestsResource
    {
        return new LeaveRequestsResource($this->connector);
    }

    public function linkMigration(): LinkMigrationResource
    {
        return new LinkMigrationResource($this->connector);
    }

    public function notifications(): NotificationsResource
    {
        return new NotificationsResource($this->connector);
    }

    public function outstandingForms(): OutstandingFormsResource
    {
        return new OutstandingFormsResource($this->connector);
    }

    public function outstandingTasks(): OutstandingTasksResource
    {
        return new OutstandingTasksResource($this->connector);
    }

    public function photoGalleries(): PhotoGalleriesResource
    {
        return new PhotoGalleriesResource($this->connector);
    }

    public function rewardsAndConduct(): RewardsAndConductResource
    {
        return new RewardsAndConductResource($this->connector);
    }

    public function schools(): SchoolsResource
    {
        return new SchoolsResource($this->connector);
    }

    public function smsSubscriptions(): SmsSubscriptionsResource
    {
        return new SmsSubscriptionsResource($this->connector);
    }

    public function teachingGroups(): TeachingGroupsResource
    {
        return new TeachingGroupsResource($this->connector);
    }

    public function terms(): TermsResource
    {
        return new TermsResource($this->connector);
    }

    public function yearGroups(): YearGroupsResource
    {
        return new YearGroupsResource($this->connector);
    }
}
