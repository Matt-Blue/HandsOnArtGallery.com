@extends('layouts.app')

@section('content')

<!-- Pricing -->
<div class="wrapper" id="pricing">
    <div class="inner">
        <section class="main accent2">
            <header class="major">
                <center><h2>Pricing</h2></center><br>
            </header>
            <!-- New Priced Item Form -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div style="border: 1px solid white; padding: 1rem;">
                        <h3 class="pull-center">Create Priced Item</h3>
                        {!! Form::open(['url' => '/pricing/create','files' => 'true']) !!}
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! Form::label('price', 'Price') !!}
                        {!! Form::number('price', 30, ['style' => 'color: black']) !!}
                        {!! Form::submit('Create', ['class' => 'btn btn-primary pull-right']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <br>
            <!-- Pricing Table -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="table-wrapper" style="padding: 1rem; border: 1px solid white;">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $item){ ?>
                                    <tr>
                                        <td><a href="{{ url('/pricing/delete/'.$item->name) }}">
                                            <button class="btn btn-danger">Remove</button>
                                        </a></td>
                                        <td><?= $item->name ?></td>
                                        <td><?= $item->price ?></td>
                                    </tr>
                                <?php } ?>                            
                            </tbody>
                        </table>
                    </div>
                    <p class="major">
                        <center><b>Other items available upon request</b>
                        <center><b>Fluid painting additional</b></center>
                        <center><b>Must be 16 or older without supervision</b></center>
                    </p>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection