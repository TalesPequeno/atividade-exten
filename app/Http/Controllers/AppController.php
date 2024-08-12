<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;

class AppController extends Controller
{
    public function processToken(Request $request)
    {
        $token = $request->query('token');
        $userId = $request->query('user');
        $companyId = $request->query('company');

        // Supondo que a verificação do token seja feita aqui

        session(['selected_company_id' => $companyId]);

        return redirect()->route('dashboard');
    }

    public function showDashboard()
    {
        return view('dashboard');
    }
}
