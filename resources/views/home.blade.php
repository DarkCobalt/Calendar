@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="calendar">
                        <div class="calendar-header">
                            <a href="/calendar"><button type="button"  class="btn btn-default today">Today</button></a>
                            <a href="/calendar?date={{ $prev }}"><button type="button" class="btn btn-default previus">Previus</button></a>
                            <a href="/calendar?date={{ $days[6]}}"><button type="button"  class="btn btn-default next">Next</button></a>
                            <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="/calendar/edit-calendar/{{ $calendar?$calendar->id:'' }}">Edit Calendar</button>
                        </div>
                        <div class="calendar-panel calendar-{{ $calendar?$calendar->color:'default' }}">
                            <h1 class="text-center">{{ $calendar?$calendar->title:'Calendar' }}</h1>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td></td>
                                        @foreach($days as $day)
                                            <th>{{ $day }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hours as $hour)
                                        <tr>
                                            <th>{{ $hour }}</th>
                                            <td data-toggle="modal" data-target="/calendar/add-event?date={{ $days[0] }}&time={{ $hour }}"></td>
                                            <td data-toggle="modal" data-target="/calendar/add-event?date={{ $days[0] }}&time={{ $hour }}"></td>
                                            <td data-toggle="modal" data-target="/calendar/add-event?date={{ $days[0] }}&time={{ $hour }}"></td>
                                            <td data-toggle="modal" data-target="/calendar/add-event?date={{ $days[0] }}&time={{ $hour }}"></td>
                                            <td data-toggle="modal" data-target="/calendar/add-event?date={{ $days[0] }}&time={{ $hour }}"></td>
                                            <td data-toggle="modal" data-target="/calendar/add-event?date={{ $days[0] }}&time={{ $hour }}"></td>
                                            <td data-toggle="modal" data-target="/calendar/add-event?date={{ $days[0] }}&time={{ $hour }}"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
