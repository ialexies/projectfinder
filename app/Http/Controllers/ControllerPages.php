<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerPages extends Controller
{
    //

    public function getHome() {
        return view('page_home');
    }

    public function getAbout(){
        return view('page_about');
    }
    public function getContact(){
        return view('page_contact');
    }
    public function getProject(){
        return view('page_projects');
    }


/*
|--------------------------------------------------------------------------
|   Admin 
|--------------------------------------------------------------------------
|
|
*/
    public function get_admin_dashboard(){
        return view('admin_dashboard');
    }

    public function get_admin_tags(){
        return view('admin_tags');
    }

 



}
