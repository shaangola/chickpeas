@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                <div id="example"></div>
                <table class="table table-bordered table-hover" id="example">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($menus as $row)
                    <tr>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->full_price }}</td>
                        <td><a href="#">edit</a> | <a href="#">delete</a></td>
                        @foreach($row->children as $subgoal)
                            <li><a href="#">{{ $subgoal->title }}</a></li>
                        @endforeach
                    </tr>
                </tbody>

                @endforeach
                
            </table>
            
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
