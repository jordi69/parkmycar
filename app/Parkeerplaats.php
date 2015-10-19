<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
   protected $table = 'parkeerplaatsen';

   protected $fillable = ['prkplstraat','prkplstraatnummer','prkplgemeente','Prijs','BeschikbaarStarttijd', 'BeschikbaarStoptijd'];

}