<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangeLanguageController extends Controller
{
    public function changeLanguage($language)
    {
        \Session::put('locale', $language);
        return redirect()->back();
    }
}
