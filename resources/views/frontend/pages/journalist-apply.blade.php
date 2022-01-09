@extends('frontend.master.layout')

@section('content')
<style type="text/css">
    .birthdate {
      float: left;width: 33%;
    }
</style>
<section class="reports-area">
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="contact_us">
				    <h3>সাংবাদিকতার জন্য আবেদন</h3>
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
				    {!! Form::open(['url' => ['/journalist-apply-save'], 'method' =>'post', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">আবেদনের ধরন</label>
                            <div class="col-sm-10">
                              <label><input type="radio" name="jobtype" value="স্থায়ী"> স্থায়ী</label>
                              <label><input type="radio" name="jobtype" value="অস্থায়ী"> অস্থায়ী</label>
                              <label><input type="radio" name="jobtype" value="ফ্রীল্যান্স"> ফ্রীল্যান্স</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">নাম (বাংলা)</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name_bn" required>
                            </div>
                            <label class="col-sm-2 control-label">নাম (ইংরেজী বড় অক্ষরে)</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name_en" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">পিতার নাম</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="father" required>
                            </div>
                            <label class="col-sm-2 control-label">মাতার নাম</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="mother" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">মোবাইল</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="mobile" required>
                            </div>
                            <label class="col-sm-2 control-label">মোবাইল (বাসা)</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="phone" required>
                            </div>
                            <label class="col-sm-2 control-label">ইমেইল</label>
                            <div class="col-sm-2">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">ব্ল্যাড গ্রুপ</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="blood_group" required>
                                    <option value="">Select</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">ফেসবুক আইডি লিঙ্ক</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="facebook" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">জন্ম-তারিখ</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control birthdate" name="birthdate" placeholder="Day" required>
                                <input type="text" class="form-control birthdate" name="birthmonth" placeholder="Month" required>
                                <input type="text" class="form-control birthdate" name="birthyear" placeholder="Year" required>
                            </div>
                            <label class="col-sm-2 control-label">জেলা</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="district" required>
                                    <option value="">Select</option>
                                    @foreach($districts as $district)
                                    <option value="{{$district->name}}">{{$district->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">জাতীয় পরিচয়পত্র নম্বর</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="nid" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">শিক্ষাগত যোগ্যতা</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="education" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">পূর্ভ অভিজ্ঞতা</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="prev_experience" required></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">বর্তমান ঠিকানা</label>
                            <div class="col-sm-4">
                                <textarea type="text" class="form-control" name="present_address" required></textarea>
                            </div>
                            <label class="col-sm-2 control-label">স্থায়ী ঠিকানা</label>
                            <div class="col-sm-4">
                                <textarea type="text" class="form-control" name="permanent_address" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">ইমেজ (৩০০x৩০০)</label>
                            <div class="field col-sm-4" align="left">
                              <input type="file" name="image" required />
                            </div>
                            <label class="col-sm-2 control-label">সিভি (পিডিএফ)</label>
                            <div class="field col-sm-4" align="left">
                              <input type="file" name="cv" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="text-center">
                            {!! Form::submit('Submit ', ['class'=> 'btn btn-success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection