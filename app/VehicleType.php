<?php

namespace App;

use App\Vehicle;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    /**
     * Eloquent: Relationships.
     **************************************************************************/
    /**
     * Vehicles.
     * Get the vehicles of the type.
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
