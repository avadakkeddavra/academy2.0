@extends('layouts.app')
@section('content')
<section class="entry-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if($new->img == '')
                    <img src="{{ asset('img/default.jpg') }}" alt="" class="img-responsive">
                @else
                    <img src="{{asset('img/'.$new->img)}}" alt="" class="img-responsive">
                @endif
            </div>
        </div>
        <div class="desc col-xs-12">
            {{$new->text}}
        </div>
    </div>
</section>
@endsection