<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assoimage extends Model
{
    protected $table="assoimage";
    protected $primaryKey='url';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable=["url","categorie","nom"];
}
