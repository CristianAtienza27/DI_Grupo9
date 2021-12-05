<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use App\User;
use App\Delivery_terms;
use App\Transports;
use App\Payment_terms;
use App\Bank_entity;
use App\Discount;
use PDF;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Companies::where('id','=',auth()->user()->company_id)->first();
        $delivery_terms = Delivery_terms::all();
        $transports = Transports::all();
        $payment_terms = Payment_terms::all();
        $bank_entities = Bank_entity::all();
        $discounts = Discount::all();

        return view('empresa.datosEmpresa',compact('company','delivery_terms','transports','payment_terms','bank_entities','discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $delivery_term = Delivery_terms::where('description','=',$request['delivery_terms'])->first();
        $transport = Transports::where('price','=',$request['transports_price'])->first();
        $bank_entity = Bank_Entity::where('name','=',$request['bank_entity'])->first();
        $payment_term = Payment_terms::where('description','=', $request['payment_terms'])->first();
        $discount = Discount::where('discount','=', $request['discount'])->first();

        $company = array(
            'name' => $request['company_name'],
            'address' => $request['company_address'],
            'city' => $request['company_city'],
            'cif' => $request['company_cif'],
            'email' => $request['company_email'],
            'phone' => $request['company_phone'],
            'del_term_id' => $delivery_term['id'],
            'transport_id' => $transport['id'],
            'payment_term_id' => $payment_term['id'],
            'bank_entity_id' => $bank_entity['id'],
            'discount_id' => $discount['id']
        );

        Companies::whereId($id)->update($company);
        return redirect('/company')->with('message','Datos de la compañía actualizados con éxito');
    }

    public function viewFicha($id) {
        $company = Companies::find($id);
        $delivery_term = Delivery_terms::find($company['del_term_id']);
        $transport = Transports::find($company['transport_id']);
        $bank_entity = Bank_Entity::find($company['bank_entity_id']);
        $payment_terms = Payment_Terms::find($company['payment_term_id']);
        $discount = Discount::find($company['discount_id']);

        $pdf = PDF::loadView('content.fichaEmpresa', 
        ['company' => $company,
         'delivery_term' => $delivery_term,
         'discount' => $discount,
         'transport' => $transport,
         'bank_entity' => $bank_entity,
         'payment_terms' => $payment_terms
        ]);

        return $pdf->download('ficha_empresa.pdf');
    }

    public function viewCatalogo($id){
        $products = Products::where('company_id','=',$id);
        $family = Families::find($products['family_id']);
        $article = Articles::find($products['article_id']);

        $pdf = PDF::loadView('content.catalogo', 
        ['products' => $products,
         'family' => $family,
         'article' => $article
        ]);

         return $pdf->download('catalogo.pdf');
        
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
