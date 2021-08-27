<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    // mailchimp function
    public function mailchimp()
    {
        $mailchimp = new \MailchimpMarketing\ApiClient();

        return $mailchimp->setConfig([
            'apiKey' =>  config('services.chimp.key'),
            'server' => 'us5'
        ]);
    }


    // subscriber function
    public function subscribe(Request $request)
    {

        $request->validate([
            'email' =>  'required|email'
        ]);

        try {
            $this->mailchimp()->lists->addListMember(config('services.chimp.list_id'), [
                "email_address" => $request->email,
                "status" => "pending",
            ]);
        } catch (\Exception $e) {

            return back()->withInput()->withErrors([
                'email' =>  'some thing is error'
            ]);
        }

        return redirect()->route('post.index')->with('success', 'successfully subscribe to our web site');
    }

    // lists function
    public function lists()
    {
        $response = $this->mailchimp()->lists->getListMembersInfo(config('services.chimp.list_id'));
        dd($response);
    }

}
