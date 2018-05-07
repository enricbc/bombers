<?php

namespace App;

use App\Container;
use App\User;
use App\VehicleInsurer;
use App\VehicleOwner;
use App\VehicleType;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /**
     * Eloquent: Relationships.
     **************************************************************************/
    /**
     * User.
     * Get the user of the vehicle.
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * Type.
     * Get the type of the vehicle.
     */
    public function type()
    {
        return $this->belongsTo(VehicleType::class)->withDefault();
    }

    /**
     * Owner.
     * Get the owner of the vehicle.
     */
    public function owner()
    {
        return $this->belongsTo(VehicleOwner::class)->withDefault();
    }

    /**
     * Insurers.
     * Get the insurers of the vehicle.
     */
    public function insurers()
    {
        return $this->hasMany(VehicleInsurer::class);
    }

    /**
     * Containers.
     * Get the containers of the vehicle.
     */
    public function containers()
    {
        return $this->hasMany(Container::class);
    }
}
