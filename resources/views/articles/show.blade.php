@extends('layouts.article')

@section('main')
    <h1 class="font-thin text-4xl text-center">{{ $article->title }}</h1>
    <div class="rounded p-3 px- text-lg   bg-dark-200">
        {{ $article->content }}
    </div>

    <div class="bg-cyan-900 rounded-lg text-lg hover:bg-zinc-600 text-center" >
        <a  href="{{ route('articles.index') }}">回文章列表</a>
    </div>
@endsection
