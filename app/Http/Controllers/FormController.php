<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('forms.index');
    }

    public function navigations()
    {
        return view('forms.navigations');
    }
}
