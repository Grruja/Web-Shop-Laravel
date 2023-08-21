@extends('layout')

@section('page_content')
    <div class="container">
        <form method="POST" action="{{ route('contact.update', ['contact' => $contact->id]) }}">
            {{ csrf_field() }}

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif

            <input type="hidden" name="id" value="{{ $contact->id }}">

            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{ $contact->email }}" class="form-control" id="email">

            <label for="subject" class="form-label">Subject</label>
            <input type="text" name="subject" value="{{ $contact->subject }}" class="form-control" id="subject">

            <button class="btn btn-danger text-white mt-3">Update</button>
        </form>
    </div>
@endsection
