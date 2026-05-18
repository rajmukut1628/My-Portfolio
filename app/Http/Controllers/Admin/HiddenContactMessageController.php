<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class HiddenContactMessageController extends Controller
{
    public function index()
    {
        $hiddenMessages = ContactMessage::where('is_hidden', true)
            ->latest('hidden_at')
            ->paginate(10);

        return view('admin.hidden-contact-messages.index', compact('hiddenMessages'));
    }
}