<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\EnquirySent;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function SendMessage(ContactFormRequest $request)
    {
        Notification::route('mail', env('MAIL_TO_CONTACT', 'info@sanika.co.za'))
            ->notify(new EnquirySent($request->input('fullname'), $request->input('email'), $request->input('telephone'), $request->input('subject'), $request->input('message')));
        if ($request->wantsJson()) {
            return collect(['result'=>'success']);
        }
    }
}
