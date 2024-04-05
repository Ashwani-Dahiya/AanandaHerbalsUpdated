@extends('layouts.app')
@section('content')
<style>
@media only screen and (min-width: 1360px){
    .cd__main{
      max-width: 1280px;
      margin-left: auto;
      margin-right: auto;
      padding: 24px;
    }
}
</style>



</style>
<div class="container mt-4 mb-4 p-4">
<div class="jumbotron text-center">
    <img src="{{ asset('img/thankyou/icons8-check.gif') }}" alt="" height="70">
    <h2 class="display-5">Hello {{ Auth::user()->username }}</h2>
    <p class="lead"><strong>Thank you for ordering.</strong> We received your order and will begin processing it soon </p>
    <p>Your order ID is : {{ $order_id }}</p>
    <hr>
    <p>
       Having trouble? <a href="{{ route('contact.us') }}">Contact us</a>
    </p>
    <p class="lead mt-2" >
       <a class="btn btn-success btn-sm" href="{{ route('home') }}" role="button">Continue Shopping</a>
    </p>
 </div>
</div>
@endsection
