@extends("layout")

@section("page_title")
    Contact
@endsection

@section("page_content")
    <div class="container mt-5">

        <h3>This is contact page</h3>

        <div class="d-lg-flex justify-content-between mt-4">
            <div class="w-100">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d90809.31455092298!2d20.843636729239563!3d44.66261994888652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47509391ba985a39%3A0xcb5787c17b2e1e1!2z0KHQvNC10LTQtdGA0LXQstC-!5e0!3m2!1ssr!2srs!4v1689016554193!5m2!1ssr!2srs"
                        style="border:0; width:100%; height:100%;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <form method="POST" action="{{ route('save_contact') }}" class="ms-lg-5 w-100 mt-lg-0 mt-4">

                {{ csrf_field() }}

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                @endif

                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email">

                <label for="subject" class="form-label">Subject</label>
                <input type="text" name="subject" class="form-control" id="subject">

                <label for="message" class="form-label">Message</label>
                <textarea name="message" class="form-control" id="message" cols="30" rows="5"></textarea>

                <button class="btn btn-danger text-white mt-3">Submit</button>
            </form>
        </div>

    </div>
@endsection
