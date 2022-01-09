@extends('frontend.master.layout')
@section('og')
<meta property="title" content="Baynews24 বেনিউজ২৪ বাংলাদেশের Latest News" />
<meta name="description" content="Baynews24 is a newly started online Bangla news portal to provide latest stories in several sections including Bangladesh, International, Sports, Entertainment, Features, Opinion, Tech & more." />
<meta property="og:title" content="Baynews24: Bangla News Portal" />
<meta property="og:image" content="https://baynews24.com/frontend/img/og.jpg" />
<meta property="og:description" content="Baynews24 is a newly started online Bangla news portal to provide latest stories in several sections including Bangladesh, International, Sports, Entertainment, Features, Opinion, Tech & more." />
<meta property="og:type" content="article" />
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>
<meta property="fb:app_id" content="413550752361129"/>

<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="Baynews24: Bangla News Portal">
<meta name="twitter:description" content="Baynews24 is a newly started online Bangla news portal to provide latest stories in several sections including Bangladesh, International, Sports, Entertainment, Features, Opinion, Tech & more.">
<meta name="twitter:image:src" content="https://baynews24.com/frontend/img/og.jpg">
<meta name="twitter:image" content="https://baynews24.com/frontend/img/og.jpg">

<meta name="robots" content="index,follow">
<link rel="canonical" href="https://www.baynews24.com">
<meta name="keywords" content="Bangaldesh News, Bangla News, Bangla News Online, Online Bangla News, Bangladeshi News, Bangladeshi News Online, Bengali News, Bengali Online News, Dhaka Bangladesh News, Breaking News, World News, BD News">
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "url": "https://www.baynews24.com/",
        "logo": "https://baynews24.com/frontend/img/logo.png",
        "contactPoint" : [
            {
                "@type" : "ContactPoint",
                "telephone" : "+8801717610174",
                "email" : "info@baynews24.com",
                "contactType" : "customer service"
            }
        ],
        "sameAs" : [
            "https://www.facebook.com/baynews24",
            "https://twitter.com/Baynews24com",
            "https://www.youtube.com/channel/UCrhwsrGl8Hwe-NJfJy0oYfQ"
        ]
    }
</script>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "url": "https://www.baynews24.com/",
        "description": "baynews24 is a newly started online Bangla news portal to provide latest stories in several sections including Bangladesh, International, Sports, Entertainment, Features, Opinion, Tech & more.",
        "publisher": "baynews24: Bangla News Portal",
        "creator": [],
        "keywords": ["Bangaldesh News", "Bangla News", "Bangla News Online", "Online Bangla News", "Bangladeshi News", "Bangladeshi News Online", "Bengali News", "Bengali Online News", "Dhaka Bangladesh News", "Breaking News", "World News", "BD News"],
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://www.baynews24.com/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
</script>
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
		            <li class="breadcrumb-item active">
		                আর্কাইভস
		            </li>
		        </ol>
		    </nav>
		</div>
		<div class="row">
			<div class="col-md-8">
			    <div class="listing-page-news listing-page-info">
			        <div class="row">
				    <h1>তারিখঃ {{$date}}</h1>
			        	@foreach($posts as $post)
			            <div class="col-sm-4">
			                <div class="top-news">
			                    <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
	                            @if($post->image)
	                            <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
	                            @else
	                            <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
	                            @endif
			                    </a>
			                    <div class="top-news-cont list-para">
			                        <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
			                            <h4 class="news-title">
			                                {!! $post->title !!}
			                            </h4>
			                        </a>
			                        <div class="listing-time">
			                            <a href="/{{$post->category_id}}/{{$post->category->name}}">{{$post->category->name}}</a>
			                            <h4>{!! Bengali::bn_date_time($post->created_at->format('l, M d, Y')) !!} </h4>
			                        </div>
			                        <p>
			                        	{!! str_limit(strip_tags($post->description), 115) !!}
			                        </p>
			                    </div>
			                </div>
			            </div>
			            @endforeach
			            <div class="col-sm-12 advertisement-image advertisement-margin-0"></div>
			        </div>
			    </div>
			    <div class="page-pagination-area text-center">
			        <div class="pagination">
			        	{{ $posts->links() }}
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