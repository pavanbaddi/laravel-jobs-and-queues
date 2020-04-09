<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CountryPopulationModel extends Model
{
    protected $table="countries_census";
    protected $primaryKey = 'country_id';
    protected $fillable = ['country_name', 'total_population'];

    public function states()
    {
        return $this->hasMany(CountryStatePopulationModel::class, 'country_id', 'country_id');
    }
}
