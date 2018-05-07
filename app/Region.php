<?php

namespace App;

use App\Location;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * Eloquent: Relationships.
     **************************************************************************/
    /**
     * Locations.
     * Get the locations of the region.
     */
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    /**
     * Users.
     * Get the users of the region.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
