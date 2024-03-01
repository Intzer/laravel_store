<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VladribaController extends Controller
{
    public function show_we_fish(Request $request)
    {
        $id = $request->id;
        return 'flad lox '.$id;
    }
}
