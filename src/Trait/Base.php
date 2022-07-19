<?php

namespace HumoSvgate\Trait;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

trait Base
{
    private mixed $config;

    public function __construct()
    {
        $this->config = config('humo-svgate-laravel');
    }

    public function sendRequest(string $request_type, string $url, array $params)
    {
        $base_url = $this->config['humo_svgate_base_url'];
        $preparedParams = $this->prepareRequestParams($params);

        return Http::withHeaders([
            'Content-Type' => 'application/json; charset=utf-8',
            'Accept' => 'application/json',
        ])->withToken($this->getToken())
            ->$request_type($base_url . $url, $preparedParams)
            ->throw(function ($response, $e) {
                throw new Exception($response->getBody()->getContents(), $response->status());
            })
            ->json('result');
    }

    public function prepareRequestParams($params)
    {
        return [
            'id' => Str::random(40),
            'params' => $params,
        ];
    }

    private function getToken()
    {
        //TODO write logic to get token
        return 'token';
    }
}
