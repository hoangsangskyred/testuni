<nav class="moblie" id="navbar_top">
    <div class="container nav-wrapper">
        <div class="brand">
           <span><strong> <a class="navbar-brand" href="{{route('web.index')}}"><img src="/public/img/logo_185x60.png"></a></strong></span>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
      
        <ul class="nav-list">
            <li>
                <a href="{{route('web.index')}}">Trang chủ</a>
            </li>
            <li> <a href="{{route('web.aboutUs')}}">Giới thiệu</a></li>
            <li>
                <a href="#">Dịch Vụ <i class="fas fa-chevron-down"></i> </a>
                <ul class="dropdown-list">
                    @foreach(\App\Models\Service::whereShow('Y')->get() as $service)
                    <li><a  href="{{route('web.service.detail', [$service->slug, 'dich-vu'])}}">{{$service->title}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="#">Dự án <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown-list">
                    @foreach(\App\Models\Project::whereShow('Y')->get() as $project)
                    <li><a  href="{{route('web.project.detail', [$project->slug, 'du-an'])}}">{{$project->title}}</a></li>
                    @endforeach
                </ul>
            
            </li>
            <li><a href="#">Blog</a>
                <ul class="dropdown-list">
                    @foreach(\App\Models\Article::whereShow('Y')->get() as $article)
                    <li><a  href="{{route('web.article.detail', [$article->slug])}}">{{$article->title}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="#">Liên hệ</a></li>
        </ul>
    </div>
</nav>
