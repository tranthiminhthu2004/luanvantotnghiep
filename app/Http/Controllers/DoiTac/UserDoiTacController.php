<?php

namespace App\Http\Controllers\DoiTac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDoiTacController extends Controller
{
    public function index()
    {
        return view('users.doitac.index');
    }
}