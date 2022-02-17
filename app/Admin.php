<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='admin';
    protected $primaryKey='uid';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable=["uid"];
}
