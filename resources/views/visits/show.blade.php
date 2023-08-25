@extends('layout')
@section('content')
    <h1>Détails sur la visite n°{{ $visit->id }}</h1>

    <div class="card">
        <div class="card-body">
        <p class="card-title m-2"><strong>Object de la visite:</strong>{{ $visit->visit_purpose }}</p>
            <p><strong>Nom du visiteur:</strong>{{ $visitor }}</p>
            <p><strong>Date de début:</strong>{{ $visit->visit_start }}</p>
            <p><strong>Date de fin:</strong>{{ $visit->visit_end }}</p>
            <em>Commentaire:</em>
            @if ($visit->visit_comment)
            <em>{{ $visit->visit_comment }}</em> <!-- gestion de l'affiche du commentaire -->
            @else
                 <em>Pas de commentaire</em> 
            @endif
            
        </div>
    </div>


@endsection