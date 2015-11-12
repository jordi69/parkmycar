<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkeerplaats extends Model
{
   protected $table = 'parkeerplaatsen';

   protected $fillable = ['adres','latitude','longitude','Prijs','BeschikbaarStartdatum', 'BeschikbaarStarttijd','BeschikbaarStoptijd'];

}