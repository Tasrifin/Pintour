<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\TravelPackage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard', [
            'total_travel_package' => TravelPackage::count(),
            'total_transaction' => Transaction::count(),
            'total_transaction_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'total_transaction_success' => Transaction::where('transaction_status', 'SUCCESS')->count()


        ]);
    }
}
