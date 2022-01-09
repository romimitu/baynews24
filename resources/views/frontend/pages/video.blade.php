@extends('frontend.master.layout')

@section('content')

<section class="reports-area">
    <div class="container">
		<div class="breadcrumb-area">
		    <nav aria-label="breadcrumb">
		        <ol class="breadcrumb">
		            <li class="breadcrumb-item">
		                <a href="/">হোম</a>
		            </li>
		            <li class="breadcrumb-item active">
		                ভিডিও
		            </li>
		        </ol>
		    </nav>
		</div>
		<div class="row">
			<div class="col-md-8">
			    <div class="listing-page-news listing-page-info">
			        <div class="row">
			        	@foreach($data as $post)
			            <div class="col-sm-4">
			                <div class="top-news">
			                    <a href="/video-gallery/{{$post->id}}/{{make_slug($post->title)}}">
	                                <img loading="lazy" class="lazy" src="https://i3.ytimg.com/vi/{{$post->youtube_id}}/0.jpg" alt="{{$post->title}}" />
			                    </a>
			                    <div class="top-news-cont list-para">
			                        <a href="/video-gallery/{{$post->id}}/{{make_slug($post->title)}}">
			                            <h4 class="news-title">
			                                {!! $post->title !!}
			                            </h4>
			                        </a>
			                        <div class="listing-time">
			                            <h4>{!! Bengali::bn_date_time($post->created_at->format('l, M d, Y')) !!} </h4>
			                        </div>
			                    </div>
			                </div>
			            </div>
			            @endforeach
			        </div>
			    </div>
			    <div class="page-pagination-area text-center">
			        <div class="pagination">
			        	{{ $data->links() }}
			        </div>
			    </div>
			</div>
	        <div class="col-md-4">
	        @include('frontend.master.latest')

	        @include('frontend.master.mostview')
	        </div>
		</div>
	</div>
</section>
@endsection