<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{

    public function about(){
        return view('user.about');   
       }

    public function create(Request $request, $id){
        if($id == 5){
            return redirect('/') -> with('my_status',__('url登録機能を使うには新規登録が必要です'));
        }
        $user = User::find($id);

        return view('post.create',[
            'user'=> $user
        ]);
    }

    public function store(Request $request){
        $post = new Post;
        $post -> title = $request -> title;
        $post -> target = $request -> target;
        $post -> user_id = $request -> user_id;
        $post -> content = $request -> content;
        
        $post -> save();
        return redirect('/') -> with('my_status',__('新しいurlを追加しました'));
    }

    public function edit(Request $request, $id){
        $post = Post::find($id);

        return view('post.edit',[
            'post' => $post
        ]);
    }

    public function update(Request $request){
        $post = Post::find($request -> id);
        $post -> title = $request -> title;
        $post -> target = $request -> target;
        $post -> content = $request -> content;

        $post -> save();
        return redirect('/') -> with('my_status', __('登録urlの内容を変更しました'));
    }

    public function delete(Request $request){
        Post::destroy($request -> id);
        
        return redirect('/') -> with('my_status', __('登録したurlを削除しました。'));
    }
}
