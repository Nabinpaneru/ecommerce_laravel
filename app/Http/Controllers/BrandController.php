<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Images;

use Illuminate\Support\Facades\File;

class BrandController extends Controller
{


   public function __construct(){

     $this->middleware('auth');

   }

   public function brand(){


    $brand=Brand::latest()->paginate(3);

    return view('brand.allbrand',['brands'=>$brand]);
   }   

   public function brandstore(Request $request){

    $request->validate([
        'brand_name' => 'required|unique:brands|max:255',

        'brand_image' => 'required|mimes:jpeg,png,jpg,gif,svg',
       
      ]);

    // dd($request->all());

     $image= time().'.'.$request->brand_image->extension();  
//    dd($image);
     $request->brand_image->move(public_path('images'), $image);

    


       $brand = New Brand;
       $brand['brand_name']=$request['brand_name'];
      $brand['brand_image']=$image;

       $brand->save();
       return redirect()->route('allbrand')->with('error','Brand added sucessfully');
   




   }


   public function brandedit($id){

    $brand=Brand::find($id);

    //dd($brand->all());

  return view('brand.editbrand',['brand'=>$brand]);
   }



   public function brandupdate(Request $request,$id){

    $brand=Brand::find($id);

    
      $request->validate([
       'brand_name' => 'required|max:255',

      // 'brand_image' => 'required|mimes:jpeg,png,jpg,gif,svg',
     
     ]);


     //dd($request->all())
     if($request->brand_image){
     $image= time().'.'.$request->brand_image->extension();  

      $request->brand_image->move(public_path('images'), $image);
     $brand['brand_name']=$request['brand_name'];
     $brand['brand_image']=$image;
     }
     else
     $brand['brand_name']=$request['brand_name'];
     $brand['brand_image']=$brand['brand_image'];

      $brand->save();
      return redirect()->route('allbrand')->with('error','Brand edit sucessfully');


    

  
   }


   public function branddelete($id){

    $brand=Brand::find($id);

   $old_image=$brand->brand_image;

    //$old_image=public_path('images');
    
  //  dd($old_image);
   unlink(public_path('images/').$old_image);


    // File::delete($old_image);
    $brand->delete();
     return back()->with('error','Brand is deleted Successfully!!');



   }


   ////// for Multi images

   public function multiimages (){


    $images= Images::all();
    return view ('brand.multi',['images'=>$images]);

 
   }

   public function multistore (Request $request){


    $request->validate([
      'multi_image.*' => 'required|mimes:jpeg,png,jpg,gif,svg',
     
     ]);
  
  $files = $request['multi_image'];


  foreach($files as $file){


   $saveimage= rand(0,9).'.'.$file->extension();  

   $file->move(public_path('saveimages'), $saveimage);
   $image=New Images;

   $image['multi_image']=$saveimage;
   $image->save();
  
   }


   return back()->with('error','Multiple images are uploaded');
   
   
    

   
    }


   
 





}


