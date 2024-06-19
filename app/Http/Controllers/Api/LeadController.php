<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewLead;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        //Validiamo la request: dati che arrivano dal form
        $data = $request->all(); //recuperiamo tutti i dati dalla request che vengono dal form
        $validator = Validator::make($data,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required'
        ]);//usiamo la facade Validator

        //Se la validazione fallisce
        if($validator->fails()){
            return response()->json([
                // Return response json con indicato fallimento e gli errori fatti
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }


        //Se i dati sono validi 

        //Salviamo il nuovo lead nel DB
        //::create funziona solo se abbiamo messo il fillable
        $lead = Lead::create($data);

        // Inviamo l'email
        Mail::to('rachelannepatrocinio@gmail.com')->send(new NewLead($lead));
        // Return response json con indicato il risultato di successo
        return response()->json([
            'success' => true
        ]);
    }
}
