@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dodavanje podataka o proizvodu</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeprod') }}" enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Naziv:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="desc" class="col-md-4 col-form-label text-md-right">Opis proizvoda:</label>

                            <div class="col-md-6">
							    <textarea id="desc" class="form-control" name="description" style="height:150px"></textarea>
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label for="kol" class="col-md-4 col-form-label text-md-right">Količina:</label>

                            <div class="col-md-6">
                                <input id="kol" type="number" class="form-control" name="amount" required>
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="cij" class="col-md-4 col-form-label text-md-right">Cijena:</label>

                            <div class="col-md-6">
                                <input id="cij" type="number" class="form-control" name="price" step="0.01" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sl" class="col-md-4 col-form-label text-md-right">Slika proizvoda: </label>

                            <div class="col-md-3">
                                <input id="sl" type="file" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Dodaj proizvod
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection