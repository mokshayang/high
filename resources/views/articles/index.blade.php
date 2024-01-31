@extends('layouts.article')

@section('main')
    <h1 class="font-thin text-4xl text-center">文章列表</h1>
    <a href="{{ route('articles.create') }}">新增文章</a>

    @foreach ($articles as $article)
        <div class="border-t border-gary-300 my-2 p-2">
            <h2 class="font-bold text-lg">{{ $article->title }}</h2>
            <p>
                {{ $article->created_at }} 由 {{ $article->user->name }} 分享
                {{-- {{dd($article)}} --}}
            </p>
        </div>
    @endforeach
@endsection
