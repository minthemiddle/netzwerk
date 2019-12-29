<?php

namespace App;

use App\Enums\Priority;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'birthdate',
        'priority',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'birthdate',
    ];

    public function getColorAttribute()
    {
        return Priority::getColor($this->priority);
    }

    public function getPriorityDescriptionAttribute()
    {
        return Priority::getDescription($this->priority);
    }
}
