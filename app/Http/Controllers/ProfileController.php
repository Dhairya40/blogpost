<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Profile;
use App\State;
use App\Country;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'about'=>'required|min:20'    
            // 'image'=>'required|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]); 

        if($request->file('image')){
        $image=$request->file('image');
        $newimg=time().'_'.$image->getClientOriginalname();

         // check directry 
        $path = public_path('user_image');    
        if(!is_dir($path)){
          $path =  mkdir($path, 0777, true);
        }

        $image->move($path, $newimg); 

        $profile->profile_image  = $newimg; 
        } 
        if($request->file('back_profile')){
        $image=$request->file('back_profile');
        $newimg=time().'_'.$image->getClientOriginalname();

         // check directry 
        $path = public_path('user_image');    
        if(!is_dir($path)){
          $path =  mkdir($path, 0777, true);
        }
        $image->move($path, $newimg); 
        $profile->back_profile  = $newimg; 
        }  

        $profile->name           =  ($request->name) ? $request->name:'Null';
        $profile->address        =  ($request->address) ? $request->address:'Null';
        $profile->country        =  ($request->country) ? $request->country: 'Null';
        $profile->state          =  ($request->state) ? $request->state: 'Null';
        $profile->city           =  ($request->city) ? $request->city: 'Null';
        $profile->about          =  ($request->about) ? $request->about: 'Null';
        $profile->phone          =  ($request->phone) ? $request->phone: 'Null';
        
        $saved = $profile->save();
        if ($saved) {
            return back()->with('success_message','Your Profile Updated Successfully');
        }else{
            return back()->with('error_message','Something Went Wrong!!!');
        }
        
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function getStateBycountry(Request $request, $id)
    {
        DB::enableQueryLog();
        if ($request->ajax()) {
         $stateList = state::where('country_id',$id)->get();
        // $query = DB::getQueryLog();
        // print_r(end($query));
        // print_r(count($stateList));
        if (!empty($stateList)) {
            $data['status']  = 'success';
            $data['message'] = '<span class"alert alert-success" style="color:green;">Please Select State</span>';
            $data['state'] = $stateList;
            return json_encode($data);
        }else{
            $data['status']  = 'errer';
            $data['message'] = '<span class"alert alert-success" style="color:red;">OPPS!! Something Went Wrong!!</span>';
            return json_encode($data);
        }
        }else{
            $data['status']  = 'errer';
            $data['message'] = '<span class"alert alert-success" style="color:red;">OPPS!! Something Went Wrong!!</span>';
            return json_encode($data);
        }
       
    }
}
