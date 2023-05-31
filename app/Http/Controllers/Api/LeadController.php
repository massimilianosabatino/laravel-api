<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewMessage;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('info@boolfolio.com')->send(new NewMessage($newLead));

        return $newLead;
    }
}
