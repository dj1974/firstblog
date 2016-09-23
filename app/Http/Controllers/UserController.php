<?php
/**
 * Created by PhpStorm.
 * User: Gile1974
 * Date: 25.5.2016
 * Time: 16:43
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as Image;
use Laracasts\Flash\Flash;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getRegister()
    {
        return view('users.register');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:120',
            'last_name' => 'required|max:120',
            'password' => 'required|min:4'
        ]);

        $email = $request['email'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $password = bcrypt($request['password']);

        $user = new User();

        $user->email = $email;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->password = $password;
        $user->type = 'guest';

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function getLogin()
    {
        return view('users.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }

    /**
     *
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function getAccount()
    {
        return view('users.account', ['user' => Auth::user()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSaveImage(Request $request)
    {
        /*        $this->validate($request, [
                    'first_name' => 'required|max:120',
                    'last_name' => 'required|max:120'
                ]);


                $user->first_name = $request['first_name'];
                $user->last_name = $request['last_name'];
                $user->type = $request['type'];
                dd($user);*/
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = $user->first_name . '-' . $user->last_name . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/src/image/users/' . $filename));

            $user->avatar = $filename;


            Flash::info('Image added!');
        }

        $user->profession = $request['profession'];
//            dd($user);
        $user->update();

        return view('users.account', ['user' => Auth::user()]);
    }

    public function show()
    {
        $user = User::all();
        $count = $user->count();
        $title = 'Users';

        $data = array(
            'user' => $user,
            'title' => $title,
            'count' => $count
        );

        return view('users.show')->with('data', $data);
    }

    public function showGuests()
    {
        $user = User::where('type', 'guest')->get();
        $count = $user->count();
        $title = 'Guests';

        $data = array(
            'user' => $user,
            'title' => $title,
            'count' => $count
        );
        return view('users.show')->with('data', $data);
    }

    public function showAdmins()
    {
        $user = User::where('type', 'admin')->get();
        $count = $user->count();

        $title = 'Admins';

        $data = array(
            'user' => $user,
            'title' => $title,
            'count' => $count
        );
        return view('users.show')->with('data', $data);
    }
}