@extends('admin.layouts.master')

@section('content')
			<div role="main" class="main">
				<section role="main" class="content-body card-margin">

					<!-- start: page -->
					<div class="row">
						<div class="col-lg-8">
							<form id="form1" action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
								@include('admin.projects._form')
							</form>
						</div>
					<!-- end: page -->
				</section>
			</div>

@endsection

