

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

                        <h2 class="card-title">Project List</h2>
                    </header>
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                                <thead>
                                <tr>
                                    <th >User name</th>
                                    <th >User email</th>
                                    <th >Mobile</th>
                                    <th >Roles</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($userList as $key=>$user )
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->role}}</td>
                                        <td class="actions">
                                            <a href="{{route('admin.editUser',encrypt($user->id))}}" class=""><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{route('admin.deleteUser', encrypt($user->id))}}" onclick="return confirm('Are You Confirm to Delete?')" class=""><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </section>
            </div>
        </div>
    <!-- end: page -->
</section>

@endsection
