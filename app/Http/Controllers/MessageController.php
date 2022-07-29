<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;


class MessageController extends Controller
{

    public function message(Request $request , $Con_id , $DR_id ) {
    //validation
    $request->validate([
        'textarea' => "required"
    ]);

    //saving the file if exists
    if ($request->hasFile('file')) {
        $url = Storage::disk('messages')->put('messages_attachment', $request->file('file'));
    } else {
        $url = "";
    }

    // insert into messages
    message::create([
        "consultation_id" =>$Con_id ,
        "content" => $request->textarea,
        "attachment" => $url,
        "user_id" => auth()->user()->id,
    ]);

    return redirect()->back()->with([
        'messages' => Consultation::find($Con_id)->messages
    ]);
}

    public function download($fileName) {
        $headers = [
            'Content-Type' => 'application/pdf',
        ];
        return response()->download($fileName, explode("/", $fileName)[1], $headers);
    }

}
