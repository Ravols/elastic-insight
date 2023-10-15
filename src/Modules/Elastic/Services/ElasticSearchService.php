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
        dd('Hello from elastic insight!');
    }

    public function getClient(): Client
    {
        $this->client = $this->client ?? $this->buildClient();

        return $this->client;
    }

    private function buildClient(): Client
    {
        // dd(config('elastic-insight.connection'));
        $client = ClientBuilder::create()
            ->setHosts([config('elastic-insight.connection.host')])
            ->setBasicAuthentication(config('elastic-insight.connection.login'), config('elastic-insight.connection.password'))
            ->setCABundle(Storage::disk('local')->path(config('elastic-insight.connection.cert_path')))
            ->build();

        return $client;
    }

    public function getListOfIndicesAliases(?string $indexPrefix = null): Collection
    {
        $aliasRespone = Http::withoutVerifying()
                ->withBasicAuth(config('elastic-insight.connection.login'), config('elastic-insight.connection.password'))
                ->get(config('elastic-insight.connection.host').'/_cat/aliases?format=JSON');

        $indicesInfoCollection = collect(json_decode($aliasRespone->body()));

        if(is_null($indexPrefix)) {
            return $indicesInfoCollection;
        }

        return $indicesInfoCollection->filter(function ($index) use ($indexPrefix) {
            return str_contains($index->index, $indexPrefix);
        });
    }

    public function getListOfIndices(string $indexPrefix): Collection
    {
        // $indicesResponse = Http::withoutVerifying()->withBasicAuth(config('elastic-insight.connection.login'), config('elastic-insight.connection.password'))->get(config('elastic-insight.connection').'/_cat/indices?format=JSON');
        $indicesResponse = Http::withoutVerifying()
                ->withBasicAuth(config('elastic-insight.connection.login'), config('elastic-insight.connection.password'))
                ->get(config('elastic-insight.connection.host').'/_cat/indices?format=JSON');

        $indicesInfoCollection = collect(json_decode($indicesResponse->body()));

        return $indicesInfoCollection;

        return $indicesInfoCollection->filter(function ($index) use ($indexPrefix) {
            return str_contains($index->index, $indexPrefix);
        });
    }

    public function getElasticResponse(string $indexPrefix, string $query): Collection
    {
        $response = Http::withoutVerifying()
            ->withBasicAuth(config('elastic-insight.connection.login'), config('elastic-insight.connection.password'))
            ->get(config('elastic-insight.connection.host').'/'.$indexPrefix.'/'.$query.'?format=JSON');

        $responseCollection = collect(json_decode($response->body()));

        return $responseCollection;
    }
}
