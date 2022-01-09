@extends('frontend.master.layout')

@section('content')

<section class="reports-area">
    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="report-left report-mainhead">
				    <div class="contact_us">
				    	<h3>যোগাযোগ</h3>
				    	<address>
				    		ঠিকানা: {!!$abouts[0]->address!!}
				    	</address>
				    	<div class="email">
				    		ইমেইল: <a href="mailto:{!!$abouts[0]->email!!}">{!!$abouts[0]->email!!}</a>
				    	</div>
				    	<div class="phone">
				    		মোবাইল: {!!$abouts[0]->mobile!!}
				    	</div>
				    </div>
				    <div>
				    	{!!$abouts[0]->map!!}
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection