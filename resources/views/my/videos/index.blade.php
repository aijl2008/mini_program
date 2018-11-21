@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8"><a href="{{route('videos.create')}}">new</a>
                <table>
                    <tr>
                        @foreach($rows as $row)
                            <td>
                                <h3>{{$row->title}}<small>
                                        <span>{{$row->click_number}}</span>
                                        <span>{{$row->liked_number}}</span>
                                    </small></h3>
                                <video src="{{$row->url}}"></video>
                            </td>
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection