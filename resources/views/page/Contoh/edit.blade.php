@extends('layouts.app')

@section('title', 'Create Contoh')

@section('css')
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Manage Contoh
            <small>Contoh</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Contoh</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Contoh</h3>
            </div>
            <div class="box-body pad table-responsive">
                <form action="{{ route('contoh.update', $data->example_id) }}" method="post" id="userInput">
                    {{ csrf_field() }}

                    <div class="form-group has-feedback @if($errors->has('example_name')) has-error @endif">
                        <label>Example Name</label>
                        <input type="text" class="form-control" name="example_name" value="{{ $data->example_name }}">
                        @if($errors->has('example_name'))
                            @foreach($errors->get('example_name') as $message)
                                <span class="text-red">{{$message}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('example_phone')) has-error @endif">
                        <label>Example Phone</label>
                        <input type="text" class="form-control " name="example_phone" value="{{ $data->example_phone }}">
                        @if($errors->has('example_phone'))
                            @foreach($errors->get('example_phone') as $message)
                                <span class="text-red">{{$message}}</span>
                            @endforeach
                        @endif
                    </div>
                </form>

            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <a href="{{ route('contoh.index') }}" class="btn btn-default">Cancel</a>
                    <button class="btn btn-primary" form="userInput">submit</button>
                </div>
            </div>
            <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('js')
@endsection
