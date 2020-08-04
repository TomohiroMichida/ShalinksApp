@extends('layouts.app')

@section('content')
<div class = "container">
    <h1>登録リンク追加</h1>
    <form method = "post" action="/post_edit">
        {{ csrf_field() }}
        <input type="hidden" name = "id" value = "{{ $post->id }}">
        <div class="form-group">
            <label for="UrlTitle">リンク先タイトル</label>
            <input type="text" class="form-control" id="UrlTitle" name="title" value = "{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="url">リンク(URL)</label>
            <input type="text" class="form-control" id="Url" name="target" value = "{{ $post->target }}">
        </div>
        <div class="form-group">
            <label for="UrlContent">リンク先の説明</label>
            <textarea class="form-control" id="UrlContent" rows="3" name="content"> {{ $post->content }}</textarea>
        </div>

        <button type="submit" class="post-update-btn url-add update-btn-back">内容を変更する</button>
        <button type = "submit" class = "post-delete-btn url-add delete-btn-back"　onclick = "return confirm('内容を削除します。よろしいですか？')" formaction = "/post_delete">内容を削除する</button>
    </form>
</div>
@endsection
