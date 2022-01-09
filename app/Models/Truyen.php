<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
     public $timestamps = false;  //Bo create at va updated at

    protected $fillable = [
        'tentruyen','tukhoa', 'tomtat', 'kichhoat','slug_truyen', 'hinhanh','danhmuc_id','tacgia','theloai_id','tinhtrang','created_at','updated_at',
    ];
    protected $primaryKey = 'id';
    protected $table = 'truyen';

     public function DanhMucTruyen(){
        return $this->belongsTo('App\Models\DanhMucTruyen','danhmuc_id','id');

}

     public function Chapter() {
        return $this->hasMany('App\Models\Chapter','truyen_id','id');

    }
    public function theloai(){
        return $this->belongsTo('App\Models\TheLoai','theloai_id','id');

}

}
