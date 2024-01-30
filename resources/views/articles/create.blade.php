@extends('layouts.article')

@section('main')
    <h1 class="font-thin text-4xl text-center">文章 > 新增文章</h1>
    <form action="{{ route('articles.store') }}" method="post">
        @csrf
        <div class="field">
            <label for="title">標題 : </label>
            <input type="text" name="title" id="title" class="border border-gray-300 p-2">
        </div>
        <div class="field my-2">
            <label for="content" style="vertical-align:top">內文 : </label>
            <textarea name="content" id="content" cols="100" rows="8" class="border border-gray-300 p-1 " placeholder="最少10個字"></textarea>
        </div>
        <div class="actions ">
            <button type="submit" class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300" >新增文章</button>
        </div>
    </form>
@endsection
