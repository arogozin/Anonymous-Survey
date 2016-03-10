@extends('layouts.page')

@section('content')
    <div class="bg-primary-dark">
        <section class="content content-full content-boxed">
            <!-- Section Content -->
            <div class="push-100-t push-10 text-center">
                <h1 class="h2 text-white push-10 animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">Your <strong>Anonymous</strong> Identity</h1>
                <h2 class="h5 text-white-op animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">Make sure to write it down.</h2>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
    
    <div class="bg-white">
        <section class="content content-boxed">
            <!-- Section Content -->
            <div class="row items-push-3x push-20-t nice-copy">
                <div class="col-sm-6 col-sm-offset-3">
                    <p>
                    In order to protect your personal information, we have created you anonymous identity. Please write this username down. You will not be able to retrieve it later, since the surveys are anonymous.
                    </p>
                    <div class="text-center">
                        <h1>{{ Session::get('identity') }}</h1>
                    </div>
                    
                    <form class="form-horizontal push-50-t" action="{{ url('/survey') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="identity" value="{{ Session::get('identity') }}" />
                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                <label class="css-input switch switch-sm switch-success">
                                    <input type="checkbox" id="frontend-signup-terms" name="frontend-signup-terms"><span></span> I wrote down my <strong>anonymous</strong> identity</a>
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                <button class="btn btn-block btn-primary" type="submit"><i class="fa fa-arrow-right pull-right"></i> Log in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
    
    <div class="bg-gray-lighter">
        <section class="content content-full content-boxed">
            <!-- Section Content -->
            <div class="push-20-t push-20 text-center">
                <h3 class="h4 push-20 animated fadeIn" data-toggle="appear">Already have anonymous identity?</h3>
                <a class="btn btn-rounded btn-noborder btn-lg btn-success animated bounceIn" data-toggle="appear" data-class="animated bounceIn" href="{{ url('/survey/login') }}">Login using your identity</a>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
@endsection