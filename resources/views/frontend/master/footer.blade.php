
        <section class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="site-map-area">
                            <h3 class="foot-title">About</h3>
                            <div class="site-map-cont">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="/journalist-apply">সাংবাদিকতার জন্য আবেদন</a>
                                        </li>
                                        <li>
                                            <a href="/about-us">আমাদের সম্পর্কে</a>
                                        </li>
                                        <li>
                                            <a href="/managing-committee">পরিচালনা পর্ষদ</a>
                                        </li>
                                        <li>
                                            <a href="/privacy-policy">গোপনীয়তার নীতি</a>
                                        </li>
                                        <li>
                                            <a href="/complaints-opinions">অভিযোগ ও মতামত</a>
                                        </li>
                                        <li>
                                            <a href="/contact-us">যোগাযোগ</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="site-map-area">
                            <div class="site-map-cont">
                                <address>
                                    প্রকাশক: মোঃ মাসুদ রানা<br>
                                    সম্পাদক: হাসান রশিদুজ্জামান বিপ্লব<br>
                                </address>
                            </div>
                            <!-- <h3 class="foot-title">নিবন্ধন</h3>
                            <div class="site-map-cont">
                                <address>
                                    সরকার অনুমোদিত অনলাইন নিউজ পোর্টাল<br>
                                    রেজিস্ট্রেশন নাম্বার – ১৫, নিবন্ধন প্রদানের তারিখঃ ২৭/১০/২০২০,<br>
                                    গনপ্রজাতন্ত্রী বাংলাদেশ সরকার, তথ্য অধিদপ্তর, তথ্য মন্ত্রনালয়, বাংলাদেশ সচিবলায় ঢাকা। 
                                </address>
                            </div> -->
                            <h3 class="foot-title">ঠিকানা</h3>
                            <div class="footer-social-icon">               
                                <address>
                                    {!!$abouts[0]->address!!}<br>
                                    মোবাইল: {!!$abouts[0]->mobile!!}<br>
                                </address>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="footer-contact-area">
                            <div class="footer-social-area">
                                <h3 class="foot-title">আমাদের সাথে সংযোগ করুন</h3>
                                <div class="footer-social-icon">
                                    <ul>
                                        <li>
                                            <a target="_blank" href="{!!$abouts[0]->facebook!!}"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{!!$abouts[0]->twitter!!}"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{!!$abouts[0]->youtube!!}"><i class="fa fa-youtube"></i></a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{!!$abouts[0]->email!!}"><i class="fa fa-envelope"></i></a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{!!$abouts[0]->instagram!!}"><i class="fa fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="footer-bottom-area">
            <div class="container-fluid">
                <div class="copy-right-area">
                    <p>{!!$abouts[0]->copyright!!} Design & Developed By <a href="http://fb.com/romi.mitu">RoMi</a></p>
                </div>
            </div>
        </section>