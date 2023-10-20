<?php

namespace App\Http\Controllers;

use App\Models\Unknowns;
use Illuminate\Http\Request;

class UnknownsController extends Controller
{
    public function index()
    {

        $unknowns = Unknowns::paginate(15);

        return view('adminhtml.unknowns.index', compact('unknowns'));
    }
}
