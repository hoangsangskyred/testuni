<div class="row">
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="text" class="form-control text-capitalize" id="display_name" name="display_name" placeholder="Tên hiển thị" value="{{old('display_name', $needle->display_name)}}" required
                   autofocus>
            <label for="display_name">Tên hiển thị</label>
            <div class="invalid-feedback"><i class="fas fa-exclamation-circle"></i> Không được rỗng</div>
        </div>

        <div class="form-group mb-3">
            <label for="setting_value">Giá trị hiển thị</label>
            <textarea class="form-control" id="setting_value" rows="5" name="setting_value" required>{{old('setting_value', $needle->setting_value)}}</textarea>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ $controller->getRedirectLink() }}" class="btn btn-secondary">
                Thoát
            </a>
            <button type="submit" class="btn btn-theme px-5">
                Lưu
            </button>
        </div>

    </div>
</div>
