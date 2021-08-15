<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InviteCodeStorageController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->user()->hasReachedLimit()) {
            return back();
        }

        $request->user()->inviteCodes()->create([
            'code' => Str::random(8)
        ]);

        return back();
    }
}
