@extends('layouts.app')

@section('content')

<div class="example">
  
      
    <form action="{{ url('/admin') }}" method="POST">
       
       @csrf

        <label>Name</label></br>
        <input type="text" required name="name"  class="form-control col-lg-3">

        <br><br>

        <label>Description</label></br>
        <textarea required name="description"  class="form-control col-lg-3"></textarea>

        <br><br>

        <label>Type</label></br>
        <select name = "type" class = "form-control col-lg-3">

            <option>Single</option>
            <option>Double</option>
            <option>Triple</option>

        </select>

        <br><br>

        <label>Booking</label></br>
        <select name = "booking[]" class = "form-control col-lg-3">

            <option>Free</option>
            <option>Busy</option>

        </select>

        </br>

        <input type="submit" value="Save" class="btn btn-success"></br></br>
    </form>
  
</div>


 @endsection