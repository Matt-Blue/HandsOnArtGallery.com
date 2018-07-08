@extends('layouts.app')

@section('content')
<!-- Banner -->
<section id="banner">
    <div class="items">
        <section class="accent2">
            <h1>Artistic Servies</h1>
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
                        Three hour time slots with a chosen theme 
                        dedicated to teaching you artistic abilities.
                        Materials provided. 
                        <br>See more for details.
                    </p>
                    <a href="{{ route('services') }}" class="btn btn-primary">More</a>
                </section>
                <section>
                    <span class="icon fa-calendar major accent4"></span>
                    <h3>Parties</h3>
                    <p>
                        Fun, relaxed time with guidence on how to complete a chosen piece of art.
                        Food and drinks permitted. Materials Provided. 
                        <br>See more for details.
                    </p>
                    <a href="{{ route('services') }}" class="btn btn-warning">More</a>
                </section>
                <section>
                    <span class="icon fa-paint-brush major accent3"></span>
                    <h3>Open Studio</h3>
                    <p>
                        Free time dedicated to quality art time.
                        Walk-ins welcome, no appointment necessary.
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
            <!-- Header -->
            <header class="major">
                <h2>About</h2>
            </header>

            <p>
                Hands On is an interactive 2D Art gallery and painting studio open to the public. 
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
                <h2>Contact Info and Hours</h2>
            </header>
            <!-- Logo and Information -->
            <div class="row">
                <div class="2u 12u$(medium)">
                    <img src="{{ asset('images/logo.PNG') }}" style="height: 100%; width: 100%;">
                </div>
                <div class="4u 12u$(medium)">
                    <p>
                        <!-- Address -->
                        <div class="row">
                            <div class="1u 12u$(medium)">
                                <span class="icon fa-home"></span>
                            </div>
                            <div class="10u 12u$(medium)">
                                <center>1625 SE 47th Terr<br>
                                Cape Coral, FL 33904</center>
                            </div>
                        </div>
                        <!-- Phone Number -->
                        <div class="row">
                            <div class="1u 12u$(medium)">
                                <span class="icon fa-phone"></span>
                            </div>
                            <div class="10u 12u$(medium)">
                                <center>(239) 233-5662</center>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="row">
                            <div class="1u 12u$(medium)">
                                <span class="icon fa-envelope-o"></span>
                            </div>
                            <div class="10u 12u$(medium)">
                                <center>HandsOnArtGalleryAndStudio<br>
                                @gmail.com</center>
                            </div>
                        </div>
                    </p>
                </div>
                <div class="3u 12u$(medium)">
                    <p>
                        <header class="major">
                            Tuesday - Friday
                            <br>12:00pm - 5:00pm Open Studio
                            <br>6:30pm - 9:30pm Workshops											
                        </header>
                    </p>
                </div>

                <div class="3u 12u$(medium)">
                    <p>
                        <header class="major">
                            Saturday - Sunday
                            <br>10:00am - 5:00pm Open Studio / Workshops
                            <br>6:30pm - 9:30pm Private Parties										
                        </header>
                    </p>
                </div>
            </div>
            <!-- Parties all day -->
            <div class="row">
                <div class="12u 12u$(medium)">                    
                    <p><header class="major">Private parties are scheduled upon request and availability</header></p>
                    <p><header class="major">Off-site parties can be arranged</header></p>
                    <p><header class="major">Store hours are subject to change</header></p>
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
                    Lorna Bluestein was born and raised in Indiana. She received her BA in Fine Arts at Indiana University. She spent five years in Massachusetts working as a retail manager.  She then married and moved to Colorado where she spent twenty years living the beautiful mountain life. During this time she raised two kids while teaching preschool. In 2014, her family moved to Florida to be near to family. Lorna found a job teaching high school art. One of her students asked her to keep the art program hands on, instead of converting all the art to technology. This suggestion inspired her to experiment and include a variety of mediums and techniques into her lessons. Lorna’s passion for art was back stronger than ever and this gave her the ambition to start her own business. Her goal is to teach a variety of art styles and techniques to all ages and to inspire those who wish to learn <i>hands on</i> craftsmanship.
                    </p>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection