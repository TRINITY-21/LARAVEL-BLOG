@extends('layouts.app')

@section('content')

            <div class="card">
                <h3><div class="card-header">Dashboard</div></h3>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

@endsection
