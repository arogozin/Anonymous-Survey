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
                                    <h3 class="block-title">Anonymous Identities</h3>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href="{{ url('/admin/identity/reset') }}" class="btn btn-sm btn-warning">Reset Identities</a>
                                </div>
                            </div>
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="hidden-xs text-center" style="width: 15%;">Id</th>
                                        <th>Identity</th>
                                        <th class="hidden-xs text-center" style="width: 10%;">Taken</th>
                                        <th class="hidden-xs text-center" style="width: 10%;">Confirmed</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($identities as $identity)
                                        <tr>
                                            <td class="hidden-xs text-center">{{ $identity->id }}</td>
                                            <td class="font-w600">
                                                <a href="{{ url('admin/identity/view/'.$identity->id) }}">
                                                    {{ $identity->name }}
                                                </a>
                                            </td>
                                            <td class="hidden-xs text-center">
                                                @if (!$identity->taken)
                                                    <span class="label label-default">No</span>
                                                @else
                                                    <span class="label label-success">Yes</span>
                                                @endif
                                            </td>
                                            <td class="hidden-xs text-center">
                                                @if (!$identity->confirmed)
                                                    <span class="label label-default">No</span>
                                                @else
                                                    <span class="label label-success">Yes</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ url('admin/identity/delete/'.$identity->id) }}" class="btn btn-xs btn-danger" type="button" data-toggle="tooltip" title="Delete Identity"><i class="fa fa-times"></i></a>
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
