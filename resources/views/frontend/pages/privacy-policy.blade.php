@extends('frontend.master.layout')

@section('content')

<section class="reports-area">
    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="report-left report-mainhead">
				    <h1>গোপনীয়তার নীতি</h1>
				    <div class="row">
				        <div class="col-sm-12">
			                <div class="report-content">
			                    {!!$abouts[0]->privacy_policy!!}
			                </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection