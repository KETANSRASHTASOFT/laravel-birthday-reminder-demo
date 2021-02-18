@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <p class="mb-0">You are logged in!</p> -->
                    <p>
                        Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}, last login date and time {{ Auth::user()->last_login_at }}
                       
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop
