
@extends('layouts.app')



@section('content')
    <div class="container-fluid text-center">

        <div class="row">

                @foreach($army1 as $arm1)

                    @if($arm1->number_of_soliders <= 0)

                        <h3 class="text-success">The winner is Army 2</h3>

                    @endif

                @endforeach

                @foreach($army2 as $arm2)

                    @if($arm2->number_of_soliders <= 0)

                        <h3 class="text-success">The winner is Army 1</h3>

                    @endif

                @endforeach

        </div>


        <a href="{{  route('startagain') }}" class="btn btn-secondary">The end</a>


    </div>
@endsection
