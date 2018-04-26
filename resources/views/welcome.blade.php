@extends('layouts.app')

<style>
    .playfield {
        line-height:0;
        font-size: 0;
    }

    .row {
        display: block;
        padding:0;
        margin:0;
        list-style-type: none;
    }

    .row>li {
        display: inline-block;
    }

    .tile {
        width:  5px;
        height: 5px;

        margin:     0;
        display:    inline-block;
    }

    .tile.black {
        background: #BADA55;
    }

    .tile.white {
        background: #000;
    }
</style>

@section('content')
    <p>Langton's Ants</p>
    <p>This path was created in {{ $stepCount }} steps.</p>

    <div class="playfield">
        @foreach ($playfield as $row)
            @foreach ($row as $tile)
                @if (1 > $tile->getState())
                    <div class="tile white"></div>
                @else
                    <div class="tile black"></div>
                @endif
            @endforeach
            <br/>
        @endforeach
    </div>
@endsection
