<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class SelectCountry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->selectCountry){
            $selectCountry = Country::with('currency')->findOrfail($request->selectCountry); 
            Session::put('selectCountry',$selectCountry);
            Session::save();
            return redirect()->to(url()->current());

        }else{
            if(Session::has('selectCountry')){
               $selectCountry = Session::get('selectCountry');
            }else{
               $selectCountry = Country::with('currency')->first(); 
                Session::put('selectCountry',$selectCountry);
                Session::save();
            }
        }  

        $allCountries = Country::select('id','name','flag_photo')->latest()->get();

        View::share([
            
            'getCountry'=>$selectCountry,
            'allCountries' => $allCountries,
            
        ]); 
      
        
        return $next($request);
    }
}
