<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ConfigurationsController extends Controller
{
    public function changeLocale(Request $request) {
        dd($request->all());
        $locale = App::getLocale();
        if($locale == $newLocale) {
            return back();
        } else {
            App::setLocale($newLocale);
            session()->put('locale', $newLocale);
            $new_locale = App::getLocale();
            return redirect()->back();
        }
        
    }


}
