@extends('layouts/master')
@section('content')
{{HTML::style(asset('css/editcss.css'))}}
<?php
    $users = Session::get('userdata',NULL);
    $pass = Session::get('pass','HAH, Like we would show you.');
    if($users != NULL):
?>
<h2>Hello, <?= $users->Name;?>
<p> Email: <?= $users->Email;?> <p>
<p> Username: <?= $users->Username;?> <p>
<p> Password: <?= $pass;?> <p>

<?php
    else:
?>
<h2>Please sign in,
<?php
    endif;
    Session::forget('pass');
?>
<p>This is where you can change your name, email, and password.</p>
</h2>
<hr>
<div id='contain'>
    <div>
        <p>Change your name</p>
        {{Form::open(array('url' => 'newname'))}}
            {{Form::label('name','New Name: ')}}
            {{Form::text('name')}}
        
        {{Form::submit('Change my name!')}}
        {{Form::close()}}
    </div>
    <hr>
    <div>
        <p>Change your email</p>
        {{Form::open(array('url' => 'newemail'))}}
            {{Form::label('email','New Email: ')}}
            {{Form::email('email')}}
        
        {{Form::submit('Change my email!')}}
        {{Form::close()}}
    </div>
    <hr>
    <div>
        <p>Change your password</p>
        {{Form::open(array('url' => 'newpass'))}}
            {{Form::label('oldpassword','Old Password: ')}}
            {{Form::password('oldpassword')}}

            <p>{{Form::label('newpassword','New Password: ')}}
            {{Form::password('newpassword')}}<p>
            
            <p>{{Form::label('conpassword','Confirm Password: ')}}
            {{Form::password('conpassword')}}<p>
        
        <p>{{Form::submit('Change my password!')}}<p>
        {{Form::close()}}
    </div>
</div>
@stop
