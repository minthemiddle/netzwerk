@extends('layouts.app')

@section('content')
    @if ($errors->any())
    <div class="p-2 bg-yellow-100 border border-yellow-500">
        <ul class="list-disc">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form action="{{ route('contact.update', $contact) }}" method="POST">
    @method('PUT')
    @csrf
    <label class="block mt-4">
        <p class="text-sm text-gray-800">Firstname</p>
        <input type="text" class="mt-2 form-input" name="firstname" value="{{ old('firstname', $contact->firstname) }}" required>
    </label>

    <label class="block mt-4">
        <p class="text-sm text-gray-800">Lastname</p>
        <input type="text" class="mt-2 form-input" name="lastname" value="{{ old('lastname', $contact->lastname) }}">
    </label>

    <label class="block mt-4">
        <p class="text-sm text-gray-800">E-Mail</p>
        <input type="email" class="mt-2 form-input" name="email" value="{{ old('email', $contact->email) }}">
    </label>

    <label class="block mt-4">
        <p class="text-sm text-gray-800">Birthdate</p>
        <input type="date" class="mt-2 form-input" name="birthdate" value="{{ old('birthdate', $contact->birthdate->toDateString()) }}">
    </label>

    <div class="mt-4">
        <p class="text-sm text-gray-800">Priority</p>
        <select name="priority" id="priority" class="form-select">
            @foreach ($priorities as $key => $value)
                <option value="{{ $key }}" {{ old('priority', $contact->priority) == $key ? "selected" : "" }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-4">
        <button type="submit" class="p-2 bg-blue-200">Change contact</button>
    </div>

    </form>
@endsection
