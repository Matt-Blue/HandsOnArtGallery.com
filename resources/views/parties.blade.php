@extends('layouts.app')

@section('content')

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<style>
    img{ width: 100%; transition: all .2s ease-in-out; }
    img:hover{ transform: scale(0.9); }
    .wide_button{ width: 100%; }
    .row{ margin-bottom: 2rem; }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="wrapper" id="info">
            <div class="inner">
                <section class="main" style="background-color: #FCFCFC">
                    <h1 class="text-center">Hands On Party Packages</h1>
                    <p class="text-center"><b>
                        Private Parties must consist of at least 5 or more paying customers. 
                        Prices are per item. 
                        Add-ons are extra. 
                    </b></p>
                    <h3 class="text-center" style="padding: 1rem; border: 1px solid black;">
                        Set up a party today!<br>
                        Call (239) 233-5662<br>
                        Email HandsOnArtGalleryAndStudio@gmail.com
                    </h3>
                    <p style="padding-top: 1rem;">
                        Parties allow customized, private painting parties for people of all ages. 
                        As a former preschool teacher and a college graduate, Lorna has the capabilities to manage younger parties while also having the expertise to teach more advanced groups.
                        Off-site parties are available upon request and availability. 
                        Materials, instruction, and cleanup included in the per person price.
                        Parties can be requested by calling (239) 233-5662 or by emailing HandsOnArtGalleryAndStudio@gmail.com
                        Please arrive 15-30 minutes early to allow the project instruction to start on time.
                    </p>               
                </section>
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
                                            <center><b>Other items available upon request</b></center>
                                            <center><b>Must be 16 or older without supervision</b></center>
                                        </p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection