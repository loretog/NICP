@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <h1>{{ __('Members') }}</h1>
          <table class="table table-bordered">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Company / School</th>
              <th></th>
            </tr>
            @foreach( $members as $member )
            <tr>
              <td>{{ $member->name }}</td>
              <td>{{ $member->email }}</td>
              <td>{{ $member->contact_number }}</td>
              <td>{{ $member->affiliation }}</td>
              <td><a href="/members/print/{{ $member->id }}">Print</a></td>
            </tr>
            @endforeach
          </table>
        </div>
    </div>
</div>
@endsection
