<?php
namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactFormController extends Controller
{
    /**
     * Display the contact form.
     */
    public function index()
    {
        return view('contact.form');
    }

    /**
     * Handle the form submission.
     *
     * @param ContactFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactFormRequest $request)
    {
        if ($request->validated() === false) {
            return redirect()->route('contact.index')
                ->withErrors($request->validated())
                ->withInput();
        }


        $contactData = $request->only(['name', 'email', 'message']);
        $contactDataString = implode('|', $contactData) . PHP_EOL;

        File::append('contact_data.txt', $contactDataString);

        return redirect()->route('contact.index')->with('success', 'Thank you for your message!');
    }
}

