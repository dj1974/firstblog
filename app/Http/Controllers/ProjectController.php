<?php
/**
 * Created by PhpStorm.
 * User: Gile1974
 * Date: 31.5.2016
 * Time: 19:01
 */

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        return view('pages.project');
    }

}