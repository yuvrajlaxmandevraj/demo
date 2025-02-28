<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\OpenIdsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getOpenContextIds()
    {
        $response = getOpenContextIds();
        $array = json_decode(json_encode($response), true);
        $dummyIds = getAllIds($array);
        $uniqueIds = array_unique($dummyIds);
        $uniqueIdsArray = array_map(function ($id) {
            return [$id];
        }, $uniqueIds);
        return Excel::download(new OpenIdsExport($uniqueIdsArray), 'dummy_ids.xlsx');
        return view('ids');
    }

    public function token()
    {
        $user = User::find(1);
        $token = $user->createToken('YourAppName')->plainTextToken;
        api_success('success', ['token' => $token]);
    }


    public function sendMail()
    {
        return view('email');
    }
    public function sendMailSuccess()
    {
        return view('email-success');
    }

    public function PostMail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'max:200'],
            'subject' => ['required', 'max:300'],
            'message' => ['required', 'max:1000'],
        ]);
        $to = $request->email;
        $subject = $request->subject;
        $body = $request->message;
        Mail::raw($body, function ($message) use ($to, $subject) {
            $message->to($to)
                ->subject($subject);
        });

        return redirect()->route('email-send-success')->with('success', 'Email Send successfully');
    }
}
