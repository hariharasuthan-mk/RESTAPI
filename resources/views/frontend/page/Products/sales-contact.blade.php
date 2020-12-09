@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{!! $title !!}</div>

                <div class="card-body">
                    <?php
                    var_dump($title);
                    var_dump($hospital_data);
                    ?>

                    
 <a class="nav-link {{ (request()->is('app/*-contact')) ? 'active' : '' }}" href="{{ route('page','contact') }}" >{{ __('Contact') }}</a>

  <a class="nav-link {{ (request()->is('fp/sales-contact')) ? 'active' : '' }}" href="{{ route('page','sales-contact') }}" >{{ __('SalesContact') }}</a>


 <a class="nav-link" href="{{ route('page','about') }}">{{ __('About') }}</a>
 <a class="nav-link" href="{{ route('page','terms') }}">{{ __('Terms') }}</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
