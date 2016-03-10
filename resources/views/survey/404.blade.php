@extends('layouts.page')

@section('content')
    <div class="bg-primary-dark">
        <section class="content content-full content-boxed">
            <!-- Section Content -->
            <div class="push-100-t push-10 text-center">
                <h1 class="h2 text-white push-10 animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown"><strong>No Surveys Found</strong></h1>
                <h2 class="h5 text-white-op animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown"></h2>
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
                        <h1>No active surveys at the moment.</h1>
                        
                        <p class="push-50-t">
                            Please check back in few days.
                        </p>
                    </div>
                </div>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
@endsection