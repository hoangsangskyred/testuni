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
                            @foreach ($needle as $articles)
                            <div class="col-md-6 mt-5">
                                <div class="card" style="width: 20rem;">
                                    <img class="card-img-top" src="{{$articles->avatar_path}}" alt=" ">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$articles->title}}</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                      <a href="{{route('web.article.detail', ['slug'=>$articles->slug])}}" class="btn btn-secondary">Xem Thêm...</a>
                                    </div>
                                </div>
                            </div>    
                            @endforeach
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-widgets">
                            <div class="widget widget-categories">
                                <h4 class="widget-title"><span class="light-text">Blog theo chủ đề</span></h4>
                                <ul class="list-group list-unstyled">
                                    @foreach($articleCategories as $category)
                                        <li><a href="{{route('web.article.show', [$category->slug])}}">{{$category->display_name}}</a><span>({{$category->articles->count()}})</span></li>
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
