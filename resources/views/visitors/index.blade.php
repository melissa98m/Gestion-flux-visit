@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Liste des visiteurs</h3>
                            <!--affiche les message de succées de creation-->
                            @if(session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div><br />
                        @endif
                            <a href="{{ route('visitors.create') }}" class="btn btn-success btn-sm">Ajouter un visiteur</a>
                        <!-- Tableau -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($visitors as $visitor)
                                    <tr>
                                        <td>{{$visitor->id}}</td>
                                        <td>{{$visitor->visitor_firstname}}</td>
                                        <td>{{$visitor->visitor_lastname}}</td>
                                        <td>
                                            <a href="{{ route('visitors.edit', $visitor->id) }}" class="btn btn-primary btn-sm">Editer</a>
                                            <a href="{{ route('visitors.show', $visitor->id) }}" class="btn btn-secondary btn-sm">Détails</a>
                                            <form action="{{ route('visitors.destroy',$visitor->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit"  onclick="return confirm('Voulez vous vraiment supprimer ce visiteur?')">Supprimer</button>
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
