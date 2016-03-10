@extends('layouts.page')

@section('content')
    <div class="bg-primary-dark">
        <section class="content content-boxed">
            <!-- Section Content -->
            <div class="row items-push push-100-t push-20 text-center">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="h1 push-5 text-white"><strong>Anonymous Survey</strong></div>
                    <div class="font-w600 text-uppercase text-white">STS-UY 3004W</div>
                </div>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
    
    <div class="bg-white">
        <section class="content content-boxed">
            <!-- Section Content -->
            <div class="row items-push-3x push-20-t nice-copy">
                <div class="col-sm-8 col-sm-offset-2">
                    <p>
                        This is an anonymous survey for a study being conducted by your instructor in this class, Dr. Christopher Leslie, and Lindsay Anderberg, Tandon School of Engineering Archivist and User Services Librarian. We do not think that anything you write here would impact your reputation in the class or your grades, but to make sure, Dr. Leslie will not have access to the survey responses until after grades have been submitted for the semester. Furthermore, your participation in this study is voluntary. Feel free to skip any questions you do not want to answer. We will use this information to make presentations and write articles about the experience of undergraduates who conduct library research. If you do not want to be quoted (anonymously) about any of these questions, please do not write anything for an answer. If you have questions, please feel free to email one of us at chris.leslie@nyu.edu or landerberg@nyu.edu. 
                    </p>
                    <p>
                        ​For questions about your rights as a research participant, you may contact the University Committee on Activities Involving Human Subjects, New York University, 665 Broadway, Suite 804, New York, NY 10012 at 212-998-4808 or ask.humansubjects@nyu.edu.
                    </p>
                    <p>
                        Thank you for your time.
                    </p>
                    <section class="content content-full content-boxed">
                        <!-- Section Content -->
                        <div class="push-20-t push-20 text-center">
                            <a class="btn btn-rounded btn-noborder btn-lg btn-success animated bounceIn" data-toggle="appear" data-class="animated bounceIn" href="{{ url('/survey/login') }}">
                                <span>
                                    I agree to participate in this survey
                                </span>
                            </a>
                            <p class="push-20-t" style="font-size: 12px;">If you do not wish to participate, please close this window.</p>
                        </div>
                        <!-- END Section Content -->
                    </section>
                </div>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
@endsection