<?php

// config for Ravols/ElasticInsight
return [
    'connection' => [
        'login' => env('ELASTIC_INSIGHT_LOGIN'),
        'password' => env('ELASTIC_INSIGHT_PASSWORD'),
        'host' => env('ELASTIC_INSIGHT_HOST'),
        'cert_path' => env('ELASTIC_CERT_PATH'),
    ],
];
