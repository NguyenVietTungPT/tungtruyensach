<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;

    public $timestamps = false;   // set time create & update in DB
    protected $fillable = [
        'tensach', 'tomtat', 'noidung', 'kichhoat', 'slug_sach', 'hinhanh', 'views','created_at','updated_at'
    ]; 
    protected $primaryKey = 'id';
    protected $table = 'sach';

}
