@extends('layouts.app')
@section('content')
@php 
 App::setLocale(session('language'));
@endphp
<div class="container" style="padding: 0px;">
        <div class="row">
            <div class="col-12 col-md-7  px-2 mb-4 mt-2">
                <div class="col-12 px-0 second-bg" style="border-radius: 15px;padding-top: 8vh;padding-bottom: 8vh;position: relative;">
                    <div style="width: 20px;right: 30px;border-radius: 50%;height: 20px;background: #6c803f;opacity: .1;position: absolute;top: 30px;z-index: 5"></div>
                    <div class="col-12 px-0 ">
                        <div class="col-12 row px-0" style="direction: rtl;">
                            <div class="col text-center font-2 font-md-4" style="color: #a8d0dc">
                                @lang('index.second')
                            </div>
                            <div class="col text-center font-2 font-md-4" style="color: #a8d0dc">
                                @lang('index.minute')
                            </div>
                            <div class="col text-center font-2 font-md-4" style="color: #a8d0dc">
                                @lang('index.hour')
                            </div>
                        </div>
                        <div class="col-12 row px-0" style="direction: rtl;">
                            <div class="col text-center font-4 font-lg-13 font-md-10" style="color: #e2474b;font-weight: bold" id="timer-sec">
                                00
                            </div>
                            <div class="col text-center font-4 font-lg-13 font-md-10" style="color: #e2474b;font-weight: bold" id="timer-min">
                                00
                            </div>
                            <div class="col text-center font-4 font-lg-13 font-md-10" style="color: #e2474b;font-weight: bold" id="timer-hour">
                                00
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 row mx-auto pt-4 pt-md-0">
                        <div class=" col-6 text-center  px-0 d-inline-block" style="color: #e2474b;font-weight: bold">
                            <a class="hov px-0 font-2 text-center d-inline-block" id="concern" style="border-radius: 40px;color: #fff;background: #6c803f;font-weight: bold;width: 60px;height: 60px;padding-top: 17px;cursor: pointer;"><span class="fal fa-play" data-type="play"></span></a>
                        </div>
                        <div class=" col-6 text-center px-0 d-inline-block" id="reset" style="color: #e2474b;font-weight: bold">
                            <a class="font-2 text-center d-inline-block" style="color: #6c803f;padding-top: 18px;cursor: pointer;"><span class="fal fa-redo"></span></a>
                        </div>
                    </div>
                </div>
                <!--   <a href="#" class="button" onClick="stopwatch.stop();">Stop</a>
                <a href="#" class="button" onClick="stopwatch.clear();">Clear Laps</a>-->
            </div>
            <div class="col-12 col-md-5 px-2 mb-4 mt-2">
                <div class="col-12 px-0 second-bg text-center" style="border-radius: 15px;">
                    <div class="mx-auto d-inline-block second-bg main-font py-1" style="width: 150px;border-radius: 15px;position: relative;top: -19px;">
                        @lang('index.results')
                    </div>
                    <div class="col-12 px-0" style="overflow: hidden;position: relative;">
                        <div style="width: 300px;left: -150px;border-radius: 50%;height: 300px;background: #6c803f;opacity: .1;position: absolute;top: 90px">
                        </div>
                        <div class="col-12 py-5" style="height: 390px;overflow-y: hidden;">
                            <div class="col-12 col-md-8 px-0 mx-auto" style="height: 300px;">
                                <div class="col-12 px-0">
                                    <div class="col-12 px-0 text-center main-font mb-2 font-2 " style="">
                                        @lang('index.hours')
                                    </div>
                                    <div class="col-12 px-0" style="overflow-y: auto" id="hour-scroll">
                                        <div style="width:600px;display: flex;" class="text-right pb-2">
                                            @for($i=0 ; $i<=24;$i++)
                                                <span class="btn main-font hour-timer 
                                                @if($i==0)
                                                active
                                                @endif
                                                " >{{($i<=9)?"0":""}}{{$i}}</span>
                                            @endfor 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 px-0 mt-3">
                                    <div class="col-12 px-0 text-center main-font mb-2 font-2 " style="">
                                        @lang('index.minute')
                                    </div>
                                    <div class="col-12 px-0" style="overflow-y: auto" id="min-scroll">
                                        <div style="width:900px;display: flex;" class="text-right pb-2">
                                            @for($i=0 ; $i<=60;$i++)
                                                <span class="btn main-font min-timer 
                                                @if($i==1)
                                                active
                                                @endif
                                                ">{{($i<=9)?"0":""}}{{$i}}</span>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 px-0 mt-3">
                                    <div class="col-12 px-0 text-center main-font mb-2 font-2 " style="">
                                        @lang('index.seconds')
                                    </div>
                                    <div class="col-12 px-0" style="overflow-y: auto" id="sec-scroll">
                                        <div style="width:900px;display: flex;" class="text-right pb-2">
                                            @for($i=0 ; $i<=60;$i++)
                                                <span class="btn main-font sec-timer 
                                                @if($i==2)
                                                active
                                                @endif
                                                ">{{($i<=9)?"0":""}}{{$i}}</span>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 px-0 mt-5">
                                    <div class="col-12 px-0">
                                        <div class="mx-auto d-inline-block second-bg main-font py-1 hov" id="choose" style="width: 150px;border-radius: 15px;position: relative;top: -19px;background: #6c803f;color: #fff">
                                            @lang('index.choose')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
