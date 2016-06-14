<?php
/**
 * Created by PhpStorm.
 * User: Gile1974
 * Date: 1.6.2016
 * Time: 9:19
 */

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;

class ServiceController extends Controller
{

    public function index()
    {
        return view('pages.service');
    }

}