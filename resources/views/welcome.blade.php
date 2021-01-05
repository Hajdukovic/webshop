@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">   
	    
		<h1>Popis proizvoda</h1>
        
        <table class="table sortable">
		<tr><th>Naziv proizvoda</th><th width="160px">Cijena [kn]</th><th>Košarica</th></tr>
           @foreach ($products as $p)
		     <tr>
			   <td>{{$p->name}}</td>
			   <td align="right" style="padding-right:70px;">{{number_format($p->price,2,",",".")}}</td>
			   <td>
			       <form method="POST" action="cartadd/{{$p->id}}">
				      @csrf
					    <input class="btn btn-light btn-sm" style="width:70px" type="number" name="kolicina" min="1" value="1" step="1" max="{{$p->amount}}" />
						<input class="btn btn-outline-primary btn-sm" type="submit" value="Dodaj u košaricu"/>
				   </form>
			   </td>
			 </tr>
		   @endforeach
        </table>
	
    </div>
</div>
@endsection