@extends('layouts.web')
@push('page-title','Dự án ')
@section('page-content')
    <div class="inner-heading">
        <div class="container">
            <h1>@stack('page-title') {{$projectCategory->display_name}}</h1>
        </div>
    </div>

    <!--Inner Content Start-->
    <div class="inner-content">
        <div class="container">
            <!--Services Start-->
            <div class="service-wrap">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            @forelse ($needle as $articles)
                            <div class="col-md-6 my-4 blogArticles px-2">
                                <div class="card" style="overflow :hidden;">
                                    <img class="card-img-top" src="{{$articles->avatar_path}}" alt=" ">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$articles->title}}</h5>
                                      <p class="card-text">{!!trim(Str::limit($articles->content,150))!!}</p>
                                      <a href="{{route('web.article.detail', ['slug'=>$articles->slug])}}" class="btn btn-secondary">Xem Thêm...</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <h5 class="text-center">Hiện tại chưa có bài viết.<h5>
                            @endforelse
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-widgets">
                            <div class="widget widget-categories">
                                <h4 class="widget-title"><span class="light-text">Blog theo chủ đề</span></h4>
                                <ul class="list-group list-unstyled">
                                    
                                </ul>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title"><span class="light-text">Bài viết mới nhất</span></h4>
                                <div class="widget-posts">
                                 
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
