<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>幫幫我</title>
    @vite('resources/css/app.css')
</head>
<body>
<main class="m-4">
    @yield('main')
    {{-- 快閃訊息 出現後 就會砍掉 session
        對應 Controller show()的->with('notice','新增文章成功') --}}
    @if(session()->has('notice'))
    <div class="bg-pink-300 px-3 py-2 rounded">
        {{ session()->get('notice')}}
    </div>
    @endif
</main>
@vite('resources/js/app.js')
</body>
</html>
