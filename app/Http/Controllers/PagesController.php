<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      $title = "pages";
      return view('pages.index', compact('title'));
    }
    public function test(){
      $title = "pages";
      return view('test', compact('title'));
    }

}
