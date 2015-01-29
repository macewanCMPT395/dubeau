<?php

class PagesController extends BaseController{

public function home(){
	return View::make('index');
}

public function index(){
	return View::make('index',array('users' => $users));
}

public function edit(){
    return View::make('edit',array('users' => $users));
}

public function about(){
    return View::make('about',array('users' => $users));
}

public function wiiu(){
    return View::make('wiiu',array('users' => $users));
}

public function ps4(){
    return View::make('ps4',array('users' => $users));
}

public function xbox1(){
    return View::make('xbox1',array('users' => $users));
}

public function login(){
    $users = DB::table('users')->where('username',Input::get('username'))->first();
    if($users->Username == Input::get('username') and $users->Password == Input::get('password')){
        return View::make('edit',array('users' => $users));
    }
    else{
        return View::make('index');
    }
}
    
public function register(){
    if(DB::table('users')->where('username',Input::get('username'))->first() or DB::table('users')->where('Email',Input::get('Email'))->first()){
        return View::make('index');
    }
    else if(Input::get('username') != '' and Input::get('password') != '' and Input::get('name') != '' and Input::get('email') != '' and Input::get('conpassword') != '' and Input::get('conpassword') == Input::get('password')){
        DB::table('users')->insert(array('Name' => Input::get('name'), 'Username' => Input::get('username'),'Password' => Input::get('password'),'Email' => Input::get('email')));
        $users = DB::table('users')->where('username',Input::get('username'))->first();
        return View::make('edit',array('users' => $users));
    }
    else{
        return View::make('index');
    }
}
}

?>
