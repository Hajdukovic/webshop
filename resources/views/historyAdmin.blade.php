@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">   
	    
		<h4>Povijest kupljenih proizvoda</h4>
      
        <table class="table sortable">
            <tr><th>Kupac</th><th>Naziv proizvoda</th><th>Količina</th><th width="160px">Cijena [kn]</th><th>Ukupna cijena</th><th>Datum kupnje</th><th>Način plaćanja</th><th>Podaci za dostavu</th></tr>
            @foreach ($history as $h ) 
             
                <tr>
				    <td>{{$h->user->name}} {{$h->user->surname}}</td>
                    <td>{{$h->product->name}}</td>
                    <td>{{$h->quantity}}</td>   
                    <td align="right" style="padding-right:70px;">{{number_format($h->price,2,",",".")}}</td>

                    <td align="right" style="padding-right:70px;">{{number_format((50+$h->quantity*$h->price)+($h->quantity*$h->price*25/100),2,",",".")}}</td>
                    <td> {{strftime('%d.%m.%G. %H:%M',strtotime($h->date))}}</td>
                    <td> {{$h->payment}}</td>
                    <td> {{$h->podaci}}</td>
                </tr>

            @endforeach
                      
        </table>
       
    </div>
</div>
@endsection