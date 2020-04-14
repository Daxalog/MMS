@extends('layouts/layout')
@section('content')
    <p>Input </p>
    <h1>Create Worker</h1>
    <form>
        <label for="workFname">First Name:</label><br>
        <input type="text" id ="fname" name ="fname"><br>
        <label for="workLname">Last Name:</label><br>
        <input type="text" id ="lname" name ="lname"><br>
        <label for="workEmail">Email:</label><br>
        <input type="email" id ="workEmail" name ="workEmail"><br><br>
        <button type="button"> Adds Worker </button>   
    </form>
@endsection