@extends('layouts.app')

@section('content')

<!-- Banner -->
<section id="banner">
    <div class="items">
        <section class="accent2">
            <h1>Artistic Services</h1>
            <p>Workshops, Parties and Gallery</p>
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
            <img src="{{ asset('images/slideshow/group.jpg') }}" alt="group art" data-position="bottom right" />
        </article>
        <article>
            <img src="{{ asset('images/slideshow/kid-group.jpg') }}" alt="group art" data-position="bottom right" />
        </article>
        <article>
            <img src="{{ asset('images/slideshow/kid-portrait.jpg') }}" alt="group art" data-position="bottom right" />
        </article>
        <article>
            <img src="{{ asset('images/slideshow/solo-artist.jpg') }}" alt="solo artist" data-position="bottom right" />
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
                        <li>2-3 hour sessions</li>
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
                        <li>Custom projects</li>
                        <li>All ages welcome</li>
                        <li>Materials included</li>
                        <li>Adult beverages permissible</li>
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
                        <li>Original artwork</li>
                        <li>Affordably priced</li>
                        <li>All work done by the owner</li>
                    </ul>
                    <a class="btn btn-success" href="https://www.handsonartwork.net/" target="_blank">
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
                            A variety of scheduled workshops are posted monthly on the website calendar. 
                            Each workshop consists of a selected item and chosen subject during a 2-3 hour time slot. 
                            Price includes materials, instruction and cleanup.
                            Signup for workshops by clicking on events found in the <a href="{{route('calendar')}}">calendar</a>.
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
                            Parties are closed to the public and allows customers to design their own personal painting party. 
                            Parties must include 5 - 30 individuals.  
                            There is a 50% deposit required to book a party and no refunds will be given.
                            Off-site parties are available upon request and availability. 
                            Parties can be requested by calling (239) 233-5662 or by emailing HandsOnArtGalleryAndStudio@gmail.com
                            Materials, instruction, and cleanup included in the per person price.
                            Arriving 15-30 minutes early will allow the project instruction to start on time.
                        </p>
                        <p>
                            Kid parties are welcomed and as a former preschool teacher, Lorna has the skills to manage your kid's next art party!
                            Instruction will be tailored to the age and skill level of all participants.
                            Cake and other items are permitted during gatherings.
                        </p>
                        <p>
                            Adult parties are also a great time, and much more flexible.
                            Food and beverages are permitted, including alcohol (no hard liquor).
                            Instruction for all skill levels is available and Lorna makes getting out of your comfort zone easy and fun!
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

<!-- Location -->
<div class="wrapper" id="location">
    <div class="inner">
        <section class="main" style="background-color: #FCFCFC;">
            <header class="major">
                <h2>Location</h2><br>
            </header>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14274.604388731957!2d-81.94926481484808!3d26.56347434242882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88db3f27a52cad61%3A0x528479ef28ac595b!2sHands+On+Art+Gallery+and+Studio!5e0!3m2!1sen!2sus!4v1553447412740" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
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

<!-- Hours -->
<div class="wrapper" id="hours">
    <div class="inner">
        <section class="main" style="background-color: #FCFCFC;">
            <header class="major">
                <h2>Hours</h2><br>
            </header>
            <div class="row" style="padding-top 5px;">
                <div class="12u 12u$(medium)">
                    <h2><header class="major">Open Monday and Wednesday - Saturday<br>12pm - 6pm</header></h2>
                    <h4><header class="major">Closed Sunday, Tuesday</header></h4>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection