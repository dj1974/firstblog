<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;


class TaskController extends Controller
{
    /**
     * @param Request $request
     * @return null
     * @internal param $id
     */
    public function checkBox(Request $request)
    {
     /*   $id = $request['id'];
        $user = User::findOrFail($id);
        $check = $request['approved'];*/
     /*   dd($check);
        if ($check == '0') {
            $user->approved = '0';
            $user->update();
        } else {
            $user->approved = '1';
            $user->update();
        }*/
        User::where('id', Input::get('id'))
            ->update(['approved' => Input::has('approved')]);
    }
}
