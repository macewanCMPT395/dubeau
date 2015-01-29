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
            
 
            <p>{{Form::label('password','Password: ')}}
            {{Form::password('password')}}<p>
        

        <p>{{Form::submit('Log Me In!')}}<p>
        {{Form::close()}}
    </div>
    <div id="register">
        <h2>Register</h2>
        <p>
        {{Form::open(array('url' => 'register'))}}
            {{Form::label('username','Username: ')}}
            {{Form::text('username')}}

            <p>{{Form::label('password','Password: ')}}
            {{Form::password('password')}}<p>

            <p>{{Form::label('conpassword','Confirm Password: ')}}
            {{Form::password('conpassword')}}<p>

            <p>{{Form::label('name','Name: ')}}
            {{Form::text('name')}}<p>

            <p>{{Form::label('email','Email: ')}}
            {{Form::email('email')}}<p>
        
        <p>{{Form::submit('Sign Me Up!')}}<p>
    </div>
</div>
@stop
