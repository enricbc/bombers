<?php

namespace App;

use App\Region;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['codi', 'nom'];

    /**
     * Eloquent: Relationships.
     **************************************************************************/
    /**
     * Region.
     * Get the region of the location.
     */
    public function region()
    {
        return $this->belongsTo(Region::class)->withDefault();
    }
}
