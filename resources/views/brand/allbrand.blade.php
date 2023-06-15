<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="container" >
               <h1> All Brand</h1>
            </div>
        </h2>
    </x-slot>
    @if(Session::has('error'))
    <div class="alert alert-success" role="alert">
    <strong>{{Session::get('error')}}</strong>
     </div>
  @endif
        
     <div class="container">
         <div class="col">
             <div class="card" >
                 <div class="card-header">All Brand</div>
            
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">SN</th>
                              <th scope="col">Brand Name</th>
                              <th scope="col">Brand Image</th>
                              <th scope="col">Created At</th>
                              <th scope="col">Action</th>
                                                 
                             </tr>
                            </thead>
                             <tbody>
                                           
                                         @foreach($brands as $brand)
                                            <tr>
                                            <th scope="row">{{ $brands->firstItem() + $loop ->index }} </th>
                                            <td> {{ $brand->brand_name}}</td>
                                            <td><img src= "{{ asset('/images/'.$brand->brand_image) }}" alt="img" width="50" height="50" class="rounded-circle" /></td>
                                            <td> {{ $brand -> created_at->diffForHumans()}} </td>
                                            <td>
                                            <a href="{{ route('brand.edit',['id'=>$brand->id]) }}" class="btn btn-primary btn-sm" >Edit</a>
                                            <a href="{{ route('brand.delete',['id'=>$brand->id]) }}" class="btn btn-danger btn-sm" >Delete</a>
                                            </td>
                                            </tr>
                                         @endforeach
   
                            </tbody>
                     </table>

                                    {{ $brands->links() }}

                                   
                 </div>
                                
                                    
             </div>
                            

        </div>


         <div class="container  mt-5 col-md-12" >
            <div class="col">
                <div class="card" >
                    <div clas="card-body">

                        <div class="card-header mt-2">Add Brand</div>

                            <form action=" {{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div>

                                <label  class="form-label mt-2">Brand Name</label>
                                <input type="text" class="form-control"  name="brand_name" >
                                </div>
                                <div class="mt-2">
                                @error('brand_name')
                                <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                               </div>
                                 <div>
                                 <label  class="form-label">Brand image</label>
                                 <input type="file" class="form-control"  name="brand_image" >
                                 </div>
                                 <div class="mt-2">
                                 @error('brand_image')
                                <p class="alert alert-danger">{{ $message }}</p>
                                 @enderror
                                </div>
                                                
                                <div class="mt-2">

                                <button type="submit" class="btn btn-dark" >Submit</button></div>
                                 </form>
                                                    
                                            
                                          
                                                
                            


                     </div>
                     


                </div>

            </div>
        
        </div>

    </div>    
</x-app-layout>
