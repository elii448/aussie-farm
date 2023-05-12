@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Kangaroo Information Form</h2>
        <form id="form" method="{{ isset($kangaroo->id) ? 'PUT' : 'POST' }}">
            @csrf
            <div class="form-group">
                <label for="name">Name*</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    value="{{ old('name', $kangaroo->name ?? '') }}"
                >
                <span class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="nickname">Nickname</label>
                <input
                    type="text"
                    class="form-control"
                    id="nickname"
                    name="nickname"
                    value="{{ old('nickname', $kangaroo->nickname ?? '') }}"
                >
            </div>
            <div class="form-group">
                <label for="weight">Weight*</label>
                <input
                    type="number"
                    class="form-control"
                    id="weight"
                    name="weight"
                    value="{{ old('weight', $kangaroo->weight ?? '') }}"
                >
                <span class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="height">Height*</label>
                <input
                    type="number"
                    class="form-control"
                    id="height"
                    name="height"
                    value="{{ old('height', $kangaroo->height ?? '') }}"
                >
                <span class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="gender">Gender*</label>
                <select class="form-control" id="gender" name="gender">
                    @if(old('gender') == '')
                        <option value="" selected>Choose...</option>
                    @endif
                    <option value="male" @if(old('gender', $kangaroo->gender ?? '') == 'male') selected @endif>Male</option>
                    <option value="female" @if(old('gender', $kangaroo->gender ?? '') == 'female') selected @endif>Female</option>
                    <option value="other" @if(old('gender', $kangaroo->gender ?? '') == 'other') selected @endif>Other</option>
                </select>
                <span class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="friendliness">Color</label>
                <select class="form-control" id="color" name="color">
                    <option value="">Choose...</option>
                    <option value="red" @if(old('gender', $kangaroo->color ?? '') == 'red') selected @endif>Red</option>
                    <option value="grey" @if(old('gender', $kangaroo->color ?? '') == 'grey') selected @endif>Grey</option>
                    <option value="dark brown" @if(old('gender', $kangaroo->color ?? '') == 'dark brown') selected @endif>Dark Brown</option>
                    <option value="light brown" @if(old('gender', $kangaroo->color ?? '') == 'light brown') selected @endif>Light Brown</option>
                </select>
            </div>
            <div class="form-group">
                <label for="friendliness">Friendliness</label>
                <select class="form-control" id="friendliness" name="friendliness">
                    <option value="">Choose...</option>
                    <option value="friendly" @if(old('gender', $kangaroo->friendliness ?? '') == 'friendly') selected @endif>Friendly</option>
                    <option value="not friendly" @if(old('gender', $kangaroo->friendliness ?? '') == 'not friendly') selected @endif>Not friendly</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birthday">Birthday*</label>
                <input
                    type="date"
                    class="form-control"
                    id="birthday"
                    name="birthday"
                    value="{{ old('birthday', isset($kangaroo->birthday) ? date('Y-m-d', strtotime($kangaroo->birthday)) : '') }}"
                >
                <span class="text-danger"></span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @vite('resources/js/app.js')
@endsection