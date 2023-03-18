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
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                            <thead>
                                <tr>
                                    <th>Professional Name</th>
                                    <th>project name</th>
                                    <th>company name</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $key=>$project )
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->company_name }}</td>
                                    <td>{{ $project->country_name }}</td>
                                    <td>{{ $project->status }}</td>
                                    <td class="actions">
                                        <a href="{{ route('admin.projects.edit',encrypt($project->id)) }}" class=""><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('admin.projects.delete', encrypt($project->id)) }}" onclick="return confirm('Are You Confirm to Delete?')" class=""><i class="far fa-trash-alt"></i></a>
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
