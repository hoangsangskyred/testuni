@extends('layouts.web')
@push('page-title',$project->title )
@section('page-content')
    <div class="inner-heading">
        <div class="container">
            <h1>@stack('page-title')</h1>
        </div>
    </div>

    <!--Inner Content Start-->
    <div class="inner-content">
        <div class="container">
            <!--Services Start-->
            <div class="service-wrap">
                <div class="row">
                    <div class="col-lg-8">  
                        <div class="text-holder">
                           @foreach ($projectImages as $item)
                           <div class="multi-carousel-item">
                               <img src="{{str_replace([public_path(), '\/'], ['', '/public/'], $item)}}" width="50%"/>
                           </div>
                           @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-widgets">
                            <div class="widget widget-categories">
                                <h4 class="widget-title"><span class="light-text">Dự án liên quan</span></h4>
                                <ul class="list-group list-unstyled">
                                   
                                </ul>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title"><span class="light-text">Danh mục dự án</span></h4>
                                <div class="widget-posts">
                                  
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Services End-->
        </div>
    </div>
    <!--Inner Content End-->
@stop
