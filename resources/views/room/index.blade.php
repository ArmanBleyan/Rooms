@extends('layouts.app')

@section('content')

    
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">Rooms</div>

                    <div class="card-body">
                  

                    @empty($admin['type'])
     
                    @else  

                    <a href="{{ url('/admin/create') }}" class="btn btn-success btn-sm" title="Add New Promo_Code">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add
                    </a>
                            
                    @endempty

                    <br><br>

                    <div class = "container">
                        <div class = "row search" style = "margin-top:0; float:left; margin-left:350px;">
                            <form action = "" class = "col-12">
                                <div class = "form-group">
                                    <input type = "search" name = "search" id = "" class = "form-control" placeholder = "Search by room's type"/>
                                </div>
                                <button class = "btn btn-primary" style = "float:left; margin-left:60px;">Search</button>
                            </form>
                        </div> 
                    </div>   
        
                        <br><br><br><br><br>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Booking</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @if($admin['type'])


                                @foreach($rooms as $item)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ Str::limit($item->description, 20, $end='...') }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>

                                        @foreach($item->booking as $booking)

                                            {{ $booking }}

                                        @endforeach

                                        </td>

                                        <td>
                                       
                                        <a href="{{ url('/admin/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        
                                        <form method="POST" action="{{ url('/admin' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete About" onclick="return confirm(&quot;Confirm&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>

                                        </td>
                                    </tr>
                                @endforeach


                                @else  


                                @foreach($rooms as $item)

                                  @if($item->booking[0] == "Free")

                                     <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ Str::limit($item->description, 20, $end='...') }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>

                                        @foreach($item->booking as $booking)

                                            {{ $booking }}

                                        @endforeach

                                        </td>

                                        <td>
                                       
                                        <a href="{{ url('/admin/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>


                                        @if($admin['type'])
                                        
                                        <form method="POST" action="{{ url('/admin' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete About" onclick="return confirm(&quot;Confirm&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>

                                        @endif

                                        </td>

                                    </tr>

                                  @endif

                                @endforeach


                                @endif
                      
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection