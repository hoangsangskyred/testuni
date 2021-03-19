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
                    @foreach(\App\Models\ProjectCategory::whereShow('Y')->orderBy('display_name','asc')->get() as $projectCategory)
                    <li><a  href="{{route('web.project.show', [$projectCategory->slug,'du-an'])}}">{{$projectCategory->display_name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="#">Blog <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown-list">
                    @foreach(\App\Models\ArticleCategory::whereShow('Y')->orderBy('display_name','asc')->get() as $articleCategory)
                    <li><a  href="{{route('web.article.show',[$articleCategory->slug,'blogs'])}}">{{$articleCategory->display_name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{route('web.contactUs')}}">Liên hệ</a></li>
        </ul>
    </div>
</nav>
