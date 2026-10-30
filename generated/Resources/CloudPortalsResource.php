<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Resources\CloudPortals\AdmissionsCallbackSubmissionResource;
use spkm\IsamsApi\Resources\CloudPortals\AdmissionsCommunicationsResource;
use spkm\IsamsApi\Resources\CloudPortals\AdmissionsFileResource;
use spkm\IsamsApi\Resources\CloudPortals\AdmissionsPortalDocumentResource;
use spkm\IsamsApi\Resources\CloudPortals\AdmissionsPortalsAdmissionsFormsResource;
use spkm\IsamsApi\Resources\CloudPortals\AdmissionsPortalsApplicantContactsResource;
use spkm\IsamsApi\Resources\CloudPortals\AdmissionsPortalsFormInstanceResource;
use spkm\IsamsApi\Resources\CloudPortals\AdmissionsVisitsResource;
use spkm\IsamsApi\Resources\CloudPortals\BillingDepositsResource;
use spkm\IsamsApi\Resources\CloudPortals\BillingInvoicesResource;
use spkm\IsamsApi\Resources\CloudPortals\BillingPaymentGatewayResource;
use spkm\IsamsApi\Resources\CloudPortals\BillingStatementOfAccountsResource;
use spkm\IsamsApi\Resources\CloudPortals\BulletinDailyBulletinResource;
use spkm\IsamsApi\Resources\CloudPortals\HomeworkHomeworkSubmissionResource;
use spkm\IsamsApi\Resources\CloudPortals\HomeworkResource;
use spkm\IsamsApi\Resources\CloudPortals\NewsResource;
use spkm\IsamsApi\Resources\CloudPortals\ParentPortalNotificationsPortalResource;
use spkm\IsamsApi\Resources\CloudPortals\ParentPortalPushNotificationMessagesPortalResource;
use spkm\IsamsApi\Resources\CloudPortals\ParentPortalPushNotificationPortalResource;
use spkm\IsamsApi\Resources\CloudPortals\ParentPortalSchoolDirectoryResource;
use spkm\IsamsApi\Resources\CloudPortals\PortalDocumentSigningResource;
use spkm\IsamsApi\Resources\CloudPortals\ReportsAcademicReportsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolAccountCommunicationHistoryResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolAccountResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolActivitiesResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolAddressResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolAttendanceRecordsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolBookmarkResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolCalendarResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolCommunicationHistoryResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolCommunicationResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolConsentRegistersResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolDisciplineRecordsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolEmailOptionsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolEmailSubscriptionsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolExamsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolGradebooksPortalsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolInteractiveElectronicFormsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolInternalExamsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolLeaveRequestsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolNotificationsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolOutstandingFormsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolOutstandingTasksResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolPhotoGalleriesResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolPortalContactsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolPortalLinkMigrationResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolPortalsDivisionsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolPortalsFormsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolPortalsHousesResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolPortalsYearGroupsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolRewardsAndConductResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolSchoolAddressesResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolSchoolTermsPortalResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolSchoolsPortalResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolSmsSubscriptionsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolTeachingGroupsResource;
use spkm\IsamsApi\Resources\CloudPortals\StudentsPortalModulesResource;
use spkm\IsamsApi\Resources\CloudPortals\StudentsSelfRegistrationResource;
use spkm\IsamsApi\Resources\CloudPortals\StudentsStudentsPortalResource;
use spkm\IsamsApi\Resources\CloudPortals\StudentsTimetableResource;
use spkm\IsamsApi\Resources\CloudPortals\SystemConfigurationListGroupPortalsResource;
use spkm\IsamsApi\Resources\CloudPortals\SystemConfigurationPortalListResource;
use spkm\IsamsApi\Resources\CloudPortals\SystemConfigurationResource;
use spkm\IsamsApi\Resources\CloudPortals\SystemConfigurationStaffContactsPortalResource;

class CloudPortalsResource extends BaseResource
{
    public function admissionsCallbackSubmission(): AdmissionsCallbackSubmissionResource
    {
        return new AdmissionsCallbackSubmissionResource($this->connector);
    }

    public function admissionsCommunications(): AdmissionsCommunicationsResource
    {
        return new AdmissionsCommunicationsResource($this->connector);
    }

    public function admissionsFile(): AdmissionsFileResource
    {
        return new AdmissionsFileResource($this->connector);
    }

    public function admissionsPortalDocument(): AdmissionsPortalDocumentResource
    {
        return new AdmissionsPortalDocumentResource($this->connector);
    }

    public function admissionsPortalsAdmissionsForms(): AdmissionsPortalsAdmissionsFormsResource
    {
        return new AdmissionsPortalsAdmissionsFormsResource($this->connector);
    }

    public function admissionsPortalsApplicantContacts(): AdmissionsPortalsApplicantContactsResource
    {
        return new AdmissionsPortalsApplicantContactsResource($this->connector);
    }

    public function admissionsPortalsFormInstance(): AdmissionsPortalsFormInstanceResource
    {
        return new AdmissionsPortalsFormInstanceResource($this->connector);
    }

    public function admissionsVisits(): AdmissionsVisitsResource
    {
        return new AdmissionsVisitsResource($this->connector);
    }

    public function billingDeposits(): BillingDepositsResource
    {
        return new BillingDepositsResource($this->connector);
    }

    public function billingInvoices(): BillingInvoicesResource
    {
        return new BillingInvoicesResource($this->connector);
    }

    public function billingPaymentGateway(): BillingPaymentGatewayResource
    {
        return new BillingPaymentGatewayResource($this->connector);
    }

    public function billingStatementOfAccounts(): BillingStatementOfAccountsResource
    {
        return new BillingStatementOfAccountsResource($this->connector);
    }

    public function bulletinDailyBulletin(): BulletinDailyBulletinResource
    {
        return new BulletinDailyBulletinResource($this->connector);
    }

    public function homeworkHomeworkSubmission(): HomeworkHomeworkSubmissionResource
    {
        return new HomeworkHomeworkSubmissionResource($this->connector);
    }

    public function homework(): HomeworkResource
    {
        return new HomeworkResource($this->connector);
    }

    public function news(): NewsResource
    {
        return new NewsResource($this->connector);
    }

    public function parentPortalNotificationsPortal(): ParentPortalNotificationsPortalResource
    {
        return new ParentPortalNotificationsPortalResource($this->connector);
    }

    public function parentPortalPushNotificationMessagesPortal(): ParentPortalPushNotificationMessagesPortalResource
    {
        return new ParentPortalPushNotificationMessagesPortalResource($this->connector);
    }

    public function parentPortalPushNotificationPortal(): ParentPortalPushNotificationPortalResource
    {
        return new ParentPortalPushNotificationPortalResource($this->connector);
    }

    public function parentPortalSchoolDirectory(): ParentPortalSchoolDirectoryResource
    {
        return new ParentPortalSchoolDirectoryResource($this->connector);
    }

    public function portalDocumentSigning(): PortalDocumentSigningResource
    {
        return new PortalDocumentSigningResource($this->connector);
    }

    public function reportsAcademicReports(): ReportsAcademicReportsResource
    {
        return new ReportsAcademicReportsResource($this->connector);
    }

    public function schoolAccountCommunicationHistory(): SchoolAccountCommunicationHistoryResource
    {
        return new SchoolAccountCommunicationHistoryResource($this->connector);
    }

    public function schoolAccount(): SchoolAccountResource
    {
        return new SchoolAccountResource($this->connector);
    }

    public function schoolActivities(): SchoolActivitiesResource
    {
        return new SchoolActivitiesResource($this->connector);
    }

    public function schoolAddress(): SchoolAddressResource
    {
        return new SchoolAddressResource($this->connector);
    }

    public function schoolAttendanceRecords(): SchoolAttendanceRecordsResource
    {
        return new SchoolAttendanceRecordsResource($this->connector);
    }

    public function schoolBookmark(): SchoolBookmarkResource
    {
        return new SchoolBookmarkResource($this->connector);
    }

    public function schoolCalendar(): SchoolCalendarResource
    {
        return new SchoolCalendarResource($this->connector);
    }

    public function schoolCommunicationHistory(): SchoolCommunicationHistoryResource
    {
        return new SchoolCommunicationHistoryResource($this->connector);
    }

    public function schoolCommunication(): SchoolCommunicationResource
    {
        return new SchoolCommunicationResource($this->connector);
    }

    public function schoolConsentRegisters(): SchoolConsentRegistersResource
    {
        return new SchoolConsentRegistersResource($this->connector);
    }

    public function schoolDisciplineRecords(): SchoolDisciplineRecordsResource
    {
        return new SchoolDisciplineRecordsResource($this->connector);
    }

    public function schoolEmailOptions(): SchoolEmailOptionsResource
    {
        return new SchoolEmailOptionsResource($this->connector);
    }

    public function schoolEmailSubscriptions(): SchoolEmailSubscriptionsResource
    {
        return new SchoolEmailSubscriptionsResource($this->connector);
    }

    public function schoolExams(): SchoolExamsResource
    {
        return new SchoolExamsResource($this->connector);
    }

    public function schoolGradebooksPortals(): SchoolGradebooksPortalsResource
    {
        return new SchoolGradebooksPortalsResource($this->connector);
    }

    public function schoolInteractiveElectronicForms(): SchoolInteractiveElectronicFormsResource
    {
        return new SchoolInteractiveElectronicFormsResource($this->connector);
    }

    public function schoolInternalExams(): SchoolInternalExamsResource
    {
        return new SchoolInternalExamsResource($this->connector);
    }

    public function schoolLeaveRequests(): SchoolLeaveRequestsResource
    {
        return new SchoolLeaveRequestsResource($this->connector);
    }

    public function schoolNotifications(): SchoolNotificationsResource
    {
        return new SchoolNotificationsResource($this->connector);
    }

    public function schoolOutstandingForms(): SchoolOutstandingFormsResource
    {
        return new SchoolOutstandingFormsResource($this->connector);
    }

    public function schoolOutstandingTasks(): SchoolOutstandingTasksResource
    {
        return new SchoolOutstandingTasksResource($this->connector);
    }

    public function schoolPhotoGalleries(): SchoolPhotoGalleriesResource
    {
        return new SchoolPhotoGalleriesResource($this->connector);
    }

    public function schoolPortalContacts(): SchoolPortalContactsResource
    {
        return new SchoolPortalContactsResource($this->connector);
    }

    public function schoolPortalLinkMigration(): SchoolPortalLinkMigrationResource
    {
        return new SchoolPortalLinkMigrationResource($this->connector);
    }

    public function schoolPortalsDivisions(): SchoolPortalsDivisionsResource
    {
        return new SchoolPortalsDivisionsResource($this->connector);
    }

    public function schoolPortalsForms(): SchoolPortalsFormsResource
    {
        return new SchoolPortalsFormsResource($this->connector);
    }

    public function schoolPortalsHouses(): SchoolPortalsHousesResource
    {
        return new SchoolPortalsHousesResource($this->connector);
    }

    public function schoolPortalsYearGroups(): SchoolPortalsYearGroupsResource
    {
        return new SchoolPortalsYearGroupsResource($this->connector);
    }

    public function schoolRewardsAndConduct(): SchoolRewardsAndConductResource
    {
        return new SchoolRewardsAndConductResource($this->connector);
    }

    public function schoolSchoolAddresses(): SchoolSchoolAddressesResource
    {
        return new SchoolSchoolAddressesResource($this->connector);
    }

    public function schoolSchoolTermsPortal(): SchoolSchoolTermsPortalResource
    {
        return new SchoolSchoolTermsPortalResource($this->connector);
    }

    public function schoolSchoolsPortal(): SchoolSchoolsPortalResource
    {
        return new SchoolSchoolsPortalResource($this->connector);
    }

    public function schoolSmsSubscriptions(): SchoolSmsSubscriptionsResource
    {
        return new SchoolSmsSubscriptionsResource($this->connector);
    }

    public function schoolTeachingGroups(): SchoolTeachingGroupsResource
    {
        return new SchoolTeachingGroupsResource($this->connector);
    }

    public function studentsPortalModules(): StudentsPortalModulesResource
    {
        return new StudentsPortalModulesResource($this->connector);
    }

    public function studentsSelfRegistration(): StudentsSelfRegistrationResource
    {
        return new StudentsSelfRegistrationResource($this->connector);
    }

    public function studentsStudentsPortal(): StudentsStudentsPortalResource
    {
        return new StudentsStudentsPortalResource($this->connector);
    }

    public function studentsTimetable(): StudentsTimetableResource
    {
        return new StudentsTimetableResource($this->connector);
    }

    public function systemConfigurationListGroupPortals(): SystemConfigurationListGroupPortalsResource
    {
        return new SystemConfigurationListGroupPortalsResource($this->connector);
    }

    public function systemConfigurationPortalList(): SystemConfigurationPortalListResource
    {
        return new SystemConfigurationPortalListResource($this->connector);
    }

    public function systemConfiguration(): SystemConfigurationResource
    {
        return new SystemConfigurationResource($this->connector);
    }

    public function systemConfigurationStaffContactsPortal(): SystemConfigurationStaffContactsPortalResource
    {
        return new SystemConfigurationStaffContactsPortalResource($this->connector);
    }
}
