<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index() {
        // TODO : Changing this Main Page
        return view('layouts.store.main_page') ; 
    }
}
