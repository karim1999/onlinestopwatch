<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    @php
    $api= \App\Http\Controllers\ApiController::get_content();
    @endphp
    <?php $version= '?v='.time(); ?>
    <link rel="icon" type="image/png" href="@if(session('language')=="ar") {{$api['site_profile']->icon_ar}} @else {{$api['site_profile']->icon_en}} @endif " />
    <meta name=" description" content="
    @if(session('language')=="ar") {{$api['site_profile']->site_description_ar}} @else {{$api['site_profile']->site_description_en}} @endif ">

    <title>
      @if(session('language')=="ar") {{$api['site_profile']->site_name_ar}} | {{$api['site_profile']->site_sub_name_ar}} @else {{$api['site_profile']->site_name_en}} | {{$api['site_profile']->site_sub_name_en}} @endif </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="
    @if(session('language')=="ar") {{$api['site_profile']->ar_keywords}} @else {{$api['site_profile']->en_keywords}} @endif
    ">
    {!!$api['site_profile']->google_analytics!!}


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo|Harmattan|Tajawal" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/css/switcher.css">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" href="https://nafezly.com/css/fontawsome.min.css">


</head>
<body id="body">
    <div class="col-12 px-0">
        <div class="col-12 px-0">
            @if(session('language')=="ar" && session('popup_status')!="false" && $api['advs']->popup_status==1)
            {!!$api['advs']->popup_ar!!}
            @else
            {!!$api['advs']->popup_en!!}
            @endif
        </div>
        @if($api['advs']->header_status==1 &&  session('header_status')!="false")
            @if(session('language')=="ar")
                <div class="col-12 px-0"
                     style="background-color: #EB593C; color: white; text-align: center; padding: 5px; direction: rtl">
                    {!!preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $api['advs']->header_ar)!!}
                </div>
            @else
                <div class="col-12 px-0"
                     style="background-color: #EB593C; color: white; text-align: center; padding: 5px; direction: ltr">
                    {!!preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $api['advs']->header_en)!!}
                </div>
            @endif
        @endif
    </div>

    <script type="text/javascript">
        if ( localStorage.getItem('mood')=="night") {
            var element = document.getElementById("body");
            element.classList.add("dark");
        }
    </script>

     <style type="text/css">
        @if(session('language')=="ar")
        *{
            direction: rtl;
        }
       /* .text-left{
            text-align: right!important
        }
        .text-right{
            text-align: left!important
        }*/
        @else

        *{
            direction: ltr;
        }
        .text-left{
            text-align: right!important
        }
        .text-right{
            text-align: left!important
        }
        @media (min-width: 768px) {
           .text-md-right{
                text-align: left!important
            }
            .text-md-left{
                text-align: right!important
            }
        }
        @endif

     </style>

<div class="col-12 px-0 main-bg" style="min-height: 100vh">
    <style type="text/css">

    </style>
    <div class="container px-0 pt-md-3 pb-md-4 mb-md-5">
        <div class="row pt-2 pt-md-0">
            <div class="col-12 col-md-6 text-center text-md-right px-0 ">
                <a href="/timer">
                    <div class="d-inline-block rounded text-center pt-3 pt-md-3 mx-2 second-bg hov" style="width: 97px;">
                        <span class="fal fa-stopwatch main-font font-6"></span>
                        <p class="main-font font-1 pt-1">@lang('index.timer')</p>
                    </div>
                </a>
                <a href="/">
                    <div class="hov d-inline-block  rounded text-center pt-3 pt-md-3 mx-2 second-bg hov" style="width: 97px;">
                        <span class="fal fa-alarm-snooze main-font font-6"></span>
                        <p class="main-font font-1 pt-1">@lang('index.stop_watch')</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 text-center text-md-left px-0 mt-2">
                <div style="background: transparent;z-index:1" class="d-inline-block">
                    <a href="/switch_language" class="d-block">
                        <span class="second-bg main-font py-1 px-3" style="font-weight: normal;border-radius: 11px;padding: 1px 18px 4px!important;font-size: 12px">
                            @lang('index.language')
                        </span>
                    </a>
                </div>
                <div style="background: transparent;z-index:1;" class="d-inline-block mx-2">
                    <a href="#" class="d-block">
                        <span class="second-bg main-font" style="font-weight: normal;border-radius: 11px;padding: 1px 18px 4px!important;font-size: 12px">
                            @lang('index.dark_mood')
                            <input class="form-check-input mt-1" type="checkbox" id="inlineCheckbox1" value="option1" style="opacity: 0;position: relative;top: 2px;">
                        </span>
                    </a>
                </div>
            </div>
            <!--
                <span id="dot" class="dot"></span> -->
            <div class="col-12 col-sm-9 px-0 px-md-2 text-center text-md-left">
                <span id="myMood" style="font-weight: normal">
                </span>
            </div>
            <div id="logoText" class="col-12 col-sm-12 text-center logoText mt-md-0 mt-4">
                <a href="{{\Request::url()}}">

                        @if(session('language')=='ar' && session('mode')=='day')
                        <img src="{{$api['site_profile']->logo_ar_path}}" style="width: 90px;height: 90px;display: inline-block;" id="site-logo">
                        @elseif(session('language')=='ar' && session('mode')=='night')
                        <img src="{{$api['site_profile']->logo_ar_path_dark}}" style="width: 90px;height: 90px;display: inline-block;" id="site-logo">
                        @elseif(session('language')!='ar' && session('mode')=='day')
                        <img src="{{$api['site_profile']->logo_en_path}}" style="width: 90px;height: 90px;display: inline-block;" id="site-logo">
                        @elseif(session('language')!='ar' && session('mode')=='night')
                        <img src="{{$api['site_profile']->logo_en_path_dark}}" style="width: 90px;height: 90px;display: inline-block;" id="site-logo">
                        @endif
                </a>
                <br>
                <h3 style="font-weight: bolder;" class="second-font">
                    @if(\Request::url()==env('APP_URL'))
                        @lang('index.stop_watch')
                    @else
                        @lang('index.timer')
                    @endif
                </h3>
                <br>
            </div>
        </div>
    </div>
    @yield('content')
</div>
<audio id="notification_sound">
    <source src="/public/sounds/notifications.mp3" type="audio/mpeg">
</audio>

    <!--footer 1-->
    <link rel="stylesheet" type="text/css" href="https://footer.devlab.ae/public/styles.css">
    @if(session('language')!='en')
            <!--#171734 = night background color & f5f7fb = day background color -->
    <iframe src="https://footer.devlab.ae/ar?mode={{session('mode')}}&night_bg=1e3452&day_bg=ffffff" class="col-12 footer-iframe px-0" style="width: 100%" id="devlab-footer"></iframe>
    @else
    <iframe src="https://footer.devlab.ae/en?mode={{session('mode')}}&night_bg=1e3452&day_bg=ffffff" class="col-12 footer-iframe px-0" style="width: 100%"  id="devlab-footer" ></iframe>
    @endif

    @if(session('language')=="ar" && $api['footer']->footer_ar_enabled==1)
    {!!$api['footer']->footer_ar!!}
    @elseif($api['footer']->footer_en_enabled==1)
    {!!$api['footer']->footer_en!!}
    @endif



    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="/public/js/jquery.switcher.min.js"></script>
    <script src="/public/js/main.js"></script>
    <script type="text/javascript">
        if ( localStorage.getItem('mood')=="night") {
            var element = document.getElementById("inlineCheckbox1");
            element.setAttribute("checked", "true");
        }

        $('.form-check-input').on('change', function() {
            if ($('body').hasClass('dark')) {
                localStorage.setItem('mood', 'day');
                $('body').removeClass('dark');

                $.ajax({
                    method: "get",
                    url: "/update_mode",
                    data: { mode: 'day' }
                }).done(function(msg) {});
                $('#devlab-footer').attr('src','https://footer.devlab.ae/{{session('language')}}?mode=day&night_bg=1e3452&day_bg=ffffff');

                @if(session('language')=='ar')
                $('#site-logo').attr('src',"{{$api['site_profile']->logo_ar_path}}");
                @elseif(session('language')!='ar')
                $('#site-logo').attr('src',"{{$api['site_profile']->logo_en_path}}");
                @endif



            } else {
                localStorage.setItem('mood', 'night');
                $('body').addClass('dark');

                $.ajax({
                    method: "get",
                    url: "/update_mode",
                    data: { mode: 'night' }
                }).done(function(msg) {});
                $('#devlab-footer').attr('src','https://footer.devlab.ae/{{session('language')}}?mode=night&night_bg=1e3452&day_bg=ffffff');
                @if(session('language')=='ar')
                $('#site-logo').attr('src',"{{$api['site_profile']->logo_ar_path_dark}}");
                @elseif(session('language')!='ar')
                $('#site-logo').attr('src',"{{$api['site_profile']->logo_en_path_dark}}");
                @endif


            }
        });

    </script>
</body>
</html>
