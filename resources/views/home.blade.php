@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                    <table class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr>
                                <td> {{ $key+1}} </td>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->email}} </td>
                                <td>
                                    @if($user->status == 1)
                                      <a href="{{ route('user.changeStatus',$user->id) }}">
                                        <span class="badge rounded-pill alert-danger">Disable</span>
                                      </a>
                                    @else
                                      <a href="{{ route('user.changeStatus',$user->id) }}" > <span class="badge rounded-pill alert-success">Active</span></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
