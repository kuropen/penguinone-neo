<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class MastodonAPI
{
    const CACHE_NAME_IINFO = 'mastodonIInfo_';
    
    public function getInstanceInfo($instanceName)
    {
        Log::info('Get Mastodon Instance Info: ' . $instanceName);
        if (Cache::has(self::CACHE_NAME_IINFO . $instanceName)) {
            Log::info('Cache used');
            $result = Cache::get(self::CACHE_NAME_IINFO . $instanceName);
        }else{
            $url = "https://{$instanceName}/api/v1/instance";
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            if ($result === false) {
                return null;
            }
            Cache::put(self::CACHE_NAME_IINFO . $instanceName, $result, env('CACHE_EXPIRES', 60));
        }
        
        Log::debug($result);
        
        return json_decode($result);
    }
    
}