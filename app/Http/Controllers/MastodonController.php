<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MastodonAPI;

/**
 * Mastodonインスタンス紹介ページ用コントローラ
 */
class MastodonController extends Controller
{
    const KP_WEBMASTER = 'webmaster@kuropen.org';
    
    private $mastodon;
    
    public function __construct (MastodonAPI $mastodon)
    {
        $this->mastodon = $mastodon;
    }
    
    public function instanceInfo ($instanceName)
    {
       $instanceInfo = $this->mastodon->getInstanceInfo($instanceName); 
       if (empty($instanceInfo)) {
           abort(404, 'Unknown instance.');
       }
       if ($instanceInfo->email !== self::KP_WEBMASTER) {
           abort(403, 'Illegal move. Loading information which is not owned by Kuropen.');
       }
       return view('mastodon', ['page' => 'mastodon', 'instance' => $instanceInfo]);
    }
}
