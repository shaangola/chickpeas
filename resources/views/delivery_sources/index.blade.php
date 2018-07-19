@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Delivery Sources</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('delivery_sources.delivery_source.create') }}" class="btn btn-success" title="Create New Delivery Source">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Add new</span>
                </a>
            </div>

        </div>
        
        @if(count($deliverySources) == 0)
            <div class="panel-body text-center">
                <h4>No Delivery Sources Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>

                            <th>Title</th>
                            <th>Status</th>
                            <th>Added On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($deliverySources as $deliverySource)
                        <tr>
                            <td>{{$deliverySource->title}}</td>
                            <td>{{$deliverySource->status}}</td>
                            <td>{{$deliverySource->added_on}}</td>
                            <td>

                                <form method="POST" action="{!! route('delivery_sources.delivery_source.destroy', $deliverySource->source_id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('delivery_sources.delivery_source.show', $deliverySource->source_id ) }}" class="btn btn-info" title="Show Delivery Source">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">View</span>
                                        </a>
                                        <a href="{{ route('delivery_sources.delivery_source.edit', $deliverySource->source_id ) }}" class="btn btn-primary" title="Edit Delivery Source">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Delivery Source" onclick="return confirm(&quot;Delete Delivery Source?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $deliverySources->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection