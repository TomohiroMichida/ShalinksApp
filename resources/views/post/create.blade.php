@extends('layouts.app')

@section('content')
<div class = "container">
    <h1>登録リンク追加</h1>
    <form method = "post" action="/create">
        {{ csrf_field() }}
        <input type="hidden" name = "user_id" value = "{{$user->id}}">
        <div class="form-group">
            <label for="UrlTitle">リンク先タイトル</label>
            <input type="text" class="form-control" id="UrlTitle" name="title">
        </div>
        <div class="form-group">
            <label for="url">リンク(URL)</label>
            <input type="text" class="form-control" id="Url" name="target">
        </div>
        <div class="form-group">
            <label for="UrlContent">リンク先の説明</label>
            <textarea class="form-control" id="UrlContent" rows="3" name="content"></textarea>
        </div>

        <button type="submit" class="btn btn-primary url-add">追加する</button>
    </form>
</div>
@endsection
