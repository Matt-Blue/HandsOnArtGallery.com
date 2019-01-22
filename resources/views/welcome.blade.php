@extends('layouts.app')

@section('content')

<!-- Banner -->
<section id="banner">
    <div class="items">
        <section class="accent2">
            <h1>Artistic Services</h1>
            <p>Workshops, Parties and Walk-In Studio</p>
            <ul class="actions">
                <li><a href="{{ url('/#services') }}" class="button special">What We Offer</a></li>
            </ul>
        </section>
        <section class="accent3">
            <h1>Calendar</h1>
            <p>See what's going on at Hands On</p>
            <ul class="actions">
                <li><a href="{{ route('calendar') }}" class="button special">Hours & Calendar</a></li>
            </ul>
        </section>
    </div>
    <div class="slider">
        <article>
            <img src="{{ asset('images/slideshow/lorna-wave.jpg') }}" alt="lorna bluestein wave painting" data-position="bottom right" />
        </article>
        <article>
            <img src="{{ asset('images/slideshow/solo-artist.jpg') }}" alt="solo artist" data-position="bottom right" />
        </article>
        <article>
            <img src="{{ asset('images/slideshow/group.jpg') }}" alt="group art" data-position="bottom right" />
        </article>
    </div>
</section>

<!-- What We Offer -->
<div class="wrapper" id="services">
    <div class="inner">
        <section class="main" style="background-color: #FCFCFC;">
            <header class="major">
                <h2>What We Offer</h2><br>
            </header>
            <div class="features">
                <section>
                    <span class="icon fa-cubes major accent2"></span>
                    <h3>Workshops</h3>
                    <ul style="text-align: left;">
                        <li>Scheduled on the <a href="{{ route('calendar') }}">calendar</a></li>
                        <li>Each session 2-3 hours</li>
                        <li>Materials included</li>
                    </ul>
                    <a class="btn btn-primary" data-toggle="collapse" data-target="#workshops" 
                    href="#workshops" role="button" aria-expanded="false" aria-controls="workshops">
                    More
                    </a>
                </section>
                <section>
                    <span class="icon fa-calendar major accent4"></span>
                    <h3>Parties</h3>
                    <ul style="text-align: left;">
                        <li>Custom projects for large groups</li>
                        <li>All ages welcome</li>
                        <li>Adult beverages permissible for age appropriate parties</li>
                        <li>Materials included</li>
                    </ul>
                    <a class="btn btn-warning" data-toggle="collapse" data-target="#parties" 
                    href="#parties" role="button" aria-expanded="false" aria-controls="parties">
                    More
                    </a>
                </section>
                <section>
                    <span class="icon fa-paint-brush major accent3"></span>
                    <h3>Gallery</h3>
                    <ul style="text-align: left;">
                        <li>Real artwork for real people</li>
                        <li>All work done by Lorna Bluestein, owner of Hands On</li>
                        <li>All artwork is affordable</li>
                    </ul>
                    <a class="btn btn-success" href="http://www.handsonartwork.net/" target="_blank">
                    More
                    </a>
                </section>
            </div>
        </section>
    </div>
</div>

<!-- Services Collapsable Sections -->

<!-- Workshops -->
<div class="collapse wrapper" id="workshops">
    <div class="inner">
        <section class="main" style="background-color: #FCFCFC; border: 0.75rem solid #4cabb1;">
            <div style="position: relative; display: inline-block;">
                
                <!-- Close Button -->
                <a data-toggle="collapse" data-target="#workshops" 
                href="javascript:void(0);" role="button" aria-expanded="false" aria-controls="workshops">
                    <span style="position: absolute; top: 0; right: 0; font-size: 1.5rem;" class="fa fa-times"></span>
                </a>

                <header class="major">
                    <h2>Workshops</h2><br>
                </header>

                <div class="row">
                    <!-- Image -->
                    <div class="3u 12u$(medium)">
                        <section>
                            <img src="{{ asset('images/events/workshop.JPG') }}" alt="art workshop" class="img-thumbnail" style="border: 0 none; box-shadow: none;">
                        </section>
                    </div>
                    <!-- Content -->
                    <div class="9u 12u$(medium)">
                        <p>
                            Workshops are designed to offer customers the opportunity to create a 
                            desired piece of art with instruction.
                            A variety of scheduled workshops will be posted monthly on the website calendar. 
                        </p>
                        <p>
                            Each workshop consists of a selected item and chosen subject during a 2-3 hour time slot. 
                            The price for all workshops includes all the supplies needed to complete the project. 
                            Set up and clean up will be provided, along with an apron to protect your clothing.  
                            (It is still not recommended to wear nice clothes to these events.) 
                        </p>
                        <p>
                            Instruction and <i>HANDS ON</i> guidance will be given throughout the workshop. 
                            All participants will be given the same directions, but it is ok to add your own twist!  
                            In fact, it is encouraged for you to express your individuality. 
                            Workshops are open to all interested parties and it is a great way to 
                            meet other creative people. 
                        </p>
                        <p>
                            You can sign up for workshops online through this website. 
                            Suggestions for specific workshops are always welcomed. 
                            Please arrive 15 minutes early so that the instruction can start on time. 
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Parties -->
<div class="collapse multi-collapse wrapper" id="parties">
    <div class="inner">
        <section class="main" style="background-color: #FCFCFC; border: 0.75rem solid #fed586;">
            <div style="position: relative; display: inline-block;">
                
                <!-- Close Button -->
                <a data-toggle="collapse" data-target="#parties" 
                href="javascript:void(0);" role="button" aria-expanded="false" aria-controls="parties">
                    <span style="position: absolute; top: 0; right: 0; font-size: 1.5rem;" class="fa fa-times"></span>
                </a>

                <header class="major">
                    <h2>Parties</h2><br>
                </header>

                <div class="row">
                    <!-- Image -->
                    <div class="3u 12u$(medium)">
                        <section>
                            <img src="{{ asset('images/events/party.JPG') }}" alt="art party" class="img-thumbnail" style="border: 0 none; box-shadow: none;">
                        </section>
                    </div>
                    <!-- Content -->
                    <div class="9u 12u$(medium)">
                        <p>
                            Private parties are closed to the public and allows customers to design their own personal 
                            painting party. Scheduling a private party for a specific event, fundraiser or special occasion 
                            gives you the freedom to choose your item, subject, guests and date & time of the event. 
                        </p>
                        <p>
                            Decorations and refreshments are welcomed.  Wine or beer, along with snacks, are popular 
                            for adult parties, but hard liquor is not permitted. Kids birthday parties are a hit, 
                            and a cake and or other items are welcome to enhance the effect of your party. 
                            Age appropriate instruction will be given and a variety of designs are available to choose from 
                            for party themes. Set up, clean up, aprons and personal hands on directions will be given 
                            during the party. Parties are priced by the item, per individual, which is all inclusive. 
                        </p>
                        <p>
                            Parties must include 5 - 20 individuals.  
                            There is a 50% deposit required to book a party and no refunds will be given.
                        </p>
                        <p>
                            Off-site parties are available upon request and availability. 
                            Party packages are available upon request. 
                            All parties can be requested online through this website. 
                        </p>
                        <p>
                            Special requests and suggestions are considered and welcomed. 
                            Arriving 15-30 minutes early will allow the project instruction to start on time. 
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Contact Information -->
<div class="wrapper" id="info">
    <div class="inner">
        <section class="main" style="background-color: #FCFCFC; padding-top: 0rem;"><!--Color makes it blend with the logo-->
            <!-- Logo and Information -->
            <div class="row">
                <div class="12u 12u$(medium)">
                    <p>
                        <!-- Address -->
                        <div class="row">
                            <div class="12u 12u$(medium) text-center">
                                <span class="icon fa-home" style="margin-right: 10px"></span>
                                1625 SE 47th Terrace Cape Coral, FL 33904 Unit 2
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="row">
                            <div class="12u 12u$(medium) text-center">
                                <span class="icon fa-envelope-o" style="margin-right: 10px"></span>
                                HandsOnArtGalleryAndStudio@gmail.com
                            </div>
                        </div>
                        <!-- Phone Number -->
                        <div class="row">
                            <div class="12u 12u$(medium) text-center">
                                <span class="icon fa-phone" style="margin-right: 10px"></span>
                                (239) 233 - 5662
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- About the Owner -->
<div class="wrapper" id="owner">
    <div class="inner">
        <section class="main accent3">
            <!-- Header -->
            <header class="major">
                <h2>The Artist</h2>
            </header>
            <div class="row">
                <div class="3u 12u$(medium)">
                    <img src="{{ asset('images/lb.JPG') }}" style="width: 100%; height: 100%;">
                </div>
                <div class="9u 12u$(medium)">
                    <p>
                    Lorna Bluestein was born and raised in Indiana. 
                    She received her BA in Fine Arts at Indiana University. 
                    She spent five years in Massachusetts working as a retail manager.  
                    She then married and moved to Colorado where she spent twenty years 
                    living the beautiful mountain life. 
                    During this time she raised two kids and taught preschool children. 
                    In 2014, Lorna and her family relocated to Florida to be near their relatives. 
                    Lorna found a job teaching high school art. 
                    One of her students asked her to keep the art program HANDS ON, 
                    instead of converting all the art to technology. 
                    This suggestion inspired her to experiment and include a variety of 
                    mediums and techniques into her lessons. 
                    Lorna’s passion for art was back stronger than ever and this gave her 
                    the ambition to start her own business. Her goal is to teach a variety of art styles 
                    and techniques to all ages and to inspire those who wish to learn 
                    HANDS ON craftsmanship.
                    </p>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Pricing -->
<div class="wrapper" id="pricing">
    <div class="inner">
        <section class="main accent2">
            <header class="major">
                <center><h2>Pricing</h2></center><br>
            </header>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="table-wrapper" style="padding: 1rem; border: 1px solid white;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $item){ ?>
                                    <tr>
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