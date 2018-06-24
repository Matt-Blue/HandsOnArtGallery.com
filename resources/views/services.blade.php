@extends('layouts.app')

@section('content')

<!-- About Services -->

    <div class="wrapper" id="about">
        <div class="inner">
            <section class="main">
                <!-- Header -->
                <header class="major">
                    <h2>Hands On Services</h2>
                </header>

                <p>
                    The service you will be getting includes an experienced artist with teaching experience. 
                    You will be greeted with a happy face and an eager to help attitude.  
                    Your experience at Hands On should be a relaxing and enjoyable with hands on assistance.
                </p>

                <p class="text-center">
                    You can find all of our upcoming events <a href="{{ route('calendar') }}">here</a>.
                </p>

            </section>
        </div>
    </div>

<!-- Workshops -->

    <div class="wrapper" id="workshops">
        <div class="inner">
            <section class="main accent2">
                <header class="major">
                    <h2>Workshops</h2><br>
                </header>

                <div class="row">
                    <div class="features 2u 12u$(medium)">
                        <section>
                            <span class="icon fa-cubes major"></span>
                        </section>
                    </div>
                    <div class="10u 12u$(medium)">
                        <p>
                        Workshops are designed to offer customers the opportunity to create a desired piece of art with instruction. 
                        </p>
                        <p>
                        A variety of scheduled workshops will be posted monthly on the website calendar. Each workshop consists of a selected item and chosen subject during scheduled 3 hour time slot. All workshops prices include all the supplies needed to complete the project. Set up and clean up will be provided, along with an apron to protect your clothing.  (It is still not recommended to wear nice clothes to these events.) 
                        </p>
                        <p>
                        Instruction and <i>hands on</i> guidance will be given throughout the workshop. All participants will be given the same directions, but it is ok to add your own twist!  In fact, it is encouraged for you to express your individuality. Workshops are open to all interested parties and it is a great way to meet other creative people. 
                        </p>
                        <p>
                        You may sign up for workshops online through this website. Suggestions for specific workshops are always welcomed. Please arrive 15 minutes early so that the instruction can start on time. 
                        </p>
                    </div>
                </div>

            </section>
        </div>
    </div>

<!-- Parties -->

    <div class="wrapper" id="parties">
        <div class="inner">
            <section class="main accent4">
                <header class="major">
                    <h2 style="color: #555">Parties</h2><br>
                </header>

                <div class="row" style="color: #555">
                    <div class="features 2u 12u$(medium)">
                        <section>
                            <span class="icon fa-calendar major"></span>
                        </section>
                    </div>
                    <div class="10u 12u$(medium)">
                        <p>
                        Private parties are closed to the public and allows customers to design their own personal painting party. Scheduling a private party for a specific event, fundraiser or special occasion gives you the freedom to choose your item, subject, guests and date & time of the event. 
                        </p>
                        <p>
                        Decorations and refreshments are welcomed.  Wine or beer, along with snacks, are popular for adult parties, but hard liquor is not permitted. Kids birthday parties are a hit, and a cake and or other items are welcome to enhance the effect of your party. Age appropriate instruction will be given and a variety of designs are available to choose from for party themes. Set up, clean up, aprons and personal hands on directions will be given during the party. Parties are priced by the item, per individual, which is all inclusive. 
                        </p>
                        <p>
                        Parties must include 5 - 20 individuals.  There is a 50% deposit required to book a party and no refunds will be given.
                        </p>
                        <p>
                        Off-site parties are available upon request and availability. Party packages are available upon request. All parties can be requested online through this website. 
                        </p>
                        <p>
                        Special requests and suggestions are considered and welcomed. Arriving 15-30 minutes early will allow the party instruction to start on time. 
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>

<!-- Open Studio -->

    <div class="wrapper" id="open_studio">
        <div class="inner">
            <section class="main accent3">
                <header class="major">
                    <h2>Open Studio</h2><br>
                </header>

                <div class="row">
                    <div class="features 2u 12u$(medium)">
                        <section>
                            <span class="icon fa-paint-brush major"></span>
                        </section>
                    </div>
                    <div class="10u 12u$(medium)">
                        <p>
                        The store will be open to the public Tuesday - Friday 12pm - 5pm for anyone wanting to work independently on an art project (hours subject to change.)  The fee will be the price of the item, and will include all supplies and studio time needed to finish the project. There will be no instruction, but collaboration is welcomed and encouraged.  Open Studio time is designed for individuals who seek little assistance and who want to work on their own art project.  Working during these hours can be a great time to develop relationships with others in the community, while working on your chosen project. 
                        </p>
                    </div>
                </div>
                
            </section>
        </div>
    </div>

<!-- Pricing -->

    <div class="wrapper" id="pricing">
        <div class="inner">
            <section class="main" style="background-color: #FCFCFC">
                <header class="major">
                    <center><h2>Pricing</h2></center><br>
                </header>
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="table-wrapper">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>16 x 20 Stretched Canvas</td>
                                        <td>$30</td>
                                    </tr>
                                    <tr>
                                        <td>11 x 14 Stretched Canvas</td>
                                        <td>$25</td>
                                    </tr>
                                    <tr>
                                        <td>8 x 10 Stretched Canvas</td>
                                        <td>$20</td>
                                    </tr>
                                    <tr>
                                        <td>Wood Signs / Designs</td>
                                        <td>$30</td>
                                    </tr>
                                    <tr>
                                        <td>Wine Glasses (Set of Two)</td>
                                        <td>$30</td>
                                    </tr>
                                    <tr>
                                        <td>Hardcover book (Primed)</td>
                                        <td>$20</td>
                                    </tr>														
                                    <tr>
                                        <td>Coconut (Primed)</td>
                                        <td>$30</td>
                                    </tr>														
                                </tbody>
                            </table>
                        </div>
                        <p class="major">
                            <center><b>Other items available upon request</b></center>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection