@extends('layouts.article')

@section('main')
    <h1 class="font-thin text-4xl text-center">文章列表</h1>
    <a href="{{ route('articles.create') }}">新增文章</a>

    @foreach ($articles as $article)
        <div class="border-t border-gary-300 my-2 p-2">
            <h2 class="font-bold text-lg">
                <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>

            </h2>
            <p>
                {{-- 下方這樣會有1+N問題  過多去資料庫查詢 key world Eager Loading --}}
                {{ $article->created_at }} 由 {{ $article->user->name }} 分享
                {{-- {{dd($article)}} --}}
            </p>
            <div class="flex">
                {{-- <a href="{{ route('articles.edit',['article'=>$article->id]) }}">編輯</a> --}}
                {{-- <a href="{{ route('articles.edit',['article'=>$article]) }}">編輯</a> --}}
                <a href="{{ route('articles.edit', $article) }}" class="mr-3">編輯</a>
                {{-- 上面三行 在 laravel 結果一樣 laravel 會幫妳處理 --}}
                <form action="{{ route('articles.destroy', $article) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="px-2 bg-red-500 text-red-200 rounded">刪除</button>
                </form>
            </div>
        </div>
    @endforeach
        {{-- {{ $articles->links() }} --}}
        {{-- 分頁功能 --   ->paginate(5); --}}
        {{ $articles->links() }}
@endsection
