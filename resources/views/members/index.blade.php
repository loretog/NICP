@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <h1>{{ __('Members') }}</h1>
          <table class="table table-bordered">
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
            </tr>
            @foreach( $members as $member )
            <tr>
              <td>{{ $member->firstname }}</td>
              <td>{{ $member->lastname }}</td>
              <td>{{ $member->email }}</td>
            </tr>
            @endforeach
          </table>
        </div>
    </div>
</div>
@endsection
