@extends('layout')
@section('content')
    <h1>Détails sur : {{ $company->company_name }}</h1>

    <div class="card">
        <div class="card-body">
            <p class="card-title m-2"><strong>Nom:</strong>{{ $company->company_name }}</p>
            <p><strong>Adresse:</strong>{{ $company->company_address }}</p>
            <em>n°: {{ $company->company_phone }}</em></br>
            <em>@: {{ $company->company_email }}</em>
        </div>
    </div>


@endsection