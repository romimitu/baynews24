@extends('frontend.master.layout')

@section('content')

<section class="reports-area">
    <div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="contact_us">
				    <h3>অভিযোগ ও মতামত</h3>
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
				    {!! Form::open(['url' => ['/complaints'], 'method' =>'post', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                    <div class="form-body">
                        <div class="form-group row">
                            {!! Form::label('name', 'পুর্নাঙ্গ নাম', ['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-md-10">
                                {!! Form::text('name', null,['class'=> 'form-control', 'required'=>'required']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('email', 'ইমেইল', ['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::email('email', null,['class'=> 'form-control', 'required'=>'required']) !!}
                            </div>
                            {!! Form::label('mobile', 'মোবাইল', ['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('mobile', null,['class'=> 'form-control', 'required'=>'required']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('details', 'অভিযোগ ও মতামত', ['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-md-10">
                                {!! Form::textarea('details', null,['class'=> 'form-control','size' => '50x5', 'required'=>'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="text-center">
                            {!! Form::submit('Submit ', ['class'=> 'btn btn-success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection