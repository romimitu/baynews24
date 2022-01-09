@extends('admin.master.layout')

@section('content')
    <section class="content-header">
      <h1>Album Setup</h1>
    </section>
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
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th class="col-sm-1">Sl</th>
                                        <th class="col-sm-5">title</th>
                                        <th class="col-sm-2">Cover Photo</th>
                                        <th class="col-sm-1">Status</th>
                                        <th class="col-sm-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="MainCatbody">
                                    @foreach($albums as $index => $album)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$album->title}}</td>
                                        <td><img src="/{{$album->cover_image}}" width="200"></td>
                                        <td>{{$album->status}}</td>
                                        <td>
                                            {!! Form::open([ 'method' => 'Delete', 'url' => ['/albums', $album->id]]) !!}
                                            @can('album-edit')
                                            <a href="/albums/{{$album->id}}"><i class="fa fa-eye btn-primary btn btn-sm"></i></a>
                                            <a href="javascript:;"><i class="fa fa-edit btn-primary btn btn-sm" onclick="editModal({{$album->id}})"></i></a>
                                            @endcan
                                            @can('album-delete')
                                            {!! Form::submit('X',['class'=>'btn-danger btn btn-sm']) !!}
                                            @endcan
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                <?php echo $albums->render(); ?>
                            </div>
                        </div>
                    </div>
                    @can('album-create')
                    <div class="box-footer clearfix">
                        <a href="javascript:;" class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#addModal">Add New</a>
                    </div>
                    @endcan
                    <!-- Modal -->
                    <div class="modal fade" id="addModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Album</h5>
                                </div>
                                {!! Form::open(['url' => '/albums', 'method' =>'post', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Title</label>
                                        <div class="col-sm-8">
                                        {!! Form::text('title', null, ['class'=> 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Cover Photo</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="cover_image"  />
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
                    <div class="modal fade" id="editModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Album</h5>
                                </div>
                                {!! Form::open(['url' => '', 'method' =>'PATCH', 'id'=>'editForm', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Title</label>
                                        <div class="col-sm-8">
                                        {!! Form::text('title', null, ['class'=> 'form-control txtTitle']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Cover Photo</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="cover_image"  />
                                            <img class="imageThumb" src=""><br>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-8">
                                        {!! Form::select('status', ['1' => 'Valid', '2' => 'Invalid'], null, ['class'=> 'form-control txtStatus']) !!}
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
@section('script')
<script>
    function editModal(param){
        $('#editModal').modal('show');
        $("#editForm").prop('action', '/showAlbum?id='+param)
        var url = "/showAlbum?id=";
        $.get(url + '' + param, function (data) {
            $('.txtTitle').val(data[0].title);
            $('.txtStatus').val(data[0].status);
            $('.imageThumb').prop('src', data[0].cover_image);
        }) 
    }
</script>
@endsection

