<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliverySource extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'delivery_sources';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'source_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'title',
                  'status'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the source for this model.
     */
    public function source()
    {
        return $this->belongsTo('App\Models\Source','source_id');
    }

    /**
     * Set the added_on.
     *
     * @param  string  $value
     * @return void
     */
    public function setAddedOnAttribute($value)
    {
        $this->attributes['added_on'] = !empty($value) ? date($this->getDateFormat(), strtotime($value)) : null;
    }

    /**
     * Get added_on in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getAddedOnAttribute($value)
    {
        return date('j/n/Y g:i A', strtotime($value));
    }

}
