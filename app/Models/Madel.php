<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'mark_id'
    ];


    public function marks(){
        return $this->hasOne(Mark::class, 'id', 'mark_id');
    }

}
