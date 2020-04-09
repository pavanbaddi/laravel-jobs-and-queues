<?php

namespace App\Http\Controllers;

use App\CountryPopulationModel;
use App\Jobs\ProcessCountriesPopulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CountryController extends Controller
{
    public function process(Request $request){
        Log::info('Entered Job CountryController process method');

        $country = CountryPopulationModel::find(101);
        
        ProcessCountriesPopulation::dispatch($country);
        
        Log::info('Exited Job CountryController process method');
    }
}
