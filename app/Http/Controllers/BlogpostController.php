<?php

namespace App\Http\Controllers;

use App\blogpost;
use Illuminate\Http\Request;
use App\Http\Requests\BlogpostRequest;
use DB;
use Illuminate\Support\Facades\Validator;

class BlogpostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
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
        $validator = Validator::make($request->all(), [
        'user_id' => 'required'
       ]);
         if ($validator->fails()) {
            $data['status']  = 'errer';
            $data['message'] = '<span class"alert alert-danger" style="color:red;">OPPS!! Somthing Went Wrong!!</span>';
            return $data;
        }

        if (!empty($request->user_id)) {       
        
        if($request->file('thumbnail1')){
        $image=$request->file('thumbnail1');
        $newimg=time().'_'.$image->getClientOriginalname();
        $image->move(public_path('images'), $newimg); 
         }else{
        $newimg='img.jpg';
        }

        if($request->file('thumbnail2')){
        $image=$request->file('thumbnail2');
        $newimg1=time().'_'.$image->getClientOriginalname();
        $image->move(public_path('images'), $newimg1); 
        }else{
        $newimg1='img.jpg';
        }

        if($request->file('video1')){
        $video_1=$request->file('video1');
        $video1=time().'_'.$video_1->getClientOriginalname();
        $video_1->move(public_path('video'), $video1); 
        }else{
        $video1='img.jpg';
        }
        if($request->file('video2')){
        $video_2=$request->file('video2');
        $video2=time().'_'.$video_2->getClientOriginalname();
        $video_2->move(public_path('images'), $video2); 
        }else{
        $video2='img.jpg';
        }  
        $insData = $request->all();
        $insData['thumbnail1'] = $newimg;
        $insData['thumbnail2'] = $newimg1;
        $insData['video1']     = $video1;
        $insData['video2']     = $video2;
        $recordData = blogpost::create($insData);  
        // dd(DB::getQueryLog());
        if ($recordData) {
            $data['status']  = 'success';
            $data['message'] = '<span class"alert alert-success" style="color:green;">Record Has Been Saved SuccessFull</span>';
        }else{
            $data['status']  = 'errer';
            $data['message'] = '<span class"alert alert-success" style="color:red;">OPPS!! Something Went Wrong!!</span>';
        }
        }else{
            $data['status']  = 'errer';
            $data['message'] = '<span class"alert alert-success" style="color:red;">OPPS!! Please Select User!!</span>';
        }

        return json_encode($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blogpost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function show(blogpost $blogpost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blogpost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function edit(blogpost $blogpost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blogpost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blogpost $blogpost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blogpost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function destroy(blogpost $blogpost)
    {
        //
    }
}
