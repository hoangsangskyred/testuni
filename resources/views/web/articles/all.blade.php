@extends('layouts.web')
@push('page-title', $articleCatory->display_name)
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
                        <div class="row">
                            @forelse ($needle as $articles)
                            <div class="col-md-6 my-4 blogArticles px-2">
                                <div class="card" style="overflow :hidden;">
                                    <img class="card-img-top" src="{{$articles->avatar_path}}" alt=" ">
                                    <div class="card-body" style="height: 230px">
                                      <a href="{{route('web.article.detail', ['slug'=>$articles->slug])}}"><h5 class="card-title">{!!trim(Str::limit($articles->title,70))!!}</h5></a>
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
                                    @foreach($articleCategories as $category)
                                        <li><a href="{{route('web.article.show', [$category->slug])}}">{{$category->display_name}}</a><span>({{$category->articles->where('show','Y')->count()}})</span></li>
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
                                            <h5 class="entry-title"><a href="{{route('web.article.detail', ['slug'=>$article->slug])}}">{{$article->title}}</a></h5>
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
@stop
