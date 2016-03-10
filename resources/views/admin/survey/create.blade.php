@extends('layouts.dashboard')

@section('content')
    <div class="bg-primary-dark">
        <section class="content content-full content-boxed">
            <!-- Section Content -->
            <div class="push-100-t push-10 text-center">
                <h1 class="h2 text-white push-10 animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown">Create New Survey</h1>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
    
    <div class="bg-white">
        <section class="content content-boxed">
            <!-- Section Content -->
            <div class="row items-push-3x push-20-t nice-copy">
                <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group push-50-t">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary">
                                    <input class="form-control" type="text" name="title" v-model="survey['title']">
                                    <label for="title">Survey Title</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 push-20-t">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary">
                                            <input class="form-control" type="text" name="class" v-model="survey['class']">
                                            <label for="class">Class</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 push-20-t">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary">
                                            <input class="form-control" type="text" name="semester" v-model="survey['semester']">
                                            <label for="semester">Semester</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row push-20-t">
                            <div class="col-sm-11">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary">
                                            <input class="form-control" type="text" name="question" v-model="question" @keyup.enter.prevent="addQuestion">
                                            <label for="question">Question</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1 text-center">
                                <a @click.prevent="addQuestion"><i class="si si-plus fa-2x text-success"></i></a>
                            </div>
                        </div>
                        <div class="form-group push-50-t">
                            <ol>
                                <li v-for="question in survey['questions']">@{{ question }} <a v-on:click="removeQuestion(question)" class="pull-right"><i class="glyphicon glyphicon-remove text-danger"></i></a></li>
                            </ol>
                        </div>
                        <div class="form-group push-50-t">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                <button class="btn btn-block btn-success" v-on:click.prevent="submitSurvey"><i class="fa fa-arrow-right pull-right"></i> Create</button>
                            </div>
                        </div>
                </div>
            </div>
            <!-- END Section Content -->
        </section>
    </div>

@endsection
