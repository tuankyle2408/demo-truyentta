<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucTruyen extends Model
{
    use HasFactory;
        //do du lieu vao database danhmuc
     public $timestamps = false;  //Bo create at va updated at

    protected $fillable = [
        'tendanhmuc', 'mota', 'kichhoat','slug_danhmuc',
    ];
    protected $primaryKey = 'id';
    protected $table = 'danhmuc';

    public function truyen(){
        return $this->hasMany('App\Models\Truyen');

    }
}
