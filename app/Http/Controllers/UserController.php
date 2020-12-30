<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
   
    public function checkAdmin()
    {
       
       $result = Auth::user()->isAdmin;
      
       if ($result) {
        return true;
       }
    }
}
