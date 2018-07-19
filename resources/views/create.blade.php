@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::model($menu, ['action' => 'MenuController@store']) !!}
                    
                    <div class="form-group">
                    {!! Form::label('menu', 'Menu') !!}
                    {!! Form::text('title', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('type', 'Type') !!}
                    {!! Form::select('menu_type', $menuType, null, ['id' => 'system_list', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('type', 'Parent Category') !!}
                    {!! Form::select('parent_id', $menus_list, null, ['id' => 'system_list', 'class' => 'form-control', 'placeholder' => 'Please Select']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('model', 'Description') !!}
                    {!! Form::text('description', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('model', 'Price') !!}
                    {!! Form::text('full_price', '', ['class' => 'form-control']) !!}
                    </div>

                    <button class="btn btn-success" type="submit">Add menu!</button>

                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
