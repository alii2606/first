<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

/**
 * @method static get()
 * @method static create(array $array)
 * @method static select(string $string, string $string1, string $string2, string $string3)
 */
class Offer extends Model
{
    protected $table="offers";
    protected $fillable=['name','price','details','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
}
