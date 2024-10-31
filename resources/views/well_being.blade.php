@extends('layouts.page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border shadow">
                <div class="card-body">
                    <!-- Video Section -->
                    <div class="row mb-4">
                        <center>
                            <div class="col-lg-12">
                                @include('component/page/video')
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-mg-12 mt-3">
            <div class="card border shadow">
                <div class="card-body">
                    <!-- Image Section -->
                    <div class="row mb-4">
                        <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('image/1.jpeg') }}" alt="Image 1" class="img-fluid rounded">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('image/2.jpeg') }}" alt="Image 2" class="img-fluid rounded">
                        </div>
                    </div>

                    <!-- Text Content -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                            <h2 class="mb-3">World Mental Health Day</h2>
                            <p class="lead">Today, we join hands to observe World Mental Health Day with this year’s theme:</p>
                            <h3 class="text-primary font-weight-bold mb-4">"It is Time to Prioritize Mental Health in the Workplace."</h3>

                            <p>
                                The City of Taguig, under the guidance of Mayor Lani Cayetano, is deeply committed to raising awareness and supporting mental well-being. Through the City’s Mental Health Psychosocial Support Services, professional doctors and psychologists are available to provide compassionate support for those in need.
                            </p>

                            <p>
                                <strong>We’re here to listen and support you 24/7, Monday through Sunday.</strong>
                            </p>

                            <h5 class="mt-4">Reach Out to Us:</h5>
                            <ul class="list-unstyled mb-4">
                                <li>• <strong>0929-521-8373</strong> (6:00 a.m. to 6:00 p.m.)</li>
                                <li>• <strong>0967-039-3456</strong> (6:00 p.m. to 6:00 a.m.)</li>
                            </ul>

                            <h5 class="mt-4">National Center for Mental Health (NCMH) Crisis Hotline</h5>
                            <p>Available 24/7 with UNLIMITED CALLS NATIONWIDE:</p>
                            <ul class="list-unstyled mb-4">
                                <li>• <strong>Dial 1553</strong> (Nationwide landline toll-free)</li>
                                <li>• <strong>1800-1888-1553</strong> (Smart/TNT; one-time charge of P7.50 per call)</li>
                                <li>• <strong>0919-057-1553</strong> (Smart/TNT)</li>
                                <li>• <strong>0917-899-8727</strong> (Globe/TM)</li>
                                <li>• <strong>0966-351-4518</strong> (Globe/TM)</li>
                            </ul>

                            <p class="font-italic mt-4">Remember, you are not alone. We are here for you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
