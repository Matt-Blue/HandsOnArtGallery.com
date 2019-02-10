@extends('layouts.app')

@section('content')

<?php use Illuminate\Support\Facades\Route; ?>

<div class="container-fluid">
    <div class="wrapper" id="info">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Pay for an Event</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <?php foreach($event as $e){ ?>
                            <?php if(isset($e->image)){ ?>
                                <div class="col-md-4 text-center">
                                    <img src="{{asset('public/img/' . $e->image)}}" alt="<?=$e->image?>" width="100%"/>
                                </div>                    
                                <div class="col-md-8 text-center">
                            <?php } else { ?>
                                <div class="col-md-12 text-center">
                            <?php } ?>                            
                            <div class="row">Name: <?php echo($e->name); ?></div>
                            <div class="row">Description: <?php echo($e->description); ?></div>
                            <div class="row">Type: <?php echo($e->type); ?></div>
                            <div class="row">Date: <?php echo($e->date); ?></div>
                            <div class="row">Start Time: <?php echo($e->start_time); ?></div>
                            <div class="row">End Time: <?php echo($e->end_time); ?></div>
                            <div class="row">Price: $<?php echo($e->price); ?></div>

                            <!-- PAY FOR EVENT FORM -->

                            <?php if(isset($e->price) && $e->price != 0){ ?>
                                <form action="{{ url('/charge') }}/{{$e->id}}" method="POST">
                                    <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="pk_test_KqarsaXwAaC77z25DeO3tPEz"
                                        data-amount="<?php echo($e->price * 100); ?>"
                                        data-name="Hands On Art Gallery &amp; Studio"
                                        data-description="Example charge"
                                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                        data-locale="auto">
                                    </script>
                                    {{ csrf_field() }}
                                </form>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>   
            </section>
        </div>
    </div>
</div>

@endsection