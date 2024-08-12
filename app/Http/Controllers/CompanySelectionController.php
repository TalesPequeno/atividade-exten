<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanySelectionController extends Controller
{
    public function selectCompany()
    {
        $user = auth()->user();
        $company = Company::where('id', $user->company_id)->first();

        if ($company) {
            $token = hash('sha256', $user->id . $company->id . now());

            return view('welcome', [
                'company' => $company,
                'token' => $token,
                'user_id' => $user->id,
            ]);
        } else {
            return redirect()->back()->with('error', 'Você não tem uma companhia associada.');
        }
    }

    public function select($id)
    {
        $user = auth()->user();
        $company = Company::where('id', $id)->first();

        if ($company && $user->company_id == $company->id) {
            $token = hash('sha256', $user->id . $company->id . now());
            $url = url("/app?token={$token}&user={$user->id}&company={$company->id}");

            return redirect($url);
        } else {
            return redirect()->back()->with('error', 'Você não tem permissão para acessar esta companhia.');
        }
    }
}
