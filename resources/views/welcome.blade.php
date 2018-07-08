@extends('layouts.app')

@section('content')

<!-- Banner -->
<section id="banner">
    <div class="items">
        <section class="accent2">
            <h1>Artistic Services</h1>
            <p>Open Studio, Workshops, Parties and Gallery</p>
            <ul class="actions">
                <li><a href="{{ route('services') }}" class="button special">More</a></li>
            </ul>
        </section>
        <section class="accent3">
            <h1>About the Owner</h1>
            <p>Meet the woman behind Hands On</p>
            <ul class="actions">
                <li><a href="#owner" class="button special">More</a></li>
            </ul>
        </section>
    </div>
    <div class="slider">
        <article>
            <img src="{{ asset('images/slideshow/slide1.JPG') }}" alt="" data-position="bottom right" />
        </article>
        <article>
            <img src="{{ asset('images/slideshow/slide2.JPG') }}" alt="" data-position="bottom right" />
        </article>
        <article>
            <img src="{{ asset('images/slideshow/slide3.JPG') }}" alt="" data-position="bottom right" />
        </article>
    </div>
</section>
                    
<!-- What We Offer -->
<div class="wrapper" id="services">
    <div class="inner">
        <section class="main" style="background-color: #FCFCFC">
            <header class="major">
                <h2>What We Offer</h2><br>
            </header>
            <div class="features">
                <section>
                    <span class="icon fa-cubes major accent2"></span>
                    <h3>Workshops</h3>
                    <p>
                        Scheduled two-three hour time slot with a chosen theme dedicated to 
                        instructing you with the artistic abilities needed to complete the project.
                        Materials will be provided. 
                        <br>See more for details.
                    </p>
                    <a href="{{ route('services') }}" class="btn btn-primary">More</a>
                </section>
                <section>
                    <span class="icon fa-calendar major accent4"></span>
                    <h3>Parties</h3>
                    <p>
                        Customized event with choice of project, date/time, refreshments and decorations.
                        Fun, relaxed environment with guidance on completing a piece of art.
                        Materials provided.
                        <br>See more for details.
                    </p>
                    <a href="{{ route('services') }}" class="btn btn-warning">More</a>
                </section>
                <section>
                    <span class="icon fa-paint-brush major accent3"></span>
                    <h3>Open Studio</h3>
                    <p>
                        Walk in the gallery during store hours and select an available item.
                        Use of all supplies and studio time are included in the item cost.
                        Assistance will be available.
                        <br>See more for details.
                    </p>
                    <a href="{{ route('services') }}" class="btn btn-success">More</a>
                </section>
            </div>
        </section>
    </div>
</div>

<!-- Description of Business -->

<div class="wrapper" id="about">
    <div class="inner">
        <section class="main accent2">
            <p style="font-size: 130%">
                HANDS ON is an interactive 2D Art gallery and painting studio open to the public. 
                The studio is designed to accomodate people of all ages and allow them to refine their artistic skills.  
                The facility has walk-in studio time with purchase of materials.  
                Workshops and private parties are posted monthly on the Hands On Calendar.  
                Parties can be held on site or at a requested destination upon availability. 
                In addition to the studio, a gallery of artwork will be displayed for public. 
            </p>
        </section>
    </div>
</div>

<!-- Contact Information and Hours -->

<div class="wrapper" id="info">
    <div class="inner">
        <section class="main" style="background-color: #FCFCFC"><!--Color makes it blend with the logo-->
            <!-- Contact Info and Hours Header -->
            <header class="major">
                <h2>
                    Contact Info and Hours
                </h2>
            </header>
            <!-- Logo and Information -->
            <div class="row">
                <div class="12u 12u$(medium)">
                    <p>
                        <!-- Address -->
                        <div class="row">
                            <div class="12u 12u$(medium) text-center">
                                <span class="icon fa-home" style="margin-right: 10px"></span>
                                1625 SE 47th Terr Cape Coral, FL 33904 Unit 2
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
            <div class="row" style="padding-top 5px;">
                <div class="12u 12u$(medium)">
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Event Type</th>
                                <th>Weekdays</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Open Studio</td>
                                <td>Tuesday - Saturday</td>
                                <td>12:00pm - 5:00pm</td>
                            </tr>													
                            <tr>
                                <td>Workshops (Scheduled)</td>
                                <td>Tuesday - Sunday</td>
                                <td>9:00am - 9:00pm</td>
                            </tr>													
                            <tr>
                                <td>Parties (Requested)</td>
                                <td>Tuesday - Sunday</td>
                                <td>9:00am - 9:00pm</td>
                            </tr>													
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Other Info -->
            <div class="row">
                <div class="12u 12u$(medium)">      
                    <h3>Open studio is every day unless an event is already scheduled.  
                    All events can be found in the <a href="{{ route('calendar') }}">calendar</a>.
                    If you would like to request a party of your own please visit your <a href="{{ route('dashboard') }}">dashboard</a>.
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="4u 12u$(medium)">                    
                    <p><header class="major">*Parties can be scheduled from 9am-9pm depending on availability</header></p>
                </div>
                <div class="4u 12u$(medium)">
                    <p><header class="major">*Off-site parties can be arranged</header></p>
                </div>
                <div class="4u 12u$(medium)">
                    <p><header class="major">*Open studio time will be closed if a private party is scheduled</header></p>
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
                <h2>The Owner</h2>
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

@endsection