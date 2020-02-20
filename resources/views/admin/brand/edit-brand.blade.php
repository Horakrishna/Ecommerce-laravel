@extends('admin.master')
@section('title')
    Edit Brand
@endsection
@section('body')

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title text-center">Edit Brand Form</h3>
           
        </div>
        
        <!-- /.card-header -->
        {{ Form::open(['route'=>'update-brand','method'=>'POST', 'class'=>'form-horizontal']) }}
            
            <div class="card-body">
                <h4 class="text-center text-success">{{ Session::get('message')}}</h4>
                <div class="form-group row">
                  {{ Form::label('brand_name','Brand Name',['class'=>'col-sm-2 col-form-label']) }}
                    <div class="col-sm-5">
                        {{ Form::text('brand_name',$brand->brand_name,['placeholder'=>'Brand Name','class'=>'form-control'] )}}
                        <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name'): '' }}</span>
                    </div>   
                </div>

                <div class="form-group row">
                    {{ Form::label('brand_dis','Brand Discription',['class'=>'col-sm-2 col-form-label'] )}}
                   
                    <div class="col-sm-5">
                        {{Form::textarea('brand_dis',$brand->brand_dis,['placeholder'=>'Enter Discription','class' =>'form-control','cols'=>'5', 'rows'=>'3'])}}
                       
                        <span class="text-danger"> {{ $errors->has('brand_dis') ? $errors->first('brand_dis'): '' }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('publication_stutus','Publication Status',['class'=>'col-sm-2 col-form-label']) }}
                    <div class="col-sm-8">
                        <div class="form-check">
                            <label><input type="radio" name="publication_stutus" {{ $brand->publication_stutus == 1 ? 'checked' : '' }} value="1">Published</label>
                            <label><input type="radio" name="publication_stutus" {{ $brand->publication_stutus == 0 ? 'checked' : '' }} value="0">UnPublished</label>
                            <span class="text-danger">{{ $errors->has('publication_stutus') ? $errors->first('publication_stutus'): '' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-info text-center">Save Category</button>
                    </div>
                </div>
            </div>
        {{ Form::close() }}
       
    </div>
    <!-- /.card -->
@endsection