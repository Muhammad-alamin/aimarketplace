<section class="card">
    <header class="card-header">
        <div class="card-actions">
            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
        </div>

        <h2 class="card-title">Projects</h2>
    </header>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Professional  :</label>
            <div class="col-sm-8">
                <div class="custom-select-1">
                    <select id="user_time_zone" class="form-control text-3 h-auto py-2 valid" name="professional_id" size="0" aria-invalid="false">
                        <option selected="" disabled="" >Select Professional</option>
                        @foreach($professionals as $key=>$professional)
                            <option  @if(old('professional_id',isset($project)?$project->professional_id:null)  == $professional->id) selected @endif value="{{$professional->id}}">{{$professional->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('professional_id')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        @foreach($professionals as $key=>$professional)
            <option hidden name="professional_name" @if(old('professional_name',isset($project)?$project->professional_name:null)  == $professional->name) selected @endif value="{{$professional->name}}">{{$professional->name}}</option>
        @endforeach
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Project name  :</label>
            <div class="col-sm-8">
                <input type="text" name="project_name" value="{{old('project_name', isset($project)?$project->project_name:null)}}" placeholder="Enter project name" class="form-control">
                @error('project_name')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Company Name  :</label>
            <div class="col-sm-8">
                <input type="text" name="company_name" value="{{old('company_name', isset($project)?$project->company_name:null)}}" placeholder="Enter Company name" class="form-control">
                @error('company_name')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">project Type  :</label>
            <div class="col-sm-8">
                <input type="text" name="project_type" value="{{old('project_type', isset($project)?$project->project_type:null)}}" placeholder="Enter Project Type" class="form-control">
                @error('project_type')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Descriptiom :</label>
            <div class="col-sm-8">
                <textarea type="text" name="description" value="" placeholder="Enter description" class="form-control">{{old('description', isset($project)?$project->description:null)}}</textarea>
                @error('description')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Firm  :</label>
            <div class="col-sm-8">
                <input type="text" name="firm" value="{{old('firm', isset($project)?$project->firm:null)}}" placeholder="Enter firm" class="form-control">
                @error('firm')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Area size  :</label>
            <div class="col-sm-8">
                <input type="text" name="area_size" value="{{old('area_size', isset($project)?$project->area_size:null)}}" placeholder="Enter area size" class="form-control">
                @error('area_size')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Design Style  :</label>
            <div class="col-sm-8">
                <input type="text" name="design_style" value="{{old('design_style', isset($project)?$project->design_style:null)}}" placeholder="Enter design style" class="form-control">
                @error('design_style')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Architect  :</label>
            <div class="col-sm-8">
                <input type="text" name="architect" value="{{old('architect', isset($project)?$project->architect:null)}}" placeholder="Enter architect" class="form-control">
                @error('architect')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Country  :</label>
            <div class="col-sm-8">
                <div class="custom-select-1">
                    <select id="user_time_zone" class="form-control text-3 h-auto py-2 valid" name="country" size="0" aria-invalid="false">
                        <option selected="" disabled="" >Select Country</option>
                        @foreach($countries as $key=>$country)
                        <option  @if(old('country',isset($project)?$project->location:null)  == $country->id) selected @endif value="{{$country->id}}">{{$country->country_name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('country')<i class="text-danger">{{$message}}</i>@enderror

            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Status  :</label>
            <div class="form-check" style="margin-left: 20px; margin-top: 5px;">
                <input type="radio" @if(old('status',isset($project)?$project->status:null)  == 'Active') checked @endif name="status" class="form-check-input" value="active" id="active">
                <label  for="active">Active</label>
            </div>

            <div class="form-check" style="margin-left: 20px; margin-top: 5px;">
                <input type="radio" @if(old('status',isset($project)?$project->status:null)  == 'Inactive') checked @endif name="status" class="form-check-input" value="inactive" id="inactive">
                <label for="inactive">Inactive</label>
            </div>
            @error('status')<i class="text-danger">{{ $message }}</i>@enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Thumbnail Image :</label>
            <div class="col-sm-8">
                <input type="file" name="thumbnail_image" value="{{old('thumbnail_image', isset($project)?$project->thumbnail_image:null)}}" class="form-control">
                <br>
                @if (isset($project))
                    <img src="{{asset($project->thumbnail_image)}}" width="40px;" height="50px">
                @endif
                @error('thumbnail_image')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Multiple Image :</label>
            <div class="col-sm-8">
                <input class="form-control" multiple class="custom-file-input" type="file" name="multiple_image[]" id="multiple_image">
                 @error('multiple_image')<i class="text-danger">{{$message}}</i>@enderror
            </div>
        </div>
    </div>
    <footer class="card-footer text-right">
        <button class="btn btn-dark">Submit </button>
        <button type="reset" class="btn btn-default">Reset</button>
    </footer>
</section>
