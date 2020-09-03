<div class="col-lg-8">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('name', 'Category Name') !!}
                        {!! Form::text('name', old('name') ?? $model->name , ['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' ), 'placeholder' => 'Category Name', 'required']) !!}
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('parent_id', 'Parent Category') !!}
                        {!! Form::select('parent_id', $parent_categories, old('parent_id') ?? $model->parent_id, ['class' => 'form-control', 'placeholder' => 'Select a Parent Category']) !!}
                        @error('parent_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Category Description') !!}
                {!! Form::textarea('description', old('description') ?? $model->description, ['class' => 'form-control textarea-description' . ( $errors->has('description') ? ' is-invalid' : '' ), 'placeholder' => 'Short Description']) !!}
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'form-control btn btn-success']) !!}
            </div>

        </div>
    </div>
</div>

<div class="col-lg-4">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h4 class="card-title">Image</h4>

            <div class="form-group">
                {!! Form::label('image', 'Category Image') !!}
                <img style="margin-top:15px;max-height:200px;" src="{{ $model->image->url ?? '' }}">
                <div id="holder"></div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white" style="padding: 0.7rem;">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                    </div>
                    <input id="thumbnail" class="form-control" type="text" name="filepath">
                </div>
            </div>

        </div>
    </div>
</div>


{{--including the meta--}}
@include("cms::components.form._meta")

