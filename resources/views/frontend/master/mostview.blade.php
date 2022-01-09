
    <div class="left-panel-social-icon most-shared-area">
        <h2>আর্কাইভস</h2>
        {!! Form::open(['url' => '/archives', 'method' =>'get', 'id'=>'form-archiveDate','enctype'=>"multipart/form-data"]) !!}
        <input type="text" name="date" class="form-control" id="archiveDate">
        {!! Form::close() !!}
        <div id="datepicker"></div>
    </div>
    <div class="advertise-image">
        @foreach($adNine as $ad)
        <a href="{{$ad->link}}"><img src="/{{$ad->image}}" class="img-responsive"></a>
        @endforeach
    </div>
    <div class="most-view-area">
        <ul class="nav nav-pills" id="pills-tab">
            <li class="nav-item">
                <a href="javascript:;">সর্বাধিক পঠিত</a>
            </li>
        </ul>
    </div>
    <div class="point-news-area">
        <ul>
            @foreach($mostview as $key=>$post)
            <li>
                <div class="media">
                    <a href="#"><div class="point">{{$key +1}}</div></a>
                    <div class="media-body">
                        <a href="/news/{{$post->id}}/{{make_slug($post->title)}}">{!! $post->title !!}</a><br>
                        <a href="/{{$post->category_id}}/{{$post->category->name}}"> <span>{{$post->category->name}}</span> </a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="advertise-image">
        @foreach($adTen as $ad)
        <a href="{{$ad->link}}"><img src="/{{$ad->image}}" class="img-responsive"></a>
        @endforeach
    </div>
