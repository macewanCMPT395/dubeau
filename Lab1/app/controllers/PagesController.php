<?php

class PagesController extends BaseController{

public function home(){
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
    if($users->Username == Input::get('username') and Hash::check(Input::get('password'),$users->Password)){
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
}

?>
