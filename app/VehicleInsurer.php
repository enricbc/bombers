<?php

namespace App;

use App\Vehicle;
use Illuminate\Database\Eloquent\Model;

class VehicleInsurer extends Model
{
    /**
     * Eloquent: Relationships.
     **************************************************************************/
    /**
     * Vehicle.
     * Get the vehicle of the insurer.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class)->withDefault();
    }
}
