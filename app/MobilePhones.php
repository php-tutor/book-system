<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobilePhones extends Model
{
  protected $fillable = ['name', 'manufacturer_id'];
}
