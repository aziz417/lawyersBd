@push('style')
    <link href="{{ asset('backend/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endpush
<div class="col-md-12">
    <div class="form-group">
        <label id="header_top_title" class="control-label">Header Top Title</label>
        <input id="header_top_title" type="text"
               value="{{isset($setting->header_top_title) ? @$setting->header_top_title : old('header_top_title')}}"
               name="header_top_title" class="form-control">
        @error('header_top_title')
        <span class="help-block m-b-none text-danger">
            {{ @$message }}
         </span>
        @enderror
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="logo">Logo</label>
            <div class="input-group">
                <div class="custom-file">
                    <input accept="image/*" type="file" name="logo" class="custom-file-input" id="logo">
                    <label class="custom-file-label" for="logo">Choose file</label>
                </div>
            </div>

        @error('logo')
        <span class="help-block m-b-none text-danger">{{ @$message }}</span>
        @enderror
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="footer_logo">Footer Logo</label>
        <div class="input-group">
            <div class="custom-file">
                <input accept="image/*" type="file" name="footer_logo" class="custom-file-input" id="footer_logo">
                <label class="custom-file-label" for="footer_logo">Choose file</label>
            </div>
        </div>

        @error('footer_logo')
        <span class="help-block m-b-none text-danger">{{ @$message }}</span>
        @enderror
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label id="description_one" class="control-label">Description One</label>
        <textarea class="form-control settingTextEditor" name="description_one" id="description_one">
            {{ isset($setting->description_one) && @$setting->description_one ? @$setting->description_one : old('description_one')}}
        </textarea>
        @error('description_one')
        <span class="help-block m-b-none text-danger">
            {{ @$message }}
        </span>
        @enderror
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label id="description_two" class="control-label">Description Two</label>
        <textarea class="form-control settingTextEditor" name="description_two" id="description_two">
            {{ isset($setting->description_two) && @$setting->description_two ?  @$setting->description_two : old('description_two')}}
        </textarea>
        @error('description_two')
        <span class="help-block m-b-none text-danger">
            {{ @$message }}
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label><input name="status"
          {{ isset($setting) && @$setting->status ? 'checked' : old('status')}} type="checkbox"
          class="i-checks"> Publication Status </label>
    </div>
</div>
@push('script')
    <script src="{{ asset('backend/js/plugins/summernote/summernote-bs4.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.settingTextEditor').summernote();
        });
    </script>
@endpush
