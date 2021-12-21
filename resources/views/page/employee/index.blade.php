@extends('layouts.master')
@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Employees</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped" id="employees">
                            <thead>
                            <tr>
                                <th style="width: 50%">Full Name</th>
                                <th style="width: 50%">Email</th>
                            </tr>
                            </thead>
                            @if ($employees->isNotEmpty())
                                <tbody>
                                @foreach ($employees as $e)
                                    <tr>
                                        <td>{{ $e->full_name }}</td>
                                        <td>{{ $e->email }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('javascript')
    <script>
        $(function () {
            $('#employees').DataTable({
                autoWidth: false,
                paging: true,
                searching: true
            });
        });
    </script>
@endsection