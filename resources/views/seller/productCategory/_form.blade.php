<section class="card">
    <header class="card-header">
        <div class="card-actions">
            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
        </div>

        <h2 class="card-title">Product Category</h2>
    </header>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Title  :</label>
            <div class="col-sm-8">
                <input type="text" name="title" value="{{old('title', isset($category)?$category->title:null)}}" placeholder="Enter Category title" class="form-control">
                @error('title')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
    </div>
    <footer class="card-footer text-right">
        <button class="btn btn-dark">Submit </button>
        <button type="reset" class="btn btn-default">Reset</button>
    </footer>
</section>
