<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public static $rules = [
        'name' => 'required|max:50'
    ];

    public function messages()
    {
        return [
            'name.required' => 'Nome da tag é requerido',
        ];
    }
}
