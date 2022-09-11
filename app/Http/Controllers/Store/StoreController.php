<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index() {
        // TODO : Changing this Main Page
        // Make a New Folder Outside Layouts and Exntend the Main Page
        // TODO : Get Featured Products and Categoreis 
        return view('store.home') ; 
    }
}
