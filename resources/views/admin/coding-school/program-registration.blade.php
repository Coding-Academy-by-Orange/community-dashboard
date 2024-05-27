@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Coding School Registration - {{$registration->name}}</h1>
                <form action="{{ route('admin.coding-school.registration.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group" id="email">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
