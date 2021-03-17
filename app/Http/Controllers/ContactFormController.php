<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    //

    /**
     * update image.
     *
     * @param  \Illuminate\Http\UploadedFile  $image
     * @param  $service
     * @return string
     */
    public function contact(Request $request)
    {
        // dd($image);
        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email:rfc,dns,spoof',
            'number' => ['required','numeric', new \App\Rules\Length(11,12)],
            'message' => ['required', 'string', 'max:255'],
        ]);
        try {
            Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactFormMail($request->input()));
            return back()->with('contact_message',['message' => 'Your message has been sent Successfully!','class' => 'bg-green-100 border-green-400 text-green-700']);
        } catch (\Throwable $err) {
            if (app()->environment() === 'production') {
                return back()->with('contact_message',['message' => 'Error to send your message! try again.', 'class' => 'bg-red-100 border-red-400 text-red-700']);
            }
            dd($err->getMessage());
        }
    }
}
