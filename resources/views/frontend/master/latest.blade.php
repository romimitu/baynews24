
    <div class="news-strem-area">
        <div class="left-panel-title">
            <h3>সর্বশেষ</h3>
        </div>
        <div class="left-panel-frst-cont">
            <ul class="just_in_news">
                @foreach($latestpost as $post)
                <li>
                    <div>
                        <div class="dt-strem-new">
                            <div class="dt-strem-time">
                                <span>{!! Bengali::bn_date_time($post->created_at->format('h:m A')) !!}</span>
                            </div>
                            <div class="dt-strem-cont">
                                <h2><a href="/news/{{$post->id}}/{{make_slug($post->title)}}">{!! $post->title !!}</a></h2>
                                <a href="/{{$post->category_id}}/{{$post->category->name}}">
                                    <p>{{$post->category->name}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- <div class="advertise-image">
        @foreach($adEight as $ad)
        <a href="{{$ad->link}}"><img src="/{{$ad->image}}" class="img-responsive"></a>
        @endforeach
    </div> -->
