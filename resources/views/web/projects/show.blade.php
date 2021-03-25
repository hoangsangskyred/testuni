@extends('layouts.web')
@push('page-title', 'Danh sách tất cả các dự án')
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
                        @forelse ($needle as $project)
                        <div class="col-md-6 my-4 projects px-3">
                            <div class="card" style="overflow :hidden;">
                                <a href="{{route('web.project.detail', ['slug'=>$project->slug, 'du-an'])}}"><img class="card-img-top" src="{{$project->avatar_path}}" alt=" " height="300px"></a>
                                <div class="card-body px-2 mx-2"  style="height:100px;">    
                                    <a href="{{route('web.project.detail', ['slug'=>$project->slug, 'du-an'])}}"><h5 class="entry-title">{{$project->title}}</h5></a>    
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
                            <h4 class="widget-title"><span class="light-text">Danh mục dự án</span></h4>
                            <ul class="list-group list-unstyled">
                                @foreach($projectCategories as $category)
                                    <li><a href="{{route('web.projectCategory.show', [$category->slug,'danh-muc'])}}">{{$category->display_name}}</a><span>({{$category->projects->where('show','Y')->count()}})</span></li>
                                @endforeach
                            </ul>
                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

