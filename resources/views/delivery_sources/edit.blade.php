@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($deliverySource->title) ? $deliverySource->title : 'Delivery Source' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('delivery_sources.delivery_source.index') }}" class="btn btn-primary" title="Show All Delivery Source">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">Back</span>
                </a>

                <a href="{{ route('delivery_sources.delivery_source.create') }}" class="btn btn-success" title="Create New Delivery Source">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Add new</span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('delivery_sources.delivery_source.update', $deliverySource->source_id) }}" id="edit_delivery_source_form" name="edit_delivery_source_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('delivery_sources.form', [
                                        'deliverySource' => $deliverySource,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection