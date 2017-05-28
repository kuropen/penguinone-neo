<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\QiitaAPI;

/**
 * Top Page Controller.
 */
class HomeController extends Controller
{
    
    /**
     * Author E-Mail Address.
     * This is required by Gravater.
     */
    const AUTHOR_EMAIL = 'shinkai.sdpl@gmail.com';
    
    private $qiita;
    
    /**
     * Constructor
     * @param QiitaAPI $qiita Qiita API Insntace.
     */
    public function __construct(QiitaAPI $qiita)
    {
        $this->qiita = $qiita;
    }
    
    /**
     * Index endpoint.
     * @return mixed
     */
    public function index()
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
