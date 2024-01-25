<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //建立POST  想要修改對應的舊資料表名稱 Post -> user_posts
    protected $table = "user_posts";//會複寫上層;

}
