<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $filltable = [
    'tentheloai','mota','kichhoat','slug_theloai','tukhoa','hinhanh','created_at','updated_at',
    ];
    protected $primaryKey = 'id';
    protected $table = 'theloai';

    public function truyen(){
        return $this->hasMany('App\Models\Truyen');
    }
}
