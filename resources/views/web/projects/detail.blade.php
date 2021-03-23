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
                              <div class="content">
                                {!! $needle->content !!}
                              </div>
                              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>      
                              <div class="demo-gallery">
                                <ul id="lightgallery" class="list-unstyled row">
                                  @foreach ($projectImages as $key => $item )
                                    <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="" data-src="{{str_replace([public_path(), '\/'], ['', '/public/'], $item)}}" data-sub-html="">
                                        <a href="">
                                            <img class="img-responsive" src="{{str_replace([public_path(), '\/'], ['', '/public/'], $item)}}">
                                        </a>
                                    </li>
                                  @endforeach 
                                </ul>
                              </div>   
                          
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-widgets">
                            <div class="widget widget-categories">
                                <h4 class="widget-title"><span class="light-text">Dự án liên quan</span></h4>
                                <div class="widget-posts">
                                  @foreach($projectRelation as $project)
                                  <div class="widget-post media">
                                      <a href="{{route('web.project.detail', ['slug'=>$project->slug, 'du-an'])}}"><img src="{{$project->avatar_path}}" width="120px"></a>
                                      <div class="media-body">
                                        <h5 class="entry-title"><a href="{{route('web.project.detail', ['slug'=>$project->slug, 'du-an'])}}">{{$project->title}}</a></h5>
                                      </div>
                                  </div>    
                                  @endforeach
                              </div>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title"><span class="light-text">Danh mục dự án</span></h4>
                                <ul class="list-group list-unstyled">
                                  @foreach($projectCategories as $category)
                                  <li><a href="{{route('web.projectCategory.show', [$category->slug,'danh-muc'])}}">{{$category->display_name}}</a><span>{{$category->projects->where('show','Y')->count()}}</span></li>
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

    <script type="text/javascript">
      $(document).ready(function(){
          $('#lightgallery').lightGallery();
      });
      </script>

@push('extra-scripts')
  
@endpush
@stop
