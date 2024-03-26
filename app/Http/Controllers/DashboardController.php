<?php

namespace App\Http\Controllers;

use App\Models\Agreements;
use App\Models\Debtor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countDebtors = Debtor::count();
        $countAgreements = Agreements::count();

        return view('adminhtml.dashboard', compact('countDebtors', 'countAgreements'));
    }
}
