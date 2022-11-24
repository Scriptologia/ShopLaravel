@extends('front.layouts.app')
@section('title', 'Contacts | Herbalist')
@section('data-page', 'contacts')
@section('content')
    <header class="page">
            <div class="page_main container-fluid">
                <div class="container">
                    <h1 class="page_header">Contacts</h1>
                    <p class="page_text">Nibh tellus molestie nunc non blandit. Mi tempus imperdiet nulla malesuada pellentesque elit</p>
                </div>
            </div>
            <div class="container">
                <ul class="page_breadcrumbs d-flex flex-wrap">
                    <li class="page_breadcrumbs-item">
                        <a class="link" href="{{route('home')}}">Home</a>
                    </li>

                    <li class="page_breadcrumbs-item current">
                        <span>Contacts</span>
                    </li>
                </ul>
            </div>
        </header>
        <!-- Contacts content start -->
        <main>
            <div class="contacts section">
                <div class="container d-flex flex-wrap flex-xl-nowrap justify-content-between">
                    <div class="contacts_form col-12 col-lg-5">
                        <div class="contacts_form-header">
                            <h2 class="contacts_form-header_title">Have any Questions?</h2>
                            <p class="contacts_form-header_text">
                                Elementum eu facilisis sed odio morbi quis commodo odio. Mauris rhoncus aenean vel elit scelerisque mauris
                                pellentesque
                            </p>
                        </div>
                        <form class="contacts_form-form d-flex flex-column" data-type="feedback" action="form.php" method="post">
                            <label class="contacts_form-form_label" for="contactsName">Your Name</label>
                            <input
                                class="contacts_form-form_field field required"
                                type="text"
                                name="contactsName"
                                id="contactsName"
                                placeholder="Your name"
                            />
                            <label class="contacts_form-form_label" for="contactsEmail">Your Email</label>
                            <input
                                class="contacts_form-form_field field required"
                                type="text"
                                data-type="email"
                                name="contactsEmail"
                                id="contactsEmail"
                                placeholder="you@example.com"
                            />
                            <label class="contacts_form-form_label" for="contactsMessage">Message</label>
                            <textarea
                                class="contacts_form-form_field field required"
                                data-type="message"
                                name="contactsMessage"
                                id="contactsMessage"
                                placeholder="Type Your Message"
                            ></textarea>
                            <button class="contacts_form-form_btn btn" type="submit">Send a Message</button>
                        </form>
                    </div>
                    <div class="contacts_info col-12 col-lg-6 col-xl-auto flex-xl-grow-1">
                        <div class="contacts_info-map">
                            <div id="map"></div>
                        </div>
                        <ul class="contacts_info-list">
                            <li class="contacts_info-list_item d-flex flex-column flex-sm-row align-items-center">
                                <span class="icon d-flex justify-content-center align-items-center">
                                    <i class="icon-location"></i>
                                </span>
                                <div class="main d-flex flex-column">
                                    <span>211 Lehner Valleys Apt. 287</span>
                                    <span>Harrisstad</span>
                                </div>
                            </li>
                            <li class="contacts_info-list_item d-flex flex-column flex-sm-row align-items-center">
                                <span class="icon d-flex justify-content-center align-items-center">
                                    <i class="icon-call"></i>
                                </span>
                                <div class="main d-flex flex-column">
                                    <a class="link" href="tel:+1234567890">+1-896-882-3255</a>
                                    <a class="link" href="tel:+1234567890">+1-896-882-3255</a>
                                </div>
                            </li>
                            <li class="contacts_info-list_item d-flex flex-column flex-sm-row align-items-center">
                                <span class="icon d-flex justify-content-center align-items-center">
                                    <i class="icon-envelope_open"></i>
                                </span>
                                <div class="main d-flex flex-column">
                                    <a class="link" href="mailto:example@domain.com">herbalist@cannabis.site</a>
                                    <a class="link" href="mailto:example@domain.com">herbalist@test.site</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="contacts_info-socials d-flex align-items-center justify-content-center justify-content-sm-start">
                            <li class="list-item">
                                <a class="link" href="https://facebook.com" target="_blank" rel="noopener norefferer">
                                    <i class="icon-facebook icon"></i>
                                </a>
                            </li>
                            <li class="list-item">
                                <a class="link" href="https://instagram.com" target="_blank" rel="noopener norefferer">
                                    <i class="icon-instagram icon"></i>
                                </a>
                            </li>
                            <li class="list-item">
                                <a class="link" href="https://twitter.com" target="_blank" rel="noopener norefferer">
                                    <i class="icon-twitter icon"></i>
                                </a>
                            </li>
                            <li class="list-item">
                                <a class="link" href="https://whatsapp.com" target="_blank" rel="noopener norefferer">
                                    <i class="icon-whatsapp icon"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
        <!-- Contacts content end -->
    </body>
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('front/css/contacts.min.css')}}" />
@endpush
@push('js')
    <script src="{{asset('front/js/contacts.min.js')}}"></script>
@endpush
