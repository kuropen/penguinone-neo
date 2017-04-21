<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class QiitaAPI
{
    const CACHE_NAME = 'qiitaContribs';
    
    public function getKPContribs()
    {
        Log::info('Get qiita contributions');
        if (Cache::has(self::CACHE_NAME)) {
            Log::info('Cache used');
            $result = Cache::get(self::CACHE_NAME);
        }else{
            $url = 'https://qiita.com/api/v2/items?page=1&per_page=10&query=' . urlencode('user:kuropen');
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            Cache::put(self::CACHE_NAME, $result, env('CACHE_EXPIRES', 60));
        }
        
        Log::debug($result);
        
        return json_decode($result);
    }
    
}