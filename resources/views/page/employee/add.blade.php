@extends('layouts.master')
@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Employee</h3>
                    </div>
                    <form action="{{ route('employee.add') }}" class="form-horizontal" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="first-name">First Name:</label>
                                <div class="col-sm-10">
                                    <input autofocus class="form-control" id="first-name" name="first-name" placeholder="First name..." type="text" value="{{ old('first-name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="middle-name">Middle Name:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="middle-name" name="middle-name" placeholder="Middle name..." type="text" value="{{ old('middle-name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="last-name">Last Name:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="last-name" name="last-name" placeholder="Last name..." type="text" value="{{ old('last-name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="username">Username:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="username" name="username" placeholder="Username..." type="text" value="{{ old('username') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="password">Password:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="password" name="password" placeholder="Password..." type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="email">Email:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="email" name="email" placeholder="Email..." type="email" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-default" onclick="location.href = '{{ route('employee.index') }}'" type="button">Cancel</button>
                            <button class="btn btn-info" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
