<?php

namespace App\Http\Controllers;

use App\Models\Maps;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function index()
    {
        $maps = Maps::paginate(10);

        return view('adminhtml.maps.index', compact('maps'));
    }
}
