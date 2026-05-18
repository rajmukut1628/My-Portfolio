<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactMessage;

class PortfolioContactController extends Controller
{
    public function send(Request $request)
{
    $data = $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'email', 'max:150'],
        'message' => ['required', 'string', 'max:3000'],
    ]);

    ContactMessage::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'message' => $data['message'],
    ]);

    return back()->with('success', 'Your message has been sent successfully!');
}
}