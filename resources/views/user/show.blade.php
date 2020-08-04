@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "card">
            <div class = "card-header">プロフィール</div>
            <div class = "card-body">
               <div class = "profile-area">
                    <div class = "name-zone">
                        <p>ユーザーID: {{$user->name}}</p>
                    </div>
                    <div class = "profile-img">
                        <p>プロフィール画像　
                            @if($user->id == Auth::id())
                                <a href="/profile_edit/{{$user->id}}" class = "edit-btn"><i class=" fas fa-edit"></i></a>
                            @endif
                        </p>
                        @if($user -> image == null)
                            <img src="{{asset('images/default_user_image.png')}}" class = "p-edit-image" alt="プロフィール画像">
                        @else
                            <img src="{{ Storage::disk('s3')->url($user -> image) }}" class = "p-edit-image" alt = "プロフィール画像">
                        @endif
                    </div>
                    <div class = "intro-zone">
                        <p>自己紹介　
                        @if($user->id == Auth::id())
                        <a href="/profile_edit/{{$user->id}}" class = "edit-btn"><i class=" fas fa-edit"></i></a>
                        @endif
                        </p>
                        <div class = "intro-textarea">
                            {{$user->introduction}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "card mdl">
            <div class = "card-header">{{$user -> name}}さんの登録リンク</div>
            <div class = "card-body">
                 @if(!isset($posts))
                     <p>登録したurlはありません</p>
                 @else
                     @foreach($posts as $post)
                         <div class = "target-container">
                             <div class = "title-wrapper">
                                <div class = "titleArea">
                                     <span class = "content-title">
                                         @if($user->id == Auth::id())
                                            <a href="post_edit/{{$post->id}}" class = "edit-btn"><i class=" fas fa-edit"></i></a>
                                         @endif
                                        {{$post->title}}
                                    </span>
                                </div>
                                <div class = "btn-area"><span class = "detail_btn" unselectable="on">詳細表示</span></div>
                             </div>
                             <div class = "slide-area hide">
                                 <div><span class = "content-text">{{$post->content}}</span></div>
                                 <div class = "url-area">
                                     <a href="{{$post->target}}">{{$post->target}}</a>
                                 </div>
                                 <div class = "copy-btn-area">
                                     <span class = "copy_btn" unselectable = "on">urlをコピー<span>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 @endif
           
            </div>
        </div>
    </div>
@endsection