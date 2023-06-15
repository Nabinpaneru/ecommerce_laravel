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
      
      <div class="card-header">Multi Images</div>
       
      <div class="row"> 
           <div class="col-md-12 image-class " > 
           @foreach($images as $image)  
                 <image src="{{ asset('/saveimages/'.$image->multi_image) }}" alt="img" width="250" height="250" />
                 @endforeach  
                </div>
      </div>           
                            
    
                            

    </div>



         <div class="container  mt-5 col-md-12" >
            <div class="row">
                <div class="card" >
                    

                        <div class="card-header mt-2">Multi Images</div>

                            <form action=" {{ route('image.store') }}" method="post" enctype="multipart/form-data" >
                                @csrf

                               
                                 <div>
                                
                                 <input type="file" class="form-control"  name="multi_image[]" multiple="">
                                 </div>
                                 <div class="mt-2">
                                 @error('multi_image')
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
</x-app-layout>
