<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersData\StoreUserData;
use App\Http\Requests\UsersData\UpdateUserData;
use App\User;
use App\UserData;
use Response;

class UsersDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('user_data')->get();

        return Response::json($users);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserData $request)
    {
        $input = Input::all();
        $email = $request->email;

        foreach ($email as $key => $value) {
            $user = new User();
            $user->email        = $value;
            $user->username     = $input['username'][$key];
            $user->phone_no     = $input['phone_no'][$key];
            $user->password     = $input['password'][$key];
            $user->first_name   = $input['first_name'][$key];
            $user->last_name    = $input['last_name'][$key];
            $user->midlle_name  = (isset($input['middle_name'][$key])) ? $input['middle_name'][$key] : '';

            if($user->save()){
                $user->roles()->attach($input['role_id'][$key]); 

                $user_data = new UserData();
                $user_data->user_id       = $user->id;
                $user_data->cnic          = $input['cnic'][$key];
                $user_data->gender        = $input['gender'][$key];
                $user_data->picture_url   = (isset($input['picture_url'][$key])) ? $input['picture_url'][$key] : '';  
                $user_data->dob           = $input['dob'][$key];
                $user_data->qualification = (isset($input['qualification'][$key])) ? $input['qualification'][$key] : '';  
                $user_data->bio_data      = (isset($input['bio_data'][$key])) ? $input['bio_data'][$key] : ''; 
                $user_data->job_title     = (isset($input['job_title'][$key])) ? $input['job_title'][$key] : ''; 

                $user_data->save();
            }//endif

        }//endforeach

        $response = array(
            'status' => 'success',
            'msg' => 'Users successfully created'
        );

        return Response::json($response);
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = UserData::findOrFail($id)->with('user')->first();

        return Response::json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = UserData::findOrFail($id)->with('user')->first();

        return Response::json($user);
    }

    /**
     * Update the user and user_data table for an user
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserData $request, $id)
    {
        $user_data = UserData::findOrFail($id);
        
        $user               = User::findOrFaild($user_data->user_id);
        $user->email        = $request->email;
        $user->username     = $request->username;
        $user->phone_no     = $request->phone_no;
        $user->password     = $request->password;
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->midlle_name  = $request->middle_name;

        $user_data->cnic            = $request->cnic;
        $user_data->gender          = $request->gender;
        $user_data->picture_url     = $request->picture_url;
        $user_data->dob             = $request->dob;
        $user_data->qualification   = $request->qualification;
        $user_data->bio_data        = $request->bio_data;
        $user_data->job_title       = $request->job_title;

        if($user->save() && $user_data->save()){
            $response = array(
                'status' => 'success',
                'msg'    => 'User successfully updated'
             );

            return Response::json($response);
        }

        $response = array(
            'status' => 'error',
            'msg'    => 'Sorry user doesn\'t updated'
         );

        return Response::json($response);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_data      = UserData::findOrFail($id);
        $user_data->user()->delete();
        $user->delete();

        $response = array(
            'status' => 'success',
            'msg'   =>  'User successfully deleted'
        );
    }
}
