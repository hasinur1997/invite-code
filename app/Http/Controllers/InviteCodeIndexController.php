<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InviteCodeIndexController extends Controller
{
    
    public function __invoke(Request $request)
    {
        $codes = $request->user()->inviteCodes;
        
        return view('invites.index', ['codes' => $codes]);
    }
}
