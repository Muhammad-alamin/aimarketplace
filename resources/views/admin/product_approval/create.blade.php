@extends('vendor.layouts.master')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-inner">
                                        <form action="{{route('products.store')}}" method="post" class="gy-3" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="form-label">Category Name</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select form-control form-control-lg" name="category_id" id="category" data-search="on">
                                                                <option selected="" disabled="" >Select Category</option>
                                                                @foreach($categories as $key=>$category)
                                                                    <option  value="{{$category->id}}">{{$category->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_id')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>


                                                            <div class="form-group">
                                                                <label class="form-label">Brand Name</label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select form-control form-control-lg" name="brand_id" id="brand_id" data-search="on">
                                                                        <option selected="" value="" name="brand_id">Select Brand Name</option>
                                                                        @foreach($brands as $key=>$brand)
                                                                            @if($brand->user_id == auth()->user()->id)
                                                                            <option  value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    @error('brand_name')<i class="text-danger">{{$message}}</i>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_name" class="form-label">Product Name</label>
                                                            <input type="text" class="form-control" name="product_name" id="product_name" value="" placeholder="Enter Product name">
                                                            @error('product_name')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_sku" class="form-label">Product SKU </label>
                                                            <input type="text" class="form-control" name="product_sku" id="product_sku" value="" placeholder="Enter Product SKU">
                                                            @error('product_sku')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_description" class="form-label">Product Description</label>
                                                            <textarea class="form-control no-resize" name="product_description" id="product_description" placeholder="Enter product Description"> </textarea>
                                                            @error('product_description')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_code" class="form-label">Product Code</label>
                                                            <input type="text" class="form-control" name="product_code" id="product_code" value="" placeholder="Enter product Code">
                                                            @error('product_code')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="form-label">Buying Date</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-calendar"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker" name="product_buying_date" data-date-format="dd-mm-yyyy">
                                                        </div>
                                                        <div class="form-note">Date format <code>dd-mm-yyyy</code></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_regular_price" class="form-label">Product Regular Price</label>
                                                            <input type="text" class="form-control" name="product_regular_price" id="product_regular_price" value="" placeholder="Enter Product Regular price">
                                                            @error('product_regular_price')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_discount_price" class="form-label">Product Discount Price</label>
                                                            <input type="text" class="form-control" name="product_discount_price" id="product_discount_price" value="" placeholder="Enter Product Discount price">
                                                            @error('product_discount_price')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_quantity" class="form-label">Product Quantity</label>
                                                            <input type="text" class="form-control" name="product_quantity" id="product_quantity" value="" placeholder="Enter Product quantity">
                                                            @error('product_quantity')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_stock" class="form-label">Product Stock</label>
                                                            <input type="text" class="form-control" name="product_stock" id="product_stock" value="" placeholder="Enter Product stock">
                                                            @error('product_stock')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_discount_percent" class="form-label">Product Discount Percent ( Example- 10, 30, 50)</label>
                                                            <input type="text" class="form-control" name="product_discount_percent" id="product_discount_percent" value="" placeholder="Enter Product discount percent">
                                                            @error('product_discount_percent')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <label for="product_discount_amount" class="form-label">Product Discount Amount ( Example- 100, 250, 500)</label>
                                                            <input type="text" class="form-control" name="product_discount_amount" id="product_discount_amount" value="" placeholder="Enter Product discount amount">
                                                            @error('product_discount_amount')<i class="text-danger">{{$message}}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="product_status" class="form-label">Product Status</label>
                                                            <div class="form-check">
                                                                <input type="radio" name="product_status" class="form-check-input" value="Active" id="Active">
                                                                <label  for="active">Active</label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input type="radio" name="product_status" class="form-check-input" value="Inactive" id="Inactive">
                                                                <label for="inactive">Inactive</label>
                                                            </div>
                                                            @error('product_status')<i class="text-danger">{{ $message }}</i>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-center">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Upload Brand Image</label>
                                                        <div class="form-control-wrap">
                                                            <div class="custom-file">
                                                                <input type="file" name="images[]" id="images" multiple class="custom-file-input" >
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                                @error('images')<i class="text-danger">{{$message}}</i>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <div class="col-lg-10">
                                                    <div class="form-group mt-2">
                                                        <button type="submit" class="btn btn-lg btn-primary">submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- card -->
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">

</script>



<!--<script type="text/javascript">
    $(function (){
        var category_id = $('[ name="category_id"]')

        category_id.change(function (){
            var id = $(this).val();

            if (id)
            {
                $.ajax({
                    url: "{{ url('/vendor/sub_category/')}}/"+id,
                    type:"GET",
                    dataType:"json",
                    success: function(data){
                        $("#subcategory").empty();
                        $.each(data,function (key,value){
                            $("#subcategory").append('<option value="'+value.id+'">'+value.subcat_name+'</option>').val(html.data.subcategory);
                        });
                    }
                })
            }

            else {
                alert('danger')
            }
        })
    })
</script>-->

<script type="text/javascript">

    $(document).ready(function() {

        $("#add-more").click(function(){
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });

        $("body").on("click",".remove",function(){
            $(this).parents(".control-group").remove();
        });

    });

</script>

