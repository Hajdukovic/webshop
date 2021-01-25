@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">   
	    
		<h1>Povijest kupljenih proizvoda</h1>
      
        <table class="table sortable">
            <tr><th>Naziv proizvoda</th><th>Količina</th><th width="160px">Cijena [kn]</th><th>Datum kupnje</th><th>Način plaćanja</th><th>Podaci za dostavu</th></tr>
            @foreach ($history as $h ) 
             
            @if (Auth::user()->id == $h->iduser)

                <tr>
                    <td>{{$h->product->name}}</td>
                    <td>{{$h->quantity}}</td>
                    <td align="right" style="padding-right:70px;">{{number_format($h->price,2,",",".")}}</td>
                    <td> {{strftime('%d.%m.%G. %H:%M',strtotime($h->date))}}</td>
                    <td> {{$h->payment}}</td>
                    <td> {{$h->podaci}}</td>
                </tr>
            
            @endif

            @endforeach
                      
        </table>
       
    </div>
</div>
@endsection