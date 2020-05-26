<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
 
use App\Http\Requests;
use Illuminate\Http\Request; 
use App\MainTitle;

class MainTitlesController extends Controller
{
    public function store(Request $request)
    {    
        $main_title = new MainTitle;
        $main_title->main_title = $request->get('main_title');
        $main_title->save();
        return redirect("/admin")->with('success', 'Naslov promijenjen.');
    }

    public function destroy(Request $request)
    {
        $main_title = MainTitle::find($request->id);
        $main_title->delete();
        return redirect("/admin")->with('success', 'Naslov obrisan.');
    }
}
