
@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール編集</div>

                <div class="card-body edit-body">
                    <form method="post" action="/profile_edit" class = "form-box" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name = "id" value = "{{$user->id}}">
                        <label for="image" >新プロフィール画像</label>
                        <div class="form-group row">
                            <div class="image-box p-wrap" class = "profile_lavel">
                                <input id="image" type="file" name="image" class = "input" value = "{{$user->image}}">
                                
                            </div>
                        </div>
                        
                        <label for="name" class="profile_lavel">ユーザーネーム</label>
                        <div class="form-group row">
                            <div class="p-wrap">
                                <input id="name" type="text"  name="name" class = "input" value="{{ $user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <label for="introduction" class="profile_lavel">自己紹介</label>
                        <div class="form-group row">

                            <div class="p-wrap">
                                <textarea class = "textarea" name="introduction" id="introduction" cols="35" rows="10" autofocus >{{$user -> introduction}}</textarea>

                            </div>
                        </div>

                        <div class="update-btn">
                                <button type="submit" class="btn btn-primary">
                                    プロフィール更新
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection