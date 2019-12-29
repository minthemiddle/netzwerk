@extends('layouts.app')

@section('content')
    <ul class="list-disc leading-loose">
        @foreach ($contacts as $contact)
            <li>
                <a href="{{ route('contact.edit', $contact) }}">@svg('edit')</a>
                <form action="{{ route('contact.destroy', $contact) }}" method="POST" class="inline"  onsubmit="return confirm('Do you really want to delete the contact?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">@svg('trash-2')</button>
                </form>
                <span class="mx-2 px-2 py-1 inline rounded-lg bg-{{ $contact->color }}-200">{{ $contact->priority_description }}</span><a href="{{ route('contact.show', $contact) }}" class="underline">{{ $contact->firstname }} {{ $contact->lastname ?? '' }}</a>, {{ $contact->email ?? '' }}, {{ $contact->birthdate->toDateString() ?? '' }}</li>
        @endforeach
    </ul>
    <div class="mt-8">
        <a href="{{ route('contact.create') }}" class="underline">Add new contact</a>
    </div>

@endsection
