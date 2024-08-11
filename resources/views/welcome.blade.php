@extends('layouts.appCompany')
@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 50vh; background-color: #f5f7fa;">
        <div class="account-selection text-center" style="background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
            <h1 class="mb-4" style="font-weight: 700;">Escolha uma conta</h1>
            <select class="form-control mb-3" style="font-size: 18px;">
                <option>Almighty Empresa</option>
                <!-- Adicione mais opções aqui, se necessário -->
            </select>
        </div>
    </div>
@endsection
