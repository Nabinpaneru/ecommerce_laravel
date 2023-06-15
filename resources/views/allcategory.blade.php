<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="container" >
               <h1> All Category</h1>
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
                                   <div class="card-header">All Category</div>
            
                                    <table class="table">
                                         <thead>
                                              <tr>
                                                 <th scope="col">SN</th>
                                                 <th scope="col">User-id</th>
                                                 <th scope="col">Catagory</th>
                                                 <th scope="col">User Created</th>
                                                 <th scope="col">Action</th>
                                                 
                                                </tr>
                                        </thead>
                                         <tbody>
                                           
                                         @foreach($categorys as $category)
                                            <tr>
                                            <th scope="row">{{ $categorys->firstItem() + $loop ->index }} </th>
                                            <td> {{ $category -> join->name}}</td>
                                            <td> {{ $category -> category_name}} </td>
                                            <td> {{ $category -> created_at->diffForHumans()}} </td>
                                            <td>
                                            <a href="{{ route('edit',['id'=>$category->id]) }}" class="btn btn-primary btn-sm" >Edit</a>
                                            <a href="{{ route('delete',['id'=>$category->id]) }}" class="btn btn-danger btn-sm" >Delete</a>
                                            </td>
                                            </tr>
                                         @endforeach
   
                                        </tbody>
                                    </table>

                                    {{ $categorys->links() }}

                                   
                                </div>
                                
                                    
                            </div>
                            

                        

                     </div>


                    <div class="container  mt-5 col-md-12" >

                     <div class="col">
                                         <div class="card" >
                                              <div clas="card-body">
                                                 <div class="card-header mt-2">Add Catrgory</div>

                                                 <form action=" {{ route('store') }}" method="post">
                                                    @csrf
                                                   <div class="mb-3 mt-2">

                                                  <label  class="form-label">Category</label>
                                                   <input type="text" class="form-control"  name="category_name" >

                                                   <div class="mt-4">
                                                    @error('category_name')
                                                     <span class="alert alert-danger">{{ $message }}</span>
                                                     @enderror
                                                   </div>
                                                
                                                  <div class="mt-4">

                                                  <button type="submit" class="btn btn-dark" >Send</button></div>
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
