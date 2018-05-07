<?php

namespace App;

use App\Vehicle;
use Illuminate\Database\Eloquent\Model;

class VehicleOwner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'telefon'. 'final_renting'];

    /**
     * Eloquent: Relationships.
     **************************************************************************/
    /**
     * Vehicles.
     * Get the vehicles of the owner.
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
