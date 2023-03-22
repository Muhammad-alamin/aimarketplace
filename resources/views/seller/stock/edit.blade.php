@extends('seller.layouts.master')

@section('content')



    <div role="main" class="main">
        <section role="main" class="content-body card-margin">

            <!-- start: page -->
            <div class="row">
                <div class="col-lg-8">
                    <form id="form1" action="{{ route('admin.products.update', encrypt($product->id)) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <section class="card">
                            <header class="card-header">
                                <div class="card-actions">
                                    <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                </div>

                                <h2 class="card-title">Product</h2>
                            </header>
                            <div class="card-inner">
                                <form action="{{route('stock.update', \Illuminate\Support\Facades\Crypt::encryptString($product->id))}}" method="post" class="gy-3" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <label for="product_stock" class="form-label">Product Quantity</label>
                                                    <input type="text" class="form-control" name="product_quantity" id="product_quantity" value="{{old('quantity', isset($product)?$product->quantity:null)}}" placeholder="Enter Product Quantity">
                                                    @error('product_quantity')<i class="text-danger">{{$message}}</i>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-10">
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </form>
                </div>
            <!-- end: page -->
        </section>
    </div>

@endsection
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">

</script>

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
