@extends('layouts.site')

@section('content')
    <div class="container-fluid">
        <h4>Tour List</h4>
        <hr>
        <div class="row">
            <div class="col-md-3">
                Search Bar
            </div>

            <div class="col-md-9">
                @foreach($tours as $tour)
                    <div class="row">
                        <div class="card mt-2">
                            @if($tour->discount!=0)
                                <div class="discount-banner">
                                    <p>{{$tour->discount}} %</p>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="{{route('site.tours.tour',$tour->slug)}}">
                                                    <img style="max-width: 100%"
                                                         src="//cdn.tourradar.com/s3/tour/232x170/14263_5df8b6cf672a0.jpg"
                                                         alt="">
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                <h5 class="card-header">
                                                    {{$tour->title}}
                                                </h5>
                                                <a href="">
                                                    <span class="text-muted2">
                                            <span class="fa fa-star text-orange"></span>
                                            <span class="fa fa-star text-orange"></span>
                                            <span class="fa fa-star text-orange"></span>
                                            <span class="fa fa-star text-orange"></span>
                                            <span class="fa fa-star"></span>

                                                        238 Reviews</span>
                                                </a>
                                                <p style="margin-top:10px">
                                                    {{substr($tour->description,0,150)}} ...
                                                </p>
                                                <table class="table table-borderless">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="text-muted2">Destination</span>
                                                        </td>
                                                        <td>
                                                            @foreach($tour->trips as $trip)
                                                                {{$trip}},
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
                                                                {{$travel_style}},
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="text-muted2">Operator</span>
                                                        </td>
                                                        <td>--</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>
                                                    <span class="color-muted">Tour Length</span>
                                                    <br>
                                                    <span class="bold-color">{{$tour->length()}} days</span>
                                                </td>
                                                @if($tour->discount!=0)
                                                    <td>
                                                        <span class="bold-color">From {{$tour->price}} $</span>
                                                        <br>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="color-muted">Price per day</span>
                                                    <br>
                                                    <span class="bold-color">{{$tour->pricePerDay()}}$</span>
                                                </td>
                                                @if($tour->discount!=0)
                                                    <td>
                                                        <span>us {{$tour->byDiscount()}} $</span>
                                                    </td>
                                                @endif
                                            </tr>
                                        </table>
                                        <button class="btn btn-primary">View Tour</button>
                                        <button class="btn btn-warning" style="margin-top: 3px">Download</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
