<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;   // set time create & update in DB
    protected $fillable = [
        'id','user_id', 'manga_id',
    ]; 
    protected $table = 'order_detail';

}
