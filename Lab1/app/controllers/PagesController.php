<?php

class PagesController extends BaseController{

public function home(){
	return View::make('index');
}

public function out(){
    Session::forget('userdata');
	return View::make('index');
}

public function index(){
	return View::make('index');
}

public function edit(){
    return View::make('edit');
}

public function about(){
    return View::make('about');
}

public function wiiu(){
    return View::make('wiiu');
}

public function ps4(){
    return View::make('ps4');
}

public function xbox1(){
    return View::make('xbox1');
}

public function login(){
    $users = DB::table('users')->where('username',Input::get('username'))->first();
    if($users != NULL and $users->Username == Input::get('username') and Hash::check(Input::get('password'),$users->Password)){
        Session::put('userdata',$users);
        return View::make('edit');
    }
    else{
        return View::make('index');
    }
}
    
public function register(){
    if(DB::table('users')->where('username',Input::get('username'))->first() or DB::table('users')->where('Email',Input::get('Email'))->first()){
        return View::make('index');
    }
    else if(Input::get('username') != '' and Input::get('password') != '' and Input::get('name') != '' and Input::get('email') != '' and Input::get('conpassword') != '' and Hash::check(Input::get('conpassword'), Hash::make(Input::get('password')))){
        DB::table('users')->insert(array('Name' => Input::get('name'), 'Username' => Input::get('username'),'Password' => Hash::make(Input::get('password')),'Email' => Input::get('email')));
        $users = DB::table('users')->where('username',Input::get('username'))->first();
        Session::put('userdata',$users);
        return View::make('edit');
    }
    else{
        return View::make('index');
    }
}

public function name(){
    $users = Session::get('userdata',NULL); 
    if($users == NULL){
        return View::make('index');
    }
    else{
        DB::table('users')->where('Username',$users->Username)->update(array('Name' => Input::get('name')));
        $users = DB::table('users')->where('username',$users->Username)->first();
        Session::put('userdata',$users);
        return View::make('edit');
    }
}
public function email(){
    $users = Session::get('userdata',NULL); 
    if($users == NULL){
        return View::make('index');
    }
    else{
        DB::table('users')->where('Username',$users->Username)->update(array('Email' => Input::get('email')));
        $users = DB::table('users')->where('username',$users->Username)->first();
        Session::put('userdata',$users);
        return View::make('edit');
    }
}

public function npass(){
    $users = Session::get('userdata',NULL); 
    if($users == NULL){
        return View::make('index');
    }
    else{
        if(Hash::check(Input::get('conpassword'), Hash::make(Input::get('newpassword'))) and Hash::check(Input::get('oldpassword'),$users->Password)){
            DB::table('users')->where('Username',$users->Username)->where('Password',Hash::make(Input::get('oldpassword')))->update(array('Password' => Input::get('newpassword')));
            $users = DB::table('users')->where('username',$users->Username)->first();
            Session::put('userdata',$users);
        }
        else{
            Session::put('pass','There was an error, make sure your old password is correct and that the new passwords match.');
       }
        return View::make('edit');
    }
}

public function blog(){
    $users = Session::get('userdata',NULL); 
    $syst = Session::get('syst',NULL);
    if($users == NULL){
        return View::make('index');
    }
    elseif(Input::get('post') != ''){
        DB::table('Blogs')->insert(array('Name' => $users->Name, 'Entry' => Input::get('post'), 'system' =>$syst));
    }
    return View::make($syst);
    
}
}
?>
