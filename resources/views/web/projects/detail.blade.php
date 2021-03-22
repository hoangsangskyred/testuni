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
                            <div class="main">
                              @foreach ($projectImages as $key => $item )
                                <div class="column">
                                  <img id="{{$key}}" src="{{str_replace([public_path(), '\/'], ['', '/public/'], $item)}}" width="50px" class="slide"/>   
                                </div>
                              @endforeach
                            </div>
                           <div id="slide-modal">
                              <a id="close" class="slider-button">&times;</a>
                              <a id="full" class="slider-button">&#10021;</a>
                              <a id="previous" class="slider-button">&#8249;</a>
                              <a id="next" class="slider-button">&#8250;</a>
                              <img id="modal-content" src="" alt="image in slideshow" width="50%" />
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

@push('extra-scripts')
    <script>
    (function () {
  var modal = document.getElementById("slide-modal"),
  slides = document.getElementsByClassName("slide"),
  modalImage = document.getElementById("modal-content"),
  n = document.getElementById("next"),
  p = document.getElementById("previous"),
  f = document.getElementById("full"),
  x = document.getElementById("close"),
  slideNumber = 1,
  beginning, ending, i;

    /* Make a click on the gallery image open the modal and display the 
    image. */
    for (i = 0; i < slides.length; i++) {
      slides[i].addEventListener("click", openModal); 
    }

    function openModal(event) {
      modal.style.display = "block";
      modalImage.src = event.target.src;
      slideNumber = parseInt(event.target.id);
    }

    // Allow the modal to be closed easily.
    modal.addEventListener("click", clickClose);
    x.addEventListener("click", clickClose);
    function clickClose(event) {
      if (event.target === modal || event.target === x) {
        modal.style.display = "none";
        closeFullScreen();
      }
    }

    // Show and hide the next, previous, and close buttons.
    window.addEventListener("mouseover", showControls);
    window.addEventListener("mouseout", hideControls);
    function showControls() {
      n.style.opacity = 1;
      p.style.opacity = 1;
      f.style.opacity = 1;
      x.style.opacity = 1;
    }

    function hideControls() {
      n.style.opacity = 0;
      p.style.opacity = 0;
      f.style.opacity = 0;
      x.style.opacity = 0;
    }

    // Activate the next and previous buttons.
    window.addEventListener("click", dirMouse);
    function dirMouse(event) {
      if (event.target === n) {
        changeSlide(1);
      } else if (event.target === p) {
        changeSlide(-1);
      }
    }
	
    // Allow for a moblie friendly swipe instead of next & previous buttons.
    modalImage.addEventListener("touchstart", getLoc);
    function getLoc(event) {
      beginning = event.touches[0].clientX;
    }

    modalImage.addEventListener("touchmove", getMoveLoc);
    function getMoveLoc(event) {
      ending = event.touches[0].clientX;
    }
    
    modalImage.addEventListener("touchend", dirTouch);
    function dirTouch(event) {
      if (ending === null) {return;}

      if (ending < (beginning - 50)) {
        changeSlide(1);
      } else if (ending > (beginning + 50)) {
        changeSlide(-1);
      }

      ending = null;
    }

    // Make the full screen button work properly.
    f.addEventListener("click", fullScreen);
    function fullScreen() {
      if (document.fullscreenElement || document.webkitFullscreenElement ||
      document.mozFullScreenElement || document.msFullscreenElement) {
        closeFullScreen();
      } else if (modal.requestFullscreen) {
        modal.requestFullscreen();
      } else if (modal.mozRequestFullScreen) {
        modal.mozRequestFullScreen();
      } else if (modal.webkitRequestFullscreen) {
        modal.webkitRequestFullscreen();
      } else if (modal.msRequestFullscreen) {
        modal.msRequestFullscreen();
      }
    }

    function closeFullScreen() {
      if (document.exitFullscreen && document.fullscreenElement) {
        document.exitFullscreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      }
    }

    // Have the image source changed to display a different image.
    function changeSlide(d) {
      if (slideNumber == 1 && d === -1) {
        slideNumber = slides.length;
      } else if (slideNumber == (slides.length) && d === 1) {
        slideNumber = 1;
      } else {
        slideNumber += d;
      }

      modalImage.src = slides[slideNumber - 1].src;
    }
}()); 
    </script>
@endpush
@stop
