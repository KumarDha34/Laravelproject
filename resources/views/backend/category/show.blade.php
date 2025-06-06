@extends('backend.layout.dashboard_master')
@section('panel',$panel)
@section('title','View ' . $panel)
@section('main-content')

    <!--begin::Col-->
              <div class="col-md-12">
                <!--begin::Accordion-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">View {{$panel}}
                    <a href="{{ route('backend.category.create') }}" class="btn btn-primary">Create {{$panel}}</a>    
                    <a href="{{ route('backend.category.index') }}" class="btn btn-success">List {{$panel}}</a>    
                    
                </div></div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">
                    @include('backend.includes.flash_message')  
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>{{$record->title}}</td>
                        </tr>
                        <tr>
                            <th>Rank</th>
                            <td>{{$record->rank}}</td>
                        </tr>
                        <tr>
                            <th>Slug</th>
                            <td>{{$record->slug}}</td>
                        </tr>
                        <tr>
                            <th>Created by</th>
                            <td>{{$record->createdBy->name}}</td>
                        </tr>
                        <tr>
                            <th>Updated by</th>
                            <td>{{$record->updatedBy->name}}</td>
                        </tr>
                    </table>
                  </div>
                  <!--end::Body-->
                </div>
                <!--end::Accordion-->
               
              </div>
            
@endsection