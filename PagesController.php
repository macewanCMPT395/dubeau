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

}
?>
