@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Liste des visites</h3>
                            <!--affiche les message de succées de creation-->
                            @if(session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div><br />
                        @endif
                            <a href="{{ route('visits.create') }}" class="btn btn-success btn-sm">Ajouter une visite</a>
                        <!-- Tableau -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Visiteur</th>
                                    <th scope="col">Date de début</th>
                                    <th scope="col">Date de fin</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($visits as $visit)
                                    <tr>
                                        <td>{{$visit->id}}</td>
                                        <td>{{$visit->visitor->visitor_lastname}}</td>
                                        <td>{{$visit->visit_start}}</td>
                                        <td>{{$visit->visit_end}}</td>
                                        <td>{{$visit->status->status_name}}</td>
                                        <td>
                                            <a href="{{ route('visits.edit', $visit->id) }}" class="btn btn-primary btn-sm">Editer</a>
                                            <a href="{{ route('visits.show', $visit->id) }}" class="btn btn-secondary btn-sm">Détails</a>
                                            <form action="{{ route('visits.destroy',$visit->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit"  onclick="return confirm('Voulez vous vraiment supprimer cette visite?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
