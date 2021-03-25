@extends('layouts.web')
@push('page-title',$needle->title )
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
                             {!! $needle->content !!}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-widgets">   
                            @if($articleRelation->count() >0)
                            <div class="widget">
                                <h4 class="widget-title"><span class="light-text">Bài viết liên quan</span></h4>
                                <div class="widget-posts">
                                    @foreach($articleRelation as $article)
                                    <div class="widget-post media">
                                        <a href="{{route('web.article.detail', ['slug'=>$article->slug, 'bai-viet'])}}"><img src="{{$article->avatar_path}}" width="100px" height="75px"></a>
                                        <div class="media-body"><span class="post-meta-date"> <a href="#"> Ngày {{$article->created_at->format('d-m-Y')}}</a> </span>
                                            <a href="{{route('web.article.detail', ['slug'=>$article->slug, 'bai-viet'])}}"><h5 class="entry-title">{{$article->title}}</h5></a>
                                        </div>
                                    </div>    
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <div class="widget widget-categories">
                                <h4 class="widget-title"><span class="light-text">Blog theo chủ đề</span></h4>
                                <ul class="list-group list-unstyled">
                                    @foreach($articleCategories as $category)
                                        <li><a href="{{route('web.articleCategory.show', [$category->slug, 'chu-de'])}}">{{$category->display_name}}</a><span>({{$category->articles->where('show','Y')->count()}})</span></li>
                                    @endforeach
                                </ul>
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
