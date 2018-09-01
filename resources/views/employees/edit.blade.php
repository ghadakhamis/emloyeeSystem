<div class="card">
    <h5 class="card-header">Edit Employee Information</h5>
    <div class="card-body">
        <form method="post" action="/employees/{{$employee->id}}">
            {{csrf_field()}}  
            {{method_field('PUT')}}
            <div class="form-group row">
                <label for="fullName" class="col-md-2 col-form-label text-md-right">{{ __('Full Name') }}</label>
                <div class="col-md-6">
                    <input id="fullName" type="text" name="fullName" class="form-control{{ $errors->has('fullName') ? ' is-invalid' : '' }}" required value="{{$employee->fullName}}"/>
                    @if ($errors->has('fullName'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('fullName') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$employee->email}}"/>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="skills" class="col-md-2 col-form-label text-md-right">{{ __('Skills') }}</label>
                <div class="col-md-6">
                    <select class="form-control{{ $errors->has('skills') ? ' is-invalid' : '' }}" name="skills[]" multiple value="{{$employee->skills}}">
                        @foreach($skills as $skill )
                            <option value="{{ $skill->id }}" {{in_array($skill->id,$skillsId)? 'selected' : '' }} >{{ $skill->name }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('skills'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('skills') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                         {{ __('Edit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>    