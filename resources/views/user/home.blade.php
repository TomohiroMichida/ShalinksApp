@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class = "card-header">あなたの登録リンク一覧</div>
            </div>
            <div class = "card-body">
                <div class = "body-header">
                    <span class = "add-btn"><a href = "/create/{{ $user->id }}">urlを追加する</a></span>
                </div>
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
            {{$posts->links()}}
            </div>
        </div>
        <div class = "col-md-5">
            <div class = "card">
                <div class = "card-header">みんなの最新登録リンク</div>
            </div>
            <div class = "card-body">
                 @for($i = 0; $i < 10; $i++)
                     <div class = "target-container">
                         <div class = "title-wrapper">
                             <div class = "t-titleArea">
                                  <a href="show/{{$users[$i]->id}}">
                                      @if($users[$i] -> image == null)
                                           <img src="{{ asset('images/default_user_image.png') }}" class = "timeLine-image">
                                      @else
                                           <img src="{{ Storage::disk('s3')->url($users[$i]->image) }}" class = "timeLine-image">
                                      @endif
                                  </a>
                                 <span class = "timeLine-title">{{$others[$i]->title}}</span>
                             </div>
                             <div class = "btn-area"><span class = "detail_btn" unselectable="on">詳細表示</span></div>
                         </div>
                         <div class = "slide-area hide">
                             <div class = "timeLine-url-area">
                                 <a href="{{$others[$i]->target}}" class = "timeLine-url">{{$others[$i]->target}}</a>
                             </div>
                             <div class = "copy-btn-area">
                                 <span class = "copy_btn" unselectable = "on">urlをコピー<span>
                             </div>
                         </div>
                     </div>
                 @endfor 
                 {{$others->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
