<?php

use Saloon\Data\MultipartValue;
use Saloon\Http\Faking\MockResponse;
use spkm\IsamsApi\Data\Bulletin\BulletinYearGroupsForCreate;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\Billing\ExternalInvoice\UpdateExternalInvoiceDocumentRequest;
use spkm\IsamsApi\Requests\Billing\Invoicing\DownloadInvoiceRunReportRequest;
use spkm\IsamsApi\Requests\Bulletin\YearGroup\CreateBulletinYearGroupsRequest;
use spkm\IsamsApi\Requests\Curriculum\Cycles\GetCurriculumCyclesRequest;
use spkm\IsamsApi\Requests\Storage\Files\DeleteFileRequest;
use spkm\IsamsApi\Requests\Storage\Files\DownloadFileRequest;
use spkm\IsamsApi\Requests\Storage\Files\UploadFileRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('uploads a file to storage, naming it and its folder in the query', function () {
    $isams = FakeIsams::respondWith([UploadFileRequest::class => MockResponse::make(status: 201, headers: ['Location' => 'https://isams.example.test/api/storage/files/download?path=reports&fileName=summary.pdf'])]);

    FakeIsams::connector()->storage()->files()->uploadFile('documents', new MultipartValue('file', 'made-up PDF bytes', 'summary.pdf'), 'summary.pdf', 'reports', overwrite: true);

    $sent = FakeIsams::received($isams, UploadFileRequest::class);
    expect($sent->getUrl())->toEndWith('/api/storage/files/upload/documents')
        ->and($sent->query()->all())->toBe(['filename' => 'summary.pdf', 'path' => 'reports', 'overwrite' => 'true'])
        ->and((string) $sent->createPsrRequest()->getBody())->toContain('name="file"; filename="summary.pdf"');
});

it('downloads a file from storage', function () {
    $isams = FakeIsams::respondWith([DownloadFileRequest::class => MockResponse::make('made-up PDF bytes', 200, ['Content-Type' => 'application/pdf'])]);

    $file = FakeIsams::connector()->send(new DownloadFileRequest('reports', 'summary.pdf'))->dto();

    expect($file)->toBeInstanceOf(File::class)
        ->and($file->contents)->toBe('made-up PDF bytes')
        ->and(FakeIsams::queriesReceived($isams, DownloadFileRequest::class)[0])->toBe(['path' => 'reports', 'fileName' => 'summary.pdf']);
});

it('deletes a file from storage, naming it in the query', function () {
    $sent = FakeIsams::send(new DeleteFileRequest('reports', 'summary.pdf'))->getPendingRequest();

    expect($sent->getMethod()->value)->toBe('DELETE')
        ->and($sent->query()->all())->toBe(['path' => 'reports', 'filename' => 'summary.pdf']);
});

it('replaces an invoice\'s document with an uploaded file', function () {
    $sent = FakeIsams::send(new UpdateExternalInvoiceDocumentRequest('INV-0042', new MultipartValue('document', 'made-up PDF bytes', 'invoice.pdf')))
        ->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('PUT')
        ->and((string) $sent->getUri())->toEndWith('/api/billing/invoice/INV-0042/document')
        ->and((string) $sent->getBody())->toContain('name="document"; filename="invoice.pdf"');
});

it('downloads an invoice run\'s report as a file', function () {
    FakeIsams::respondWith([DownloadInvoiceRunReportRequest::class => MockResponse::make('made-up CSV', 200, ['Content-Type' => 'text/csv'])]);

    $report = FakeIsams::connector()->send(new DownloadInvoiceRunReportRequest(9))->dto();

    expect($report)->toBeInstanceOf(File::class)
        ->and($report->mimeType)->toBe('text/csv');
});

it('adds year groups to a bulletin', function () {
    $sent = FakeIsams::send(new CreateBulletinYearGroupsRequest(5, new BulletinYearGroupsForCreate(yearGroups: [9, 10])))->getPendingRequest()->createPsrRequest();

    expect($sent->getMethod())->toBe('POST')
        ->and(json_decode((string) $sent->getBody(), true))->toBe(['yearGroups' => [9, 10]]);
});

it('serves the curriculum cycles from the cache once caching is on', function () {
    config(['isams-api.cache.enabled' => true]);
    $isams = FakeIsams::respondWith([GetCurriculumCyclesRequest::class => MockResponse::make(['cycles' => []])]);
    $curriculum = FakeIsams::connector()->curriculum();

    $curriculum->cycles()->getCurriculumCycles();
    $curriculum->cycles()->getCurriculumCycles();

    expect(FakeIsams::queriesReceived($isams, GetCurriculumCyclesRequest::class))->toHaveCount(1);
});
