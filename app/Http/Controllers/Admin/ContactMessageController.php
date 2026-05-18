<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function markRead(ContactMessage $message)
    {
        $message->update([
            'is_read' => true,
        ]);

        return back()->with('success', 'Message marked as read.');
    }

    public function hide(ContactMessage $message)
    {
        $message->update([
            'is_hidden' => true,
            'hidden_at' => now(),
        ]);

        return back()->with('success', 'Message hidden successfully.');
    }

    public function unhide(ContactMessage $message)
    {
        $message->update([
            'is_hidden' => false,
            'hidden_at' => null,
        ]);

        return back()->with('success', 'Message restored successfully.');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return back()->with('success', 'Message deleted permanently.');
    }
}