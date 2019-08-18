<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.master')

@section('title', 'Strona główna')

@section('sidebar')

    @parent

@endsection

@section('content') <h3>Strona główna</h3>
    <p>Strona z tekstem</p>
@endsection