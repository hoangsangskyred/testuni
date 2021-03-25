@extends('layouts.web')
@push('page-title', 'Danh sách tất cả các bài viết')
@section('page-content')
    <div class="inner-heading">
        <div class="container">
            <h1>@stack('page-title')</h1>
        </div>
    </div>

 <div class="inner-content">
    <div class="container">
        <div class="service-wrap">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @forelse ($needle as $article)
                        <div class="col-md-6 my-4 projects px-3">
                            <div class="card" style="overflow :hidden;">
                                <a href="{{route('web.article.detail', ['slug'=>$article->slug, 'bai-viet'])}}"><img class="card-img-top" src="{{$article->avatar_path}}" alt=" " height="300px"></a>
                                <div class="card-body px-2 mx-2"  style="height:100px;">    
                                    <a href="{{route('web.article.detail', ['slug'=>$article->slug, 'bai-viet'])}}"><h5 class="entry-title">{{$article->title}}</h5></a>
                                    <span style="opacity: 0.7;">Ngày đăng : {{$article->created_at->format('d-m-Y')}}</span> 
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
                        <div class="widget">
                            <h4 class="widget-title"><span class="light-text">Blog theo chủ đề</span></h4>
                            <div class="widget-posts">
                                <ul class="list-group list-unstyled">
                                    @foreach($articleCategorise as $category)
                                        <li><a href="{{route('web.articleCategory.show', [$category->slug,'chu-de'])}}">{{$category->display_name}}</a><span>({{$category->articles->count()}})</span></li>
                                   @endforeach
                                </ul>   
                            </div>
                        </div>
                        <div class="widget widget-categories">
                            <h4 class="widget-title"><span class="light-text">Danh mục dự án</span></h4>
                            <ul class="list-group list-unstyled">
                                @foreach($projectCategories as $category)
                                    <li><a href="{{route('web.projectCategory.show', [$category->slug,'danh-muc'])}}">{{$category->display_name}}</a><span>({{$category->projects->where('show','Y')->count()}})</span></li>
                                 @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
