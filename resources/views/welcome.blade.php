@extends("layout")

@section("page_title")
    Dashboard
@endsection

@section("page_content")
    <div class="container mt-5">

        @if( $hour >= 0 && $hour <= 12 )
            <h3>Good morning</h3>
        @else
            <h3>Good afternoon</h3>
        @endif
        <hr>

        <form method="POST" action="/send-contact">
            @if($errors->any())
                <p>{{ $errors->first() }}</p>
            @endif
            {{ csrf_field() }}

            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email">

            <label for="subject" class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" id="subject">

            <label for="message" class="form-label">Message</label>
            <textarea name="message" class="form-control" id="message" cols="30" rows="5"></textarea>

            <button class="btn btn-danger text-white mt-3">Submit</button>
        </form>

        <p>Current hour: {{ $hour }}</p>
        <p>Current time: {{ $current_time }}</p>
    </div>
@endsection
