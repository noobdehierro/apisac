<?php

namespace App\Http\Controllers;

use App\Models\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        $helps = Help::paginate(10);

        return view('adminhtml.helps.index', compact('helps'));
    }
}
