@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">   
	    
		<h1>Povijest kupljenih proizvoda</h1>
        
        <table class="table sortable">
		<tr><th>Naziv proizvoda</th><th>Količina</th><th width="160px">Cijena [kn]</th><th>Datum kupnje</th><th>Način plaćanja</th></tr>
           @foreach ($history as $h)    
		     <tr>
             <td>{{$h->product->name}}</td>
            <td>{{$h->quantity}}</td>
    		<td align="right" style="padding-right:70px;">{{number_format($h->price,2,",",".")}}</td>
			<td> {{$h->date}}</td>
            <td> {{$h->payment}}</td>
			</tr>
			
		   @endforeach
        </table>
	
    </div>
</div>
@endsection