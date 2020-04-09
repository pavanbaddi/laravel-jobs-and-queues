<?php

namespace App\Jobs;

use App\CountryPopulationModel;
use App\CountryStatePopulationModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessCountriesPopulation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $country_census;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(CountryPopulationModel $country)
    {
        Log::info('Entered Job ProcessCountriesPopulation __constructor method');
        $this->country_census = $country;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('Entered Job ProcessCountriesPopulation handle method');
        $country_states_population_sum =  CountryStatePopulationModel::where(["country_id" => $this->country_census["country_id"]])->sum('state_population');
        
        $country = CountryPopulationModel::find($this->country_census["country_id"]); 
        $country->total_population = $country_states_population_sum;
        $country->save();

        Log::info('Exited from Job ProcessCountriesPopulation handle method');
    }
}
