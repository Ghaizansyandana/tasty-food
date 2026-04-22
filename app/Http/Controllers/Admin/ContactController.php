<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReply;

class ContactController extends Controller
{
    /**
     * Display a listing of the contact messages.
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Display the specified contact message.
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Send a reply to the contact message.
     */
    public function sendReply(Request $request, Contact $contact)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        try {
            // Update the contact record with the reply
            $contact->update([
                'reply_message' => $request->reply_message,
                'replied_at' => now(),
            ]);

            // Send the email
            Mail::to($contact->email)->send(new ContactReply($contact, $request->reply_message));

            return redirect()->route('admin.contacts.show', $contact)
                ->with('success', 'Balasan berhasil dikirim ke email user.');
        } catch (\Exception $e) {
            return redirect()->route('admin.contacts.show', $contact)
                ->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified contact message from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
