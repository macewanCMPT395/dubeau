<?php

class PagesController extends BaseController{
/* all of the below load the proper pages in relationto the tab name */
public function home(){
	return View::make('index');
}

/* on selection of log out it logs the user out of the system */
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

/* login takes the given user name from the login screen and the password then checks the given password against the usernames hashed password */
public function login(){
    $users = DB::table('users')->where('username',Input::get('username'))->first(); /* tries to find a username or returns null if none is found*/
    if($users != NULL and $users->Username == Input::get('username') and Hash::check(Input::get('password'),$users->Password)){ /* compares the password to the stored if one was found */
        Session::put('userdata',$users); /* stores the user for use in other pages */
        return View::make('edit');
    }
    else{
        return View::make('index');
    }
}

/*     if the user chose to make an account the frunction checks if the username or email is already in use and if not then creates an account if all fields were inputed*/
public function register(){ 
    if(DB::table('users')->where('username',Input::get('username'))->first() or DB::table('users')->where('Email',Input::get('Email'))->first()){ /* checks if username of email is in use*/
        return View::make('index');
    }
    /* checks to make sure all fields are filled in and if so creates an entry into the user table*/
    else if(Input::get('username') != '' and Input::get('password') != '' and Input::get('name') != '' and Input::get('email') != '' and Input::get('conpassword') != '' and Hash::check(Input::get('conpassword'), Hash::make(Input::get('password')))){
        DB::table('users')->insert(array('Name' => Input::get('name'), 'Username' => Input::get('username'),'Password' => Hash::make(Input::get('password')),'Email' => Input::get('email')));
        $users = DB::table('users')->where('username',Input::get('username'))->first();
        Session::put('userdata',$users); /*updates the stored user and reloads*/
        return View::make('edit');
    }
    else{ /* if the user did not enter good information they are loaded into the login screen again*/
        return View::make('index');
    }
}

public function name(){ /* changes the user name if they are signed in*/
    $users = Session::get('userdata',NULL);
    if($users == NULL){  /*if the user is not signed in they are directed to the login page*/
        return View::make('index');
    }
    else{ /* changes the name to the one entered into the name text box*/
        DB::table('users')->where('Username',$users->Username)->update(array('Name' => Input::get('name')));
        $users = DB::table('users')->where('username',$users->Username)->first();
        Session::put('userdata',$users); /*updates the stored user and reloads*/
        return View::make('edit');
    }
}

public function email(){ /* changes the user email if they are signed in*/
    $users = Session::get('userdata',NULL); 
    if($users == NULL){ /*if the user is not signed in they are directed to the login page*/
        return View::make('index');
    }
    else{ /* changes the email to the one entered into the name text box*/
        DB::table('users')->where('Username',$users->Username)->update(array('Email' => Input::get('email')));
        $users = DB::table('users')->where('username',$users->Username)->first();
        Session::put('userdata',$users); /*updates the stored user and reloads*/
        return View::make('edit');
    }
}

public function npass(){ /* changes the user password if they are signed in*/
    $users = Session::get('userdata',NULL); 
    if($users == NULL){ /*if the user is not signed in they are directed to the login page*/
        return View::make('index');
    }
    else{ /* the if statment checks that the two new passwords are the same and then changes the store password*/
        if(Hash::check(Input::get('conpassword'), Hash::make(Input::get('newpassword'))) and Hash::check(Input::get('oldpassword'),$users->Password)){
            DB::table('users')->where('Username',$users->Username)->where('Password',Hash::make(Input::get('oldpassword')))->update(array('Password' => Input::get('newpassword')));
            $users = DB::table('users')->where('username',$users->Username)->first();
            Session::put('userdata',$users); /*updates the stored user and reloads*/
        }
        else{ /* an error is outputted on the password line stating an error occured*/
            Session::put('pass','There was an error, make sure your old password is correct and that the new passwords match.');
       }
        return View::make('edit');
    }
}

public function blog(){ /* The blog function takes the new blog entry and records the user and entry into the blogs table and stores the system it is ment for*/
    $users = Session::get('userdata',NULL); 
    $syst = Session::get('syst',NULL);
    if($users == NULL){ /* if the user is not signed in they are sent to the log in page*/
        return View::make('index');
    }
    elseif(Input::get('post') != ''){ /* if there is a blog the blog is added to the table*/
        DB::table('Blogs')->insert(array('Name' => $users->Name, 'Entry' => Input::get('post'), 'system' =>$syst));
    }
    return View::make($syst); /* returns to the original blog with the updated table*/
    
}
}
?>
