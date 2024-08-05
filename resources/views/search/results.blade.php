@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Resultados da busca</h1>
    <p>Resultados para: {{ $query }}</p>
    <!-- Adicione aqui a lógica para exibir os resultados da busca -->
    @if(count($results) > 0)
        <ul>
            @foreach($results as $result)
                <li>{{ $result }}</li>
            @endforeach
        </ul>
    @else
        <p>Nenhum resultado encontrado</p>
    @endif
</div>
@endsection
