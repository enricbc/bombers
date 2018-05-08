<?php

namespace App;

use App\Vehicle;
use Illuminate\Database\Eloquent\Model;

class VehicleInsurer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'telefon'];

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
