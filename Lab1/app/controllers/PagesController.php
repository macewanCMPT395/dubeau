<?php

class PagesController extends BaseController{

public function home(){
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
}
?>
