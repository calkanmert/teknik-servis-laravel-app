<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        return view('home', [
            'page_title' => 'Teknik Servis | Çip Tamiri, Bilgisayar Tamiri'
        ]);
    }
}
