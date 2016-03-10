@extends('layouts.dashboard')

@section('content')
    <div class="bg-primary-dark">
        <section class="content content-full content-boxed">
            <!-- Section Content -->
            <div class="push-100-t push-10 text-center">
                <h1 class="h2 text-white push-10 animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown"><strong>{{ $identity->name }}</strong></h1>
                <h2 class="h5 text-white-op animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">Anonymous Identity Profile</h2>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
    
    <div class="bg-white">
        <section class="content content-boxed">
            <!-- Section Content -->
            <div class="row items-push-3x push-20-t nice-copy">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="">
                    
                    @if (sizeof($identity->answers) > 0)
                        <h1>Anonymous Answers:</h1>
                        
                        <div class="push-50-t">
                            @foreach ($surveys as $survey)
                            <div id="{{ $survey->id }}" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#{{ $survey->id }}" href="#{{ $survey->id }}_q">{{ $survey->title }}</a>
                                        </h3>
                                    </div>
                                    <div id="{{ $survey->id }}_q" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <strong>Original: </strong>
                                            <ol class="push-20-t">
                                                @foreach ($identity->answers[$survey->id]['answers'] as $answer)
                                                    <li>{{ $answer }}</li>
                                                @endforeach
                                            </ol>
                                            @if (array_key_exists('repeat', $identity->answers[$survey->id]) && sizeof($identity->answers[$survey->id]['repeat']['answers']) > 0)
                                            <strong class="push-20-t">Repeat: </strong>
                                            <ol class="push-20-t">
                                                @foreach ($identity->answers[$survey->id]['repeat']['answers'] as $answer)
                                                    <li>{{ $answer }}</li>
                                                @endforeach
                                            </ol>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <h1>No active surveys at the moment.</h1>
                    @endif
                    </div>
                </div>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
@endsection