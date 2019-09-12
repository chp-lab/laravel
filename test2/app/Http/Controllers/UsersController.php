<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInformations;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserInformations::all()->toArray();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	return view('user.createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
          'username'=>'required',
          'password'=>'required',
          'industry_type'=>'required',
          'factory_name'=>'required',
          'address'=>'required',
          'contact_info'=>'required'
      ]);
        $user = new UserInformations(
          [
              'username'=>$request->get('username'),
              'password'=>$request->get('password'),
              'industry_type'=>$request->get('industry_type'),
              'factory_name'=>$request->get('factory_name'),
              'address'=>$request->get('address'),
              'contact_info'=>$request->get('contact_info')
          ]
        );
        $user->save();
        // redirect to homepage
        return redirect()->route('user.index')->with('success', 'New account added');

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
	#dd($id);
        $user = UserInformations::find($id);
	#dd($user);
	return view('user.edit', compact('user', 'id'));
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
	$this->validate($request,
      	[
        	'username'=>'required',
        	'password'=>'required',
        	'industry_type'=>'required',
        	'factory_name'=>'required',
        	'address'=>'required',
        	'contact_info'=>'required'
    	]);

    	$user = UserInformations::find($id);
    	$user->username = $request->get('username');
    	$user->password = $request->get('password');
    	$user->industry_type = $request->get('industry_type');
    	$user->factory_name = $request->get('factory_name');
    	$user->address = $request->get('address');
    	$user->contact_info = $request->get('contact_info');
    	$user->save();
    	return redirect()->route('user.index')->with('success', 'Update success');	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	$user = UserInformations::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'user id ' . $user['id'].' which username ' .$user['username']. ' deleted');
    }
}
