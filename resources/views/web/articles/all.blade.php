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
                            @forelse ($needle as $article)
                            <div class="col-md-6 my-4 blogArticles px-3">
                                <div class="card" style="overflow :hidden;">
                                    <a href="{{route('web.article.detail', ['slug' => $article->slug, 'bai-viet'])}}"><img class="card-img-top" src="{{$article->avatar_path}}" alt=" " height="250px"></a>
                                    <div class="card-body" style="height: 260px">
                                      <a href="{{route('web.article.detail', ['slug' => $article->slug, 'bai-viet'])}}"><h5 class="card-title">{!!trim(Str::limit($article->title, 70))!!}</h5></a>
                                      <span style="opacity: 0.7">Ngày đăng : {{$article->created_at->format('d-m-Y')}}</span>
                                      <p>{!!trim(Str::limit($article->content, 150))!!}</p>
                                      <a href="{{route('web.article.detail', ['slug' => $article->slug, 'bai-viet'])}}" class="btn btn-secondary">Xem thêm...</a>
                                    </div>
                                </div>        
                            </div>
                            @empty
                            <h5 class="text-center">Hiện tại chưa có bài viết.<h5>
                            @endforelse
                            <div class="pagination justify-content-center">
                                {{$needle->links()}}   
                            </div> 
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-widgets">
                            <div class="widget widget-categories">
                                <h4 class="widget-title"><span class="light-text">Blog theo chủ đề</span></h4>
                                <ul class="list-group list-unstyled">
                                    @foreach($otherArticleCategories as $category)
                                        <li><a href="{{route('web.articleCategory.show', [$category->slug, 'chu-de'])}}">{{$category->display_name}}</a><span>({{$category->articles->where('show','Y')->count()}})</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title"><span class="light-text">Bài viết mới nhất</span></h4>
                                <div class="widget-posts">
                                    @foreach(\App\Models\Article::where('show','Y')->latest()->limit(5)->get() as $article)
                                    <div class="widget-post media">
                                        <a href="{{route('web.article.detail', [$article->slug, 'bai-viet'])}}"><img src="{{$article->avatar_path}}" width="100px" height="75px"></a>
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
@stop
