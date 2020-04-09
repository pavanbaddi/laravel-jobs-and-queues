<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CountryStatePopulationModel extends Model
{
    protected $table="states_census";
    protected $primaryKey = 'state_id';
    protected $fillable = ['country_id', 'state_name', 'state_population'];

    public function country()
    {
        return $this->belongsTo(CountryPopulationModel::class, 'country_id', 'country_id');
    }
}
