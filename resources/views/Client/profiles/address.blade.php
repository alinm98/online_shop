@extends('Client.layout.profile')
@section('main')

    <!-- Start Content -->
    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
        <div class="row">
            <div class="col-12">
                <div
                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                    <h2>آدرس ها</h2>
                </div>
                <div class="dt-sl">
                    <div class="row">

                        @if(empty(auth()->user()->address[0]))
                            <div class="col-lg-6 col-md-12">
                                <div class="card-horizontal-address text-center px-4">
                                    <button class="checkout-address-location" data-toggle="modal"
                                            data-target="#modal-location">
                                        <strong>ایجاد آدرس جدید</strong>
                                        <i class="mdi mdi-map-marker-plus"></i>
                                    </button>
                                </div>
                            </div>
                        @endif

                        @foreach(auth()->user()->address as $address)
                            <div class="col-lg-6 col-md-12">
                                <div class="card-horizontal-address">
                                    <div class="card-horizontal-address-desc">
                                        <h4 class="card-horizontal-address-full-name">{{auth()->user()->name}}</h4>
                                        <p>
                                            {{$address->address}}
                                        </p>
                                    </div>
                                    <div class="card-horizontal-address-data">
                                        <ul class="card-horizontal-address-methods float-right">
                                            <li class="card-horizontal-address-method">
                                                <i class="mdi mdi-email-outline"></i>
                                                کدپستی : <span>{{$address->zip_code}}</span>
                                            </li>
                                            <li class="card-horizontal-address-method">
                                                <i class="mdi mdi-cellphone-iphone"></i>
                                                تلفن همراه : <span>{{auth()->user()->mobile}}</span>
                                            </li>
                                        </ul>
                                        <form action="{{route('home.address.destroy' , $address)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="card-horizontal-address-actions">
                                                <button class="btn-note" data-toggle="modal"
                                                        data-target="#remove-location">حذف
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
    <!-- Start Modal location new -->
    <div class="modal fade" id="modal-location" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        <i class="now-ui-icons location_pin"></i>
                        افزودن آدرس جدید
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-ui dt-sl">
                                <form class="form-account" action="{{route('home.address.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    آدرس پستی
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                    <textarea class="input-ui pr-2 text-right" name="address"
                                                              placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    کد پستی
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <input class="input-ui pl-2 dir-ltr text-left placeholder-right"
                                                       name="zip_code"
                                                       type="text" placeholder=" کد پستی را بدون خط تیره بنویسید">
                                            </div>
                                        </div>
                                        <div class="col-12 pr-4 pl-4">
                                            <button type="submit" class="btn btn-sm btn-primary btn-submit-form">ثبت
                                                و
                                                ارسال به این آدرس
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <!-- Google Map Start -->
                            <div class="goole-map">
                                <div id="map" style="height:440px"></div>
                            </div>
                            <!-- Google Map End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal location new -->

@endsection
@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script>
    <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 11,

                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(23.761226, 90.420766), // New York

                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#444444"
                    }]
                },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{
                            "color": "#f2f2f2"
                        }]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{
                            "saturation": -100
                        },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "simplified"
                        }]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{
                            "color": "#314453"
                        },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "lightness": "-12"
                        },
                            {
                                "saturation": "0"
                            },
                            {
                                "color": "#4bc7e9"
                            }
                        ]
                    }
                ]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapNew = document.getElementById('map');
            var mapEdit = document.getElementById('map-edit');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapNew, mapOptions);
            var mapEdit = new google.maps.Map(mapEdit, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(23.761226, 90.420766),
                map: map,
                title: 'Snazzy!'
            });
        }
    </script>
    <!-- Main JS File -->
@endsection
