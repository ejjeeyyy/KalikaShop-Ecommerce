@extends('layouts.app')

@section('title', 'About KalikaShop')

@section('content')
    <div class="container">
        {{-- About Us Section --}}
        <div id="about">
            <div class="px-1 mt-3 text-center">
                <img class="d-block mx-auto"
                    src="https://cdn.discordapp.com/attachments/1017009278445432862/1033281796521070653/kaliksahop_logo.png"
                    alt="" width="200" height="200">
                <h1 class="display-5 fw-bold">About Us</h1>
                <div class="col-lg-8 mx-auto">
                    <p class="lead mb-4">Founded and developed by, <strong>Earl John Francisco</strong>, <strong>Joao George
                            Sales</strong>, <strong>Raven Jamel Tamayo</strong>, and <strong>Kent Ira Usares</strong>.
                        KalikaShop is more than just an e-commerce website that sells products online. We promote the use of
                        eco-friendly products made from recycled, sustainabale, and eco-friendly materials. KalikaShop also
                        utilizes a Green web hosting service with data centers that operates using sustainable energy to
                        avoid contributing pollution to the environment.
                    </p>
                </div>
            </div>

            <div class="container px-4 py-1" id="custom-cards">
                <h2 class="pb-2 border-bottom display-5 fw-bold text-center">We Aim To</h2>
                <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                    <div class="col">
                        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
                            style="background-image: url('https://cdn.discordapp.com/attachments/1017009278445432862/1041731204535287808/prod.webp');
                            background-size:cover;">
                            <div class="d-flex flex-column h-100 p-5  text-white">
                                <h3 class="pt-5 mt-5 mb-4  display-6 fw-bold text-center" style="text-shadow: 2px 2px 3px black;">Promote Eco products</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
                            style="background-image: url('https://cdn.discordapp.com/attachments/1017009278445432862/1041734244273238167/plant.webp'); background-size: cover;">
                            <div class="d-flex flex-column h-100 p-5 my-auto text-white">
                                <h3 class="pt-5 mt-5 mb-4  display-6 fw-bold text-center" style="text-shadow: 3px 3px 3px black;">Give back to the Environment</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
                            style="background-image: url('https://cdn.discordapp.com/attachments/1017009278445432862/1041735902940110868/solar.webp');">
                            <div class="d-flex flex-column h-100 p-5 my-auto text-white text-center">
                                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style="text-shadow: 3px 3px 3px black;">Promote Sustainability</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End of About Us --}}

        <div class="pt-2">
            <hr>
        </div>

        {{-- Dev section --}}
        <div id="dev_section">
            <div class="px-1 mt-3 text-center">
                <h1 class="display-5 fw-bold">Meet the Team</h1>
                <img class="d-block mx-auto mb-3"
                    src="https://cdn.discordapp.com/attachments/1017009278445432862/1041726102403551342/Team.webp"
                    alt="" width="auto" height="300">
                <div class="col-lg-9 mx-auto">
                    <p class="lead mb-4">Starting from the right <strong>Kent Usares</strong>, <strong>Earl John
                            Francisco</strong>, <strong>Raven Jamel Tamayo</strong>, and <strong>Joao George Sales</strong>.
                    </p>
                </div>
            </div>
        </div>
        {{-- End of dev section --}}
    </div>
@endsection
