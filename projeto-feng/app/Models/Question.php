<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'acertos', 'erros'];

    public function responses()
    {
        return $this->hasMany(QuestionResponse::class);
    }
    
}
