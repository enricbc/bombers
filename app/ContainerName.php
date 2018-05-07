<?php

namespace App;

use App\Container;
use Illuminate\Database\Eloquent\Model;

class ContainerName extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom'];

    /**
     * Container.
     * Get the container that owns the name.
     */
    public function container()
    {
        return $this->belongsTo(Container::class);
    }
}
