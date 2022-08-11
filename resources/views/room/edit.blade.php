@extends('layouts.app')

@section('content')


<div class="example">

        <form action="{{ url('admin/' .$room->id) }}" method = "POST">
        @csrf

        {{ method_field('PUT') }}

        <input type="hidden" name="id" id="id" value="{{$room->id}}" id="id" />

        @if($admin['type'])

        <label>Name</label></br>
        <input type="text" required name="name" value="{{$room->name}}" class="form-control col-lg-3">

        <br><br>

        @endif

        @if($admin['type'])

        <label>Description</label></br>
        <textarea required name="description" class="form-control col-lg-3">{{$room->description}}</textarea>

        </br><br>

        @endif

        @if($admin['type'])

        <div class="col-lg-3">

        <label class = "label3">Type</label>

        <select name="type"  class = "form-control label3">

        <option value="Single" {{$room->type === "Single" ? 'selected': ""}}>Single</option>
        <option value="Double" {{$room->type === "Double" ? 'selected': ""}}>Double</option>
        <option value="Triple" {{$room->type === "Triple" ? 'selected': ""}}>Triple</option>

        </select>

        </div>

        </br><br> </br><br>

        @endif

        @if($admin['type'])

        <div class="col-lg-3">

        <label class = "label3">Booking</label>

        <select name="booking[]"  class = "form-control label3">

        <option value="Free" {{$room->booking[0] === "Free" ? 'selected': ""}}>Free</option>
        <option value="Busy" {{$room->booking[0] === "Busy" ? 'selected': ""}}>Busy</option>

        </select>

        </div>

        @else

        <div class="col-lg-3">

        <label>Name</label></br>
        
        <input type="text" required name="booking[]"  class="form-control col-lg-12">

        </br><br>


        <label>Last name</label></br>
        
        <input type="text" required name="booking[]"  class="form-control col-lg-12">

        </br><br>


        <label>Phone</label></br>
        
        <input type="number" required name="booking[]" class="form-control col-lg-12">

        </br><br>


        <label>Email</label></br>
        
        <input type="email" required name="booking[]"  class="form-control col-lg-12">

        </div>

        @endif
 
        </br><br> </br><br>  <br>

        <input type="submit" value="Update" class="btn btn-success label"></br></br>
    </form>
   
</div>

@endsection