<section class="card">
    <header class="card-header">
        <div class="card-actions">
            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
        </div>

        <h2 class="card-title">Articles</h2>
    </header>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Professional  :</label>
            <div class="col-sm-8">
                <div class="custom-select-1">
                    <select id="user_time_zone" class="form-control text-3 h-auto py-2 valid" name="professional_id" size="0" aria-invalid="false">
                        <option selected="" disabled="" >Select Professional</option>
                        @foreach($professionals as $key=>$professional)
                            <option  @if(old('professional_id',isset($article)?$article->professional_id:null)  == $professional->id) selected @endif value="{{$professional->id}}">{{$professional->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('professional_id')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Title  :</label>
            <div class="col-sm-8">
                <input type="text" name="article_title" value="{{old('article_title', isset($article)?$article->article_title:null)}}" placeholder="Enter article title" class="form-control">
                @error('article_title')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Description :</label>
            <div class="col-sm-8">
                <textarea type="text" name="article_description" value="" placeholder="Enter Article description" class="form-control">{{old('article_description', isset($article)?$article->article_description:null)}}</textarea>
                @error('article_description')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Image :</label>
            <div class="col-sm-8">
                <input type="file" name="image" value="{{old('image', isset($article)?$article->image:null)}}" class="form-control">
                <br>
                @if (isset($article))
                    <img src="{{asset($article->image)}}" width="40px;" height="50px">
                @endif
                @error('image')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
    </div>
    <footer class="card-footer text-right">
        <button class="btn btn-dark">Submit </button>
        <button type="reset" class="btn btn-default">Reset</button>
    </footer>
</section>
