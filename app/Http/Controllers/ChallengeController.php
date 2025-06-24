<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function home()
    {
        return "Hello, Laravel!";
    }

    public function challenge(Request $request)
    {
        $data = $request->getContent();
        return response($data, 200);
    }
} 