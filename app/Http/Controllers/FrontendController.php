<?php

namespace App\Http\Controllers;

use App\Models\PersediaanAtk;
use App\Models\Form;
use App\Models\Gimmick;

class FrontendController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'atk' => PersediaanAtk::latest()->get(),
            'forms' => Form::latest()->get(),
            'gimmicks' => Gimmick::latest()->get(),
        ]);
    }
}
