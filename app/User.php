<?php

namespace App;

use App\Container;
use App\Region;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'codi_parc', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Eloquent: Relationships.
     **************************************************************************/
    /**
     * Region.
     * Get the region of the user.
     */
    public function region()
    {
        return $this->belongsTo(Region::class)->withDefault();
    }

    /**
     * Containers.
     * Get the containers of the user.
     */
    public function containers()
    {
        return $this->hasMany(Container::class);
    }

    /**
     * Vehicles.
     * Get the vehicles of the user.
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
