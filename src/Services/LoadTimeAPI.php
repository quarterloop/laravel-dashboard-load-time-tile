<?php

namespace Quarterloop\LoadTimeTile\Services;

use Illuminate\Support\Facades\Http;

class LoadTimeAPI
{
  public static function getLoadTime(string $url, string $key): array
  {

      $response = Http::withHeaders([
        'x-api-key' => $key,
      ])->post('https://api.geekflare.com/loadtime', [
        'url' => $url
      ])->json();

      return $response;
  }
}
