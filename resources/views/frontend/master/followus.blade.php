
    <div class="left-panel-social-icon most-shared-area">
        <h2>আমাদেরকে অনুসরণ করুন</h2>
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
    <div class="advertise-image">
        @foreach($adEleven as $ad)
        <a href="{{$ad->link}}"><img src="/{{$ad->image}}" class="img-responsive"></a>
        @endforeach
    </div>