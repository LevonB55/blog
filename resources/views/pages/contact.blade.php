@extends('main')
@section('title', '| Contact')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Contact</h1>
            <hr>
            <form action="{{url('contact')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input class="form-control" type="text" id="subject" name="subject">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" type="text" id="message" name="message">Type your message here...</textarea>
                </div>
                <input type="submit" value="Send Message" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection