@extends('admin.master.layout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Post</h3>
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
                                        <th class="">Sl</th>
                                        <th class="col-sm-1">Category</th>
                                        <th class="col-sm-1">SubCategory</th>
                                        <th class="col-sm-4">Title</th>
                                        <th class="col-sm-1">status</th>
                                        <th class="col-sm-2">Time</th>
                                        <th class="col-sm-1">Approved</th>
                                        <th class="col-sm-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="MainCatbody">
                                    @foreach($data as $index => $post)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$post->category->name}}</td>
                                        <td>{{$post->subCategory->name}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>
                                            <span class="label label-info">Lead SL: {{$post->featured_sl}}</span>
                                            <span class="label label-success">Topnews SL: {{$post->top_sl}}</span>
                                        </td>
                                        <td>{{$post->created_at}}</td>
                                        <td>
                                            @role('admin')
                                            {!! Form::open([ 'class'=>'approved', 'method' => 'post', 'url' => ['/post-approved', $post->id]]) !!}
                                                <input value="1" onchange="javascript:$(this).closest('form.approved').submit();" type="checkbox" name="approved" {{  ($post->approved == 1 ? ' checked' : '') }} />
                                            @else
                                            <input type="checkbox" name="approved" value="1" {{  ($post->approved == 1 ? ' checked' : '') }} disabled />
                                            @endrole

                                            {!! Form::close() !!}
                                        </td>
                                        <td class="action">
                                            <a target="_blank" href="news/{{$post->id}}/{{make_slug($post->title)}}"><i class="fa fa-eye btn-info btn btn-sm"></i></a>
                                            @can('post-edit')
                                            <a href="{{ url('/posts/'.$post->id.'/edit') }}"><i class="fa fa-edit btn-primary btn btn-sm"></i></a>
                                            @endcan
                                            @can('post-delete')
                                            {!! Form::open([ 'id'=>'delete', 'method' => 'Delete', 'url' => ['/posts', $post->id]]) !!}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-sm', 'role' => 'button', 'type' => 'submit']) }}
                                            {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                <?php echo $data->render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="/posts/create" class="btn btn-sm btn-warning pull-right">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

