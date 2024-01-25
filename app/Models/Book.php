<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;

    use SoftDeletes; //使用軟刪除 這邊打  上面會增加 use   ....SoftDeletes  真神
    protected $fillable = [
        'title',
        'descript',
        'price',
        'avalable',
    ];
    public function store(){ //一對多的逆向
        return $this->belongsTo(Store::class);
    }

    public function authors(){ // 多對多 book->authors
        return $this->belongsToMany(Author::class);
    }
    // 產生的第3張表格 以英文排序 預設 author_book
    // 需自行建立 table author_book
    // author_id 、 book_id
}
