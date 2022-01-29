<?php

namespace App\Services;

abstract class PokemonApiBase {
    protected function makeCurlCall(string $url)
    {
        $CR = curl_init();
        curl_setopt($CR, CURLOPT_URL, $url);
        curl_setopt($CR, CURLOPT_FAILONERROR, true);
        curl_setopt($CR, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($CR, CURLOPT_HTTPHEADER, array("charset=utf-8"));
        $result = curl_exec($CR);

        $response = json_decode($result);
        curl_close($CR);

        return $response;
    }
}
