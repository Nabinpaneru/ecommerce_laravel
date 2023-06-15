<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand edit</title>
</head>
<body>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="container" >
               <h1> Edit Brand</h1>
            </div>
        </h2>
    </x-slot>

                        
                                     
                          
                    <div class="container  mt-5 col-md-12" >

                        <div class="col">
                    <div class="card" >
                         <div clas="card-body">
                            <div class="card-header mt-2">Edit Brand</div>

                            <form action=" {{ route('brand.update',['id'=>$brand->id]) }}" method="post" enctype="multipart/form-data">
                               @csrf
                              <div class="mb-3 mt-2">

                             <label  class="form-label">Brand Name</label>
                              <input type="text" class="form-control"  name="brand_name"   value =" {{$brand->brand_name }} " />
                              <div class="mt-3">
                                   @error('brand_name')
                                     <span class="alert alert-danger">{{ $message }}</span>
                                       @enderror
                                 </div>

                              <div class="mb-3 mt-4">

                             <label  class="form-label">Brand image</label>
                              <input type="file" class="form-control"  name="brand_image" value =" {{$brand->brand_image}}"/>

                               <img src="{{ asset('images/'.$brand->brand_image) }}" alt="" width="50" height="50"  class="rounded-circle"> 
                           
                               <div class="mt-3">
                                  @error('brand_image')
                                  <span class="alert alert-danger">{{ $message }}</span>
                                  @enderror
                                       </div>
                             <div class="mt-4">

                             <button type="submit" class="btn btn-dark" >Update</button></div>
                              </form>
                               
                           </div>
                     
                  </div>               
        </div>






</div>

</div>

</div>

</div>     
                            

                        

                     </div>


</x-app-layout>

    
</body>
</html>