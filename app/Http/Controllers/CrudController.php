<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;
use DB;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=Crud::latest()->paginate(5);
         return view('index',compact('data'))
         ->with('i',(request()->input('page',1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required'
            //'image'=>'required|image|max:2048'
        ]);

        if($request->file('image')){
        $image=$request->file('image');
        $newimg=time().'_'.$image->getClientOriginalname();
        $image->move(public_path('images'), $newimg); 
        }else{
        $newimg='img.png';
        }       
        $data=array(
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'image'=>$newimg
        ); 
         $dataSet=new crud; 
        if (isset($request->id)) {
            $id=$request->id;
            $addCat=DB::table('cruds')->where('id',$id)->update([
            'first_name'=>$request->first_name, 
            'last_name'=>$request->last_name,  
            'image'=>$newimg, 
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(), 
            ]); 
        return redirect('crud')->with('success','Data has been Updated Successfully');
        }else{
        Crud::create($data);
        return redirect('crud')->with('success','Data has been added Successfully');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $record=crud::where('id',$id)->get(); 
         $output='';
         $output .='
                  <div class="form-group">
                    <label for="first_name">First Name</label>
                    <div class="form-control" id="first_name">'.$record[0]->first_name.' </div>
                  </div>
                  <div class="form-group">
                    <label for="last_name">Last name</label>
                    <div class="form-control" id="first_name">'.$record[0]->last_name.' </div>
                  </div>
                  <div class="form-group ">     
                    <label for="image">Select Profile</label>
                    <img src="public/images/'.$record[0]->image.'" class="img-responsive" alt="Image" style=" max-width: 450px;">
                  </div>';
        return $output;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record=crud::where('id',$id)->get();
        $output='';
        $output .='
       <form method="post" id="Form2" enctype="multipart/form-data">
   
  <div class="form-group">
    <label for="first_name">First Name</label>
     <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="emailHelp" placeholder="Enter First Name" value="'.$record[0]->first_name.'">   
     '.  csrf_field() .'
  </div>
  <div class="form-group">
    <label for="last_name">Last name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="'.$record[0]->last_name.'">
    <input type="text" class="form-control"  name="id"  value="'.$record[0]->id.'">
  </div>
  <div class="form-group ">     
    <label for="image">Select Profile</label>
    <input type="file" name="image" class="form-control" id="image">
  </div>
  <label for="image" >Current Profile</label>
        <img src="public/images/'.$record[0]->image.'" class="img-responsive" alt="Image" style=" max-width: 100px;">
  <button type="button" id="btnUp" class="btn btn-primary btn-sm submit">Update</button>
</form>';
return $output;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->id) {
            $id=$request->id;
            if ($request->file('image')) {
                $image=$request->file('image');
                $newimg=time().'_'.$image->getClientOriginalname();
                $image->move(public_path('images'),$newimg);
                $up=crud::where('id',$id)->update([
                  'first_name'=>$request->first_name,
                  'last_name'=>$request->last_name,
                  'image'=>$newimg,
                  'updated_at'=>\Carbon\Carbon::now()->toDateTimeString()
                ]);

            }else{
            $up=crud::where('id',$id)->update([
              'first_name'=>$request->first_name,
              'last_name'=>$request->last_name, 
              'updated_at'=>\Carbon\Carbon::now()->toDateTimeString()
            ]);
        }
        }else{
            echo "Not Defined";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        crud::where('id', $id)->delete();
        return redirect('crud/')->with('success','Record has been deteted');
    }
}
