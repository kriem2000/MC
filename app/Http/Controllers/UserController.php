<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Models\User;
use App\Models\Offer;
use App\Models\Payment;
use App\Models\SpecialityUser;
use App\Models\UserRole;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function signUpView() {
        $Offers = Offer::all();
        $Payment = Payment::all();


        return view('patients.signUp', [
            "Offers" => Offer::all(),
            "Payment" => Payment::all(),
        ]);

    }

    public function createPacient(Request $request) {
        $data = $request->validate([
            "first-name" => "required|string|min:3|max:50",
            "last-name" => "nullable|string|min:3|max:50",
            "offer"=>"required|exists:Offers,id",
            "payment"=>"required|exists:Payment,id",
            "phone-number" => "required|min:10|max:10|alpha_num",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:10|max:20|confirmed",
        ]);

        // create a user (patient)

        $user = User::create([
            "full_name" => $data["first-name"] . " " . $data["last-name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"]),
            "phone_number" => $data["phone-number"],
            //profile image
             //profile description
            ]);

         // give this user a docotr role

        UserRole::create([
            "role_id" => 2,
            "user_id" =>$user->id,
        ]);

         $offer = Offer::find($data["offer"]);

        Subscription::create([
            "patient_id" =>$user->id,
            "offer_id" => $data["offer"],
            "start_data"=> Carbon::now(),
            "end_data"=> Carbon::now()->addMonth(),
            "consultation_number"=> $offer->consultation_number,
            "payment_id"=> $data["payment"],
        ]);


        return redirect()->route("signIn")->with('success_message', "Successfully subscribed");;
    }

    public function signUpDoctorView() {
        $specialities = Speciality::all();

        return view('doctors.signUpDoctor', [
            "specialities"=> Speciality::all(),
        ]);
    }

    public function createDoctor(Request $request) {
        $data = $request->validate([
            "first-name" => "required|string|min:3|max:50",
            "last-name" => "nullable|string|min:3|max:50",
            "speciality" => "required|exists:specialities,id" ,
            "email" => "required|email|unique:users,email",
            "CV" => "required|file|max:5000|mimes:jpg,png,docx,pdf|filled",
            "password" => "required|min:10|max:20|confirmed",
            "phone-number" => "required|min:10|max:10|alpha_num",
        ]);

        $upload_path = public_path('cv');
        $file = $request->file('CV');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = $data["email"].'.'.$extension;
        $file->move($upload_path, $filename);

        // create a user (doctor)
       $user = User::create([
            "full_name" => $data["first-name"] . " " . $data["last-name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"]),
            "phone_number" => $data["phone-number"],
            //Profile image
             //Profile description
        ]);

        // give this user a docotr role

        UserRole::create([
            "role_id" => 3,
            "user_id" => $user->id,
        ]);


        // asign the dotctor to a speciality

        SpecialityUser::create([
            "speciality_id" => $data["speciality"],
            "user_id" => $user->id,
        ]);

            return redirect()->route("signIn")->with('success_message', 'Your account has been created.');
       }

       public function login(Request $request) {
            if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                return redirect()->route('home');
            }else {
                return redirect()->back()->with('error_message', "invalid password or email");
            }
       }


       public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
        }







    }


