<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assoblog extends Model
{
    protected $table='assoblog';
    protected $primaryKey='nom';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable=["nomdestination","nom","lien"];
}
