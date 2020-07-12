<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class UserController extends Controller
{

    public function index()
    {   
        $user = Auth::user();
        $posts = Post::where('user_id',$user->id)->orderBy('id','desc')->paginate(10);
        /*$others = Post::orderBy('id','DESC')->take(10)->get();*/
        
        /*foreach($others as $other){
            $users[] = User::find($other -> user_id); 
        }*/


        return view('user.home',[
            'user' => $user,
            'posts' => $posts,
            /*'others' => $others,
            'users' => $users*/
        ]);
    }

    public function show(Request $request, $id){
        $user = User::find($id);
        $posts = Post::where('user_id',$user->id)->get()->sortByDesc('id');

        return view('user.show',[
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function edit(Request $request, $id){
        if($id == 5){
            return redirect('/') -> with('my_status',__('プロフィール機能を使うには新規登録が必要です'));
        }
        $user = User::find($id);
        return view('user.profile_edit',[
            'user' => $user
        ]);
    }

    public function update(Request $request){
        $user = User::find($request->id);

        $user -> name = $request -> name;
        $user -> introduction = $request -> introduction;

        if($request->file('image')){
            $path = $request -> file('image') -> store('public/img');
            $user -> image = basename($path);
        }

        $user -> save();
        return redirect('/')->with('my_status', __('プロフィールを更新しました'));;
    }
}
