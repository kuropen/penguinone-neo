<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\QiitaAPI;

/**
 * トップページ用コントローラ
 */
class HomeController extends Controller
{
    
    /**
     * 作者E-Mailアドレス
     * Gravater表示に必要
     */
    const AUTHOR_EMAIL = 'shinkai.sdpl@gmail.com';
    
    private $qiita;
    
    public function __construct (QiitaAPI $qiita)
    {
        $this->qiita = $qiita;
    }
    
    public function index ()
    {
        $emailHash = md5(self::AUTHOR_EMAIL);
        $gravaterUrl = 'https://www.gravatar.com/avatar/' . $emailHash;
        
        $qiitaContent = $this->qiita->getKPContribs();
        
        return view('welcome', [
            'page' => 'home',
            'imageUrl' => $gravaterUrl,
            'qiitaContent' => $qiitaContent
        ]);
    }
    
}
