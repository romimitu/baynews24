@extends('admin.master.layout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Advertisement</h3>
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
                                        <th class="col-sm-3">Ad Type</th>
                                        <th class="col-sm-3">Title</th>
                                        <th class="col-sm-3">Link</th>
                                        <th class="col-sm-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="MainCatbody">
                                    @foreach($data as $index => $ad)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$ad->adtype->name}}</td>
                                        <td>{{$ad->title}}</td>
                                        <td>{{$ad->link}}</td>
                                        <td class="action">
                                            <a href="{{ url('/advertises/'.$ad->id.'/edit') }}"><i class="fa fa-edit btn-primary btn btn-sm"></i></a>

                                            {!! Form::open([ 'id'=>'delete', 'method' => 'Delete', 'url' => ['/advertises', $ad->id]]) !!}
                                            <a href="javascript:$('#delete').submit();"><i class="fa fa-trash btn-danger btn btn-sm"></i></a>
                                            {!! Form::close() !!}
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
                        <a href="/advertises/create" class="btn btn-sm btn-warning pull-right">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

