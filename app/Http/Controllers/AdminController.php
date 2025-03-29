<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use lluminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
echo"<a href='logout'>logout</a>" ;
    }
}
