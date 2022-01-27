@extends('layouts.app')
@section('title','Hakkımızda')
@section('content')

<section class="section pt-5 top-slant-white2 relative-higher">
    <div class="container">
      <div class="row mb-5 justify-content-center" data-aos="fade">
          <div class="col-md-7 text-center heading-wrap">
            <h2 data-aos="fade-up">Hakkımızda</h2>
            @foreach ($aboutus as $about)
            <p style="font-size: 17px" data-aos="fade-up" data-aos-delay="100">{{$about['content']}}</p>
            @endforeach
          </div>
        </div>
    </div>
  </section>

@endsection
