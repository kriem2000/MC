<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function index($id) {
        $speciality_name = Speciality::find($id)->name;
        $doctors = Speciality::find($id)->doctors;
        return view('patients.patientSingleSpecialietePage', [
            'speciality_name' => $speciality_name,
            'speciality_id' => $id,
            'doctors' => $doctors
        ]);
    }
}
