<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDataEntry;
use App\Models\Warm;
use App\Models\Industry;
use App\Models\BusinessType;
use App\Models\BusinessCategory;
use App\Models\Business;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Suburb;
use App\Traits\DataTrait;
use Response;

class DataEntryController extends Controller
{
    use DataTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warms = Warm::pluck('warm', 'id');
        $industries = Industry::pluck('industry', 'id');
        $business_types = BusinessType::orderBy('businesstype')->pluck('businesstype', 'id'); 
        $business_categories = BusinessCategory::orderBy('businesscategory')->pluck('businesscategory', 'id');
        $all_countries = Country::pluck('name', 'id');
        $selected_country = Country::where('name', 'Australia')->first();
        $all_states = State::where('country_id', $selected_country->id)->pluck('name', 'id');

        // var_dump($all_states); exit;

        $data = [
            'warms' => $warms,
            'industries' => $industries,
            'business_types' => $business_types,
            'business_categories' => $business_categories,
            'all_countries' => $all_countries,
            'selected_country' => $selected_country->id,
            'select_country_name' => $selected_country->name,
            'all_states'    => $all_states
        ];

        return view('data-entry.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Create new state
     * @param  [type] $name       [description]
     * @param  [type] $country_id [description]
     * @return [type]             [description]
     */
    public function new_state($name, $country_id){
        if(isset($name))
        {
            $state = new State;
            $state->name = $name;
            $state->country_id = $country_id;
            $state->save();
            session(['state' => $state->id]);
            return $state->id;
        }

        return $name;
    }


    /**
     * Create new city
     * @param  [type] $name     [description]
     * @param  [type] $state_id [description]
     * @return [type]           [description]
     */
    public function new_city($name, $state_id){
        if(isset($name))
        {
            $city = new City;
            $city->name = $name;
            $city->state_id = $state_id;
            $city->save();
            session(['city' => $city->id]);
            return $city->id;
        }

        return $name;
    }


    /**
     * Insert new suburb in the database
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    public function new_suburb($name, $city_id){
        if(isset($name))
        {
            $suburb = new Suburb;
            $suburb->name = $name;
            $suburb->city_id = $city_id;
            $suburb->save();

            return $suburb->id;
        }

        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(StoreDataEntry $request)
    {
        // var_dump($request->phone_no);
        // var_dump($request->business);
        // var_dump($request->state);
        // var_dump($request->all());
        // var_dump($request->phone_no);
        // exit;
        
        $business = new Business();
        $business->date = date('Y-m-d g:i:s', strtotime($request->date));
        $business->business_phase = $request->business;
        $business->prospect_source = $request->lead_source;
        $business->country = $request->country;
        $business->state = ($request->state == 'other') ? $this->new_state(($request->has('other_state')) ? $request->other_state : null, $request->country) : $request->state;
        // var_dump(session('state')); exit;
        $business->city = ($request->city == 'other') ? $this->new_city($request->has('other_city') ? $request->other_city : null, (($request->state == 'other') ? session('state') : $request->state) ) : $request->city;
        $business->suburb = ($request->suburb == 'other') ? $this->new_suburb($request->has('other_suburb') ? $request->other_suburb : null, (($request->city == 'other') ? session('city') : $request->city) ) : $request->suburb;
        $business->postcode = $request->post_code;
        $business->landline = $request->phone_no;
        $business->mobile = $request->mobile_no;
        $business->fax = $request->fax_no;
        $business->email = $request->email;
        $business->industry_type = $request->industry_type;
        $business->business_type = $request->business_type;
        $business->business_category= $request->business_category;
        $business->price = $request->price;
        $business->description = $request->comment;

        if($business->save()){
            $response = array(
                'status' => 'success',
                'msg' => 'Prospect has been saved',
                'url' => route('leadselectionallocation')
            );

            session(['prospect' => 'Prospect has been saved']);

            return Response::json($response);
        }

        $response = array(
            'status' => 'error',
            'msg' => 'Sorry prospects is not created',
        );

        return Response::json($response);
    }
    

    /**
     * Get the states list
     * @param  [type] $country_id [description]
     * @return [type]             [description]
     */
    public function findState($country_id)
    {
        echo $this->getState($country_id);
        exit;
    }

    /**
     * Get the city lists
     * @param  [type] $state_id [description]
     * @return [type]           [description]
     */
    public function findCity($state_id)
    {
        echo $this->getCity($state_id);
        exit;
    }

    /**
     * Get the suburb lists
     * @param  [type] $city_id [description]
     * @return [type]          [description]
     */
    public function findSuburb($city_id)
    {
        echo $this->getSuburb($city_id);
        exit;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
