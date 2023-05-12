@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kangaroo Information</h5>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label font-weight-bold" for="name">Name:</label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext">{{ $kangaroo->name }}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label font-weight-bold" for="nickname">Nickname:</label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext">{{ $kangaroo->nickname }}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label font-weight-bold" for="weight">Weight:</label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext">{{ $kangaroo->weight }} kg</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label font-weight-bold" for="height">Height:</label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext">{{ $kangaroo->height }} m</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label font-weight-bold" for="gender">Gender:</label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext">{{ ucfirst($kangaroo->gender) }}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label font-weight-bold" for="color">Color:</label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext">{{ ucfirst($kangaroo->color) }}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label font-weight-bold" for="friendliness">Friendliness:</label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext">{{ ucfirst($kangaroo->friendliness) }}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label font-weight-bold" for="birthday">Birthday:</label>
                        <div class="col-md-8">
                            <div class="form-control-plaintext">{{ date('F j, Y', strtotime($kangaroo->birthday)) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
