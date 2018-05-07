<?php

namespace App;

use App\Containers;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'referencia',
        'nom',
        'quantitat_prevista',
        'quantitat',
        'es_del_parc'
    ];

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
