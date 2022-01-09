@extends('frontend.master.layout')

@section('content')

<section class="reports-area">
    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="report-left report-mainhead">
				    <h1>আমাদের সম্পর্কে</h1>
				    <div class="row">
				        <div class="col-sm-12">
			                <div class="report-content">
			                    {!!$abouts[0]->about!!}
			                </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection