<?php

namespace App\Http\Controllers;

use App\Currency;
use App\PaymentPlatform;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id) //pasar $id como opcional
    {

       // if(is_null($id){
       // }else{
        $user = User::find($id);

        $currencies = Currency::all();
        $paymentPlatforms = PaymentPlatform::all();

        return view('home')->with([
            'currencies' => $currencies,
            'paymentPlatforms' => $paymentPlatforms,
            'user'=>$user,
        ]);
    }

   
}
