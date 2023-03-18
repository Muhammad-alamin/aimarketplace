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

                        <h2 class="card-title">Professional List</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Country</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($professionals as $key=>$professional )
                                <tr>
                                    <td>{{ $professional->name }}</td>
                                    <td>{{ $professional->category_title }}</td>
                                    <td>{{ $professional->country_name }}</td>
                                    <td>{{ $professional->email }}</td>
                                    <td><img src="{{ asset($professional->image) }}" style="width: 40px; height: 20px;"></td>
                                    <td class="actions">
                                        <a href="{{ route('admin.professional.edit',encrypt($professional->id)) }}" class=""><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('admin.professional.delete', encrypt($professional->id)) }}" onclick="return confirm('Are You Confirm to Delete?')" class=""><i class="far fa-trash-alt"></i></a>
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
