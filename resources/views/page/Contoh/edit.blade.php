@extends('layouts.app')

@section('title', 'Manage Contoh')
@section('css')
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Contoh
            <small>Contoh</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Contoh</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Manage Contoh</h3>
            </div>
            <div class="box-body pad table-responsive">
                <table id="listData" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Example Name</th>
                        <th>Example Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>

            </div>
            <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('js')
    <!-- DataTables -->
    <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $('#listData').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: window.location.href + "/data",
                timeout: 3000
            },
            columns: [
                {data: 'example_name', name: 'example_name', orderable: false, defaultContent: ""},
                {data: 'example_phone', name: 'example_phone', orderable: false, defaultContent: ""},
                {data: 'action', name: 'action', orderable: false},
            ]
        })
    </script>
@endsection
