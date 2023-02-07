<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail as FacadesMail;
use App\Repositories\UserRespository;

class EmailController extends Controller
{
    public function __construct(protected UserRespository $userRespository)
    {      

    }

    public function sendEmailPage()
    {
        $employeeData = $this->userRespository->getEmployees();
        return view('email.send_email')->with('employeeData', json_decode($employeeData));
    }

    public function sendEmail(SendMailRequest $sendMailRequest)
    {
        $tomail = $sendMailRequest['tomail'];
        $message = $sendMailRequest['message'];
        $testMailData = [
            'title' => $tomail,
            'body' => $message,
        ];
    
        FacadesMail::to("$tomail")->send(new SendMail($testMailData));
        return redirect()->back()->with('message', 'Success! Email has been sent successfully!');
    }
}