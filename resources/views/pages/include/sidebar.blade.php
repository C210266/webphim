<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim Hot</span>

            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($phimhot_sidebar as $sidebar)
                        <div class="item post-37176">
                            <a href="{{ route('movie', [$sidebar->slug]) }}" title="{{ $sidebar->title }}">
                                <div class="item-link">
                                    <img src="{{ asset('uploads/movie/' . $sidebar->image) }}" class="lazy post-thumb"
                                        alt="{{ $sidebar->title }}" title="{{ $sidebar->title }}" />
                                    <span class="is_trailer">
                                        @if ($sidebar->resolution == 0)
                                        HD
                                    @elseif ($sidebar->resolution == 1)
                                        SD
                                    @elseif ($sidebar->resolution == 2)
                                        Cam
                                    @elseif ($sidebar->resolution == 3)
                                        HDCam
                                    @elseif ($sidebar->resolution == 4)
                                        FullHD
                                    @else
                                        Trailer
                                    @endif
                                    </span>
                                </div>
                                <p class="title">{{ $sidebar->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside>

<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim Sap chieu</span>

            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($phimhot_sapchieu as $sidebar)
                        <div class="item post-37176">
                            <a href="{{ route('movie', [$sidebar->slug]) }}" title="{{ $sidebar->title }}">
                                <div class="item-link">
                                    <img src="{{ asset('uploads/movie/' . $sidebar->image) }}" class="lazy post-thumb"
                                        alt="{{ $sidebar->title }}" title="{{ $sidebar->title }}" />
                                    <span class="is_trailer">
                                        @if ($sidebar->resolution == 0)
                                        HD
                                    @elseif ($sidebar->resolution == 1)
                                        SD
                                    @elseif ($sidebar->resolution == 2)
                                        Cam
                                    @elseif ($sidebar->resolution == 3)
                                        HDCam
                                    @elseif ($sidebar->resolution == 4)
                                        FullHD
                                    @else
                                        Trailer
                                    @endif
                                    </span>
                                </div>
                                <p class="title">{{ $sidebar->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside>

<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top Views</span>


            </div>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active filter-sidebar" id="pills-home-tab" data-toggle="pill" href="#ngay"
                    role="tab" aria-controls="pills-home" aria-selected="true">Ngay</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-sidebar" id="pills-profile-tab" data-toggle="pill" href="#tuan"
                    role="tab" aria-controls="pills-profile" aria-selected="false">Tuan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-sidebar" id="pills-contact-tab" data-toggle="pill" href="#thang"
                    role="tab" aria-controls="pills-contact" aria-selected="false">Thang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-sidebar" id="pills-contact-tab" data-toggle="pill" href="#nam"
                    role="tab" aria-controls="pills-contact" aria-selected="false">Nam</a>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">

            <div id="halim-ajax-popular-post-default" class="popular-post">
                <span id="show_data_default"></span>
            </div>

            <div class="tab-pane fade" id="ngay" role="tabpanel" aria-labelledby="pills-home-tab">
                <div id="halim-ajax-popular-post" class="popular-post">

                    <span id="show0"></span>


                </div>
            </div>
            <div class="tab-pane fade" id="tuan" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div id="halim-ajax-popular-post" class="popular-post">

                    <span id="show1"></span>

                </div>
            </div>
            <div class="tab-pane fade" id="thang" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div id="halim-ajax-popular-post" class="popular-post">

                    <span id="show2"></span>

                </div>
            </div>
            <div class="tab-pane fade" id="nam" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div id="halim-ajax-popular-post" class="popular-post">

                    <span id="show3"></span>

                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</aside>
