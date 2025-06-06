@extends('backend.layout.dashboard_master')
@section('panel',$panel)
@section('title','Create ' . $panel)
@section('main-content')

    <!--begin::Col-->
              <div class="col-md-12">
                <!--begin::Accordion-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Create {{$panel}}
                    <a href="{{ route('backend.category.index') }}" class="btn btn-success">List {{$panel}}</a>    
                    
                </div></div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">
                    @include('backend.includes.flash_message')  
                    <form enctype="multipart/form-data" action="{{ route('backend.category.store') }}" method="post">
                        @csrf
                        @include('backend.includes.input_field',['name' => 'title','title' => 'Title'])
                        @include('backend.includes.input_field',['name' => 'slug','title' => 'Slug'])
                        @include('backend.includes.input_field',['name' => 'rank','title' => 'Rank'])
                        @include('backend.includes.input_field',['name' => 'description','title' => 'Description'])
                        @include('backend.includes.input_field',['name' => 'icon','title' => 'Icon Code'])
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" type="file" name="image_file"
                                class="form-control"  />
                            @error('image_file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                         <div class="form-group">
                            <label for="status">Status</label>
                            <input id="status" type="radio" name="status"
                               value="1"  />Active
                               <input id="status" type="radio" name="status"
                               value="0"  />In-Active
                            @error('status')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       
                        <div class="form-group mt-3">
                            <input type="submit" value="Save {{ $panel }}" name="submit"
                                class="btn btn-success" />
                                 <input type="reset" name="clear"
                                class="btn btn-danger"  value="Clear"/>
                        </div>
                    </form>
                  </div>
                  <!--end::Body-->
                </div>
                <!--end::Accordion-->
               
              </div>
            
@endsection