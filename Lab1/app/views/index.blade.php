@extends('layouts/master')
{{HTML::style(asset('css/logincss.css'))}}
@section('content')
<div id="wrap">
    <div id="login">
        <h2>Log In</h2>
        <p>
        {{Form::open(array('url' => 'login'))}}
            {{Form::label('username','Username: ')}}
            {{Form::text('username')}}

 
            {{Form::label('password','Password: ')}}
            {{Form::password('password')}}
     

        {{Form::submit('Log Me In!')}}
        {{Form::close()}}
    </div>
    <div id="register">
        <h2>Register</h2>
        <p>
        {{Form::open(array('url' => 'register'))}}
            {{Form::label('username','Username: ')}}
            {{Form::text('username')}}

            {{Form::label('password','Password: ')}}
            {{Form::password('password')}}

            {{Form::label('conpassword','Confirm Password: ')}}
            {{Form::password('conpassword')}}

            {{Form::label('name','Name: ')}}
            {{Form::text('name')}}

            {{Form::label('email','Email: ')}}
            {{Form::text('email')}}
        
        {{Form::submit('Sign Me Up!')}}
    </div>
</div>
@stop
