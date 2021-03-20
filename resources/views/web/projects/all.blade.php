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
                            @forelse ($needle as $projects)
                            <div class="col-md-6 my-4 projects px-3">
                                <div class="card" style="overflow :hidden;">
                                    <a href="{{route('web.project.detail', ['slug'=>$projects->slug, 'du-an'])}}"><img class="card-img-top" src="{{$projects->avatar_path}}" alt=" " height="300px"></a>
                                    <div class="card-body px-2 mx-2"  style="height:100px;">    
                                        <a href="{{route('web.project.detail', ['slug'=>$projects->slug, 'du-an'])}}">{{$projects->title}}</a>    
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
                                <h4 class="widget-title"><span class="light-text">Danh mục dự án</span></h4>
                                <ul class="list-group list-unstyled">
                                    @foreach($projectCategories as $category)
                                    <li><a href="{{route('web.projectCategory.show', [$category->slug,'danh-muc'])}}">{{$category->display_name}}</a><span>{{$category->projects->where('show','Y')->count()}}</span></li>
                                    @endforeach    
                                </ul>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title"><span class="light-text">Bài viết mới nhất</span></h4>
                                <div class="widget-posts">
                                    @foreach(\App\Models\Article::where('show','Y')->latest()->limit(5)->get() as $article)
                                    <div class="widget-post media">
                                        <img src="{{$article->avatar}}">
                                        <div class="media-body"><span class="post-meta-date"> <a href="#"> Ngày {{$article->created_at->format('d-m-Y')}}</a> </span>
                                            <h5 class="entry-title"><a href="{{route('web.article.detail', [$article->slug, 'bai-viet'])}}">{{$article->title}}</a></h5>
                                        </div>
                                    </div>
                                    @endforeach
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
