@extends('seller.layouts.master')

@section('content')
<section role="main" class="content-body">

    <!-- start: page -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row mb-3">
                <div class="col-xl-6">
                    <section class="card card-featured-left card-featured-primary mb-3">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-primary">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Professionals</h4>
                                        <div class="info">
                                            <strong class="amount"></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-xl-6">
                    <section class="card card-featured-left card-featured-secondary">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-secondary">
                                        <i class="fas fa-file"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Projects</h4>
                                        <div class="info">
                                            <strong class="amount"></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <section class="card card-featured-left card-featured-tertiary mb-3">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-warning">
                                        <i class="fab fa-product-hunt"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Product</h4>
                                        <div class="info">
                                            <strong class="amount"></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-xl-6">
                    <section class="card card-featured-left card-featured-quaternary">
                        <div class="card-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-success">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Articles</h4>
                                        <div class="info">
                                            <strong class="amount"></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
     <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        </div>

                        <h2 class="card-title text-danger">Unapproved Product List</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product category</th>
                                    <th>Supplier name</th>
                                    <th>Location</th>
                                    <th>Approval</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($dataProducts as $key=>$product )
                                <tr>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->supplier_name }}</td>
                                    <td>{{ $product->country_name }}</td>
                                    <td>
                                        @if ($product->product_approval == 'Approved' )
                                        <span class="text-success">{{ $product->product_approval }}</span>
                                        @else
                                        <span class="text-danger">{{ $product->product_approval }}</span>
                                        @endif

                                    </td>
                                    <td class="actions">
                                        <a href="{{ route('admin.products.dashboard.edit',encrypt($product->id)) }}" class=""><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        </div>

                        <h2 class="card-title text-danger">Inactive Project List</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                            <thead>
                                <tr>

                                    <th>project name</th>
                                    <th>company name</th>

                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($dataProjects as $key=>$project )
                                <tr>

                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->company_name }}</td>

                                    <td>
                                        @if ($project->status == 'Active' )
                                        <span class="text-success">{{ $project->status }}</span>
                                        @else
                                        <span class="text-danger">{{ $project->status }}</span>
                                        @endif
                                    </td>
                                    <td class="actions">
                                        <a href="{{ route('admin.projects.dashboard.edit',encrypt($project->id)) }}" class=""><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
</section>
@endsection
