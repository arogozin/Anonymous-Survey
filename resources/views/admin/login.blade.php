@extends('layouts.login')

@section('content')
    <div class="bg-primary-dark">
        <section class="content content-full content-boxed">
            <!-- Section Content -->
            <div class="push-100-t push-10 text-center">
                <h1 class="h2 text-white push-10 animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown"><strong>Dashboard Login</strong></h1>
                <h2 class="h5 text-white-op animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">Please login using your NYU Google Apps</h2>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
    
    <div class="bg-white">
        <section class="content content-boxed">
            <!-- Section Content -->
            <div class="row items-push-3x push-20-t nice-copy">
                <div class="col-sm-2 col-sm-offset-5">
                    <div class="">
                        <a href="{{ url('/auth/google') }}" class="btn btn-block btn-rounded btn-primary push-10" type="button"><i class="fa fa-google-plus pull-left"></i> Login with Google+</a>
                    </div>
                </div>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
@endsection