<?php

use spkm\IsamsApi\Requests\Students\Contacts\GetContactsBySchoolidRequest;
use spkm\IsamsApi\Requests\Students\Contacts\GetContactsRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\GetCustomFieldsBySchoolidAndCustomfieldidRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\GetCustomFieldsBySchoolidRequest;
use spkm\IsamsApi\Requests\Students\CustomFields\UpdateCustomFieldValueBySchoolidAndCustomfieldidRequest;
use spkm\IsamsApi\Requests\Students\GetStudentRequest;
use spkm\IsamsApi\Requests\Students\GetStudentsRequest;
use spkm\IsamsApi\Requests\Students\GetStudentSystemStatusesRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetCurrentPhotoBySchoolidRequest;
use spkm\IsamsApi\Requests\Students\Photos\GetPhotosBySchoolidPhotoidRequest;
use spkm\IsamsApi\Requests\Teaching\GetCurriculumSubjectCodesRequest;
use spkm\IsamsApi\Requests\Teaching\GetStudentsInSetBySetidRequest;
use spkm\IsamsApi\Requests\Teaching\GetSubjectByIdRequest;
use spkm\IsamsApi\Requests\Teaching\GetSubjectsRequest;
use spkm\IsamsApi\Requests\Teaching\GetSubjectTeachingDepartmentsBySubjectidRequest;
use spkm\IsamsApi\Requests\Teaching\GetTeachingSetsRequest;

$paymentWebhook = ['skip' => 'Payment provider webhook that iSAMS receives; it takes no API credentials.'];

return [
    // Areas generated so far; the rest of the spec is listed in the manifest as pending.
    'areas' => ['Teaching', 'Students'],

    'operations' => [
        // Requests written by hand before the generator existed: never generated over.
        'Students_GetAllByPagePagesizeExpand' => ['handwritten' => GetStudentsRequest::class],
        'Students_GetBySchoolidExpand' => ['handwritten' => GetStudentRequest::class],
        'StudentSystemStatuses_GetAllAsync' => ['handwritten' => GetStudentSystemStatusesRequest::class],
        'StudentPhotos_GetCurrentBySchoolid' => ['handwritten' => GetCurrentPhotoBySchoolidRequest::class],
        'StudentPhotos_GetBySchoolidPhotoid' => ['handwritten' => GetPhotosBySchoolidPhotoidRequest::class],
        'StudentsContacts_GetAllAsyncByPagePagesizeExpand' => ['handwritten' => GetContactsRequest::class],
        'StudentContacts_GetBySchoolidIncludedeceasedExpand' => ['handwritten' => GetContactsBySchoolidRequest::class],
        'StudentCustomFields_GetAllAsyncBySchoolid' => ['handwritten' => GetCustomFieldsBySchoolidRequest::class],
        'StudentCustomFields_GetAsyncBySchoolidCustomfieldid' => ['handwritten' => GetCustomFieldsBySchoolidAndCustomfieldidRequest::class],
        'StudentCustomFields_PatchBySchoolidCustomfieldidPubliccustomfield' => ['handwritten' => UpdateCustomFieldValueBySchoolidAndCustomfieldidRequest::class],
        'Subjects_GetAll' => ['handwritten' => GetSubjectsRequest::class],
        'Subjects_GetById' => ['handwritten' => GetSubjectByIdRequest::class],
        'SubjectTeachingDepartments_GetBySubjectid' => ['handwritten' => GetSubjectTeachingDepartmentsBySubjectidRequest::class],
        'TeachingSets_Get' => ['handwritten' => GetTeachingSetsRequest::class],
        'TeachingSets_GetStudentsInSetBySetid' => ['handwritten' => GetStudentsInSetBySetidRequest::class],
        'CurriculumSubjectCodes_Get' => ['handwritten' => GetCurriculumSubjectCodesRequest::class],

        // Students
        'StudentPassports_EditMultiplePassportsBySchoolidPassports' => ['class' => 'UpdateStudentPassportsRequest'],
        'StudentVisas_EditMultipleVisasAsyncBySchoolidVisas' => ['class' => 'UpdateStudentVisasRequest'],
        'StudentVisas_GetAllAsyncBySchoolidExpand' => ['response' => ['definition' => 'iSAMS.Pupils.AppServices.Objects.Public.Resources.Get.StudentVisas']],
        'StudentVisas_GetAsyncBySchoolidIdExpand' => ['response' => ['definition' => 'iSAMS.Pupils.AppServices.Objects.Public.Resources.Get.StudentVisa']],
        'StudentDocument_PostAsyncBySchoolid' => ['multipart' => ['data' => 'iSAMS.Pupils.AppServices.Objects.Public.Resources.Post.StudentDocument']],
        'StudentPassportDocuments_PostAsyncBySchoolidPassportid' => ['multipart' => ['data' => 'iSAMS.Pupils.AppServices.Objects.Public.Resources.Post.StudentPassportDocument']],
        'StudentVisaDocuments_PostAsyncBySchoolidVisaid' => ['multipart' => ['data' => 'iSAMS.Pupils.AppServices.Objects.Public.Resources.Post.StudentVisaDocument']],
        'StudentPassportDocuments_DownloadAsyncBySchoolidPassportidDocumentid' => ['response' => 'file'],
        'StudentVisaDocuments_DownloadAsyncBySchoolidVisaidDocumentid' => ['response' => 'file'],

        // Teaching
        'TeachingSets_PostBySetidSchoolid' => ['class' => 'AddStudentToTeachingSetRequest'],
        'TeachingSets_DeleteBySetidSchoolid' => ['class' => 'RemoveStudentFromTeachingSetRequest'],

        // System Configuration
        'PaymentStatus_GetGetnetPaymentProcessingPage' => $paymentWebhook,
        'PaymentStatus_GetGetnetPaymentCancelledPage' => $paymentWebhook,
        'PaymentStatus_UpdateAdmissionsPaymentStatusPaystackAsyncByTrxrefReference' => $paymentWebhook,
        'PaymentStatus_UpdateAdmissionsPaymentStatusStripeAsync' => $paymentWebhook,
        'PaymentStatus_UpdateAdmissionsPaymentStatusAsyncByPaymentstatusesenda' => $paymentWebhook,
        'PaymentStatus_UpdateAdmissionsPaymentStatusAsyncByPaymentstatus' => $paymentWebhook,
        'PaymentStatus_UpdateAdmissionsPaymentStatusPluspayAsyncByPaymentstatus' => $paymentWebhook,
        'PaymentStatus_UpdateParentPortalPaymentStatusAmazonByPaymentstatus' => $paymentWebhook,
        'PaymentStatus_UpdateParentPortalPaymentStatusEsendaAsyncByPaymentstatus' => $paymentWebhook,
        'PaymentStatus_UpdateParentPortalPaymentStatusFlywireAsyncByPaymentstatus' => $paymentWebhook,
        'PaymentStatus_UpdateParentPortalPaymentStatusPluspayAsyncByPaymentstatus' => $paymentWebhook,
        'PaymentStatus_UpdateAdmissionsPaymentStatusTransfermateAsync' => $paymentWebhook,
        'PaymentStatus_UpdateAdmissionsPaymentStatusGlobalPaymentsAsyncByPaymentstatus' => $paymentWebhook,
        'PaymentStatus_UpdateParentPortalPaymentStatusTransfermateAsync' => $paymentWebhook,
        'PaymentStatus_UpdateParentPortalPaymentStatusGlobalPaymentsAsyncByPaymentstatus' => $paymentWebhook,
        'PaymentStatus_UpdateParentPortalMultiplePaymentStatusGetnetStatusAsyncByGetnetpaymentdetails' => $paymentWebhook,
    ],

    // Words that are the same singular and plural.
    'uncountable' => ['Alumni', 'Staff', 'News', 'Homework', 'Information', 'Data', 'Metadata'],

    // Leading words dropped from a tag's resource name when choosing its namespace.
    'areaNouns' => [
        'Students' => ['Students', 'Student'],
        'Admissions' => ['Admissions', 'Applicants', 'Applicant'],
        'Medical Centre' => ['Medical'],
        'Wellbeing Manager' => ['Pastoral'],
        'School' => ['School'],
        'Bulletin' => ['Bulletin'],
        'Gradebooks' => ['Gradebook'],
        'Registration' => ['Registration'],
        'Timetable' => ['Timetable'],
        'News' => ['News'],
        'Other Schools' => ['Other'],
    ],

    // Area names that don't read well as PHP names.
    'areaNames' => [
        'HR' => 'HumanResources',
    ],

    // iSAMS module (second segment of a definition name) => model namespace.
    'modules' => [
        'Pupils' => 'Students',
        'HR' => 'HumanResources',
        'Pastoral' => 'WellbeingManager',
        'Markbooks' => 'Gradebooks',
        'Registers' => 'StudentRegisters',
        'PortalManagement' => 'CloudPortals',
        'Web' => 'Common',
    ],
];
