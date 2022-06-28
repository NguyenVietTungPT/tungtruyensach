<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    public $timestamps = false;   // set time create & update in DB
    protected $fillable = [
        'truyen_id', 'tieude', 'slug_chapter', 'tomtat', 'noidung', 'kichhoat',
    ]; 
    protected $primaryKey = 'id';
    protected $table = 'chapter';

    public function truyen(){
        return $this->belongsTo('App\Models\Truyen');
    }
}
