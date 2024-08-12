@extends('layouts.appDashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('selected_company_id'))
                        @php
                            $company = \App\Models\Company::find(session('selected_company_id'));
                        @endphp
                        <p>Bem-vindo à companhia {{ $company->name }}</p>
                    @else
                        <p>Bem-vindo à companhia [Nome da Companhia]</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
