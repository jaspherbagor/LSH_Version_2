@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $accommodation_type->name }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="home-rooms">
    <div class="container">
        <div class="row">
            @foreach($accommodation_all as $item)
            <div class="col-md-3">
                <div class="inner">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="">
                    </div>
                    <div class="text">
                        <h2><a href="{{ route('room_detail',$item->id) }}">{{ $item->name }}</a></h2>
                        <div class="button">
                            <a href="{{ route('room_detail',$item->id) }}" class="btn btn-primary">See Rooms</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- <div class="col-md-3">
                <div class="inner">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="">
                        <img src="{{ asset('uploads/n4.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <h2><a href="{{ route('room_detail',$item->id) }}">{{ $item->name }}</a></h2>
                        <h2 class="text-center">Casie Hotel</h2>
                        <div class="button">
                            <a href="{{ route('room_detail',$item->id) }}" class="btn btn-primary">See Detail</a>
                            <a href="#" class="btn btn-primary">See Accommodation</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection