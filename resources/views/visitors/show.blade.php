@extends('layout')
@section('content')
    <h1>Détails sur : {{ $visitor->visitor_lastname }} {{ $visitor->visitor_firstname }}</h1>

    <div class="card">
        <div class="card-body">
            <p class="m-2"><strong>Nom:</strong> {{ $visitor->visitor_lastname }}</p>
            <p class="m-2"><strong>Pénom:</strong> {{ $visitor->visitor_firstname }}</p>
            <p class="m-2"><strong>Adresse:</strong> {{ $visitor->visitor_address }}</p>
            <em>n°: {{ $visitor->visitor_phone }}</em></br>
            <em>@: {{ $visitor->visitor_email }}</em>
            <p class="m-2"><strong>Entreprise:</strong> {{ $company }}</p>
        </div>
    </div>


@endsection