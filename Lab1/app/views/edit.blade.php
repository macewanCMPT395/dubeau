@extends('layouts/master')
@section('content')
{{HTML::style(asset('css/editcss.css'))}}
<?php
    $users = Session::get('userdata',NULL);
    if($users != NULL):
?>
<h2>Hello,<?= $users->Name;?>
<?php
    else:
?>
<h2>Please sign in,
<?php
    endif
?>
<p>This is where you can change your name, email, and password.</p>
</h2>
<hr>
<div id='contain'>
    <div>
        <p>Change your name</p>
        {{Form::open()}}
            {{Form::label('name','New Name: ')}}
            {{Form::text('name')}}
        {{Form::close()}}
        
        {{Form::submit('Change my name!')}}
    </div>
    <hr>
    <div>
        <p>Change your email</p>
        {{Form::open()}}
            {{Form::label('email','New Email: ')}}
            {{Form::text('email')}}
        {{Form::close()}}
        
        {{Form::submit('Change my email!')}}
    </div>
    <hr>
    <div>
        <p>Change your password</p>
        {{Form::open()}}
            {{Form::label('oldpassword','Old Password: ')}}
            {{Form::password('oldpassword')}}
        {{Form::close()}}
        
        {{Form::open()}}
            {{Form::label('newpassword','New Password: ')}}
            {{Form::password('newpassword')}}
        {{Form::close()}}
        
        {{Form::submit('Change my password!')}}
    </div>
</div>
@stop
