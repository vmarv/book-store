<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStore extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'isbn', 'value'];

    public static function rules() {
        return [
            'name' => 'required',
            'isbn' => 'integer',
            'value' => 'decimal:2'
        ];
    }

    public static function feedBack() {
        return [
            'required' => 'The field :attribute is required',
            'integer' => ':attribute, only numbers are allowed',
            'decimal' => ':attribute, only decimals are allowed'
        ];
    }
}
