<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\History;
use Illuminate\Support\Facades\Auth;


class ProductsController extends Controller
{

    public function index()
    {
       $products = Product::where('amount','>','0')->get();
	   return view( 'welcome', ['products' => $products ] );
    }
		
	public function addToCart(Request $request, $id) {
		
        $product = Product::find($id);
       
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
					    "id" => $product->id,
                        "name" => $product->name,
                        "quantity" => $request->all()['kolicina'],
                        "price" => $product->price
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back();
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->all()['kolicina'];
			if ($cart[$id]['quantity']>$product->amount) $cart[$id]['quantity'] = $product->amount;
            session()->put('cart', $cart);
            return redirect()->back();
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
		    "id" => $product->id,
            "name" => $product->name,
            "quantity" => $request->all()['kolicina'],
            "price" => $product->price
        ];
        session()->put('cart', $cart);
        return redirect()->back();
    }
	
	public function cart() {
		$cart = session()->get('cart');
        $ukupno = 0;
        $postarina=50;
        $pdv=0;
		$amounts = array();
		foreach ($cart as $c) {
			$ukupno += $c['price'] * $c['quantity'];
			$product = Product::find($c['id']);
			$amounts[$c['id']] = $product->amount;
        }
        $pdv=$ukupno*25/100;
		return view( 'cart', ['cart' => $cart, 'ukupno' => $ukupno, 'amounts' => $amounts , 'postarina' => $postarina, 'pdv' => $pdv ] );
	}

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
		unset ($cart[$id]);
		session()->put('cart', $cart);
		if (count($cart)==0) return redirect()->route('pocetna');
        return redirect()->back();  
    }

    public function updateCart(Request $request,$id)
    {
        $cart = session()->get('cart');
		$cart[$id]['quantity'] = $request->all()['kolicina'];
		session()->put('cart', $cart);
        return redirect()->back();  
    }

	public function buyFromCart(Request $request) {
        $cart = session()->get('cart');
        $payment = $request->all()['payment'];
        $podaci = $request->all()['podaci'];
		$iduser = Auth::id();
		$quantity = 0;
		foreach ($cart as $c) {
			$product = Product::find($c['id']);
			if ($product->amount==0) continue;
			if ($product->amount<$c['quantity']) $quantity = $product->amount;
			if ($product->amount>=$c['quantity']) $quantity = $c['quantity'];
			$idproduct = $c['id'];       // $product->id;
			$price = $product->price;    // $c['price'];
			$history = new History;
			$history->iduser = $iduser;
			$history->idproduct = $idproduct;
			$history->quantity = $quantity;
			$history->price = $price;
            $history->payment = $payment;
            $history->podaci = $podaci;
			$history->save();
			$product->amount -= $quantity;
			$product->save();
		}
		unset($cart);
		$cart = array();
		session()->put('cart', $cart);
        return redirect()->route('pocetna');  
    }

    public function history()
    {
       $history = History::get();
	   return view( 'history', ['history' => $history ] );
    }
	
	public function historyAdmin()
    {
       $history = History::get();
	   return view( 'historyAdmin', ['history' => $history ] );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'addprod' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
		$product->name = $request->all()['name'];
		if ($request->all()['description']) $product->description = $request->all()['description'];
		else $product->description = "";
		$product->amount = $request->all()['amount'];
		$product->price = $request->all()['price'];
		if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $extension = $request->image->extension();
			$product->image = "./slike/".$product->name.".".$extension;
			$file = $request->file('image');
			$file->move( "slike", $product->name.".".$extension );
        }
		else $product->image = "";
		$product->save();
		return redirect( '/' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
		$product = Product::find($id);
        return view( 'show', ['product' => $product ] );
    }
	
	public function changeamount(Request $request, $id)
    {
        $product = Product::find($id);
		$product->amount += $request->all()['kolicina'];
		$product->save();
		return redirect( '/' );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}