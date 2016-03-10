@extends('layouts.page')

@section('content')
    <div class="bg-primary-dark">
        <section class="content content-full content-boxed">
            <!-- Section Content -->
            <div class="push-100-t push-10 text-center">
                <h1 class="h2 text-white push-10 animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">Please <strong>login</strong> to continue</h1>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
    
    <div class="bg-white">
        <section class="content content-boxed">
            <!-- Section Content -->
            <div class="text-center push-50-t">
                <h1>Login using your NetID</h1>
            </div>
            <div class="row items-push-3x push-20-t nice-copy text-center">
                <div class="col-sm-4 col-sm-offset-4">
                    
                    <form class="form-horizontal push-50-t" action="{{ url('/survey') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary">
                                    <input class="form-control" type="text" id="netid" name="netid" placeholder="Enter your NetID.." @if(Session::has('netid')) value="{{ Session::get('netid') }}" @endif required="required" autofocus="autofocus" >
                                    <label for="netid">NetID</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group" style="padding: 15px;">
                            <button class="btn btn-block btn-success btn-lg" type="submit"><i class="fa fa-arrow-right pull-right"></i> Log in</button>
                        </div>
                        
                        <div class="form-group">
                            <div class="" style="font-size: 12px;">
                                This survey will store encrypted version of your NetID, for example: <br/>
                                <em> {{ Hash::make('test123') }} </em><br/>
                                Instead of your NetID. When you login, your NetID will be encrypted again
                                and compared against the records in our database to either retrieve your
                                anonymous identity or attach a new one.
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
@endsection