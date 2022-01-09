@extends('admin.master.layout')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit News</h3>
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
                            {!! Form::open(['url' => ['/posts', $post->id], 'method' =>'PATCH', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Category</label>
                                    <div class="col-sm-4">
                                        <select name="category_id" class="form-control" onchange="getSubCat()" id="txtCategory">
                                            <option value="0">-- Select --</option>
                                            @foreach($category as $item)
                                            <option value="{{$item->id}}" {{$post->category_id == $item->id  ? 'selected' : ''}}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <input class="none" name="post_id" type="text" value="{{$post->id}}">
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
                                        {!! Form::text('title',isset($post->title) ? $post->title : null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Sub Title</label>
                                    <div class="col-sm-10">
                                        {!! Form::text('subtitle',isset($post->subtitle) ? $post->subtitle : null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        {!! Form::textarea('description', isset($post->description) ? $post->description : null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tags</label>
                                    <div class="col-sm-8">
                                        <select name="tags[]" class="form-control select2" id="txtTag" multiple>
                                            @foreach($tags as $tag)
                                            <option value="{{$tag->id}}" @if(in_array($tag->id, $tagsArray)) selected @endif>{{$tag->name}}</option>
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
                                        {!! Form::text('caption',isset($post->caption) ? $post->caption : null, ['class'=> 'form-control']) !!}
                                    </div>
                                    <label class="col-sm-2 control-label">Lead SlNo</label>
                                    <div class="col-sm-2">
                                        {!! Form::text('featured_sl',isset($post->featured_sl) ? $post->featured_sl : null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Reporter</label>
                                    <div class="col-sm-2">
                                        {!! Form::text('reporter',isset($post->reporter) ? $post->reporter : null, ['class'=> 'form-control']) !!}
                                    </div>
                                    <label class="col-sm-2 control-label">Headline/Scoll</label>
                                    <div class="field col-sm-2" align="left">
                                        <select name="topnews" class="form-control">
                                            <option value="0" {{ $post->topnews == 0 ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ $post->topnews == 1 ? 'selected' : '' }}>Yes</option>
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label">TopNews SlNo</label>
                                    <div class="col-sm-2">
                                        {!! Form::text('top_sl',isset($post->top_sl) ? $post->top_sl : null, ['class'=> 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Image</label>
                                    <div class="field col-sm-3" align="left">
                                        <input type="file" name="image"  />
                                        <img class="imageThumb" src="/{{$post->image}}"><br>
                                    </div>

                                    <label class="col-sm-1 control-label">Status</label>
                                    <div class="field col-sm-2" align="left">
                                        <select name="status" class="form-control">
                                            <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Publish</option>
                                            <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Hide</option>
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

    $(document).ready(function() {
        var rows = "<option value={{$post->subCategory->id}}>{{$post->subCategory->name}}</option>";
        $('#txtSubCategory').append(rows);
    });

    function deleteImage(param){
        $.ajax({
            type: 'DELETE',
            url: '/imagedelete',
            dataType: 'json',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {id:param,"_token": "{{ csrf_token() }}"},
            success: function (data) {
                $(".image-"+param).remove();
            },
            error: function (data) {
                alert(JSON.stringify(data));
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

