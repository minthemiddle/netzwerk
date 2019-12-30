<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Enums\Priority;
use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::all()->sortBy('priority');

        return view('contact.index', compact('contacts'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $priorities = Priority::toSelectArray();
        return view('contact.create', compact('priorities'));
    }

    /**
     * @param \App\Http\Requests\ContactStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactStoreRequest $request)
    {
        $contact = Contact::create($request->all());

        $request->session()->flash('contact.title', $contact->title);

        return redirect()->route('contact.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Contact $contact)
    {
        $priorities = Priority::toSelectArray();
        $notes = $contact->notes()->get();
        return view('contact.edit', compact('contact', 'priorities', 'notes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Contact $contact)
    {
        $priorities = Priority::toSelectArray();
        $notes = $contact->notes()->get();
        return view('contact.edit', compact('contact', 'priorities', 'notes'));
    }

    /**
     * @param \App\Http\Requests\ContactUpdateRequest $request
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(ContactUpdateRequest $request, Contact $contact)
    {
        Contact::find($contact->id)->update($request->all());
        return redirect()->route('contact.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact.index');
    }
}
