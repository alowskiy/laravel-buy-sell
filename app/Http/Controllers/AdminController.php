<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function adminGetPosts(){
       if(Gate::allows('admin-get-posts' )){
        $posts = Post::all();
        $cate = Category::all();
        $uid = Auth::user()->id;
        return view('components.admin-posts', ['posts' => $posts, 'categories' => $cate,'uid'=> $uid]);
       }
       else{
        abort(403);
       }
    }

public function adminDeletePost($id){

if(Gate::allows('admin-del-post')){
    $post = Post::find($id);
    $post->delete();
return back()->with('success','Обьявление успешно удалено!');

}

}
public function adminAllowPost($id){
    if(Gate::allows('admin-allow-post')){
        $post = Post::find($id);
        $post->status = 1;
        $post->save();
        return back()->with('success', 'Обьявление успешно разрешено!');
    }
     else{
        abort(403);
       }
}

public function adminGetUsers(){
    if (Gate::allows('admin-get-users')){
        $users = User::all();

        return view('components.user-list', ['users'=> $users]);
    }
     else{
        abort(403);
       }
}


public function adminBanUser($id){
if (Gate::allows('admin-ban-user')){
    $user = User::find($id);
    $user->active = 2;
    $user->save();
    return back()->with('success', 'Пользователь успешно заблокирован!');
}
 else{
        abort(403);
       }
}
public function adminUnbanUser($id){
if (Gate::allows('admin-unban-user')){
    $user = User::find($id);
    $user->active = 1;
    $user->save();
    return back()->with('success', 'Пользователь успешно разблокирован!');
}
 else{
        abort(403);
       }
}

public function getUserInfo(Request $request, $id){
    if (Gate::allows('admin-get-user-info')){

        $user = User::find($id);
        if(request()->has('name') and request()->has('email')){
            $val = Validator::make($request->all(), [
             'name'=> 'required',
             'email'=> 'email|required']);
             $user->name = $val->validated()['name'];
             $user->email = $val->validated()['email'];
             $user->save();
             return redirect()->action('App\Http\Controllers\AdminController@adminGetUsers')->with('success', 'Вы успешно изменили информацию!');


     }
        return view('components.edit-user', ['user'=> $user]);


}
 else{
        abort(403);
       }
}

public function changeFromAdmin(Request $request, $id){
    if(Gate::allows('update-post-admin')){
        $post = Post::find($id);


        if($request ->has('title') OR $request ->has('p_desc') OR $request->has('city')){


            $val = Validator::make($request->all(), [
                'title'=> 'required|min:6',
                'p_desc'=> 'required|min:6',
            ]);

            if($val->fails()){
                return back()->with('error', $val->errors()->first());
            }

            $post->title = $val->validated()['title'];
            $post->p_text = $val->validated()['p_desc'];
            $post->save();
            return back()->with('success','Данные успешно изменены!');
    }
    return view('components.post-edit', ['post' => $post]);

    }
     else{
        abort(403);
       }


    }
}



