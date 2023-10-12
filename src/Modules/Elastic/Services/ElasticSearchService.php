<?php

namespace Ravols\ElasticInsight\Modules\Elastic\Services;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ElasticSearchService
{
    private Client $client;

    public function test(): void
    {
    }

    public function getClient(): Client
    {
        $this->client = $this->client ?? $this->buildClient();

        return $this->client;
    }

    private function buildClient(): Client
    {
        $client = ClientBuilder::create()
        ->setHosts([config('services.elastic.host')])
        ->setBasicAuthentication(config('services.elastic.login'), config('services.elastic.password'))
        ->setCABundle(Storage::disk('local')->path(config('services.elastic.cert_path')))
        ->build();

        return $client;
    }

    public function getListOfIndicesAliases(string $indexPrefix): Collection
    {
        $aliasRespone = Http::withoutVerifying()->withBasicAuth(config('services.elastic.login'), config('services.elastic.password'))->get(config('services.elastic.host') . '/_cat/aliases?format=JSON');

        $indicesInfoCollection = collect(json_decode($aliasRespone->body()));

        return $indicesInfoCollection->filter(function ($index) use ($indexPrefix) {
            return str_contains($index->index, $indexPrefix);
        });
    }

    public function getListOfIndices(string $indexPrefix): Collection
    {
        $indicesResponse = Http::withoutVerifying()->withBasicAuth(config('services.elastic.login'), config('services.elastic.password'))->get(config('services.elastic.host') . '/_cat/indices?format=JSON');

        $indicesInfoCollection = collect(json_decode($indicesResponse->body()));

        return $indicesInfoCollection->filter(function ($index) use ($indexPrefix) {
            return str_contains($index->index, $indexPrefix);
        });
    }

    public function getElasticResponse(string $indexPrefix, string $query): Collection
    {
        $response = Http::withoutVerifying()
            ->withBasicAuth(config('services.elastic.login'), config('services.elastic.password'))
            ->get(config('services.elastic.host') . '/' . $indexPrefix . '/' . $query . '?format=JSON');

        $responseCollection = collect(json_decode($response->body()));

        return $responseCollection;
    }
}
