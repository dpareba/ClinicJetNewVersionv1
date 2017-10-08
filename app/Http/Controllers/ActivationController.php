<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use App\Mail\ActivationSuccessful;

class ActivationController extends Controller
{
    
    public function activateuser($token){
    	
    	$user = User::where('isactivatedtoken','=',$token)->first();
    	//dd($user);
    	if ($user == null) {
    		$message = 'User is already activated OR token is invalid';
    		return view('activation.useractivationstatus')->withMessage($message);
    	}else{
			try{
    		$user->isActivated = true;
    		$user->isactivatedtoken = null;
			$user->save();
			Mail::to($user->email)->send(new ActivationSuccessful());
			$message = 'User activated successfully';
			return view('activation.useractivationstatus')->withMessage($message);
			} catch (\Exception $e){
				return view('errors.exceptionerror')->withExcepterr($e->getMessage())->withErrormessage('User has not been activated or email has not been sent to the user.');
			}
    	}
    }
}
