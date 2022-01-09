@extends('admin.master.layout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Ad</h3>
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
                            {!! Form::open(['url' => ['/advertises', $ad->id], 'method' =>'PATCH', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Ad Type</label>
                                    <div class="col-sm-10">
                                        <select name="add_type_id" class="form-control">
                                            <option value="0">-- Select --</option>
                                            @foreach($adtype as $item)
                                            <option value="{{$item->id}}" {{$ad->add_type_id == $item->id  ? 'selected' : ''}}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-4">
                                        {!! Form::text('title',isset($ad->title) ? $ad->title : null, ['class'=> 'form-control']) !!}
                                    </div>
                                    <label class="col-sm-2 control-label">link</label>
                                    <div class="col-sm-4">
                                        {!! Form::text('link',isset($ad->link) ? $ad->link : null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Image</label>
                                    <div class="field col-sm-4" align="left">
                                        <input type="file" name="image"  />
                                        <img class="imageThumb" src="/{{$ad->image}}"><br>
                                    </div>

                                    <label class="col-sm-2 control-label">Status</label>
                                    <div class="field col-sm-4" align="left">
                                        <select name="status" class="form-control">
                                            <option value="1" {{ $ad->status == 1 ? 'selected' : '' }}>Publish</option>
                                            <option value="0" {{ $ad->status == 0 ? 'selected' : '' }}>Hide</option>
                                        </select>
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
