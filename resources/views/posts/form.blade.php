<div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-body">

            <div class="form-group">
                {!! Form::label('name', 'Post Title') !!}
                {!! Form::text('name', old('name') ?? $model->name , ['class' => 'form-control model-name' . ( $errors->has('name') ? ' is-invalid' : '' ), 'placeholder' => 'Post Title', 'required']) !!}
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Post Description') !!}
                <fieldset>
                    <textarea name="description" id="description" hidden>{!! old('description') ?? $model->description !!}</textarea>
                </fieldset>
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
            <h4 class="card-title">Details</h4>

            <div class="form-group">
                {!! Form::label('image', 'Post Image') !!}
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

            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('status', 'Status') !!}
                        {!! Form::select('status', $status, old('status') ?? $model->status, ['class' => 'form-control']) !!}
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('commentable', 'Comment') !!}
                        {!! Form::select('commentable', $comment_status, old('commentable') ?? $model->commentable, ['class' => 'form-control']) !!}
                        @error('commentable')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('categories', 'Post Category') !!}
                {!! Form::select('categories[]', $categories, old('categories') ?? $model->categories, ['class' => 'form-control selectpicker', 'multiple']) !!}
                @error('categories')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                {!! Form::label('excerpt', 'Post Excerpt') !!}
                {!! Form::textarea('excerpt', old('excerpt') ?? $model->excerpt, ['class' => 'form-control' . ( $errors->has('excerpt') ? ' is-invalid' : '' ), 'placeholder' => 'Short Description', 'required']) !!}
                @error('excerpt')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </div>
</div>


{{--including the meta--}}
@include("ADMIN.components.form._meta")




