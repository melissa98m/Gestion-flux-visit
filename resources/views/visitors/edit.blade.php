@extends('layout')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Editer une entreprise</h3>
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
                            <form method="POST" action="{{ route('visitors.update', $visitor->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                <label>Prenom du visiteur</label>
                                    <input type="text" name="visitor_firstname" class="form-control" value="{{ $visitor->visitor_firstname }}">
                                    <label>Nom du visiteur</label>
                                    <input type="text" name="visitor_lastname" class="form-control" value="{{ $visitor->visitor_lastname }}">
                                    <label>Adresse du visiteur</label>
                                    <input type="text" name="visitor_address" class="form-control" value="{{ $visitor->visitor_address }}">
                                    <label>Numero du visiteur</label>
                                    <input type="text" name="visitor_phone" class="form-control" value="{{ $visitor->visitor_phone }}">
                                    <label>Mail du visiteur</label>
                                    <input type="email" name="visitor_email" class="form-control" value="{{ $visitor->visitor_email }}">
                                    <label class="label">Entreprise</label>
                                    <div class="select">
                                        <select name="company_id">
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary  rounded-pill m-2">Modifier</button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
