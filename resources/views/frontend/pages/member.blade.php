@extends('frontend.master.layout')

@section('content')

<section class="reports-area">
    <div class="container">
		<div class="row">
			@foreach($data as $member)
			<div class="col-md-3">
	            <div class="card p-3 py-4 mt-5 mb-5">
	                <div class="text-center"> <img src="/{{$member->image}}" width="180" class="rounded-circle">
	                    <h3 class="mt-2">{{$member->name}}</h3> <span class="mt-1 clearfix">{{$member->designation}}</span> <small class="mt-4">{{$member->details}}</small>
	                    <div class="social-buttons mt-5"> 
	                    	<button class="neo-button"><a href="call:{{$member->mobile}}"><i class="fa fa-phone fa-1x"></i></a> </button> 
	                    	<button class="neo-button"><a href="mailto:{{$member->email}}"><i class="fa fa-envelope fa-1x"></a></i></button> 
	                    </div>
	                </div>
	            </div>
			</div>
			@endforeach
		</div>
	</div>
</div>

@endsection