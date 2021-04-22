<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'mark_id', 'model_id', 'generation_id', 'list', 'engine_id'
    ];

    public function marks(){
        return $this->hasOne(Mark::class, 'id', 'mark_id');
    }
    public function models(){
        return $this->hasOne(Madel::class, 'id', 'model_id');
    }
    public function engines(){
        return $this->hasOne(Engine::class, 'id', 'engine_id');
    }
    public function generations(){
        return $this->hasOne(Generation::class, 'id', 'generation_id');
    }
    public static function getMarks(){
        $all = Article::get();
        return $all->unique('mark_id');
    }

}
