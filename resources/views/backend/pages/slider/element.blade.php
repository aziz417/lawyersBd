
<div class="col-md-12">
    <div class="form-group">
        <label for="title" class="control-label">Title</label>
        <input id="title" type="text" value="{{ isset($slider) ? @$slider->title : old('title')}}"
               name="title" class="form-control" autofocus>

        @error('title')
        <span class="help-block m-b-none text-danger">
            {{ @$message }}
        </span>
        @enderror
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="image">Image<span class="required-star"> *</span></label>
        <div class="input-group">
            <div class="custom-file">
                <input accept="image/*" type="file" name="image" class="custom-file-input" id="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>

        @error('image')
        <span class="help-block m-b-none text-danger">{{ @$message }}</span>
        @enderror
    </div>
</div>


<div class="col-md-12">
    <div>
        <div class="form-group">
            <label>
                <input name="status"
                       {{ isset($slider) && @$slider->status ? 'checked':old('status')}} type="checkbox"
                       class="i-checks">
                Publication Status
            </label>
        </div>
    </div>
</div>

