<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageGoogle;
class MessageController extends Controller
{
    public function contact(){
        return view('/contact');
    }
    

    public function sendMessageGoogle (Request $request) {

        $this->validate($request,
         [
            'nom' => 'required',
            'prenom' => 'required',
            'contact' => 'required',
            'mail' => 'required',
            'message' => 'bail|required'

         ]);

		$user = Auth::user();

		#3. Envoi du mail
		Mail::to($user)->bcc("houngbemeyluthemarcelle@gmail.com")
						->queue(new MessageGoogle($request->all()));

		return back()->with('message', 'Votre message a ete envoyer avec succes!');
	}
}
