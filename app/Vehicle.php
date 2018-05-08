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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matricula',
        'matricula_data',
        'matricula_tercera',
        'km',
        'km_data',
        'manteniment_data',
        'proper_manteniment_km',
        'proper_manteniment_data',
        'hores_bomba',
        'num_xasis',
        'itv_vigor',
        'itv_propera',
        'marca_model',
        'motor_potencia',
        'eslora',
        'baixa_prevista',
        'donat_de_baixa',
        'asseg_num_polissa',
        'asseg_tipus',
        'places',
        'roda_dimensio',
        'roda_cadenes',
        'vehicle_type_id',
        'vehicle_owner_id',
        'vehicle_insurer_id'
    ];

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
