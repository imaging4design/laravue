<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secret;

class SecretController extends Controller
{
    
    public function index()
    {
        return Secret::all();
    }

    public function test() {
        return 'string of hello';
    }

}
