@extends('layouts.page')

@section('content')
    <div class="bg-primary-dark">
        <section class="content content-full content-boxed">
            <!-- Section Content -->
            <div class="push-100-t push-10 text-center">
                <h1 class="h2 text-white push-10 animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown"><strong>Thank you for your participation</strong></h1>
                <h2 class="h5 text-white-op animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">Your answers have been submitted.</h2>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
    
    <div class="bg-white">
        <section class="content content-boxed">
            <!-- Section Content -->
            <div class="row items-push-3x push-20-t nice-copy">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="text-center">
                        <span>Your answers will be anonymized and you will be identified as:</span>
                        <h1>{{ Session::get('identity') }}</h1>
                        
                        <p class="push-50-t">
                            Keeping your information private is extremely important to us. We do not store any identifying information in our database.
                        </p>
                        
                        <div class="push-20-t push-20 text-center">
                            <a class="btn btn-rounded btn-noborder btn-lg btn-success animated bounceIn" data-toggle="appear" data-class="animated bounceIn" href="{{ url('/') }}">
                                <span>
                                    Back to home page
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
@endsection