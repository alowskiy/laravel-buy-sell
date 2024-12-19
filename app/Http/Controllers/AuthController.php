<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showRegForm()  {
        return view('components.reg-form');
    }

    public function regUser(Request $request)  {
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users|email|required',
            'password' => 'min:4|required',
            'name' => 'min:2|required'
        ]
        );
        if($validator->fails()){
            return back()->with('error', $validator->errors()->first());
        }
if($validator->validated()){
    $user = new User;
    $user->name = $validator->validated()['name'];
    $user->password = $validator->validated()['password'];
    $user->email = $validator->validated()['email'];
    $user->save();
}
Auth::login($user);

if (Auth::check()){
    return redirect()->action('App\Http\Controllers\PostController@showPosts');

} else{
    return back()->withErrors($validator)->withInput();
}

    }

    public function showLoginForm()  {
        return view('components.login-form');
    }

    public function AuthorizeUser(Request $request)  {

        $validator = Validator::make($request->all(),[
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->first());
        }
        if (Auth::attempt($validator->validated())){
            return redirect()->action('App\Http\Controllers\PostController@showPosts');
        }
    }

    public function logoutUser(Request $request) {
}
public function setUpForm(Request $request, $id){
$user = User::find($id);
if($request->has('name') and $request->has('email') ){
    $val = Validator::make(request()->all(),[
        'name'=> 'required',
        'email' => 'required|email',
        'password' => 'required|min:4'
    ]);
    if($val->fails()){
        return back()->with('error', $val->errors()->first());
    }
    $user->name = $val->validated()['name'];
    $user->email = $val->validated()['email'];
    $user->password = $val->validated()['password'];
    $user->save();
return  back()->with('Success', 'Данные успешно обновлены!');

}

return view('components.profile-settings', ['user'=> $user]);

}
}
