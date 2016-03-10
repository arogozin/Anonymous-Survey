@extends('layouts.page')

@section('content')
    <div class="bg-primary-dark">
        <section class="content content-full content-boxed">
            <!-- Section Content -->
            <div class="push-100-t push-10 text-center">
                <h1 class="h2 text-white push-10 animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">{{ $survey->title }}</h1>
                <h2 class="h5 text-white-op animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">Logged in as <strong>{{ Session::get('identity') }}</strong></h2>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
    
    <div class="bg-white">
        <section class="content content-boxed">
            <!-- Section Content -->
            <div class="row items-push-3x push-20-t nice-copy">
                <div class="col-sm-6 col-sm-offset-3">
                    @if ($survey->repeat)
                        <p>Your previous answers are displayed below each question.</p>
                    @endif
                    <form class="form-horizontal push-50-t" action="{{ url('/survey/result') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="survey_id" value="{{ $survey->id }}" />
                        <input type="hidden" name="identity" value="{{ Session::get('identity') }}" />
                        <ol>
                        @foreach ($survey->questions as $key => $question)
                            <li>
                                <strong>{{ $question }}</strong>
                                @if ($survey->repeat)
                                @if (array_key_exists($survey->id, $identity->answers))
                                <p class="text-primary-light">
                                    {{ $identity->answers[$survey->id]['answers'][$key] }}
                                </p>
                                @endif
                                @endif
                                
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                            <textarea class="form-control" id="material-textarea-large" name="a{{ $key }}" rows="4" placeholder="Please add your answer.."></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </li>
                        @endforeach
                        </ol>
                        <div class="form-group push-50-t">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                <button class="btn btn-block btn-success" type="submit"><i class="fa fa-arrow-right pull-right"></i> Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
@endsection