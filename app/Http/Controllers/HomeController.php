<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;

class HomeController extends Controller
{
    public function index() {
        if (auth()->user()->role->first()->id == 2) {
            $specialities = Speciality::all();
            return view("patients.PatientHome", [
                "specialities" => $specialities,
            ]);
        } elseif (auth()->user()->role->first()->id == 3 ) {
            return view("doctors.DoctorHome");
        } else {
            return view("doctors.DoctorHome");
        }
    }
}
