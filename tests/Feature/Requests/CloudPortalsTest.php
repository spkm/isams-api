<?php

use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Facades\Isams;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\Document\DownloadPortalDocumentRequest;
use spkm\IsamsApi\Requests\CloudPortals\DocumentSigning\GetEmbeddedSigningUrlRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Bookmark\GetBookmarksRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Schools\GetPortalSchoolsRequest;
use spkm\IsamsApi\Tests\Helpers\FakeIsams;

it('reaches the Cloud Portals requests through the default connection\'s resources', function () {
    $isams = FakeIsams::respondWith([GetBookmarksRequest::class => MockResponse::make(['bookmarks' => [], 'totalPages' => 0])]);

    FakeIsams::connector()->cloudPortals()->school()->bookmark()->all()->all();

    $isams->assertSent(GetBookmarksRequest::class);
    expect(FakeIsams::received($isams, GetClientCredentialsTokenRequest::class)->body()->all()['scope'])->toBe('restapi');
});

it('asks for the Cloud Portals scope on a connection configured with it', function () {
    config(['isams-api.connections.portals' => ['client_id' => 'portal-id', 'client_secret' => 'portal-secret', 'base_url' => FakeIsams::BASE_URL, 'scopes' => ['iSAMS.CloudPortals.Api']]]);
    $isams = FakeIsams::respondWith([GetBookmarksRequest::class => MockResponse::make(['bookmarks' => [], 'totalPages' => 0])]);

    Isams::connection('portals')->cloudPortals()->school()->bookmark()->all()->all();

    expect(FakeIsams::received($isams, GetClientCredentialsTokenRequest::class)->body()->all())->toMatchArray(['client_id' => 'portal-id', 'scope' => 'iSAMS.CloudPortals.Api']);
});

it('downloads a portal document as a file, although the spec describes a model', function () {
    FakeIsams::respondWith([DownloadPortalDocumentRequest::class => MockResponse::make('made-up PDF bytes', 200, ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'attachment; filename="letter.pdf"'])]);

    $file = FakeIsams::connector()->send(new DownloadPortalDocumentRequest(31))->dto();

    expect($file)->toEqual(new File('made-up PDF bytes', 'application/pdf', 'letter.pdf'));
});

it('reads a document signing URL, which iSAMS sends as a bare JSON string', function () {
    $url = FakeIsams::send(new GetEmbeddedSigningUrlRequest('signing-request-1'), '"https://signing.example.test/session/1"')->dto();

    expect($url)->toBe('https://signing.example.test/session/1');
});

it('sends a parameter that iSAMS names like one of the request\'s own properties under iSAMS\'s name', function () {
    $isams = FakeIsams::respondWith([GetPortalSchoolsRequest::class => MockResponse::make(['schools' => []])]);

    FakeIsams::connector()->send(new GetPortalSchoolsRequest(queryValue: 'Example'));

    expect(FakeIsams::queriesReceived($isams, GetPortalSchoolsRequest::class)[0])->toMatchArray(['query' => 'Example']);
});
