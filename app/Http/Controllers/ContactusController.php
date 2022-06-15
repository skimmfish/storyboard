<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactusController extends Controller
{

    public function store(Request $r){

        $newEnq = new \App\Models\Contactus;
        $newEnq->first_name = $r->first_name;
        $newEnq->last_name= $r->last_name;
        $newEnq->user__email = $r->user__email;
        $newEnq->phone_number = $r->phone_number;
        $newEnq->issues_category = $r->issues_category;
        $newEnq->message = $r->message;

        $rules = [
            'message'=>'required',
            'first_name' =>'required',
            'last_name'=>'required',
            'user__email'=>'required | email',
            'phone_number'=>'min:11 | max:14',
            'issues_category'=>'required'
        ];

        $r->validate($rules);
        $newEnq->save($r->all());
        return redirect()->back()->with(['success'=>'Your message has been noted, we shall revert before the next 24hours. Thank you.']);
    }
}
