
        <header>
            <div class="header-top-area desktop-view">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="date">
                                <ul>
                                    <li>{!! Bengali::bn_date_time(now()->format('Y M d, l')) !!}, {{ getBnDate()[2] }} {{ getBnDate()[1] }} {{ getBnDate()[0] }}</li>
                                    <li>সর্বশেষ আপডেট : {!! Bengali::bn_date_time($updatedate->format('h:m A')) !!}</li>
                                    <li>বেটা ভার্সন</li>
                                </ul>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="header-top-social-link">
                                <ul>
                                    <li>
                                        <a target="_blank" href="{!!$abouts[0]->twitter!!}">
                                        <img src="/frontend/img/twitter.png" alt="Twitter" />
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{!!$abouts[0]->facebook!!}">
                                        <img src="/frontend/img/fb1.png" alt="FB" />
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{!!$abouts[0]->instagram!!}">
                                        <img src="/frontend/img/cam.png" alt="Ins" />
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{!!$abouts[0]->youtube!!}">
                                        <img src="/frontend/img/youtube.png" alt="Youtube" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="english-button-area">
                                <div class="english-button">
                                    <a href="https://en.baynews24.com/" target="_blank">English</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="header-top-area mobile-view">
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            <div class="logo-area">
                                <a href="/"><img src="/frontend/img/logo.png" alt="Logo" width='250px'></a>
                            </div>
                            <div class="date">
                                <ul>
                                    <li>{!! Bengali::bn_date_time(now()->format('Y M d, l')) !!}, {{ getBnDate()[2] }} {{ getBnDate()[1] }} {{ getBnDate()[0] }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-3 mt-5">
                            <div class="english-button-area">
                                <div class="english-button">
                                    <a href="https://en.baynews24.com/" target="_blank">English</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="header-bottom-area desktop-view col-md-12">
                        <div class="logo-area">
                            <a href="/"><img src="/frontend/img/logo.png" alt="Logo" width='250px'></a>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light navbar-menu col-md-12">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                @foreach($menus as $menu)
                                @if( $menu->subCategory->count() > 1)                                
                                <li class="nav-item dropdown">
                                    <a href="/{{$menu->id}}/{{$menu->name}}" class="nav-link dropdown-toggle" data-toggle="dropdown" >
                                        {{$menu->name}}
                                    </a>
                                    <div class="dropdown-menu">
                                        @foreach($menu->subCategory as $submenu)
                                        <a href="/{{$submenu->id}}/{{$menu->name}}/{{$submenu->name}}" class="dropdown-item">
                                            {{$submenu->name}}
                                        </a>
                                        @endforeach
                                    </div>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a href="/{{$menu->id}}/{{$menu->name}}" class="nav-link">
                                        {{$menu->name}}
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            
            <div class="news-ticker">
                <div class="news-ticker-area">
                    <div class="breaking-news">
                        <div class="main-news-ticker">
                            <marquee scrollamount="4" onmouseover="this.stop();" onmouseout="this.start();">
                                @foreach($scrollpost as $key=>$post)
                                <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">
                                    <img src="/frontend/img/logo.png" width="60px">
                                    {!! $post->title !!}
                                </a>
                                @endforeach
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </header>