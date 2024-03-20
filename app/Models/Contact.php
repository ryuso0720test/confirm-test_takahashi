<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

     protected $fillable = [
         'category_id',
         'first_name',
         'last_name',
         'gender',
         'email',
         'tell',
         'address',
         'building',
         'detail'
     ];

     public function category()
     {
        return $this->belongsTo(Category::class);
     }

    public function scopeSearch( $params)
    {
        // 性別絞り込み
        // if (!empty($params['gender'])) $query->where('gender', $params['gender']);

        // キーワード検索
        if (!empty($params)) {
                $query->where('first_name', 'like', '%' . $params['keyword'] . '%')
                    ->orWhere('last_name', 'like', '%' . $params['keyword'] . '%')
                    ->orWhere('email', 'like', '%' . $params['keyword'] . '%');
        }

        return $query;
    }
}
