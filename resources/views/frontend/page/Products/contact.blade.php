@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{!! $title !!}</div>

                <div class="card-body">
                    <?php
                    //var_dump($title);var_dump($hospital_data);
                    ?>

<?php
 $route = Route::current();
 $name = Route::currentRouteName();
 $action = Route::currentRouteAction();
 print '=>'.$route->wheres['pages'];
 // if($route->wheres['pages']);
?>
                    

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">
    
        <a class="nav-link" href="{{ route('page','contact') }}" >{{ __('Contact') }}</a>
    </h5>
    <p class="card-text">Loream Ipsaam comes here</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
    Cras justo odio
    </li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>


  <a class="nav-link {{ (request()->segment(2) == 'enquiry-contact') ? 'active' : '' }}" href="{{ route('page','enquiry-contact') }}" >{{ __('EnquiryContact') }}</a>

 <a class="nav-link" href="{{ route('page','about') }}">{{ __('About') }}</a>
 <a class="nav-link" href="{{ route('page','terms') }}">{{ __('Terms') }}</a>

<div class="just-padding">

<div class="list-group list-group-root well">
  
  <a href="{{ route('page','contact') }}" class="list-group-item active">{{ __('Contact') }}</a>
  <div class="list-group">
    
    <a href="{{ route('page','sales-contact') }}" class="list-group-item">{{ __('SalesContact') }}</a>

    <a href="{{ route('page','enquiry-contact') }}" class="list-group-item">{{ __('EnquiryContact') }}</a>

   

    
    
  </div>
  
  <a href="#" class="list-group-item">Item 2</a>
  <div class="list-group">
    
    <a href="#" class="list-group-item">Item 2.1</a>
    <div class="list-group">
      <a href="#" class="list-group-item">Item 2.1.1</a>
      <a href="#" class="list-group-item">Item 2.1.2</a>
      <a href="#" class="list-group-item">Item 2.1.3</a>
    </div>
    
    <a href="#" class="list-group-item">Item 2.2</a>
    <div class="list-group">
      <a href="#" class="list-group-item">Item 2.2.1</a>
      <a href="#" class="list-group-item">Item 2.2.2</a>
      <a href="#" class="list-group-item">Item 2.2.3</a>
    </div>
    
    <a href="#" class="list-group-item">Item 2.3</a>
    <div class="list-group">
      <a href="#" class="list-group-item">Item 2.3.1</a>
      <a href="#" class="list-group-item">Item 2.3.2</a>
      <a href="#" class="list-group-item">Item 2.3.3</a>
    </div>
    
  </div>
  
  
  <a href="#" class="list-group-item">Item 3</a>
  <div class="list-group">
    
    <a href="#" class="list-group-item">Item 3.1</a>
    <div class="list-group">
      <a href="#" class="list-group-item">Item 3.1.1</a>
      <a href="#" class="list-group-item">Item 3.1.2</a>
      <a href="#" class="list-group-item">Item 3.1.3</a>
    </div>
    
    <a href="#" class="list-group-item">Item 3.2</a>
    <div class="list-group">
      <a href="#" class="list-group-item">Item 3.2.1</a>
      <a href="#" class="list-group-item">Item 3.2.2</a>
      <a href="#" class="list-group-item">Item 3.2.3</a>
    </div>
    
    <a href="#" class="list-group-item">Item 3.3</a>
    <div class="list-group">
      <a href="#" class="list-group-item">Item 3.3.1</a>
      <a href="#" class="list-group-item">Item 3.3.2</a>
      <a href="#" class="list-group-item">Item 3.3.3</a>
    </div>
    
  </div>
  
</div>
  
</div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
