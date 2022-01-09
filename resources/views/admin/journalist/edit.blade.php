@extends('admin.master.layout')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/{{$data->image}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$data->name_en}}</h3>
              <h3 class="profile-username text-center">{{$data->name_bn}}</h3>

              <p class="text-muted text-center">{{$data->designation}}</p>
              <p class="text-muted text-center">Blood Group: {{$data->blood_group}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Mobile:</b> <a class="pull-right">{{$data->mobile}}</a>
                </li>
                <li class="list-group-item">
                  <b>Phone(Home):</b> <a class="pull-right">{{$data->phone}}</a>
                </li>
                <li class="list-group-item">
                  <b>Email:</b> <a class="pull-right">{{$data->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Facebook:</b> <a class="pull-right">{{$data->facebook}}</a>
                </li>
                <li class="list-group-item">
                  <b>District:</b> <a class="pull-right">{{$data->district}}</a>
                </li>
              </ul>

              <a href="/{{$data->cv}}" target="_blank" class="btn btn-primary btn-block"><b>CV Download</b></a>
              <a href="{{route('print-id', $data->id)}}" target="_blank" class="btn btn-success btn-block">ID Card Print</a>
            </div>
          </div>
        </div>
        <div class="col-md-9">
            
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <div class="box-body">
              <strong><i class="fa fa-info margin-r-5"></i> Basic Info</strong>

              <div class="row">
                  <p class="text-muted col-md-3">
                    <b>Father Name: </b>{{$data->father}}
                  </p>
                  <p class="text-muted col-md-3">
                    <b>Mother Name: </b>{{$data->mother}}
                  </p>
                  <p class="text-muted col-md-3">
                    <b>Date Of Birth: </b>{{$data->birthyear}}-{{$data->birthmonth}}-{{$data->birthdate}}
                  </p>
                  <p class="text-muted col-md-3">
                    <b>NID No: </b>{{$data->nid}}
                  </p>
              </div>
              <hr>
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                {{$data->education}}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><b>Present Address:</b> {{$data->present_address}}</p>
              <p class="text-muted"><b>Parmanent Address:</b> {{$data->permanent_address}}</p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Experience</strong>

              <p>{{$data->prev_experience}}</p>
            </div>
          </div>
        </div>
      </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Institute Info</h3>
                </div>
                <div class="box-body">                    
                    {!! Form::open(['url' => ['/journalists', $data->id], 'method' =>'PATCH', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Institute Name</label>
                            <div class="col-sm-4">
                                {!! Form::text('institute',isset($data->institute) ? $data->institute : null, ['class'=> 'form-control']) !!}
                            </div>
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-4">
                                {!! Form::text('jobaddress',isset($data->jobaddress) ? $data->jobaddress : null, ['class'=> 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-2">
                                {!! Form::text('jobphone',isset($data->jobphone) ? $data->jobphone : null, ['class'=> 'form-control']) !!}
                            </div>
                            <label class="col-sm-2 control-label">Fax</label>
                            <div class="col-sm-2">
                                {!! Form::text('jobfax',isset($data->jobfax) ? $data->jobfax : null, ['class'=> 'form-control']) !!}
                            </div>
                            <label class="col-sm-2 control-label">Website</label>
                            <div class="col-sm-2">
                                {!! Form::text('jobweb',isset($data->jobweb) ? $data->jobweb : null, ['class'=> 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Join date</label>
                            <div class="col-sm-2">
                                {!! Form::text('joindate',isset($data->joindate) ? $data->joindate : null, ['class'=> 'form-control datepicker']) !!}
                            </div>
                            <label class="col-sm-2 control-label">Join District</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="jobdistrict" onchange="getupozila()" id="txtdistrict">
                                    <option value="">Select</option>
                                    @foreach($districts as $item)
                                    <option value="{{$item->id}}" {{$data->jobdistrict == $item->id  ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">Join Upozila</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="jobthana" id="txtupozila">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Designation</label>
                            <div class="col-sm-2">
                                {!! Form::text('designation',isset($data->designation) ? $data->designation : null, ['class'=> 'form-control']) !!}
                            </div>
                            <label class="col-sm-2 control-label">Job Type</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="jobtype" required>
                                    <option value="স্থায়ী" {{ $data->jobtype == 'স্থায়ী' ? 'selected' : '' }}>স্থায়ী</option>
                                    <option value="অস্থায়ী" {{ $data->jobtype == 'অস্থায়ী' ? 'selected' : '' }}>অস্থায়ী</option>
                                    <option value="ফ্রীল্যান্স" {{ $data->jobtype == 'ফ্রীল্যান্স' ? 'selected' : '' }}>ফ্রীল্যান্স</option>
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">Confirmation</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="status" required>
                                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Confirm</option>
                                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Not Confirm</option>
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
</section>
@endsection

@section('script')
<script>

    function getupozila() {
        $('#txtupozila').empty();
        $.ajax({
            type: "GET",
            url: '/getupozila',
            dataType: "Json",
            data: { 
                "_token": "{{ csrf_token() }}",
                'district': $("#txtdistrict").val(),
            },
            success: function (data) {
                $('#txtupozila').html('<option value=0>select</option>');
                $.each(data, function(key, item) {
                    var rows = "<option value=" + item.id + ">" + item.name + "</option>";
                    $('#txtupozila').append(rows);
                });
            }
        });
        $('#txtupozila').val({{$data->jobthana}});
    }

    $(document).ready(function() {
        getupozila();
    });
</script>
@endsection


                        

