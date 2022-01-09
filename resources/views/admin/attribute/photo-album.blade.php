@extends('admin.master.layout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Photo Album</h3>
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
                        <h4>Title: {{$album->title}}</h4>
                        <div class="row">
                            @foreach($album->photo as $photo)
                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail">
                                    <img src="/{{$photo->image}}" alt="{{$photo->title}}">
                                    <div class="caption">
                                        <p>{{$photo->title}}</p>
                                    </div>                                    
                                    {!! Form::open([ 'method' => 'Delete', 'url' => ['/photos', $photo->id]]) !!}
                                    {!! Form::submit('X',['class'=>'btn-danger btn btn-sm']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @can('album-create')
                    <div class="box-footer clearfix">
                        <a href="javascript:;" class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#addModal">Add New Photo</a>
                    </div>
                    @endcan
                    <!-- Modal -->
                    <div class="modal fade" id="addModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Photo</h5>
                                </div>
                                {!! Form::open(['url' => '/photos', 'method' =>'post', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Title</label>
                                        <div class="col-sm-8">
                                        {!! Form::text('title', null, ['class'=> 'form-control']) !!}                                        
                                        <input name="album_id" type="text" class="none" value="{{$album->id}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Photo</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="image"  />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-8">
                                        {!! Form::select('status', ['1' => 'Valid', '2' => 'Invalid'],null, ['class'=> 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                                    {!! Form::submit('Submit ', ['class'=> 'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

