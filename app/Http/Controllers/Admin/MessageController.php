<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        return view('admin.mail.index', compact('leads'));
    }

    public function show(Lead $lead)
    {
        return view('admin.mail.show', compact('lead'));
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();

        return to_route('admin.leads.index');
    }
}
