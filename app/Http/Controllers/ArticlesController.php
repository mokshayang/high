<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class ArticlesController extends Controller
{
    // 建構子 : 去中間見取的授權 ， 除了 create.index 其他都要登入
    // 也可以用 only('....');
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(){
        $articles = Article::all();
        return view('articles/index',['articles'=>$articles]);
    }
    public function create(){
        return view('articles.create');
    }
    // form 表單請求 :
    public function store(Request $request){
        // validate 證實
        // 檢查使用者是否已驗證
    // if (auth()->check()) {
        // 驗證輸入
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
        ]);
        // 取得使用者實例、寫入資料
        auth()->user()->articles()->create($content);
        // 並重新定向到跟目錄
        // with 會塞一個 session 值 key,value 對應到 layout 判斷:

    // } else {
        // 處理使return redirect()->route('root')->with('notice','文章新增成功');用者未驗證的情況
        // 可以將其重新導向到登錄頁面或執行其他動作
        // 返回登入頁面
    //     return redirect()->route('login'); // 根據應用程式邏輯進行調整
    // }
    }
}
