<?php

namespace App;

use App\Enums\NoteType;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'contact_id', 'type', 'body',
    ];

    public function getTypeDescriptionAttribute()
    {
        return NoteType::getDescription($this->type);
    }
}
