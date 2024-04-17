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
        $credito = Agreements::where('agreement_type', 'credito')->count();
        $contado = Agreements::where('agreement_type', 'contado')->count();

        return view('adminhtml.dashboard', compact('countDebtors', 'countAgreements', 'credito', 'contado'));
    }
}
