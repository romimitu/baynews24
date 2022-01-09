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
		                <a href="/{{$post->category->id}}/{{$post->category->name}}">{{$post->category->name}}</a>
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
								<figure class="figure text-center">
									@if($post->image)
		                            <img class="lazy figure-img img-fluid rounded" src="/{{$post->image}}" alt="{{$post->title}}" />
		                            @else
		                            <img class="lazy figure-img img-fluid rounded" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
		                            @endif
	 								 <figcaption class="figure-caption">{{ $post->caption }}</figcaption>
								</figure>
		                        <div class="advertise-image">
		                            @foreach($adSix as $ad)
		                            <a href="{{$ad->link}}"><img src="/{{$ad->image}}" class="img-responsive"></a>
		                            @endforeach
		                        </div>
				                <div class="report-content fr-view">
				                	<strong>{{ $post->reporter }}</strong>
				                    {!! $post->description !!}
				                </div>
				                
		                        <div class="advertise-image">
		                            @foreach($adSeven as $ad)
		                            <a href="{{$ad->link}}"><img src="/{{$ad->image}}" class="img-responsive"></a>
		                            @endforeach
		                        </div>
				            </div>
				        </div>
				    </div>
				</div>

				<div class="article-cotittle">
					<ul>
						<li><i class="fa fa-tags" aria-hidden="true"></i></li>
						@foreach($post->tag as $key=>$tagname)
						<li><a href="/{{$tagname->tags->id}}/tag/{{$tagname->tags->name}}">{{$tagname->tags->name}}</a></li>
						@endforeach
					</ul>
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

<meta name="robots" content="index,follow" />
<meta property="og:site_name" content="baynews24.com" />
<link rel="canonical" href="https://www.baynews24.com/news/{{$post->id}}/{{make_slug($post->title)}}" />
<meta name="robots" content="max-image-preview:large">

<meta name="keywords" content="Bangaldesh News, Bangla News, Bangla News Online, Online Bangla News, Bangladeshi News, Bangladeshi News Online, Bengali News, Bengali Online News, Dhaka Bangladesh News, Breaking News, World News, BD News">

<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "NewsArticle",
		"url" : "https://www.baynews24.com/news/{{$post->id}}/{{make_slug($post->title)}}",
		"mainEntityOfPage":{
			"@type":"WebPage",
			"name" : "{{ $post->title }}",
			"@id":"https://www.baynews24.com/news/{{$post->id}}/{{make_slug($post->title)}}"
		},
		"headline": "{{ $post->title }}",
		"image": {
			"@type": "ImageObject",
			"url": "https://baynews24.com/{{ $post->image }}"
		},
		"datePublished": "{{ $post->created_at }}",
		"dateModified": "{{ $post->updated_at }}",
		"author": {
			"@type": "Person",
			"url": "https://www.baynews24.com",
			"name": "বেনিউজ২৪"
		},
		"publisher": {
			"@type": "Organization",
			"name": "baynews24.com",
			"logo": {
				"@type": "ImageObject",
				"url": "https://baynews24.com/frontend/img/logo.png"
			}
		}
	}
</script>
<script type="application/ld+json">
	{
		"@context":"http://schema.org",
		"@type":"BreadcrumbList",
		"itemListElement":[
			{
				"@type":"ListItem",
				"position":1,
				"item":{
					"@id":"https://www.baynews24.com/",
					"name":"Home"
				}
			},
			{
				"@type":"ListItem",
				"position":2,
				"item":{
					"@id":"https://www.baynews24.com/{{$post->category->id}}/{{$post->category->name}}",
					"name":"{{$post->category->name}}"
				}
			},
			{
				"@type":"ListItem",
				"position":3,
				"item":{
					"name" : "{{ $post->title }}",
					"@id":"https://www.baynews24.com/news/{{$post->id}}/{{make_slug($post->title)}}"
				}
			}
		]
	}
</script>
@endsection