@extends('admin.master')
@section('title')
    Manage Brand
@endsection
@section('body')
 <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary text-center">Manage Brand</h3>
              <h3 class="text-success text-center">{{ Session::get('message') }}</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Brand Name</th>
                      <th>Brand Description</th>
                      <th>Publication Status</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                 @php($i=1)
                 @foreach($brands as $brand)
                  <tbody>
                    <tr>
                      <td>{{ $i++}}</td>
                      <td>{{$brand->brand_name}}</td>
                      <td>{{$brand->brand_dis}}</td>
                      <td>{{$brand->publication_stutus == 1 ? 'Published' : 'UnPublished'}}</td>
                      <td>
                        @if($brand->publication_stutus ==1)
                        <a href="{{ route('unpublished-brand',['id'=>$brand->id])}}" class="btn btn-info btn-xs">
                            <span class="fa fa-arrow-down"></span>
                        </a>
                        @else
                        <a href="{{ route('published-brand',['id'=>$brand->id] )}}" class="btn btn-success btn-xs">
                            <span class="fa fa-arrow-up"></span>
                        </a>
                        @endif
                        <a href="{{ route('edit-brand',['id'=>$brand->id])}}" class="btn btn-primary btn-xs">
                             <span class="fa fa-edit"></span>
                        </a>

                        <a href="#"class="btn delete-btn btn-danger btn-xs" id="{{$brand->id}}" onclick="   
            
                            event.preventDefault();
                            var check =confirm('Are You sure to delete Brand !!!');
                            if (check) {
                                document.getElementById('deleteBrand+{{$brand->id}}').submit();
                            }
                        ">
                             <span class="fa fa-trash"></span>
                         </a>
                           <form action="{{ route('delete-brand')}}" method="POST" id="deleteBrand+{{$brand->id}}">
                            @csrf
                               <input type="hidden" value="{{ $brand->id}}" name="id">
                           </form>        
                      </td>
                     
                    </tr>
                   
                  </tbody>
                  @endforeach
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.co
@endsection