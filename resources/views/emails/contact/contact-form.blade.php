@component('mail::message')

    # Thank You For Your Message

    <p><strong>Name:</strong> {{$data['name']}}</p>
    <p><strong>Email:</strong> {{$data['email']}}</p>
    <p><strong>Phone Number:</strong> {{$data['phone']}}</p>
    <p><strong>Country:</strong> {{$data['country']}}</p>
    <strong>Question:</strong>
    <p>{{$data['question']}}</p>

@endcomponent
