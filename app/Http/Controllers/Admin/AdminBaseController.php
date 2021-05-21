<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminBaseController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }
}