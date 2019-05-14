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
                <li><a href="{{ route('calendar') }}" class="button special">Calendar</a></li>
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
                    <span class="icon fa-paint-brush major accent2"></span>
                    <h3>Workshops</h3>
                    <ul style="text-align: left;">
                        <li>Assisted art lessons</li>
                        <li>2-3 hour sessions</li>
                        <li>Materials included</li>
                    </ul>
                    <a class="btn btn-primary" href="{{ url('/calendar') }}">Calendar</a>
                </section>
                <section>
                    <span class="icon fa-birthday-cake major accent4"></span>
                    <h3>Parties</h3>
                    <ul style="text-align: left;">
                        <li>Custom projects</li>
                        <li>Materials included</li>
                        <li>All ages welcome</li>
                        <li>Adult beverages for purchase</li>
                    </ul>
                    <a class="btn btn-warning" href="{{ url('/parties') }}">Parties</a>
                </section>
                <section>
                    <span class="icon fa-picture-o major accent3"></span>
                    <h3>Gallery</h3>
                    <ul style="text-align: left;">
                        <li>Original artwork</li>
                        <li>Affordably priced</li>
                        <li>All work done by the owner</li>
                    </ul>
                    <a class="btn btn-success" href="{{ url('/gallery/all') }}">Gallery</a>
                </section>
            </div>
        </section>
    </div>
</div>

<!-- Contact Information -->
<div class="wrapper" id="info">
    <div class="inner">
        <section class="main" style="background-color: #FCFCFC; padding-top: 0rem;"><!--Color makes it blend with the logo-->
            <!-- Address -->
            <div class="row">
                <div class="12u 12u$(medium) text-center">
                    <h2><header class="major">Open Monday and Wednesday - Saturday<br>12pm - 6pm</header></h2>
                </div>
            </div>
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

@endsection