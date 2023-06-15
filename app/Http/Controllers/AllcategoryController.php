<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Auth;

class AllcategoryController extends Controller
{
    public function index(){

        $category=Category::latest()->paginate(3);

        return view ('allcategory',['categorys'=>$category]);
    }

    public function store(Request $request){
        
        // $request->validate([
        //     'category' => 'required|unique:posts|max:255',
            
        // ]);
        
         $validated = $request->validate([
        'category_name' => 'required|unique:categories|max:255',
            
        ]);


         $category= new Category;

    

         //dd($category);

         $category['category_name']=$request['category_name'];

          $category['user_id']=Auth::user()->id;

          $category->save();


         return redirect()->back()->with('error','Catagories inserted sucessfully');


       





    }

    public function edit($id){

        $category=Category::find($id);
        //where('id',$id)->first();

       return view('edit',['category'=>$category]);

      
    }


    public function update(Request $request,$id){

        $category=Category::where('id',$id)->first();


         $category['category_name']=$request['category_name'];
        $category['user_id']=Auth::user()->id;

        
          $category->save();

         return redirect()->route('allcategory')->with('error','Catagories updated sucessfully');

     

      
    }

    public function delete($id){

        $category=Category::find($id);

        $category->delete();
        return redirect()->route('allcategory')->with('error','Catagories deleted sucessfully');
        
     }
   
}
