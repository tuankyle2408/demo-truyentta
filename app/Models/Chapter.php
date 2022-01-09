<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;


       public $timestamps = false;  //Bo create at va updated at

    protected $fillable = [
        'truyen_id ', 'tomtat', 'tieude','noidung', 'kichhoat','slug_chapter' 
    ];
    protected $primaryKey = 'id';
    protected $table = 'chapter';

    
     public function Truyen(){
        return $this->belongsTo('App\Models\Truyen');

}



}
