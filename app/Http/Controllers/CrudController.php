<?php

namespace App\Http\Controllers;

use App\Http\Requests\offerRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getOffers()
    {
        return Offer::get();
    }


    public  function store(offerRequest $request)
    {

       /* $rules=$this->getRules();
        $message=$this->getMessages();
        $validator=Validator::make($request->all(),$rules,$message);
        if($validator->fails())
        {
            return  redirect()->back()->withErrors($validator)->withInput($request->all());
        }
*/
        Offer::create([
           'name'=>$request->name,
           'price'=>$request->price,
          'details'=>$request->details
        ]);

    }

    public function  create()
    {
        return view('offer.create');
    }


//    private function  getMessages()
//    {
//        return [
//            'name.required'=>__("messages.offer name"),
//            'price.numeric'=>__("messages.price"),
//        ];
//    }
//    private function  getRules()
//    {
//        return [
//            'name'=>'required |max 100|unique:offers,name',
//            'price'=>'required | numeric',
//            'details'=>'required',
//        ];
//    }

public function  showAllOffers()
{
    $offers= Offer::select('id','name','price','details')->get();
    return view('offer.all',compact('offers'));
}
}
