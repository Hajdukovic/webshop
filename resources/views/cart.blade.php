@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
	    
		<h3>Popis proizvoda u vašoj košarici</h3>
        
        <table class="table">
		<tr><th>Naziv proizvoda</th><th>Količina</th><th width="140px">Cijena [kn]</th><th>Akcija</th></tr>
           @foreach ($cart as $c)
		     <tr>
			   <td>{{$c['name']}}</td>
			   <td>
			      <form method="POST" action="cartup/{{$c['id']}}">
				      @csrf
					    <input class="btn btn-light btn-sm" style="width:70px" type="number" name="kolicina" 
						       min="1" max="{{$amounts[$c['id']]}}" value="{{$c['quantity']}}" step="1" />
						<input class="btn btn-outline-primary btn-sm" type="submit" value="Promijeni količinu"/>
				   </form>
			   </td>
			   <td align="right">{{number_format($c['price'],2,",",".")}}</td>
			   <td>
			      <a href="cartdel/{{$c['id']}}" class="btn btn-outline-danger btn-sm" role="button" aria-pressed="true">obriši</a>
			   </td>
			 </tr>
		   @endforeach
		  
		   <tr>
			   <td colspan="2" align="right">Iznos računa bez PDV-a:</td>
			   <td align="right"><b>{{number_format($ukupno,2,",",".")}}</b></td>
			   
			 </tr>

			 <tr>
			   <td colspan="2" align="right">Iznos PDV-a:</td>
			   <td align="right"><b>{{number_format(($pdv),2,",",".")}}</b></td>
			   
			 </tr>
			
			 <tr>
			   <td colspan="2" align="right">Usluga dostave:</td>
			   
			    <td align="right"><b>{{number_format($postarina,2,",",".")}}</b></td> 
			   
			 </tr>

			 <tr>
			   <td colspan="2" align="right">Iznos računa s PDV-om:</td>
			   <td align="right"><b>{{number_format(($ukupno + $pdv + $postarina),2,",",".")}}</b></td>
			   
			 </tr>



        </table>
		
		@guest
		   <p align="center">Za dovršetak kupovine, molimo Vas da se prijavite!</p>
		   <a href="login" class="btn btn-outline-primary" role="button" aria-pressed="true" style="width:25%">Prijava</a>
		@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kupovina</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kupi') }}">
						@csrf
								

                        <div class="form-group row">

							<label for="area">Podaci za dostavu (Unesite Vaše IME I PREZIME, ADRESU DOSTAVE I BROJ TELEFONA) : </label> <br/>
							<br/><textarea name="podaci" id="area" cols="90" rows="5"></textarea>

                            <label for="email" class="col-md-4 col-form-label text-md-right">Odaberite način plaćanja:</label>
						
                            <div class="col-md-6">
                                <!-- <div class="form-check">
									<input class="form-check-input" value="kartica" type="radio" name="payment" id="exampleRadios1" checked>
									<label class="form-check-label" for="exampleRadios1">
										Plaćanje Karticom
								    </label>
								</div> --><br/>
								<div class="form-check">
									<input class="form-check-input" value="uplatnica" type="radio" checked="checked" name="payment" id="exampleRadios2">
									<label class="form-check-label" for="exampleRadios2">
										Plaćanje putem predračuna
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" value="pouzeće" type="radio" name="payment" id="exampleRadios3">
									<label class="form-check-label" for="exampleRadios3">
										Plaćanje pouzećem
									</label>
								</div>
                            </div>
						</div>
					

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    KUPI
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
		@endguest
	
    </div>
</div>
@endsection