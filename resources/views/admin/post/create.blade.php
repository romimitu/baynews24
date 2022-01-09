@extends('admin.master.layout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New News</h3>
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
                            {!! Form::open(['url' => '/posts', 'method' =>'post', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Category</label>
                                    <div class="col-sm-4">
                                        <select name="category_id" class="form-control" onchange="getSubCat()" id="txtCategory">
                                            <option value="0">-- Select --</option>
                                            @foreach($category as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">Sub Category</label>
                                    <div class="col-sm-4">
                                        <select name="sub_category_id" class="form-control" id="txtSubCategory">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Sub Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="subtitle">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tags</label>
                                    <div class="col-sm-8">
                                        <select name="tags[]" class="form-control select2" id="txtTag" multiple>
                                            @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2"><input type="button" class="btn btn-sm btn-info" value="Add" data-toggle="modal" data-target="#tag-modal" /></div>
                                    <div id="tag-modal" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="box">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">Tag Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="txtTagName" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <input type="button" class="btn btn-primary btn-sm save" value="Save" onclick="SaveTag()" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Image Caption</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="caption">
                                    </div>
                                    <label class="col-sm-2 control-label">Lead SlNo</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="featured_sl">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Reporter Name</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="reporter">
                                    </div>
                                    <label class="col-sm-2 control-label">Headline/Scoll</label>
                                    <div class="field col-sm-2" align="left">
                                        <select name="topnews" class="form-control">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">TopNews SlNo</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="top_sl">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Image</label>
                                    <div class="field col-sm-3" align="left">
                                      <input type="file" name="image"  />
                                    </div>
                                    <label class="col-sm-1 control-label">Status</label>
                                    <div class="field col-sm-2" align="left">
                                        <select name="status" class="form-control">
                                            <option value="1">Publish</option>
                                            <option value="0">Hide</option>
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

@section('script')
<script>
    $('.select2').select2();
    function getSubCat() {
        $('#txtSubCategory').empty();
        $.ajax({
            type: "GET",
            url: '/getsubcategory',
            dataType: "Json",
            data: { 
                "_token": "{{ csrf_token() }}",
                'category_id': $("#txtCategory").val(),
            },
            success: function (data) {
                $('#txtSubCategory').html('<option value="">select</option>');
                $.each(data, function(key, item) {
                    var rows = "<option value=" + item.id + ">" + item.name + "</option>";
                    $('#txtSubCategory').append(rows);
                });
            }
        });
    }
    function SaveTag() {
        $.ajax({
            type: "POST",
            url: '/savetag',
            dataType: "Json",
            data: { 
                "_token": "{{ csrf_token() }}",
                'name': $("#txtTagName").val(),
                'status': 1
            },
            success: function (data) {
                alert(JSON.stringify(data));
                $('#txtTag').append($('<option></option>').val(data.id).html(data.name).prop('selected', true)).trigger('change');
                $('#tag-modal').modal('hide');
                $("#txtTagName").val('');
            },
            error: function(xhr, status, error){
                alert("Error! " + xhr.responseText);
            },
        });
    }
</script>
@endsection

