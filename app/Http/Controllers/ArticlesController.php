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
        $this->middleware('auth')->except(['index','show']);
    }

    public function index(){ //列表
        // 依照更新時間 :
        // $articles = Article::orderBy('updated_at','desc')->get();
        // 分頁功能 :
        $articles = Article::orderBy('updated_at','desc')->paginate(3);
        return view('articles/index',['articles'=>$articles]);
    }
    public function show($id){ // 單筆資料
        $article = Article::find($id);
        return view('articles.show',['article'=>$article]);
    }
    public function create(){
        return view('articles.create');
    }
    // form 表單請求 : articles.crerate 裡面的form 送到 store下面
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
        // 處理使return redirect()->route('root')->with('notice','文章新增成功');
        return redirect()->route('root')->with('notice','文章新增成功');
    // } else {
        // 用者未驗證的情況
        // 可以將其重新導向到登錄頁面或執行其他動作
        // 返回登入頁面
    //     return redirect()->route('login'); // 根據應用程式邏輯進行調整
    // }
    }
    public function edit($id){
        // 這樣不認識主人(不認識登入的帳號)
        // $article = Article::find($id);
        // 下方是透過使用者的角度
        $article = auth()->user()->articles->find($id);
        return view('articles.edit',['article'=>$article]);
    }

    // 同 function Store()  不需要 view 頁面
    // 資料提交後就可以了
    public function update(Request $request,$id){
        $article = auth()->user()->articles->find($id);

        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
        ]);
        //寫入資料
        $article->update($content);
        return redirect()->route('root')->with('notice','文章更新成功');
    }

    function destroy($id){
        // user()->articles 一對多  調用文章
        $article = auth()->user()->articles->find($id);
        $article->delete();
        return redirect()->route('root')->with('notice','刪除文章');
        }

}
