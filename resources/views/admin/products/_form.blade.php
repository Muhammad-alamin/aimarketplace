<section class="card">
    <header class="card-header">
        <div class="card-actions">
            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
        </div>

        <h2 class="card-title">Product</h2>
    </header>
    <div class="card-body">

        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Product category</label>
            <div class="col-lg-9">
                <div class="custom-select-1">
                    <select id="user_time_zone" class="form-control text-3 h-auto py-2 valid" name="product_category" size="0" aria-invalid="false">
                        <option selected="" disabled="" >Select Category</option>
                        @foreach($categories as $key=>$category)
                            <option  value="{{$category->id}}">{{$category->category_title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Product name</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="product_name" id="product_name" value="" placeholder="Enter product name">
                @error('product_name')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Description</label>
            <div class="col-lg-9">
                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="5" class="form-control text-3 h-auto py-2" name="description" required="" style="height: 159px;"></textarea>
                @error('description')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Product size</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="product_size" id="product_size" value="" placeholder="Enter product size">
                @error('product_size')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Product quantity</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="quantity" id="quantity" value="" placeholder="Enter product quantity">
                @error('quantity')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 ">Price</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="regular_price" id="regular_price" value="" placeholder="Enter product Regular price">
                @error('regular_price')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Image</label>
            <div class="col-lg-9">
                    <input class="d-block" type="file" name="image" id="image">

            </div>
            @error('image')<i class="text-danger">{{$message}}</i>@enderror
        </div>
        <div class="form-group row">
            <div class="form-group col-lg-9">

            </div>
            <div class="form-group col-lg-3">
                <input type="submit" value="submit" class="btn btn-dark btn-modern float-end" data-loading-text="Loading...">
            </div>
        </div>
    </div>
</section>
