@extends('layouts.site')
<style>
    input {
        position: absolute;
        opacity: 0;
        z-index: -1;
    }

    .row {
        display: flex;
    }

    .row .col {
        flex: 1;
    }

    .row .col:last-child {
        margin-left: 1em;
    }

    /* Accordion styles */
    .tabs {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 4px -2px rgba(0, 0, 0, 0.5);
    }

    .tab {
        width: 100%;
        color: white;
        overflow: hidden;
    }

    .tab-label {
        display: flex;
        justify-content: space-between;
        padding: 1em;
        background: #2c3e50;
        font-weight: bold;
        cursor: pointer;
        /* Icon */
    }

    .tab-label:hover {
        background: #1a252f;
    }

    .tab-label::after {
        content: "\276F";
        width: 1em;
        height: 1em;
        text-align: center;
        transition: all 0.35s;
    }

    .tab-content {
        max-height: 0;
        padding: 0 1em;
        color: #2c3e50;
        background: white;
        transition: all 0.35s;
    }

    .tab-close {
        display: flex;
        justify-content: flex-end;
        padding: 1em;
        font-size: 0.75em;
        background: #2c3e50;
        cursor: pointer;
    }

    .tab-close:hover {
        background: #1a252f;
    }

    input:checked + .tab-label {
        background: #1a252f;
    }

    input:checked + .tab-label::after {
        transform: rotate(90deg);
    }

    input:checked ~ .tab-content {
        max-height: 100vh;
        padding: 1em;
    }

</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="swiper-container swiper-container1">
                    <div class="parallax-bg"
                         data-swiper-parallax="-23%"></div>
                    <div class="swiper-wrapper">
                        @foreach($tour->images as $image)
                            @if($image->main_gallery)
                                <div class="swiper-slide">
                                    <div class="subtitle" data-swiper-parallax="-200"></div>
                                    <div class="text" data-swiper-parallax="-100">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="{{$image->profile_image}}" style="width: 100%"
                                                     alt="{{$image->id}}">
                                                <p style="position: absolute;top:10px;left:20px">{{$image->description}}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination swiper-pagination-white swiper-pagination1"></div>
                    <!-- Add Navigation -->
                    <div class="swiper-button-prev swiper-button-prev1 swiper-button-white"></div>
                    <div class="swiper-button-next swiper-button-next1 swiper-button-white"></div>
                </div>
            </div>
            <div class="col-md-4">
                <h6 style="font-size: 20px" class="text-muted2">{{$tour->periods[0]->length()}} Days</h6>
                <h2 style="font-size: 30px;text-align: left">{{$tour->title}}</h2>
                <p>From <b>{{$tour->from}}</b> To <b>{{$tour->to}}</b></p>
                <p><b>Age Range</b> :From {{$tour->min_age}} To {{$tour->max_age}}</p>
                <p>Max Group Size : <b>{{$tour->max_group}}</b></p>
                @if($tour->periods[0]->discount!=0)
                    <p>From <b style="text-decoration: line-through">{{$tour->price}} $</b>
                        <span class="badge" style="background: red">{{$tour->periods[0]->discount}} %</span></p>
                    <p style="font-size: 30px;line-height: 48px;font-weight: 700;">us {{$tour->periods[0]->byDiscount($tour->price)}} $</p>
                @else
                    <p>From {{$tour->price}}</p>
                @endif

                @if(\Illuminate\Support\Facades\Auth::check())
                    @if(\Illuminate\Support\Facades\Auth::user()->role==\App\User::USER)
                        @if ($is_user_reserved)
                            <span class="btn btn-warning">You Already Reserved</span>
                        @else
                            <form method="POST" action="{{route('site.reserved-tours.store',[request()->slug,request()->end_date])}}">
                                @csrf
                                <button class="btn btn-success">Book</button>
                            </form>
                        @endif
                    @endif
                @else
                    <h5 class="text-danger">Please Login For Reservation!</h5>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <h4>
                    Places You’ll See
                </h4>
                <div class="swiper-container swiper-container2">
                    <div class="swiper-wrapper">
                        @foreach($tour->images as $image)
                            @if(!$image->main_gallery)
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="{{$image->profile_image}}" class="img-rounded" style="width:100%"
                                                 alt="{{$image->id}}">
                                            <p>{{$image->title}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination swiper-pagination2"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col">
                    <div class="tabs">
                        @foreach($tour->itineraryTour as $key=>$itinerary_tour)
                            <div class="tab">
                                <input type="radio" id="rd1{{$key}}" name="rd">
                                <label class="tab-label" for="rd1{{$key}}">
                                    {{$itinerary_tour->title}}
                                </label>
                                <div class="tab-content">
                                    {{$itinerary_tour->description}}
                                </div>
                            </div>
                        @endforeach

                        <div class="tab">
                            <input type="radio" id="rd3" name="rd">
                            <label for="rd3" class="tab-close">Close others &times;</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        var swiper1 = new Swiper('.swiper-container1', {
            speed: 600,
            parallax: true,
            pagination: {
                el: '.swiper-pagination1',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next11',
                prevEl: '.swiper-button-prev',
            },
        });
        var swiper2 = new Swiper('.swiper-container2', {
            slidesPerView: 3,
            spaceBetween: 30,
            freeMode: true,
            pagination: {
                el: '.swiper-pagination2',
                clickable: true,
            },
        });
    </script>
@stop