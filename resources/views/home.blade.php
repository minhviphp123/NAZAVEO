@extends('layout.client')
@section('content')
    <p><img src="https://scontent.fhan1-1.fna.fbcdn.net/v/t1.6435-9/90111959_2815366415357357_9110231319694016512_n.jpg?stp=c0.34.206.206a_dst-jpg_p206x206&_nc_cat=110&ccb=1-7&_nc_sid=da31f3&_nc_ohc=NlWxROPW1WEAX-1Ll17&_nc_ht=scontent.fhan1-1.fna&oh=00_AfCRHRxXRbJ5R6B8q_hkVI6EMsdz1yZUXkoytGT8_nTf0g&oe=64534E17"
            alt="be Quyn"></p>
    <p><a href="{{ route('download-image', ['link' => 'https://scontent.fhan1-1.fna.fbcdn.net/v/t1.6435-9/90111959_2815366415357357_9110231319694016512_n.jpg?stp=c0.34.206.206a_dst-jpg_p206x206&_nc_cat=110&ccb=1-7&_nc_sid=da31f3&_nc_ohc=NlWxROPW1WEAX-1Ll17&_nc_ht=scontent.fhan1-1.fna&oh=00_AfCRHRxXRbJ5R6B8q_hkVI6EMsdz1yZUXkoytGT8_nTf0g&oe=64534E17']) }}"
            class="btn btn-primary">Download IMG</a></p>
@endsection
