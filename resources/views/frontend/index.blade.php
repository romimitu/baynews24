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
                <div class="row">
                    <div class="col-md-8">
                        <div id="ad-home-top-banner-above-feature" class="advertisement-image mt-0"></div>
                        <div class="report-left">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">                                        
                                        <div class="col-sm-12">
                                            @foreach ($featuredpost['mainpost'] as $index => $post)
                                            <div class="first-news-area">
                                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                @if($post->image)
                                                <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                                @else
                                                <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                                @endif
                                                </a>
                                                <div class="report-title">
                                                    <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                        <h1>
                                                            {!! $post->title !!}
                                                        </h1>
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        @foreach ($featuredpost['subpost'] as $index => $subpost)
                                        <div class="col-sm-6">
                                            <div class="first-right-news-style">
                                                <a href="/news/{{$subpost->id}}/{{make_slug($subpost->title)}}">
                                                @if($subpost->image)
                                                <img loading="lazy" class="lazy" src="/{{$subpost->image}}" alt="{{$subpost->title}}" />
                                                @else
                                                <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$subpost->title}}" />
                                                @endif
                                                </a>
                                                <a href="/news/{{$subpost->id}}/{{make_slug($subpost->title)}}">
                                                    <div class="single-news-cont title-left-no-padding">
                                                        <h4>
                                                            {!! $subpost->title !!}
                                                        </h4>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="news-strem-area">
                                        <div class="left-panel-title">
                                            <h3>শীর্ষসংবাদ</h3>
                                        </div>
                                        <ul class="just_in_news">
                                            @foreach($featuredpost['topnews'] as $index => $post)
                                            <li>
                                                <div class="dt-strem-new">
                                                    <h2><a href="/news/{{$post->id}}/{{make_slug($post->title)}}">{!! $post->title !!}</a></h2>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="advertise-image">
                            @foreach($adOne as $ad)
                            <a href="{{$ad->link}}"><img src="/{{$ad->image}}" class="img-responsive"></a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="news-strem-area">
                            <div class="left-panel-title">
                                <h3>বে-নিউজ লাইভ</h3>
                            </div>                            
                            <div class="first-right-news-style">                                
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$videos[0]->youtube_id}}?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="left-panel-social-icon most-shared-area">
                                <ul>
                                    <li class="english-button"><a href="photo-gallery">ছবিঘর</a></li>
                                    <li class="english-button"><a href="/video-gallery">ভিডিও</a></li>
                                </ul>
                            </div>
                        </div>
                        @include('frontend.master.latest')
                    </div>
                </div>
            </div>
        </section>
        <section class="all-news-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="single-list-style-news-area">
                                    <h2>{{$bdpost[0]->category->name}}</h2>
                                    @foreach ($bdpost as $index => $post)
                                    @if ($index == 0)
                                    <div class="list-style-news-area">
                                        <div class="top-news">
                                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                            @if($post->image)
                                            <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                            @else
                                            <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                            @endif
                                            </a>
                                            <div class="top-news-cont">
                                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                    <h4 class="news-title">
                                                        {!! $post->title !!}
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="single-news-style">
                                        <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                        @if($post->image)
                                        <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                        @else
                                        <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                        @endif
                                        </a>
                                        <div class="single-news-cont">
                                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                <h4 class="news-title">
                                                    {!! $post->title !!}
                                                </h4>
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="more-stories-area">
                                        <a href="/{{$bdpost[0]->category_id}}/{{$bdpost[0]->category->name}}">আরও পড়ুন</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-list-style-news-area">
                                    <h2>{{$worldpost[0]->category->name}}</h2>
                                    @foreach ($worldpost as $index => $post)
                                    @if ($index == 0)
                                    <div class="list-style-news-area">
                                        <div class="top-news">
                                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                            @if($post->image)
                                            <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                            @else
                                            <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                            @endif
                                            </a>
                                            <div class="top-news-cont">
                                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                    <h4 class="news-title">
                                                        {!! $post->title !!}
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="single-news-style">
                                        <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                        @if($post->image)
                                        <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                        @else
                                        <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                        @endif
                                        </a>
                                        <div class="single-news-cont">
                                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                <h4 class="news-title">
                                                    {!! $post->title !!}
                                                </h4>
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="more-stories-area">
                                        <a href="/{{$worldpost[0]->category_id}}/{{$worldpost[0]->category->name}}">আরও পড়ুন</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-list-style-news-area">
                                    <h2>{{$politicspost[0]->category->name}}</h2>
                                    @foreach ($politicspost as $index => $post)
                                    @if ($index == 0)
                                    <div class="list-style-news-area">
                                        <div class="top-news">
                                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                            @if($post->image)
                                            <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                            @else
                                            <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                            @endif
                                            </a>
                                            <div class="top-news-cont">
                                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                    <h4 class="news-title">
                                                        {!! $post->title !!}
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="single-news-style">
                                        <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                        @if($post->image)
                                        <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                        @else
                                        <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                        @endif
                                        </a>
                                        <div class="single-news-cont">
                                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                <h4 class="news-title">
                                                    {!! $post->title !!}
                                                </h4>
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="more-stories-area">
                                        <a href="/{{$politicspost[0]->category_id}}/{{$politicspost[0]->category->name}}">আরও পড়ুন</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="ad-home-left-above-op-sp-eco" class="advertisement-image"></div>
                    </div>
                    <div class="col-md-4">
                        @include('frontend.master.mostview')
                    </div>
                </div>
            </div>
        </section>
        <section class="all-news-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="advertise-image">
                                @foreach($adTwo as $ad)
                                <a href="{{$ad->link}}"><img src="/{{$ad->image}}" class="img-responsive"></a>
                                @endforeach
                             </div>
                            <div class="col-sm-4">
                                <div class="single-list-style-news-area">
                                    <h2>{{$crime[0]->category->name}}</h2>
                                    @foreach ($crime as $index => $post)
                                    @if ($index == 0)
                                    <div class="list-style-news-area">
                                        <div class="top-news">
                                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                            @if($post->image)
                                            <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                            @else
                                            <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                            @endif
                                            </a>
                                            <div class="top-news-cont">
                                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                    <h4 class="news-title">
                                                        {!! $post->title !!}
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="single-news-style">
                                        <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                        @if($post->image)
                                        <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                        @else
                                        <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                        @endif
                                        </a>
                                        <div class="single-news-cont">
                                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                <h4 class="news-title">
                                                    {!! $post->title !!}
                                                </h4>
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="more-stories-area">
                                        <a href="/{{$crime[0]->category_id}}/{{$crime[0]->category->name}}">আরও পড়ুন</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-list-style-news-area">
                                    <h2>{{$sportspost[0]->category->name}}</h2>
                                    @foreach ($sportspost as $index => $post)
                                    @if ($index == 0)
                                    <div class="list-style-news-area">
                                        <div class="top-news">
                                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                            @if($post->image)
                                            <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                            @else
                                            <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                            @endif
                                            </a>
                                            <div class="top-news-cont">
                                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                    <h4 class="news-title">
                                                        {!! $post->title !!}
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="single-news-style">
                                        <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                        @if($post->image)
                                        <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                        @else
                                        <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                        @endif
                                        </a>
                                        <div class="single-news-cont">
                                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                <h4 class="news-title">
                                                    {!! $post->title !!}
                                                </h4>
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="more-stories-area">
                                        <a href="/{{$sportspost[0]->category_id}}/{{$sportspost[0]->category->name}}">আরও পড়ুন</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-list-style-news-area">
                                    <h2>{{$entertainmentpost[0]->category->name}}</h2>
                                    @foreach ($entertainmentpost as $index => $post)
                                    @if ($index == 0)
                                    <div class="list-style-news-area">
                                        <div class="top-news">
                                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                            @if($post->image)
                                            <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                            @else
                                            <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                            @endif
                                            </a>
                                            <div class="top-news-cont">
                                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                    <h4 class="news-title">
                                                        {!! $post->title !!}
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="single-news-style">
                                        <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                        @if($post->image)
                                        <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                        @else
                                        <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                        @endif
                                        </a>
                                        <div class="single-news-cont">
                                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                                <h4 class="news-title">
                                                    {!! $post->title !!}
                                                </h4>
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="more-stories-area">
                                        <a href="/{{$entertainmentpost[0]->category_id}}/{{$entertainmentpost[0]->category->name}}">আরও পড়ুন</a>
                                    </div>
                                </div>
                            </div>
                            <div class="advertise-image">
                                @foreach($adThree as $ad)
                                <a href="{{$ad->link}}"><img src="/{{$ad->image}}" class="img-responsive"></a>
                                @endforeach
                             </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    @include('frontend.master.followus')
                    </div>
                </div>
            </div>
        </section>
        <section class="page-btm-area pad-15">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 single-list-style-news-area">
                        <h2>{{$viral[0]->category->name}}</h2>
                        @foreach ($viral as $index => $post)
                        @if ($index == 0)
                        <div class="list-style-news-area">
                            <div class="top-news">
                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">

                                @if($post->image)
                                <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                @else
                                <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                @endif
                                </a>
                                <div class="top-news-cont">
                                    <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                        <h4 class="news-title">
                                            {!! $post->title !!}
                                        </h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="single-news-style">
                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                            
                            @if($post->image)
                            <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                            @else
                            <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                            @endif
                            </a>
                            <div class="single-news-cont">
                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                    <h4 class="news-title">
                                        {!! $post->title !!}
                                    </h4>
                                </a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="more-stories-area">
                            <a href="/{{$viral[0]->category_id}}/{{$viral[0]->category->name}}">আরও পড়ুন</a>
                        </div>
                    </div>
                    <div class="col-sm-3 single-list-style-news-area">
                        <h2>{{$techpost[0]->category->name}}</h2>
                        @foreach ($techpost as $index => $post)
                        @if ($index == 0)
                        <div class="list-style-news-area">
                            <div class="top-news">
                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">

                                @if($post->image)
                                <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                @else
                                <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                @endif
                                </a>
                                <div class="top-news-cont">
                                    <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                        <h4 class="news-title">
                                            {!! $post->title !!}
                                        </h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="single-news-style">
                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">

                            @if($post->image)
                            <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                            @else
                            <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                            @endif
                            </a>
                            <div class="single-news-cont">
                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                    <h4 class="news-title">
                                        {!! $post->title !!}
                                    </h4>
                                </a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="more-stories-area">
                            <a href="/{{$techpost[0]->category_id}}/{{$techpost[0]->category->name}}">আরও পড়ুন</a>
                        </div>
                    </div>
                    <div class="col-sm-3 single-list-style-news-area">
                        <h2>{{$opinionpost[0]->category->name}}</h2>
                        @foreach ($opinionpost as $index => $post)
                        @if ($index == 0)
                        <div class="list-style-news-area">
                            <div class="top-news">
                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">

                                @if($post->image)
                                <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                @else
                                <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                @endif
                                </a>
                                <div class="top-news-cont">
                                    <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                        <h4 class="news-title">
                                            {!! $post->title !!}
                                        </h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="single-news-style">
                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                            
                            @if($post->image)
                            <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                            @else
                            <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                            @endif
                            </a>
                            <div class="single-news-cont">
                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                    <h4 class="news-title">
                                        {!! $post->title !!}
                                    </h4>
                                </a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="more-stories-area">
                            <a href="/{{$opinionpost[0]->category_id}}/{{$opinionpost[0]->category->name}}">আরও পড়ুন</a>
                        </div>
                    </div>
                    <div class="col-sm-3 single-list-style-news-area">
                        <h2>{{$economicspost[0]->category->name}}</h2>
                        @foreach ($economicspost as $index => $post)
                        @if ($index == 0)
                        <div class="list-style-news-area">
                            <div class="top-news">
                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">

                                @if($post->image)
                                <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                                @else
                                <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                                @endif
                                </a>
                                <div class="top-news-cont">
                                    <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                        <h4 class="news-title">
                                            {!! $post->title !!}
                                        </h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="single-news-style">
                            <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                            
                            @if($post->image)
                            <img loading="lazy" class="lazy" src="/{{$post->image}}" alt="{{$post->title}}" />
                            @else
                            <img loading="lazy" class="lazy" src="/frontend/img/dt-placeholder.jpg" alt="{{$post->title}}" />
                            @endif
                            </a>
                            <div class="single-news-cont">
                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                    <h4 class="news-title">
                                        {!! $post->title !!}
                                    </h4>
                                </a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="more-stories-area">
                            <a href="/{{$economicspost[0]->category_id}}/{{$economicspost[0]->category->name}}">আরও পড়ুন</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection