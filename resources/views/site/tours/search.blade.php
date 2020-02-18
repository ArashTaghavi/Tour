@extends('layouts.site')

@section('content')
    <div class="container">
        <h4>Tour List</h4>
        <hr>
        <div class="row">
            <div class="col-md-3" style="padding: 0">
                <div class="col-md-12">
                    <div class="top-search-bar">
                        <h5>
                            <span></span>
                            Sort &amp; filter</h5>
                    </div>
                </div>
                <div class="col-md-12">
                    <select name="" id="" class="form-control" style="height: 50px">
                        <option value="">Popularity : Most popular first</option>
                    </select>
                </div>
                <div class="col-md-12" style="padding: 10px">
                    <input type="range" id="points" name="points" min="0" max="10">
                </div>
            </div>

            <div class="col-md-9">
                @foreach($tours as $tour)
                    @foreach($tour->periods as $period)
                        <div class="row">
                            <div class="card mt-2" style="margin-bottom: 20px">
                                @if($period->discount!=0)
                                    <div class="discount-banner">
                                        <p>-{{$period->discount}}%</p>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="/tours/{{$tour->slug}}/{{$period->end_date}}">
                                                        <img style="width: 100%"
                                                             src="{{$tour->profile_image}}"
                                                             alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-8">
                                                    <h4 class="tour-header">
                                                        {{$tour->title}} - {{$period->length()}} Days
                                                    </h4>
                                                    <a href="">
                                                    <span class="text-muted2">
                                            <span class="fa fa-star text-orange"></span>
                                            <span class="fa fa-star text-orange"></span>
                                            <span class="fa fa-star text-orange"></span>
                                            <span class="fa fa-star text-orange"></span>
                                            <span class="fa fa-star"></span>

                                                        238 Reviews</span>
                                                    </a>
                                                    <p class="tour-preview">
                                                        "{{substr($tour->description,0,150)}} ..."
                                                    </p>
                                                    <hr>
                                                    <table class="table table-borderless tour-table">
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <span class="text-muted2">Destination</span>
                                                            </td>
                                                            <td>
                                                                @foreach($tour->trips as $trip)
                                                                    {{$trip}} {{$loop->remaining>0 ? ',' : ''}}
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="text-muted2">Age Range</span>
                                                            </td>
                                                            <td>
                                                                From {{$tour->min_age}} To {{$tour->max_age}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="text-muted2">Travel Style</span>
                                                            </td>
                                                            <td>
                                                                @foreach($tour->travel_style as $travel_style)
                                                                    {{$travel_style}} {{$loop->remaining>0 ? '/' : ''}}
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="text-muted2">Operator</span>
                                                            </td>
                                                            <td>{{$tour->tourLeader->name}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>
                                                        <span class="color-muted">Tour Length</span>
                                                        <br>
                                                        <span class="bold-color">{{$period->length()}} days</span>
                                                    </td>
                                                    @if($period->discount!=0)
                                                        <td>
                                                            <span style="font-size: 14px;line-height: 17px;margin: 0;">From
                                                            <span style="text-decoration: red line-through">{{$tour->price}}$</span>
                                                            </span>
                                                            <br>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="color-muted">Price per day</span>
                                                        <br>
                                                        <span class="bold-color">{{$period->pricePerDay($tour->price)}}$</span>
                                                    </td>
                                                    @if($period->discount!=0)
                                                        <td>
                                                            <span style="font-size: 13px;color: #818d99;margin: 4px 5px 0 0;font-weight: 400;">us
                                                            <span style="color: #41c4ab;font-size: 24px;line-height: 29px;font-weight: 700;">${{$period->byDiscount($tour->price)}}</span>
                                                            </span>
                                                            <br>
                                                            <span style="font-size: 13px;color: #818d99;margin: 4px 5px 0 0">You save:
                                                            <span>${{$tour->price - $period->byDiscount($tour->price)}}</span>
                                                            </span>
                                                        </td>
                                                    @endif
                                                </tr>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-6 col-xs-6">
                                                    <button class="view-tour-btn">View tour</button>
                                                </div>
                                                <div class="col-md-12 col-sm-6 col-xs-6">
                                                    <button class="download-btn">Download</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@stop
