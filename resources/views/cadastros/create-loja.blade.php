@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-12 pl-3">
            <h1 class="page-title">Cadastrar Loja</h1>
            <hr class="separator-fullwidth">
        </div>
    </div>
    <div class="row no-gutters justify-content-center">
        <div class="col-md-8 col-lg-6 pl-3 pr-3">
            <form action="{{ route('lojas.store') }}" method="POST">
                @csrf
                <div class="form-floating form-floating-custom mb-3">
                    <input type="text" class="form-control form-control-custom" id="razao_social" name="razao_social" required placeholder="Razão Social">
                    <label for="razao_social">Razão Social</label>
                </div>
                <div class="form-floating form-floating-custom mb-3">
                    <input type="text" class="form-control form-control-custom" id="nome_fantasia" name="nome_fantasia" required placeholder="Nome Fantasia">
                    <label for="nome_fantasia">Nome Fantasia</label>
                </div>
                <div class="row g-2">
                    <div class="col-md-6 form-floating form-floating-custom mb-3">
                        <input type="text" class="form-control form-control-custom" id="cnpj" name="cnpj" required placeholder="CNPJ" maxlength="18">
                        <label for="cnpj">CNPJ</label>
                    </div>
                    <div class="col-md-6 form-floating form-floating-custom mb-3">
                        <input type="text" class="form-control form-control-custom" id="cep" name="cep" required placeholder="CEP" maxlength="9">
                        <label for="cep">CEP</label>
                    </div>
                </div>
                <div class="form-floating form-floating-custom mb-3">
                    <input type="text" class="form-control form-control-custom" id="rua" name="rua" required placeholder="Rua">
                    <label for="rua">Rua</label>
                </div>
                <div class="row g-2">
                    <div class="col-md-3 form-floating form-floating-custom mb-3">
                        <input type="text" class="form-control form-control-custom" id="numero" name="numero" required placeholder="Número">
                        <label for="numero">Número</label>
                    </div>
                    <div class="col-md-9 form-floating form-floating-custom mb-3">
                        <input type="text" class="form-control form-control-custom" id="complemento" name="complemento" placeholder="Complemento">
                        <label for="complemento">Complemento</label>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md-6 form-floating form-floating-custom mb-3">
                        <input type="text" class="form-control form-control-custom" id="bairro" name="bairro" required placeholder="Bairro">
                        <label for="bairro">Bairro</label>
                    </div>
                    <div class="col-md-6 form-floating form-floating-custom mb-3">
                        <select class="form-select form-select-custom custom-select-bg" id="pais" name="pais" required>
                            <option value="">Selecione o País</option>
                            @foreach($paises as $pais)
                                <option value="{{ $pais->id }}">{{ $pais->nome_pt }}</option>
                            @endforeach
                        </select>
                        <label for="pais">País</label>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md-6 form-floating form-floating-custom mb-3">
                        <select class="form-select form-select-custom custom-select-bg" id="estado" name="estado" required disabled>
                            <option value="">Selecione o Estado</option>
                        </select>
                        <input type="text" class="form-control form-control-custom" id="estado_input" name="estado_input" placeholder="Estado" style="display: none;">
                        <label for="estado">Estado</label>
                    </div>
                    <div class="col-md-6 form-floating form-floating-custom mb-3">
                        <select class="form-select form-select-custom custom-select-bg" id="cidade" name="cidade" required disabled>
                            <option value="">Selecione a Cidade</option>
                        </select>
                        <input type="text" class="form-control form-control-custom" id="cidade_input" name="cidade_input" placeholder="Cidade" style="display: none;">
                        <label for="cidade">Cidade</label>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg mr-2">Salvar</button>
                    <button type="button" class="btn btn-outline-danger btn-lg ml-2" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">Confirmar Cancelamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja cancelar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Não</button>
                <a href="{{ route('lojas.index') }}" class="btn btn-outline-danger">Sim</a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form');
    var cnpjInput = document.getElementById('cnpj');
    var cepInput = document.getElementById('cep');
    var submitButton = form.querySelector('button[type="submit"]');

    function validateCNPJ() {
        var cnpj = cnpjInput.value.replace(/\D/g, '');
        if (cnpj.length !== 14) {
            cnpjInput.setCustomValidity('O CNPJ deve conter exatamente 14 dígitos.');
            return false;
        } else {
            cnpjInput.setCustomValidity('');
            return true;
        }
    }

    function validateCEP() {
        var cep = cepInput.value.replace(/\D/g, '');
        if (cep.length !== 8) {
            cepInput.setCustomValidity('O CEP deve conter exatamente 8 dígitos.');
            return false;
        } else {
            cepInput.setCustomValidity('');
            return true;
        }
    }

    function validateForm() {
        var isCNPJValid = validateCNPJ();
        var isCEPValid = validateCEP();
        submitButton.disabled = !(isCNPJValid && isCEPValid);
    }

    cnpjInput.addEventListener('input', function (e) {
        var value = e.target.value.replace(/\D/g, '');
        if (value.length > 14) {
            value = value.slice(0, 14);
        }
        var formattedValue = value;
        if (value.length > 2) {
            formattedValue = value.slice(0, 2) + '.' + value.slice(2);
        }
        if (value.length > 5) {
            formattedValue = value.slice(0, 2) + '.' + value.slice(2, 5) + '.' + value.slice(5);
        }
        if (value.length > 8) {
            formattedValue = value.slice(0, 2) + '.' + value.slice(2, 5) + '.' + value.slice(5, 8) + '/' + value.slice(8);
        }
        if (value.length > 12) {
            formattedValue = value.slice(0, 2) + '.' + value.slice(2, 5) + '.' + value.slice(5, 8) + '/' + value.slice(8, 12) + '-' + value.slice(12);
        }
        e.target.value = formattedValue;
        validateForm();
    });

    cnpjInput.addEventListener('blur', validateCNPJ);

    cepInput.addEventListener('input', function (e) {
        var value = e.target.value.replace(/\D/g, '');
        if (value.length > 8) {
            value = value.slice(0, 8);
        }
        var formattedValue = value;
        if (value.length > 5) {
            formattedValue = value.slice(0, 5) + '-' + value.slice(5);
        }
        e.target.value = formattedValue;
        validateForm();
    });

    cepInput.addEventListener('blur', validateCEP);

    form.addEventListener('submit', function (event) {
        if (!validateCNPJ() || !validateCEP()) {
            event.preventDefault();
        }
    });

    validateForm();
});

document.getElementById('pais').addEventListener('change', function() {
    var paisId = this.value;
    var estadoSelect = document.getElementById('estado');
    var estadoInput = document.getElementById('estado_input');
    var cidadeSelect = document.getElementById('cidade');
    var cidadeInput = document.getElementById('cidade_input');
    
    this.querySelector('option[value=""]').disabled = true;

    if (paisId == 1) {
        estadoSelect.style.display = 'block';
        estadoSelect.disabled = true;
        estadoInput.style.display = 'none';
        estadoInput.disabled = true;
        cidadeSelect.style.display = 'block';
        cidadeSelect.disabled = true;
        cidadeInput.style.display = 'none';
        cidadeInput.disabled = true;
        cidadeSelect.innerHTML = '<option value="">Selecione a Cidade</option>';

        fetch('/get-estados/' + paisId)
            .then(response => response.json())
            .then(data => {
                estadoSelect.innerHTML = '<option value="">Selecione o Estado</option>';
                estadoSelect.disabled = false;
                data.forEach(estado => {
                    var option = document.createElement('option');
                    option.value = estado.id;
                    option.textContent = estado.nome;
                    estadoSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Erro:', error));
    } else {
        estadoSelect.style.display = 'none';
        estadoSelect.disabled = true;
        estadoInput.style.display = 'block';
        estadoInput.disabled = false;
        cidadeSelect.style.display = 'none';
        cidadeSelect.disabled = true;
        cidadeInput.style.display = 'block';
        cidadeInput.disabled = false;
        cidadeSelect.innerHTML = '<option value="">Selecione a Cidade</option>';
    }
});

document.getElementById('estado').addEventListener('change', function() {
    var estadoId = this.value;
    var cidadeSelect = document.getElementById('cidade');
    var cidadeInput = document.getElementById('cidade_input');
    
    this.querySelector('option[value=""]').disabled = true;
    
    cidadeSelect.innerHTML = '<option value="">Selecione a Cidade</option>';
    cidadeSelect.disabled = true;
    cidadeInput.style.display = 'none';
    cidadeInput.disabled = true;

    if (estadoId) {
        fetch('/get-cidades/' + estadoId)
            .then(response => response.json())
            .then(data => {
                cidadeSelect.disabled = false;
                data.forEach(cidade => {
                    var option = document.createElement('option');
                    option.value = cidade.nome;
                    option.textContent = cidade.nome;
                    cidadeSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Erro:', error));
    }
});
</script>

@endsection
