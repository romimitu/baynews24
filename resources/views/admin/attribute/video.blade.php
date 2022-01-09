@extends('admin.master.layout')

@section('content')
    <section class="content-header">
      <h1>Video Gallery</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Video</h3>
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
                                        <th class="col-sm-3">Title</th>
                                        <th class="col-sm-2">Video</th>
                                        <th class="col-sm-1">Status</th>
                                        <th class="col-sm-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="MainCatbody">
                                    @foreach($videos as $index => $video)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$video->title}}</td>
                                        <td>
                                            <iframe width="auto" height="auto" src="https://www.youtube.com/embed/{{ $video->youtube_id }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></td>
                                        <td>{{$video->status}}</td>
                                        <td>
                                            {!! Form::open([ 'method' => 'Delete', 'url' => ['/videos', $video->id]]) !!}
                                            @can('video-edit')
                                            <a href="javascript:;"><i class="fa fa-edit btn-primary btn btn-sm" onclick="editModal({{$video->id}})"></i></a>
                                            @endcan
                                            @can('video-delete')
                                            {!! Form::submit('Delete',['class'=>'btn-danger btn btn-sm']) !!}
                                            @endcan
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                <?php echo $videos->render(); ?>
                            </div>
                        </div>
                    </div>
                    @can('video-create')
                    <div class="box-footer clearfix">
                        <a href="javascript:;" class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#addModal">Add New</a>
                    </div>
                    @endcan
                    <!-- Modal -->
                    <div class="modal fade" id="addModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New video</h5>
                                </div>
                                {!! Form::open(['url' => '/videos', 'method' =>'post', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Title</label>
                                        <div class="col-sm-10">
                                        {!! Form::text('title', null, ['class'=> 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Youtube Id</label>
                                        <div class="col-sm-10">
                                        {!! Form::text('youtube_id', null, ['class'=> 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-10">
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
                                    <h5 class="modal-title">Edit video</h5>
                                </div>
                                {!! Form::open(['url' => '', 'method' =>'PATCH', 'id'=>'editForm', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Title</label>
                                        <div class="col-sm-10">
                                        {!! Form::text('title', null, ['class'=> 'form-control txtTitle']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Youtube Id</label>
                                        <div class="col-sm-10">
                                        {!! Form::text('youtube_id', null, ['class'=> 'form-control txtYoutubeId']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Description</label>
                                        <div class="col-sm-10">
                                        {!! Form::textarea('description', null, ['class'=>'form-control txtDescription']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-10">
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
        $("#editForm").prop('action', '/videos/'+param)
        var url = "/videos";
        $.get(url + '/' + param, function (data) {
            $('.txtTitle').val(data.title);
            $('.txtStatus').val(data.status);
            $('.txtYoutubeId').val(data.youtube_id);
            $('.txtDescription').parent('div').find('.note-editable').html(data.description);
        }) 
    }
</script>
@endsection

