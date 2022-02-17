<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assocours extends Model
{
    protected $table="assocours";
    protected $primaryKey='code';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable=["code","nomdestination","titre","semestre","ects","nombre","contenu"];
}
