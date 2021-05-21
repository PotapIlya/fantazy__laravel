<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

class UserBaseController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }
}