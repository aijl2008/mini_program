<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        "user_id" ,
        "title" ,
        "url" ,"cover_url","file_id",
        "uploaded_at",
        "played_number",
        "liked_number",
        "shared_wechat_number",
        "shared_moment_number",
        "visibility",
        "status"
    ];

    public $timestamps =true;
}
