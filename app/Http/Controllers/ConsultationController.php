<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Subscription;
use App\Models\user;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function patientChat($SP_id, $DR_id) {

        $doctor_name = user::find($DR_id)->full_name;

        $currentConsultation = Consultation::where('speciality_id', $SP_id)
                                            ->where('patient_id' , auth()->user()->id)
                                            ->where('doctor_id' , $DR_id);

        if ($currentConsultation->count() == 0 )
        {
        // minus the current susbscription
        $subscription = Subscription::where('patient_id', auth()->user()->id)->first();
        $subscription->consultation_number = $subscription->consultation_number - 1;
        $subscription->save();

        // start the consultation
        $consultation =  Consultation::create([
            "patient_id" => auth()->user()->id,
            "doctor_id" => $DR_id,
            "speciality_id" => $SP_id,


        ]);

            return view('patients.patientChat', [
                'doctor_id' => $DR_id,
                'consultation_id' => $consultation->id,
                'doctor_name' => $doctor_name,
                'messages' => $consultation->messages
            ]);

        } else {

            $currentConsultation = $currentConsultation->first();

            return view('patients.patientChat',  [
                'doctor_id' => $DR_id,
                'consultation_id' => $currentConsultation->id,
                'doctor_name'=> $doctor_name,
                'messages' => $currentConsultation->messages
            ]);
        }

    }
}
