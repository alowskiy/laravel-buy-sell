<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //

    public function showPosts(){
        $posts = Post::all();
        $cate = Category::all();
  if(Auth::check()){

    $uid = Auth::user()->id;
    return view('components.posts', ['posts' => $posts, 'categories' => $cate,'uid'=> $uid]);
  } else{
    return view('components.posts', ['posts' => $posts, 'categories' => $cate]);
  }
            }

public function getPost(Request $request,$id){
 $post = Post::find($id);

return view('components.post', ['post' => $post]);
                    }
  public function createPost(Request $request, User $user ){
  $whiteList = Category::where('parent_id', !NULL)->pluck('parent_id');
  $val = Validator::make($request->all(), [
  ['subCat' => 'required',
Rule::in($whiteList)],
 'photo' => 'required',
 'city' =>'required'
]);
 if($val->fails()){
                 //Залупливается почему-то

 return back();
}
                
                 

                            $post = new Post;

                            $post->title = $request->input('title');
                            $post->p_text = $request->input('p_desc');
                            $post->city = $request->input('city');
                            $post->user_id = Auth::id() ;
                            $path = Storage::disk('public')->put('post-imgs', $request->file('photo'));
                            $post->subcat_id = $val->validated()['subCat'];
                            $post->img_path = $path;

                                $post->save();
                                return redirect()->action('App\Http\Controllers\PostController@showPosts')->with('success', 'Обьявление отправлено на модерацию! ');

                            }

                            public function showPostCategory(Request $request){
$categories = Category::where('parent_id', NULL)->get();
return view('components.post-category', ['categories'=> $categories]);
                                     }

public function showPostForm(Request $request){

                                //validating
 $whiteList =   Category::where('parent_id', NULL)->pluck('id');

$val = Validator::make($request->all(), [
'cat' => ['required',
    Rule::in($whiteList)]
]);

 if($val->fails()){
   return back()->with('error', $val->errors()->first());
 }
if($val->validated()){
    $subCategories = Category::where('parent_id', $val->validated()['cat'])->get();

    $cities = Storage::json('US_States_and_Cities.json');
    return view('components.create-post', ['cities' => $cities, 'subCat' => $subCategories]);

}
    }

public function search(Request $request){

$whiteList =   Category::where('parent_id', '!=',NULL)->pluck('id');

$val = Validator::make($request->all(), [
    'cats' => ['required', Rule::in($whiteList)]
]);
if($val->fails()){
    return back()->with('error', $val->errors()->first());
}

if($val->validated()){
    $subCategories = Post::where('subcat_id', $val->validated()['cats'])->get();
    return view('components.search-posts', ['posts' => $subCategories]);

}
}

public function profileGoods(Request $request){

   if(Auth::check()){
     $posts = Post::where('user_id', Auth::user()->id)->get();
    $cate = Category::all();
    $uid = Auth::user()->id;
    return view('components.profile-goods', ['posts' => $posts, 'categories' => $cate,'uid'=> $uid]);
   }
   else{
    return back();
   }


}
public function deleteFromOwner( Post  $id){
    if( Gate::allows('delete-post', $id)){
        $post = Post::find($id->id)->delete();

return back()->with('success','Обьявление успешно удалено!');
    }
    else{
abort(403);

    }
}

public function changeFromOwner(Request $request,Post $id){
if(Gate::allows('update-post-owner',  $id)){
    $post = Post::find($id->id);
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
}
}
