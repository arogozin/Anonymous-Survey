@extends('layouts.dashboard')

@section('content')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <!-- Dynamic Table Full -->
            <div class="block">
                <div class="block-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="block-title">Surveys</h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{ url('/admin/survey/create') }}" class="btn btn-sm btn-primary">Create New Survey</a>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                    <table class="table table-bordered table-striped js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="hidden-xs text-center" style="width: 15%;">Id</th>
                                <th>Title</th>
                                <th class="hidden-xs text-center" style="width: 10%;">Class</th>
                                <th class="hidden-xs text-center" style="width: 10%;">Semester</th>
                                <th class="text-center" style="width: 10%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surveys as $survey)
                                <tr>
                                    <td class="hidden-xs text-center">{{ $survey->id }}</td>
                                    <td class="font-w600"><a href="{{ url('admin/survey/view/'.$survey->id) }}">{{ $survey->title }}</a></td>
                                    <td class="hidden-xs text-center">{{ $survey->class }}</td>
                                    <td class="hidden-xs text-center">{{ $survey->semester }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            @if ($survey->active)
                                                <a href="{{ url('admin/survey/deactivate/'.$survey->id) }}" class="btn btn-xs btn-warning" type="button" data-toggle="tooltip" title="Deactivate Survey"><i class="fa fa-eye-slash"></i></a>
                                            @else
                                                <a href="{{ url('admin/survey/activate/'.$survey->id) }}" class="btn btn-xs btn-primary" type="button" data-toggle="tooltip" title="Activate Survey"><i class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($survey->repeat)
                                                <a href="{{ url('admin/survey/repeat/'.$survey->id) }}" class="btn btn-xs btn-success" type="button" data-toggle="tooltip" title="Disable Repeat"><i class="fa fa-refresh"></i></a>
                                            @else
                                                <a href="{{ url('admin/survey/repeat/'.$survey->id) }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Enable Repeat "><i class="fa fa-refresh"></i></a>
                                            @endif
                                            <a href="{{ url('admin/survey/delete/'.$survey->id) }}" class="btn btn-xs btn-danger" type="button" data-toggle="tooltip" title="Delete Survey"><i class="fa fa-times"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table Full -->
        </div>
    </main>

@endsection
