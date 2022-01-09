@extends('admin.master.layout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Member</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        @if (Session::has('message'))
                            <div class="text-center alert-danger">{{ Session::get('message') }}</div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="table-responsive">
                            {!! Form::open(['url' => ['/members', $post->id], 'method' =>'PATCH', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        {!! Form::text('name',isset($post->name) ? $post->name : null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Designation</label>
                                    <div class="col-sm-2">
                                        {!! Form::text('designation',isset($post->designation) ? $post->designation : null, ['class'=> 'form-control']) !!}
                                    </div>
                                    <label class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-2">
                                        {!! Form::text('mobile',isset($post->mobile) ? $post->mobile : null, ['class'=> 'form-control']) !!}
                                    </div>
                                    <label class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-2">
                                        {!! Form::email('email',isset($post->email) ? $post->email : null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        {!! Form::textarea('details', isset($post->details) ? $post->details : null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Image</label>
                                    <div class="field col-sm-3" align="left">
                                        <input type="file" name="image"  />
                                        <img class="imageThumb" src="/{{$post->image}}"><br>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                {!! Form::submit('Submit ', ['class'=> 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

