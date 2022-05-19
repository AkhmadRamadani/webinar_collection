<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webinar Collection</title>
    <link rel="icon" type="image/x-icon" href="styles/assets/img/logo.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link href="styles/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="styles/assets/js/loader.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="styles/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="styles/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />

    <link href="styles/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/components/custom-carousel.css" rel="stylesheet" type="text/css">
    <link href="styles/assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css">
    <link href="styles/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/assets/css/elements/alert.css">
    <link rel="stylesheet" type="text/css" href="styles/plugins/bootstrap-select/bootstrap-select.min.css">
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="styles/assets/css/pages/contact_us.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <!--  END CUSTOM STYLE FILE  -->

</head>
<body class="sidebar-noneoverflow">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            </a>
            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="index.php"><img alt="logo" src="styles/assets/img/webion.png"> <span class="navbar-brand-name">WEBION</span></a>
            </div>
            <ul class="navbar-item topbar-navigation">
                
                <!--  BEGIN TOPBAR  -->
                <div class="topbar-nav header navbar" role="banner">
                    
                </div>
                <!--  END TOPBAR  -->
            </ul>
        </header>
    </div>

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>
    
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">

      <div class="layout-px-spacing">
        <div class="row ">

          <div class="col-md-12">

            <div class="contact-us">
                <div class="cu-contact-section">
                    <div id="basic_map1"></div>
                    <div class="contact-form">
                        <form class="">
                            <div class="cu-section-header">
                                <h4>Contact Us</h4>
                                <p><b>Webion, Inc.</b><br> 
                                State Polytechnic of Malang<br>
                                Civil Engineering Building, 6th Floor
                                <br>Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141</p>
                                <p>Call Us : (0341) 404424<br>+62 822 6455 9239</p>
                                <br><br><br><br><br><br> <br><br><br><br><br><br> <br><br><br><br><br><br>
                            </div>
                            
                        </form>
                        
                    </div>


                </div>
            </div>

          </div>
        </div>
      </div>

    </div>

    <div class="footer-wrapper">
    </div>
  </div>

  </div>
        

        

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="styles/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="styles/bootstrap/js/popper.min.js"></script>
    <script src="styles/bootstrap/js/bootstrap.min.js"></script>
    <script src="styles/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="styles/assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="styles/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script>

        function getHeight() {
            var getMapElement = document.getElementById('basic_map1');
            var getWindowHeight = window.innerHeight;
            var setHeightOfMap = getMapElement.style.height = getWindowHeight + 'px';

        }
        getHeight();

        window.addEventListener('resize', function(event){
          getHeight();
        })

        function initMap() {
            var myLatLng = {lat: -7.9467136, lng: 112.6156684};

            var map = new google.maps.Map(document.getElementById('basic_map1'), {
              center: myLatLng,
              zoom: 15,
              minZoom: 18,
              maxZoom: 20,
              disableDefaultUI: true,
              styles : [
                  {
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#a6c0ff"
                      }
                    ]
                  },
                  {
                    "elementType": "labels",
                    "stylers": [
                      {
                        "color": "#6de84f"
                      },
                      {
                        //"visibility": "off"
                      }
                    ]
                  },
                  {
                    "elementType": "labels.icon",
                    "stylers": [
                      {
                        //"visibility": "off"
                      }
                    ]
                  },
                  {
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#616161"
                      }
                    ]
                  },
                  {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                      {
                        "color": "#f1f2f3"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        //"visibility": "off"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative.land_parcel",
                    "stylers": [
                      {
                        //"visibility": "off"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#bdbdbd"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative.neighborhood",
                    "stylers": [
                      {
                        //"visibility": "off"
                      }
                    ]
                  },
                  {
                    "featureType": "poi",
                    "stylers": [
                      {
                        //"visibility": "off"
                      }
                    ]
                  },
                  {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#eeeeee"
                      }
                    ]
                  },
                  {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#757575"
                      }
                    ]
                  },
                  {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#e5e5e5"
                      }
                    ]
                  },
                  {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#9e9e9e"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "stylers": [
                      {
                        "color": "#fbf7fa"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#eaf1ff"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "elementType": "labels",
                    "stylers": [
                      {
                        "color": "#81a0f5"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [
                      {
                        "visibility": "off"
                      }
                    ]
                  },
                  {
                    "featureType": "road.arterial",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#757575"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#e9f5f2"
                      },
                      {
                        "visibility": "on"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                      {
                        "color": "#eaf1ff"
                      },
                      {
                        "visibility": "on"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#616161"
                      }
                    ]
                  },
                  {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#9e9e9e"
                      }
                    ]
                  },
                  {
                    "featureType": "transit",
                    "stylers": [
                      {
                        "visibility": "off"
                      }
                    ]
                  },
                  {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#e5e5e5"
                      }
                    ]
                  },
                  {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#eeeeee"
                      }
                    ]
                  },
                  {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#3b3f5c"
                      }
                    ]
                  },
                  {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#9e9e9e"
                      }
                    ]
                  }
                ]

            });

            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              title: 'Webion, Inc.',
              animation: google.maps.Animation.BOUNCE
            });
        }

        const contact = new PerfectScrollbar('.contact-form form', {
            wheelSpeed:.5,
            swipeEasing:!0,
            minScrollbarLength:40,
            maxScrollbarLength:300
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoOlJCERKYB1Cp-C89_sscNkelSfeeBnw&callback=initMap" async defer></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>