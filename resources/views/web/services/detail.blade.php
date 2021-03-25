@extends('layouts.web')
@push('page-title', 'Dịch vụ')
@section('page-content')
    <div class="inner-heading">
        <div class="container">
            <h1>@stack('page-title') {{$needle->title}}</h1>
        </div>
    </div>

    <!--Inner Content Start-->
    <div class="inner-content">
        <div class="container">
            <!--Services Start-->
            <div class="service-wrap">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="text-holder" style="width:100% ; hight:100%;">
                            {!! $needle->content !!}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-widgets">
                            @if($otherServices->count() > 0)
                            <div class="widget widget-categories">
                                <h4 class="widget-title"><span class="light-text">Các dịch vụ khác</span></h4>
                                <ul class="list-group list-unstyled">
                                    @foreach($otherServices as $otherService)
                                        <li><a href="{{route('web.service.detail', [$otherService->slug, 'dich-vu'])}}">{{$otherService->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <!-- .widget end -->

                            <div class="widget">
                                <h4 class="widget-title"><span class="light-text">Blog</span></h4>
                                <div class="widget-posts">
                                    @foreach(\App\Models\Article::where('show','Y')->latest()->limit(5)->get() as $article)
                                        <!-- .widget-post START -->
                                        <div class="widget-post media">
                                             <a href="{{route('web.article.detail', ['slug'=>$article->slug,'bai-viet'])}}"><img src="{{$article->avatar_path}}" width="100px" height="75px"></a>
                                            <div class="media-body"><span class="post-meta-date"> <a href="#"> Ngày {{$article->created_at->format('d-m-Y')}}</a> </span>
                                                <h5 class="entry-title"><a href="{{route('web.article.detail', ['slug'=>$article->slug,'bai-viet'])}}">{{$article->title}}</a></h5>
                                            </div>
                                        </div>
                                        <!-- .widget-post END -->
                                    @endforeach
                                </div>
                                <!-- .widget-posts END -->
                            </div>
                            <!-- .widget end -->

                            <!-- .widget end -->
                        </div>
                    </div>
                </div>
            </div>
            <!--Services End-->
        </div>
    </div>
    <!--Inner Content End-->
@stop
