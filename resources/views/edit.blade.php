<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category edit</title>
</head>
<body>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="container" >
               <h1> Edit Category</h1>
            </div>
        </h2>
    </x-slot>

                        
                                     
                          
                    <div class="container  mt-5 col-md-12" >

                        <div class="col">
                    <div class="card" >
                         <div clas="card-body">
                            <div class="card-header mt-2">Edit Category</div>

                            <form action=" {{ route('update',['id'=>$category->id]) }}" method="post">
                               @csrf
                              <div class="mb-3 mt-2">

                             <label  class="form-label">Category</label>
                              <input type="text" class="form-control"  name="category_name"   value =" {{$category->category_name }} " />
                           
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