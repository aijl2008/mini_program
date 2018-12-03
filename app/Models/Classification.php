<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    function getStatusOption()
    {
        return [
            1 => '正常',
            0 => '不可用',
        ];
    }
}
