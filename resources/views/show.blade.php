@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Detaljni podaci o proizvodu</h1>
	
	@if ($product->image)
	  <img src="{{$product->image}}" height="200px" />
    @else
      <p>Ovaj proizvod nema sliku.</p>
	@endif
	
	<table class="table">
	   <tr><th>Naziv: </th><td>{{ $product->name }} </td></tr>
	   <tr><th>Opis: </th><td>{{ $product->description }} </td></tr>
	   <tr><th>Cijena: </th><td>{{ number_format($product->price,2,",",".") }} </td></tr>
	</table>
	
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dodavanje u košaricu</div>

                <div class="card-body">
                    <form method="POST" action="/cartadd/{{$product->id}}">
                        @csrf
                        
			           <div class="form-group row">
                            <label for="kol1" class="col-md-4 col-form-label text-md-right">Količina</label>

                            <div class="col-md-3">
                                <input id="kol1" class="btn btn-light btn-sm" style="width:70px" 
								       type="number" name="kolicina" min="1" value="1" step="1" max="{{$product->amount}}" />
                            </div>
                        </div>
    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Dodaj u košaricu
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