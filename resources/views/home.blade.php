@extends('layouts.appCompany')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 50vh; background-color: #f5f7fa;">
    <div class="account-selection text-center" style="background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
        <h1 class="mb-4" style="font-weight: 700;">Escolha uma conta</h1>
        @if($company)
            <!-- Construa a URL diretamente na view -->
            <a href="http://127.0.0.1:8000/app?token={{ $token }}&user={{ $user_id }}&company={{ $company->id }}" class="btn btn-light btn-block mb-2" style="font-size: 18px; border: 1px solid #ccc;">
                {{ $company->name }}
            </a>
        @else
            <p>Você não tem uma companhia associada.</p>
        @endif
    </div>
</div>
@endsection
