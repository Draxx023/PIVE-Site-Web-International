<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    //
    protected $table='destination';
    protected $primaryKey='nom';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable=["nom","intro","temoignages","astucesinfos"];
}
