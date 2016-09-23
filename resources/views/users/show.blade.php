@extends('layouts.master')

@section('title')
    View Users
@endsection

@section('content')
    @include('includes.message-block')
    <div class="container table-responsive">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                {{$data['title']}}({{$data['count']}})
            </div>

            <!-- Table -->
            <table class="table table-striped toggle-circle-filled">
                <thead>
                <tr>
                    <th data-toogle="true">Name</th>
                    <th data-hide="tablet phone">Email</th>
                    <th>Type</th>
                    <th>Profession</th>
                    <th data-hide="phone">Approved</th>
                </tr>

                </thead>
                <tbody>
                @foreach($data['user'] as $user)
                    <tr>
                        <td>
                            {{$user->first_name}} {{$user->last_name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            {{$user->type}}
                        </td>
                        <td>
                            {{$user->profession}}
                        </td>
                        <td>
                            <input class="approved" name="approved" type="checkbox" value="{{$user->approved}}"
                                   @if(Auth::check()&& Auth::user()->type != 'superuser') disabled @endif>
                        {{--    <input type="hidden" name="_token" value="{{ Session::token() }}">--}}


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection