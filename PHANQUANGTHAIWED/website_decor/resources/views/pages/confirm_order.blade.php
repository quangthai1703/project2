@extends('layout')

@section('content')
<section class="confirmation_part padding_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="confirmation_tittle">
            <span style="font-size: 20px">Thank you! Your order has been received!</span>
          </div>
          <center><img style="width: 55%" src="{{asset('public/frontend/img/slider/thankyou.png')}}"/></center>
        </div>
      </div>
  </section>
@endsection