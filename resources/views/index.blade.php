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
                        <div class="col-1 px-0">
                        </div>
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
                        <div class="col-1 font-1 font-md-4  mt-md-4 mt-lg-5 pt-1 text-center px-0 pt-2 pt-lg-4" style="color: #e2474b;font-weight: bold" id="ms">
                            00
                        </div>
                        <div class="col text-center font-4 font-lg-13 font-md-10" style="color: #e2474b;font-weight: bold" id="sec">
                            00
                        </div>
                        <div class="col text-center font-4 font-lg-13 font-md-10" style="color: #e2474b;font-weight: bold" id="min">
                            00
                        </div>
                        <div class="col text-center font-4 font-lg-13 font-md-10" style="color: #e2474b;font-weight: bold" id="hour">
                            00
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 row mx-auto pt-4 pt-md-0">
                    <div class="col-4 text-center  px-0 d-inline-block" style="color: #e2474b;font-weight: bold">
                        <a class="font-2 text-center d-inline-block" id="start" style="color: #6c803f;padding-top: 18px;cursor: pointer;">
                            <span class="fal fa-play" data-type="play"></span>
                        </a>
                    </div>
                    <div class="col-4 text-center  px-0 d-inline-block" style="color: #e2474b;font-weight: bold">
                        <a class="hov px-0 font-2 text-center d-inline-block" id="split" style="border-radius: 40px;color: #fff;background: #6c803f;font-weight: bold;width: 60px;height: 60px;padding-top: 18px;cursor: pointer;">
                            <span class="fal fa-save"></span>
                        </a>
                    </div>
                    <div class="col-4 text-center px-0 d-inline-block" id="reset" style="color: #e2474b;font-weight: bold">
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
                    @lang('index.result')
                </div>
                <div class="col-12 px-0" style="overflow: hidden;position: relative;">
                    <div style="width: 300px;left: -150px;border-radius: 50%;height: 300px;background: #6c803f;opacity: .1;position: absolute;top: 90px">
                    </div>
                    <div class="col-12 py-5" style="height: 390px;">
                        <div class="col-12 px-0" style="height: 300px;overflow-y: hidden;">
                            <div class="col-12 px-0" id="append" style="height: 300px;overflow-y: auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mx-auto mt-2">
                <div class="hov col-12 second-bg py-2 main-font text-center" id="toCsv" style="border-radius: 8px">
                    @lang('index.export') CSV
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
