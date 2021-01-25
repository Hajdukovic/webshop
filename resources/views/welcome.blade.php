@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">   
	    
		

		<h4><br/>Popis proizvoda</h4>
		<br/>

        <table class="table sortable"  >
		
		<tr>
		
			<th>Slika</th><th>Naziv proizvoda</th><th>Cijena [kn]</th><th>Kupnja</th>
				@guest
				@else
				@if (Auth::user()->role==2)
				<th>Promjena stanja količine</th>
				@endif	
				@endguest

		</tr>

           @foreach ($products as $p)
		     <tr>
			 			   <td>
							@if ($p->image)

						<!--	css slika    .     border: 3px solid #ddd;  border-radius: 10px;  padding: 5px;  width: 150px; -->
							<img src="{{$p->image}}" style="border: 3px solid #ddd;  border-radius: 10px;  padding: 5px;  width: 150px;" />
							@else
							<p>Ovaj proizvod nema sliku.</p>
							@endif
							
							
							</td>

			   <td><a class="nav-link" href="show/{{$p->id}}">{{$p->name}}</a></td>
			   <td style="padding-right:70px;">{{number_format($p->price,2,",",".")}}</td>
			   <td>
			       <form method="POST" action="cartadd/{{$p->id}}">
				      @csrf
					    <input class="btn btn-light btn-sm" style="width:70px" type="number" name="kolicina" min="1" value="1" step="1" max="{{$p->amount}}" />
						<input class="btn btn-outline-primary btn-sm" type="submit" value="Dodaj u košaricu"/>
				   </form>
			   </td>
			   @guest
			   @else
			   @if (Auth::user()->role==2)
	                <td>
				      <form method="POST" action="changeamount/{{$p->id}}">
				      @csrf
					    <input class="btn btn-light btn-sm" style="width:70px" type="number" name="kolicina" step="1" /> 
						<input class="btn btn-outline-primary btn-sm" type="submit" value="Nadodaj na ukupnu količinu"/>  Količina: {{$p->amount}}
				   </form>
				    </td>
					<td>
					
					</td>
		       @endif
		       @endguest
			 </tr>
		   @endforeach
        </table>
	
		
        @guest
		
		@else
		@if (Auth::user()->role==2)
	    <a href="{{ route('addprod') }}" class="btn btn-outline-primary" role="button" aria-pressed="true">Dodaj novi proizvod</a>
		@endif
		@endguest


    </div>
</div>
@endsection