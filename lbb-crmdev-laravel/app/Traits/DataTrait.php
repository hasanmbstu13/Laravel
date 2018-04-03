<?php

namespace App\Traits;

use App\Models\State;
use App\Models\City;
use App\Models\Suburb;

trait DataTrait
{
	public function options($all_records)
	{	
		$options = '';

		if(count($all_records) > 0 )
		{
			foreach($all_records as $value => $text)
			{
				$options.="<option value='$value'>$text</option>";			
			}
		}

		$options .= "<option value=\"other\">Other</option>";

		return $options;
	}


    public function getState($country_id)
	{
		$all_states = State::where('country_id', $country_id)->pluck('name', 'id');

		return $this->options($all_states);		
	}

	public function getCity($state_id)
	{
		$all_cities = City::where('state_id', $state_id)->pluck('name', 'id');

		return $this->options($all_cities);		
	}

	public function getSuburb($city_id)
	{
		$all_suburbs = Suburb::where('city_id', $city_id)->pluck('name', 'id');

		return $this->options($all_suburbs);		
	}

}