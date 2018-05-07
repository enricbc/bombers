<?php

namespace App;

use App\Containers;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /**
     * Eloquent: Relationships.
     **************************************************************************/
    /**
     * Container.
     * Get the container of the material.
     */
    public function container()
    {
        return $this->belongsTo(Container::class)->withDefault();
    }
}
