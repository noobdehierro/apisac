<?php

namespace App\Http\Controllers;

use App\Models\Clarification;
use Illuminate\Http\Request;

class ClarificationController extends Controller
{
    public function index()
    {
        $clarifications = Clarification::paginate(10);

        return view('adminhtml.clarifications.index', compact('clarifications'));
    }

    public function show(Clarification $clarification)
    {

        // dd($clarification->toArray());

        return view('adminhtml.clarifications.show', compact('clarification'));
    }
}
