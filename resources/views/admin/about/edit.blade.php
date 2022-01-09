@extends('admin.master.layout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Us</h3>
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
                        <div class="row">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {!! Form::open(['url' => ['/abouts', $about->id], 'method' =>'PATCH', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                            <div class="form-body">
                                <div class="form-group">
                                    {!! Form::label('address', 'Address', ['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('address',isset($about->address) ? $about->address : null,['class'=> 'form-control']) !!}
                                    </div>
                                    {!! Form::label('mobile', 'Mobile No', ['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('mobile',isset($about->mobile) ? $about->mobile : null,['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Email', ['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('email',isset($about->email) ? $about->email : null,['class'=> 'form-control']) !!}
                                    </div>
                                    {!! Form::label('youtube', 'Youtube', ['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('youtube',isset($about->youtube) ? $about->youtube : null,['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('facebook', 'Facebook', ['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('facebook',isset($about->facebook) ? $about->facebook : null,['class'=> 'form-control']) !!}
                                    </div>
                                    {!! Form::label('twitter', 'Twitter', ['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('twitter',isset($about->twitter) ? $about->twitter : null,['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('instagram', 'Instagram', ['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('instagram',isset($about->instagram) ? $about->instagram : null,['class'=> 'form-control']) !!}
                                    </div>
                                    {!! Form::label('map', 'Google Map', ['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('map',isset($about->map) ? $about->map : null,['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('about', 'About Details', ['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {!! Form::textarea('about',isset($about->about) ? $about->about : null,['class'=> 'form-control details','size' => '50x5']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('mission_vision', 'Mission/Vision', ['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {!! Form::textarea('mission_vision',isset($about->mission_vision) ? $about->mission_vision : null,['class'=> 'form-control details','size' => '50x5']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('comment_policy', 'Comment Policy', ['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {!! Form::textarea('comment_policy',isset($about->comment_policy) ? $about->comment_policy : null,['class'=> 'form-control details','size' => '50x5']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('privacy_policy', 'Privacy Policy', ['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {!! Form::textarea('privacy_policy',isset($about->privacy_policy) ? $about->privacy_policy : null,['class'=> 'form-control details','size' => '50x5']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        {!! Form::submit('Submit ', ['class'=> 'btn btn-success']) !!}
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

