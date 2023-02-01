<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    use HasFactory;

    public $timestamps = false;   // set time create & update in DB
    protected $fillable = [
        'user_id', 'manga_id', 'type' , 'chapter' ,'title','created_at'
    ]; 
    protected $table = 'active_account';

}
