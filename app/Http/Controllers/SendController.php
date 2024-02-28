<?php

namespace App\Http\Controllers;

use App\Mail\Newsmail;
use App\Models\Usermail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $subject = $request->subject;
        $message = $request->content;

        $te = [];
        $subscribers = Usermail::get();
        foreach($subscribers as $row) {
            Mail::to($row->email)->send(new Newsmail($subject,$message));
        }

        dd($te);

        return redirect()->back()->with('success', 'Email is Sent Successfully.');
    }
}
