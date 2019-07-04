<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tour;
class AdminController extends Controller
{
    public function gettrangchu(){

      // $tinh= Tour::find(1)->tinhs;
      // return $tinh;
    	return view('admin.home');
    }
    public function getloginAdmin(){
    	return view('admin.login');
    }
}
