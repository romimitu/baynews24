@extends('admin.master.layout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Managing Committee</h3>
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
                                        <th class="col-sm-4">Name</th>
                                        <th class="col-sm-2">Mobile</th>
                                        <th class="col-sm-2">Email</th>
                                        <th class="col-sm-2">Image</th>
                                        <th class="col-sm-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="MainCatbody">
                                    @foreach($data as $index => $post)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$post->name}}</td>
                                        <td>{{$post->mobile}}</td>
                                        <td>{{$post->email}}</td>
                                        <td><img src="/{{$post->image}}" width="80px"></td>
                                        <td class="action">
                                            @can('post-edit')
                                            <a href="{{ url('/members/'.$post->id.'/edit') }}"><i class="fa fa-edit btn-primary btn btn-sm"></i></a>
                                            @endcan
                                            @can('post-delete')
                                            {!! Form::open([ 'id'=>'delete', 'method' => 'Delete', 'url' => ['/members', $post->id]]) !!}
                                            <a href="javascript:$('#delete').submit();"><i class="fa fa-trash btn-danger btn btn-sm"></i></a>
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
                        <a href="/members/create" class="btn btn-sm btn-warning pull-right">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

