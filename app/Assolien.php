<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assolien extends Model
{
    protected $table="assolien";
    protected $primaryKey='nom';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable=["nomdestination","nom","lien"];
}
