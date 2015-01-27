@extends('layouts/master')
{{HTML::style(asset('css/logincss.css'))}}
@section('content')
<div id="wrap">
    <div id="login">
        <h2>Log In</h2>
        <p>
        {{Form::open()}}
            {{Form::label('username','Username: ')}}
            {{Form::text('username')}}
        {{Form::close()}}

        {{Form::open()}}
            {{Form::label('password','Password: ')}}
            {{Form::password('password')}}
        {{Form::close()}}
        {{Form::submit('Log Me In!')}}
    </div>
    <div id="register">
        <h2>Register</h2>
        <p>
        {{Form::open()}}
            {{Form::label('username','Username: ')}}
            {{Form::text('username')}}
        {{Form::close()}}

        {{Form::open()}}
            {{Form::label('password','Password: ')}}
            {{Form::password('password')}}
        {{Form::close()}}
        
        {{Form::open()}}
            {{Form::label('conpassword','Confirm Password: ')}}
            {{Form::password('password')}}
        {{Form::close()}}
        
        {{Form::open()}}
            {{Form::label('name','Name: ')}}
            {{Form::text('name')}}
        {{Form::close()}}
        
        {{Form::open()}}
            {{Form::label('email','Email: ')}}
            {{Form::text('email')}}
        {{Form::close()}}
        
        {{Form::submit('Sign Me Up!')}}
    </div>
</div>
@stop
