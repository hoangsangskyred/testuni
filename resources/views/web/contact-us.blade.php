@extends('layouts.web')
@push('page-title', 'Liên hệ')
@section('page-content')
    <div class="inner-heading">
        <div class="container">
            <h1>@stack('page-title')</h1>
        </div>
    </div>

    <div class="inner-content aboutWrp">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form id="createForm" action="{{route('web.contactUs')}}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h5>Bạn vui lòng nhập thông tin phía dưới</h5>
                            </div>
                            <div class="card-body">
                                @include('layouts.inc.alerts')
                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control text-capitalize" id="full_name" name="full_name" placeholder="Họ và tên" value="{{old('full_name')}}" required >
                                                    <label for="full_name" style="top:10px !important; padding:0 !important">Họ và Tên</label>
                                                <div class="invalid-feedback"><i class="fas fa-exclamation-circle"></i> Vui lòng không để trống</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mt-2">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email tại đây" value="{{old('email')}}" required>
                                                    <label for="email" style="top:10px !important; padding:0 !important">Email</label>
                                                    <div class="invalid-feedback"><i class="fas fa-exclamation-circle">Email phải đúng định dạng</i></div>
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-floating mt-2">
                                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập email tại đây" value="{{old('phone')}}" required>
                                                    <label for="phone"  style="top:10px !important; padding:0 !important" >Số điện thoại</label>
                                                    <div class="invalid-feedback"><i class="fas fa-exclamation-circle">Vui lòng nhập số điện thoại</i></div>
                                                </div>
                                            </div>
                                            <div class="col mt-3">
                                                <div class="form-group">
                                                    <label for="floatingTextarea2">Lời nhắn</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="message"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    
                                </div>
                    
                            </div>
                            <div class="card-footer">
                              <div class="row">
                                 <div class="col-md-8 mx-auto text-end">
                                   <button type="submit" class="btn btn-theme px-5">Gửi</button>
                                 </div>
                               </div>
                           </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-widgets">
                        <div class="widget widget-categories">
                            <h4 class="widget-title"><span class="light-text">Danh mục dự án</span></h4>
                            <ul class="list-group list-unstyled">
                               @foreach ($projectCategories as $projectCategory)
                                    <li><a href="{{route('web.projectCategory.show', [$projectCategory->slug,'danh-muc'])}}">{{$projectCategory->display_name}}</a><span>({{$projectCategory->projects->where('show','Y')->count()}})</span></li>
                               @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title"><span class="light-text">Bài viết theo chủ đề</span></h4>
                            <div class="widget-posts">
                                <ul class="list-group list-unstyled">
                                    @foreach($articleCategories as $category)
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
@stop