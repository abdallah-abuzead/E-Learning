<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;
use App\Courses;

class StripePaymentController extends Controller
{
    public function stripe($id)
    {
        $course = Courses::find($id);
        return view('stripe')->with('course',$course);
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $operation = Stripe\Charge::create ([
                "amount" => $request->courseAmount*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment from itsolutionstuff.com." 
        ]);
        $code = $operation->failure_code;
        if(!empty($code)){
            Session::flash('success', 'Payment failed!'); 
            return back();   
        }

        Session::flash('success', 'Payment successful!');  
        return redirect('/enrollCourse/'.$request->courseId);
    }
}
