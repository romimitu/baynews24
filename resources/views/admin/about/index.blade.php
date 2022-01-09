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
                        <div class="table-responsive">
                            @foreach($abouts as $about)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="col-md-2">Title</th>
                                        <th colspan="3">Content</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <tr>
                                        <td>About (About Page)</td>
                                        <td colspan="3">{{ str_limit(strip_tags($about->about), 100) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Our Mission/Vision</td>
                                        <td colspan="3">{{ str_limit(strip_tags($about->mission_vision), 100) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Comment Policy</td>
                                        <td colspan="3">{{ str_limit(strip_tags($about->comment_policy), 100) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Privacy Policy</td>
                                        <td colspan="3">{{ str_limit(strip_tags($about->privacy_policy), 100) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{ $about->address }}</td>
                                        <td>Mobile No. </td>
                                        <td>{{ $about->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $about->email }}</td>
                                        <td>Youtube</td>
                                        <td>{{ $about->youtube }}</td>
                                    </tr>
                                    <tr>
                                        <td>Facebook UserName</td>
                                        <td>{{ $about->facebook }}</td>
                                        <td>Twitter UserName</td>
                                        <td>{{ $about->twitter }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <a href="{{ url('/abouts/'.$about->id.'/edit') }}" class="btn btn-info btn-sm">Edit About</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

