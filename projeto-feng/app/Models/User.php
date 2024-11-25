<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'acertos', 'erros'];

    public function responses()
    {
        return $this->hasMany(QuestionResponse::class)->orderBy('answered_at', 'desc');
    }
    
}
