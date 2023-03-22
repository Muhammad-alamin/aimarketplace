@extends('admin.layouts.master')

@section('content')

<section role="main" class="content-body">
    <!-- start: page -->
        <div class="row">
            <div class="col">
                @if(session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{session()->get('success')}}
                    </div>
                @endif
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        </div>

                        <h2 class="card-title">Product Approval List</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product category</th>
                                    <th>Supplier name</th>
                                    <th>Approval</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key=>$product )
                                <tr>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->category_title }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @if ($product->product_approval == 'Approved' )
                                        <span class="text-success">{{ $product->product_approval }}</span>
                                        @else
                                        <span class="text-danger">{{ $product->product_approval }}</span>
                                        @endif

                                    </td>
                                    <td class="actions">
                                        <a href="{{ route('admin.products.edit',encrypt($product->id)) }}" class=""><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('admin.products.delete', encrypt($product->id)) }}" onclick="return confirm('Are You Confirm to Delete?')" class=""><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    <!-- end: page -->
</section>

@endsection
