@extends('frontend.master.layout')

@section('title')
{{$post->title}} | 
@endsection

@section('content')

<section class="reports-area">
    <div class="container">
		<div class="breadcrumb-area">
		    <nav aria-label="breadcrumb">
		        <ol class="breadcrumb">
		            <li class="breadcrumb-item">
		                <a href="/">হোম</a>
		            </li>
		            <li class="breadcrumb-item">
		                <a href="/photo-gallery">ছবিঘর</a>
		            </li>
		        </ol>
		    </nav>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="report-left report-mainhead">
				    <h1>{{$post->title}}</h1>
				    <div class="detail-poauthor">
				        <ul>
				            <li>
				                <i class="fa fa-clipboard" aria-hidden="true"></i> প্রকাশিত {!! Bengali::bn_date_time($post->created_at->format('h:m A l, M d, Y')) !!}
				            </li>
				        </ul>
				    </div>
				    <div class="row">
				        <div class="col-sm-12">
				            <div class="reports-big-img details-reports-big-img">
								<figure class="figure text-center" style="display: block;margin: auto;width: 50%;">
                                @foreach($post->photo as $photo)
		                            <img class="lazy figure-img img-fluid rounded" src="/{{$photo->image}}" alt="{{$photo->title}}" />
	 								 <figcaption class="figure-caption">{{ $photo->title }}</figcaption>
                                @endforeach
								</figure>
				                <div class="report-content fr-view">
				                    {!! $post->description !!}
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
				
        <div class="footer-social-icon">
        	<h6>শেয়ার করুনঃ </h6>
            <ul>
<li><a href="https://www.facebook.com/sharer.php?u=https://baynews24.com/news/{{ $post->id }}/{{ make_slug($post->title) }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
<li><a href="https://twitter.com/intent/tweet?url=https://baynews24.com/news/{{ $post->id }}/{{ make_slug($post->title) }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
<li><a class="w-inline-block social-share-btn email" href="mailto:?subject=&body=:%20" target="_blank" title="Email" onclick="window.open('mailto:?subject={{ $post->title }}&body=' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-envelope"></i></a></li>
<li><a class="w-inline-block social-share-btn lnk" href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn" onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' + encodeURIComponent(document.title)); return false;"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
		<div class="comment-infoarea">
		    <div class="left-panel-title full-section-title">
		        <h2>মতামত দিন</h2>
		    </div>
		    <div class="comment-user">
		        <a href="/comment-policy"> পোস্ট করার আগে আমাদের মন্তব্য নীতি অনুগ্রহ করে পড়ুন </a>
		        <div id="fb-root"></div>
		        <div class="fb-comments" data-href="https://baynews24.com/news/{{ $post->id }}/{{ $post->title }}" data-width="100%" data-numposts="5"></div>
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
@section('script')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=413550752361129&autoLogAppEvents=1" nonce="KCKQW0rW"></script>
@endsection
@section('og')
<meta property="title" content="{{ $post->title }}" />
<meta name="description" content="{!! str_limit(strip_tags($post->description), 130) !!}" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:image" content="https://baynews24.com/{{ $post->image }}" />
<meta property="og:description" content="{!! str_limit(strip_tags($post->description), 130) !!}" />
<meta property="og:type" content="article" />
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>
<meta property="fb:app_id" content="413550752361129"/>

<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="{{ $post->title }}">
<meta name="twitter:description" content="{!! str_limit(strip_tags($post->description), 130) !!}">
<meta name="twitter:image:src" content="https://baynews24.com/{{ $post->image }}">
<meta name="twitter:image" content="https://baynews24.com/{{ $post->image }}">
@endsection