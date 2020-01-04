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

    <div class="mt-4">
        <form action="{{ route('note.update', $note->id) }}" method="POST">
            @csrf
            <input type="hidden" name="contact_id" value="{{ $note->contact_id }}">
            <input type="hidden" name="type" value="0">
            <textarea name="body" class="form-textarea block" cols="30" rows="10">{{ $note->body }}</textarea>
            <button type="submit" class="mt-2 p-2 bg-blue-200">Update note</button>
        </form>
    </div>
@endsection
