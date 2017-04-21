<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LetsEncryptChallengeController extends Controller
{
    function challenge ($id)
    {
        // Ref: http://qiita.com/pikonori/items/b447b3b0dc42dc5c17f4
        
        if ($id == env('LETSENCRYPT_REQUEST')) {
            return env('LETSENCRYPT_RESPONSE');
        } else {
            abort(404);
        }
    }
}
