@extends('layouts.site')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-6">

                <h3>CONTACT INFO</h3>

                <p>
                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum
                    dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                    praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum
                    soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum
                </p>

                <br>

                <h4>ADDRESS</h4>
                <p>
                    795 Fake Ave, Door 6<br>
                    Wonderland, CA 94107, USA<br>
                    <a href="#">info@digialpha.net</a>
                </p>

                <h4>PHONE</h4>

                <p>
                    +440 875369208<br>
                    +440 353363114
                </p>

                <div class="social3_wrapper">
                    <ul class="social3 clearfix">
                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                    </ul>
                </div>


            </div>
            <div class="col-sm-6">
                @if(count($errors->all())>0)
    <div class="alert alert-danger text-center">
        <h6>{{$errors->first()}}</h6>
    </div>

                @endif
                <h3>CONTACT FORM</h3>

                <div id="note"></div>
                <div id="fields">
                    <form id="ajax-contact-form" class="form-horizontal" method="POST"
                          action="{{route('site.contacts.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Your Name</label>
                            <input type="text" class="form-control" id="inputName" name="fullname">
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="text" class="form-control" id="inputEmail" name="email">
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="inputMessage">Your Message</label>
                                    <textarea class="form-control" rows="7" id="inputMessage"
                                              name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn-default btn-cf-submit">send message</button>
                    </form>
                </div>


            </div>
        </div>


    </div>

@stop