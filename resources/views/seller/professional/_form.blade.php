<section class="card">
    <header class="card-header">
        <div class="card-actions">
            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
        </div>

        <h2 class="card-title">Professional</h2>
    </header>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Category  :</label>
            <div class="col-sm-8">
                <div class="custom-select-1">
                    <select id="user_time_zone" class="form-control text-3 h-auto py-2 valid" name="product_category" size="0" aria-invalid="false">
                        <option selected="" disabled="" >Select Category</option>
                        @foreach($categories as $key=>$category)
                            <option  @if(old('product_category',isset($professional)?$professional->professional_cat_id:null)  == $category->id) selected @endif value="{{$category->id}}">{{$category->category_title}}</option>
                            <option hidden @if(old('product_category_title',isset($professional)?$professional->product_category_title:null)  == $category->ategory_title) selected @endif value="{{$category->category_title}}"></option>
                            @endforeach
                    </select>
                </div>
                @error('product_category')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Name  :</label>
            <div class="col-sm-8">
                <input type="text" name="name" value="{{old('name', isset($professional)?$professional->name:null)}}" placeholder="Enter Professional name" class="form-control">
                @error('name')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Address  :</label>
            <div class="col-sm-8">
                <input type="text" name="address" value="{{old('address', isset($professional)?$professional->address:null)}}" placeholder="Enter Professional address" class="form-control">
                @error('address')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Phone  :</label>
            <div class="col-sm-8">
                <input type="text" name="mobile" value="{{old('mobile', isset($professional)?$professional->mobile:null)}}" placeholder="Enter Professional phone no" class="form-control">
                @error('mobile')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Email  :</label>
            <div class="col-sm-8">
                <input type="email" name="email" value="{{old('email', isset($professional)?$professional->email:null)}}" placeholder="Enter Professional email" class="form-control">
                @error('email')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Country  :</label>
            <div class="col-sm-8">
                <div class="custom-select-1">
                    <select id="user_time_zone" class="form-control text-3 h-auto py-2 valid" name="country" size="0" aria-invalid="false">
                        <option selected="" disabled="" >Select Country</option>
                        @foreach($countries as $key=>$country)
                        <option  @if(old('country',isset($professional)?$professional->location:null)  == $country->id) selected @endif value="{{$country->id}}">{{$country->country_name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('country')<i class="text-danger">{{$message}}</i>@enderror

            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Visiting time (MONDAY-FRIDAY 8.00-20.00) :</label>
            <div class="col-sm-8">
                <input type="text" name="visiting_time" value="{{old('visiting_time', isset($professional)?$professional->visiting_time:null)}}" placeholder="Enter visiting time" class="form-control">
                @error('visiting_time')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Website link :</label>
            <div class="col-sm-8">
                <input type="text" name="website" value="{{old('website', isset($professional)?$professional->website:null)}}" placeholder="Enter Professional website" class="form-control">
                @error('website')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Instagram link :</label>
            <div class="col-sm-8">
                <input type="text" name="instagram" value="{{old('instagram', isset($professional)?$professional->instagram:null)}}" placeholder="Enter Professional instagram" class="form-control">
                @error('instagram')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Facebook link :</label>
            <div class="col-sm-8">
                <input type="text" name="facebook" value="{{old('facebook', isset($professional)?$professional->facebook:null)}}" placeholder="Enter Professional facebook" class="form-control">
                @error('facebook')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">About :</label>
            <div class="col-sm-8">
                <textarea type="text" name="about" value="" placeholder="Enter Professional about" class="form-control">{{old('about', isset($professional)?$professional->about:null)}}</textarea>
                @error('about')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Company name :</label>
            <div class="col-sm-8">
                <input type="text" name="company_name" value="{{old('company_name', isset($professional)?$professional->company_name:null)}}" placeholder="Enter Professional company name" class="form-control">
                @error('company_name')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Company banner :</label>
            <div class="col-sm-8">
                <input type="file" name="image" value="{{old('image', isset($professional)?$professional->image:null)}}" class="form-control">
                <br>
                @if (isset($professional))
                    <img src="{{asset($professional->image)}}" width="40px;" height="50px">
                @endif
                @error('image')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Profile pic / Company logo:</label>
            <div class="col-sm-8">
                <input type="file" name="pro_pic" value="{{old('image', isset($professional)?$professional->pro_pic:null)}}" class="form-control">
                <br>
                @if (isset($professional))
                    <img src="{{asset($professional->pro_pic)}}" width="40px;" height="50px">
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
