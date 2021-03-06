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

    <div class="mt-4">
        <form action="{{ route('note.store') }}" method="POST">
            @csrf
            <input type="hidden" name="contact_id" value="{{ $contact->id }}">
            <input type="hidden" name="type" value="0">
            <textarea name="body" class="form-textarea block" cols="30" rows="6"></textarea>
            <button type="submit" class="mt-2 p-2 bg-blue-200">Add note</button>
        </form>
    </div>

    @if ($notes)
    @foreach ($notes as $note)
    <div class="mt-4">
         <div class="flex items-center text-xs text-gray-700">
         <a href="{{ route('note.edit', $note->id) }}">@svg('edit')</a>
         <form action="{{ route('note.destroy', $note) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit">@svg('trash-2')</button>
         </form>
         <p class="ml-1">{{ $note->created_at->diffForHumans() }}</p>
         </div>
         <div class="mt-2">
         <textarea class="form-textarea" name="" id="" cols="30" readonly>{{ $note->body }}</textarea>
         </div>

    </div>
    @endforeach
    @endif
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/autosize@4.0.2/dist/autosize.min.js"></script>
<script>
autosize(document.querySelectorAll('textarea'));
</script>

@endsection
