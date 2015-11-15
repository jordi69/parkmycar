<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkeerplaats extends Model
{
   protected $table = 'parkeerplaatsen';

   protected $fillable = ['adres','latitude','longitude','Prijs','BeschikbaarStartdatum', 'BeschikbaarStarttijd','BeschikbaarStoptijd'];

   public function closest( $lat, $lng, $max_distance = 25, $max_locations = 10, $units = 'miles', $fields = false )
        {
            /*
             *  Allow for changing of units of measurement
             */
            switch ( $units ) {
                case 'miles':
                    //radius of the great circle in miles
                    $gr_circle_radius = 3959;
                break;
                case 'kilometers':
                    //radius of the great circle in kilometers
                    $gr_circle_radius = 6371;
                break;
            }
            /*
             *  Support the selection of certain fields
             */
            if( ! $fields ) {
                $fields = array( '*' );
            }
            /*
             *  Generate the select field for disctance
             */
            $disctance_select = sprintf(
                    "( %d * acos( cos( radians(%s) ) " .
                            " * cos( radians( lat ) ) " .
                            " * cos( radians( lng ) - radians(%s) ) " .
                            " + sin( radians(%s) ) * sin( radians( lat ) ) " .
                        ") " . 
                    ") " . 
                    "AS distance",
                    $gr_circle_radius,               
                    $lat,
                    $lng,
                    $lat
                );
            return DB::table( $table )
                ->having( 'distance', '<', $max_distance )
                ->take( $max_locations )
                ->order_by( 'distance', 'ASC' )
                ->get( array($fields, $disctance_select) );
        }

}