@extends('admin.layouts.master')

@section('content')
<div role="main" class="main">
    <section role="main" class="content-body card-margin">
                        @if(session('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{session()->get('success')}}
                        </div>
                    @endif
					<div class="row">
						<div class="col-lg-8">
                                    <section class="card">
                                <header class="card-header">
                                    <div class="card-actions">
                                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                    </div>

                                    <h2 class="card-title">Proile Pic</h2>
                                </header>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('admin.profile.pic.update', encrypt(auth()->user()->id)) }}" enctype="multipart/form-data" class="needs-validation">
                                        @csrf
                                        {{-- <div class="thumb-info mb-3">
                                            <img src="img/%21logged-user.jpg" class="rounded img-fluid" alt="John Doe">
                                            <div class="thumb-info-title">
                                                <span class="thumb-info-inner">John Doe</span>
                                                <span class="thumb-info-type">CEO</span>
                                            </div>
                                        </div> --}}
                                        <div class="d-flex justify-content-center mb-4">
                                            <div class="profile-image-outer-container">
                                                <div class="d-flex justify-content-center mb-4">
                                                    @if (auth()->user()->image == null)
                                                        <img class="text-center" src="{{ asset('imges/avatar.jpg') }}" style="width: 100px; height:100px;">
                                                    @else
                                                    <img class="text-center" src="{{asset(auth()->user()->image)}}" style="width: 100px; height:100px;">
                                                    @endif
                                                    <span class="profile-image-button bg-color-dark">
                                                        <i class="fas fa-camera text-light"></i>
                                                    </span>
                                                </div>
                                                <input type="file" name="image" id="image" multiple class="form-control profile-image-input">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mb-4">
                                            <div class="profile-image-outer-container">
                                                <button type="submit" class="btn btn-dark btn-modern">Upload your picture</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>

						</div>
					</div>

				</div>
            </section>
	</div>
@endsection
