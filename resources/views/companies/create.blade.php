@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3> Ajouter une entreprise </h3>
                            <!-- Message d'information -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                        <!-- Formulaire -->
                            <form method="POST" action="{{ route('companies.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Nom de l'entreprise</label>
                                    <input type="text" name="company_name" class="form-control">
                                    <label>Adresse de l'entreprise</label>
                                    <input type="text" name="company_address" class="form-control">
                                    <label>Numero de l'entreprise</label>
                                    <input type="text" name="company_phone" class="form-control">
                                    <label>Mail de l'entreprise</label>
                                    <input type="email" name="company_email" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill m-2">Créer une entreprise</button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
