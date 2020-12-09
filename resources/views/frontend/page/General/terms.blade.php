@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{!! $title !!}</div>

                <div class="card-body">
                   
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque iaculis orci vel feugiat scelerisque. Proin sodales tellus a laoreet dignissim. Duis posuere velit auctor dolor fermentum volutpat. Sed luctus orci pellentesque auctor ornare. Aliquam nisi ex, posuere semper libero porta, egestas facilisis justo. Suspendisse ut maximus diam. Praesent eget commodo mauris. Phasellus et erat eu nisl porttitor pharetra. Cras fringilla placerat porttitor. Sed vehicula at mi vitae egestas. Vivamus maximus augue libero, nec rhoncus ex efficitur eget. Donec augue felis, consectetur et nisl id, volutpat semper libero. Morbi ac augue ornare, elementum leo pretium, lacinia nisl. In mollis mauris est, non accumsan tellus euismod nec.
                    </p>

                    <p>
                    Pellentesque aliquam venenatis enim vitae semper. Suspendisse et metus ut lacus malesuada lacinia. Ut euismod lectus in consectetur vestibulum. Suspendisse potenti. Suspendisse sit amet leo erat. Proin sollicitudin nisi quam, et pretium eros commodo ac. Sed id justo vel ex maximus interdum. Vivamus non ante at felis laoreet gravida at a metus. Nulla at leo a felis posuere placerat. Integer eget diam nec metus condimentum ornare in a elit. Suspendisse vitae laoreet nulla. 
                    </p>



                </div>
                <div class="card-footer bg-transparent"><a href="{{ route('page','about') }}" class="btn btn-primary next">Next &raquo;</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
