<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{

    // Which attributes can be mass assigned
    protected $fillable = [
        'first_name',
        'last_name',
        'aka',
        'birth_date',
        'attributes',
    ];

    public static function validationRules() {
        return [
            'first_name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s\-_]{3,255}$/'
            ],
            'last_name' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s\-_,\']{0,255}$/'
            ],
            'aka' => [
                'nullable',
                'string',
                'max:255'
            ],
            'deadline' => [
                'nullable',
                'date'
            ],
            'attributes' => [
                'nullable',
                'string',
                'max:255',
            ]
        ];
    }
}

