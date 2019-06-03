
@extends('layouts.app')



@section('content')
    <div class="container-fluid text-center">

            <div class="row">

                @if($army1)

                    @foreach($army1 as $arm1)

                    <div class="col-sm-3">

                        <h1>{{ $arm1->name }}</h1>

                        <h3>{{  $arm1->number_of_soliders }}</h3>

                        @foreach($army2 as $arm2)

                        <form action="{{ route('power_army_1', [$arm2->id]) }}" method="post">
                            @csrf
                            @method('POST')

                            @if($move == 0)
                                <button type="submit" class="btn btn-danger">Attack</button>
                            @else
                                <button type="submit" class="btn btn-danger" disabled="disabled">Attack</button>

                            @endif


                        </form>

                        @endforeach
                    </div>


                @endforeach

                @endif

                <div class="col-sm-3">

                    @if($army2)

                        @foreach($army2 as $arm2)

                            <h1>{{  $arm2->name }}</h1>

                            <h3>{{  $arm2->number_of_soliders }}</h3>


                            @foreach($army1 as $arm1)

                                <form action="{{ route('power_army_2', [$arm1->id]) }}" method="post">
                                    @csrf
                                    @method('POST')

                                    @if($move == 1)
                                        <button type="submit" class="btn btn-danger">Attack</button>
                                    @else
                                        <button type="submit" class="btn btn-danger" disabled="disabled">Attack</button>
                                    @endif



                                </form>

                            @endforeach

                        @endforeach


                    @endif


                </div>

            </div>


    </div>
@endsection
