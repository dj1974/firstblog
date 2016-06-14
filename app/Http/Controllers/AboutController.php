<?php
/**
 * Created by PhpStorm.
 * User: Gile1974
 * Date: 31.5.2016
 * Time: 18:13
 */

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class AboutController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = User::all();
        $superuser = $user->where('type','superuser')->first();
        $admin = $user->where('type', 'admin')->all();

        $data = array(
            'superuser' => $superuser,
            'admin' => $admin
        );

        return view('pages.about')->with($data);
    }
}