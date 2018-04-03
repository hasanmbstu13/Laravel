<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Classes\StoreClass;
use App\Http\Requests\Classes\UpdateClass;
use App\Helpers\Reply;
use Classes;
use User;
use Response;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::with('user')->get();

        return Response::json($classes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('username', 'id');

        return Response::json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClass $request)
    {
        $class = new Classes();
        $class->fill($request->all());
        
        if($class->save()){
            return Response::json(Reply::success(__('messages.classCreated')));
        }

        return Response::json(Reply::success(__('messages.classNotCreated')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
      $class = Classes::findOrFail($id)->with('user')->first();

      return Response::json($class);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Classes::findOrFail($id)->with('user')->first();

        return Response::json($class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClass $request, Classes $class)
    {
        $class->update(
            $request->only('name', 'user_id')
        );

       $response = array(
           'status' => 'success',
           'msg'    => 'Class has been updated' 
       );

      return Response::json(Reply::success(__('messages.classUpdated'))); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classes::find($id);
        $class->delete();

        return Response::json(Reply::success(__('messages.classDeleted'))); 
    }
}
