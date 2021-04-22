<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'mark_id', 'model_id', 'generation_id'
    ];


    public function marks(){
        return $this->hasOne(Mark::class, 'id', 'mark_id');
    }
    public function models(){
        return $this->hasOne(Madel::class, 'id', 'model_id');
    }
}
