@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($deliverySource->title) ? $deliverySource->title : 'Delivery Source' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('delivery_sources.delivery_source.destroy', $deliverySource->source_id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('delivery_sources.delivery_source.index') }}" class="btn btn-primary" title="Show All Delivery Source">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('delivery_sources.delivery_source.create') }}" class="btn btn-success" title="Create New Delivery Source">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('delivery_sources.delivery_source.edit', $deliverySource->source_id ) }}" class="btn btn-primary" title="Edit Delivery Source">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Delivery Source" onclick="return confirm(&quot;Delete Delivery Source??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Title</dt>
            <dd>{{ $deliverySource->title }}</dd>
            <dt>Status</dt>
            <dd>{{ ($deliverySource->status) ? 'Yes' : 'No' }}</dd>
            <dt>Added On</dt>
            <dd>{{ $deliverySource->added_on }}</dd>

        </dl>

    </div>
</div>

@endsection