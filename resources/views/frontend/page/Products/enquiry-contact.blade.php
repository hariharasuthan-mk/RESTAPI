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
 print $route->wheres['pages'];
?>
                    
 <a class="nav-link" href="{{ route('page','contact') }}" >{{ __('Contact') }}</a>

  <a class="nav-link" href="{{ route('page','sales-contact') }}" >{{ __('SalesContact') }}</a>


  <a class="nav-link {{ (request()->segment(2) == 'enquiry-contact') ? 'active' : '' }}" href="{{ route('page','enquiry-contact') }}" >{{ __('EnquiryContact') }}</a>

 <a class="nav-link" href="{{ route('page','about') }}">{{ __('About') }}</a>
 <a class="nav-link" href="{{ route('page','terms') }}">{{ __('Terms') }}</a>

<div class="just-padding">

<div class="list-group list-group-root well">
  
  <a href="#" class="list-group-item active">{{ __('Contact') }}</a>
  <div class="list-group">
    
    <a href="#" class="list-group-item active">{{ __('SalesContact') }}</a>

    <a href="#" class="list-group-item active">{{ __('EnquiryContact') }}</a>

   

    <div class="list-group">
      <a href="#" class="list-group-item">Item 1.1.1</a>
      <a href="#" class="list-group-item">Item 1.1.2</a>
      <a href="#" class="list-group-item">Item 1.1.3</a>
    </div>
    
    <a href="#" class="list-group-item">Item 1.2</a>
    <div class="list-group">
      <a href="#" class="list-group-item">Item 1.2.1</a>
      <a href="#" class="list-group-item">Item 1.2.2</a>
      <a href="#" class="list-group-item">Item 1.2.3</a>
    </div>
    
    <a href="#" class="list-group-item">Item 1.3</a>
    <div class="list-group">
      <a href="#" class="list-group-item">Item 1.3.1</a>
      <a href="#" class="list-group-item">Item 1.3.2</a>
      <a href="#" class="list-group-item">Item 1.3.3</a>
    </div>
    
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
