<section class="card">
    <header class="card-header">
        <div class="card-actions">
            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
        </div>

        <h2 class="card-title">Category</h2>
    </header>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Title  :</label>
            <div class="col-sm-8">
                <input type="text" name="title" value="{{old('title', isset($category)?$category->category_title:null)}}" placeholder="Enter Category title" class="form-control">
                @error('title')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 control-label text-sm-right pt-2">Image :</label>
        <div class="col-sm-8">
            <input type="file" name="image" value="{{old('image', isset($category)?$category->category_image:null)}}" class="form-control">
            <br>
            @if (isset($category))
                <img src="{{asset($category->category_image)}}" width="40px;" height="50px">
            @endif
            @error('image')<i class="text-danger">{{$message}}</i>@enderror
        </div>
    </div>
    <footer class="card-footer text-right">
        <button class="btn btn-dark">Submit </button>
        <button type="reset" class="btn btn-default">Reset</button>
    </footer>
</section>
