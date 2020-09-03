<div class="col-lg-8">
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#metaDetails" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="metaDetails">
            <h6 class="m-0 font-weight-bold text-primary">Meta Information</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="metaDetails">
            <div class="card-body">

                <div class="form-group">
                    {!! Form::label('meta_title', 'Meta Title') !!}
                    {!! Form::text('meta_title', old('meta_title') ?? $model->meta->title ?? Null, ['class' => 'form-control' . ( $errors->has('meta_title') ? ' is-invalid' : '' ), 'placeholder' => 'Meta Title', 'required']) !!}
                    @error('meta_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('meta_keywords', 'Meta Keywords') !!}
                    {!! Form::text('meta_keywords', old('meta_keywords') ?? $model->meta->keywords ?? Null, ['class' => 'form-control' . ( $errors->has('meta_keywords') ? ' is-invalid' : '' ), 'placeholder' => 'Meta Keywords', 'required']) !!}
                    @error('meta_keywords')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('meta_description', 'Meta Description') !!}
                    {!! Form::textarea('meta_description', old('meta_description') ?? $model->meta->description ?? Null, ['class' => 'form-control' . ( $errors->has('meta_description') ? ' is-invalid' : '' ), 'placeholder' => 'Short Description', 'required']) !!}
                    @error('meta_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
