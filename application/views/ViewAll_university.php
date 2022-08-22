<?php

include('header.php');

?>


<!-- wrapper-->
<div id="wrapper">
    <!-- content-->
    <div class="content">
        <!-- Map -->
        <div class="map-container column-map right-pos-map fix-map hid-mob-map">
            <div id="map-main"></div>
            <ul class="mapnavigation no-list-style">
                <li><a href="#" class="prevmap-nav mapnavbtn"><span><i class="fas fa-caret-left"></i></span></a></li>
                <li><a href="#" class="nextmap-nav mapnavbtn"><span><i class="fas fa-caret-right"></i></span></a></li>
            </ul>
            <div class="scrollContorl mapnavbtn tolt" data-microtip-position="top-left" data-tooltip="Enable Scrolling"><span><i class="fal fa-unlock"></i></span></div>
            <div class="location-btn geoLocation tolt" data-microtip-position="top-left" data-tooltip="Your location"><span><i class="fal fa-location"></i></span></div>
            <div class="map-close"><i class="fas fa-times"></i></div>
        </div>
        <!-- Map end -->
        <div class="col-list-wrap novis_to-top">
            <!-- list-main-wrap-header-->
            <div class="list-main-wrap-header fl-wrap fixed-listing-header">
                <div class="container">
                 
                    <div class="list-main-wrap-opt">
                    
                    </div>
                 
                </div>
                <a class="custom-scroll-link back-to-filters clbtg" href="#lisfw"><i class="fal fa-search"></i></a>
            </div>
            <!-- list-main-wrap-header end-->
            <div class="clearfix"></div>
           
            <div class="clearfix"></div>
        
            <div class="listing-item-container init-grid-items fl-wrap">
                <div class="container">
                 
                    <?php
                  
                        foreach ($alluniversity as $key => $value1) {
                            $this->db->select('AVG(rat_rating) as average');
                            $this->db->where('rat_university_id', $value1->un_id);
                            $this->db->from('rating');
                            $query = $this->db->get()->row();
                    ?>
                            <div class="listing-item">

                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                        <a href="<?php echo base_url() ?>/UniversitysingleDetail?id=<?php echo $value1->un_id; ?>" class="geodir-category-img-wrap fl-wrap">
                                            <img src="<?php echo base_url() ?>/upload/<?php echo $value1->un_media; ?>" alt="" onerror="this.src='<?php echo base_url() ?>/assets/pc.png'">
                                        </a>
                                        <div class="listing-avatar"><a href="<?php echo base_url() ?>/UniversitysingleDetail?id=<?php echo $value1->un_id; ?>"><img src="<?php echo base_url() ?>/upload/<?php echo $value1->un_media; ?>" onerror="this.src='<?php echo base_url() ?>/assets/pc.png'"alt=""></a>
                                            <span class="avatar-tooltip">Added By <strong>Alisa Noory</strong></span>
                                        </div>
                                        <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Open Now</div>
                                        <div class="geodir-category-opt">
                                            <div class="listing-rating-count-wrap">
                                                <div class="review-score"><?php echo floatval($query->average); ?></div>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $query->average; ?>"></div>
                                                <br>
                                                <!-- <div class="reviews-count">12 reviews</div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <div class="geodir-category-content-title fl-wrap">
                                            <div class="geodir-category-content-title-item">
                                                <h3 class="title-sin_map"><a href="<?php echo base_url() ?>/UniversitysingleDetail?id=<?php echo $value1->un_id; ?>"><?php echo $value1->un_name ?></a><span class="verified-badge"><i class="fal fa-check"></i></span></h3>
                                                <div class="geodir-category-location fl-wrap"><a href="UniversitysingleDetail?id=<?php echo $value1->un_id; ?>" class="map-item"><i class="fas fa-map-marker-alt"></i><?php echo $value1->un_address ?></a></div>
                                            </div>
                                        </div>
                                        <div class="geodir-category-text fl-wrap">
                                            <p class="small-text"><?php  
                                            echo substr($value1->un_description, 0, 400) . '...';
                                             ?></p>
                                            <div class="facilities-list fl-wrap">
                                                <div class="facilities-list-title">Facilities : </div>
                                                <ul class="no-list-style">
                                                    <?php
                                                    $customday = explode(",", $value1->un_facility);
                                                    if (in_array("1", $customday)) {
                                                    ?>
                                                        <li title="UNIVERSITY HOSTEL"><a href="#"><i class="fas fa-hotel"></i></a></li>
                                                    <?php
                                                    }
                                                    if (in_array("2", $customday)) {
                                                    ?>
                                                        <li title="TRANSPORT FACILITY"><a href="#"><i class="far fa-bus"></i></a></li>
                                                    <?php
                                                    }
                                                    if (in_array("3", $customday)) {
                                                    ?>
                                                        <li title="CAFETERIA"><a href="#"><i class="fas fa-coffee"></i></a></li>
                                                    <?php
                                                    }
                                                    if (in_array("4", $customday)) {
                                                    ?>
                                                        <li title="UNIVERSITY CANTEEN"><a href="#"><i class="fas fa-utensils-alt"></i></a></li>
                                                    <?php
                                                    }
                                                    if (in_array("4", $customday)) {
                                                    ?>
                                                        <li title="INTERNET CENTRE"><a href="#"><i class="fa fa-wifi"></i></a></li>
                                                    <?php
                                                    }
                                                    ?>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="geodir-category-footer fl-wrap">
                                            <a class="listing-item-category-wrap">
                                                <div class="listing-item-category red-bg"><i class="fas fa-graduation-cap"></i></div>
                                                <span></span>
                                            </a>

                                            <div class="geodir-category_contacts">
                                                <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                                <ul class="no-list-style">
                                                    <li><span><i class="fal fa-phone"></i> Call : </span><a href="#">+38099231212</a></li>
                                                    <li><span><i class="fal fa-envelope"></i> Write : </span><a href="#">yourmail@domain.com</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                            </div>
                            
                    <?php
                        }
                  
                    
                    ?>
                    
                    <!-- listing-item university  -->
                 

                  

                </div>
                <div class="pagination">
                        <a href="#"><?php
                        if(!empty($links))
                        {
                            echo $links;
                        }
                       
                         ?></a>
                    </div>

            </div>
            <!-- listing-item-container end -->
            <!--<div class="avatar-img" data-srcav="http://citybook.kwst.net/images/avatar/4.jpg"></div>-->
        </div>
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
</div>
<!-- wrapper end-->

<?php
include('footer.php');
?>
<script type="text/javascript">
    (function($) {
        "use strict";

        function mainMap() {
            function locationData(locationURL, locationImg, locationTitle, locationAddress, locationCategory, locationStarRating, locationRevievsCounter, locationStatus) {
                return ('<div class="map-popup-wrap"><div class="map-popup"><div class="infoBox-close"><i class="fal fa-times"></i></div><a href="' + locationURL + '" class="listing-img-content fl-wrap"><div class="infobox-status ' + locationStatus + '">' + locationStatus + '</div><img src="' + locationImg + '" alt=""><div class="card-popup-raining map-card-rainting" data-staRrating="' + locationStarRating + '"><span class="map-popup-reviews-count"></span></div></a> <div class="listing-content"><div class="listing-content-item fl-wrap"><div class="map-popup-location-category ' + locationCategory + '"></div><div class="listing-title fl-wrap"><h4><a href=' + locationURL + '>' + locationTitle + '</a></h4><div class="map-popup-location-info"><i class="fas fa-map-marker-alt"></i>' + locationAddress + '</div></div><div class="map-popup-footer"><a href=' + locationURL + ' class="main-link">Details <i class="fal fa-long-arrow-left"></i></a><a href="#" class="infowindow_wishlist-btn"><i class="fal fa-heart"></i></a></div></div></div></div> ')
            }
            //  Map Infoboxes ------------------



            var locations = [
                <?php
            
                foreach ($alluniversity as $key => $value1) {
                    $lat = $value1->un_latitude;
                    $lng = $value1->un_longitude;
                    $add = $value1->un_address;
                    $University_name = $value1->un_name;
                    $image = $value1->un_media;
                    $un_id = $value1->un_id;


                ?>


                    [locationData('<?php echo base_url() ?>/UniversitysingleDetail?id=<?php echo $un_id; ?>', '<?php echo base_url() ?>/upload/<?php echo $image; ?>', '<?php echo $University_name; ?>', "<?php echo $add; ?>", 'cafe-cat', "5", "12", "open"), "<?php echo $lat; ?>", "<?php echo $lng; ?>", 0, '<?php echo base_url() ?>/upload/<?php echo $image; ?>'],
                <?php
                }
                ?>

                // [locationData('listing-single.html', 'images/all/31.jpg', 'Premium Fitness Gym', " W 85th St, New York, USA", 'gym-cat', "3",  "4" , "close"   ), 40.88496706, -73.88191222, 2,  'images/all/31.jpg'],
                // [locationData('listing-single.html', 'images/all/16.jpg', 'MontePlaza Hotel', " 70 Bright St New York, USA", 'hotels-cat', "4", "12","open"  ), 40.72228267, -73.99246214, 3, 'images/all/16.jpg' ],
                // [locationData('listing-single.html', 'images/all/28.jpg', 'Handmade Shop', "34-42 Montgomery St, New York, NY", 'shop-cat', "5", "9","close" ), 40.94982541, -73.84357452, 4,  'images/all/28.jpg'],
                // [locationData('listing-single.html', 'images/all/18.jpg', 'Iconic Cafe in Manhattan', " 40 Journal Square Plaza, NJ, USA", 'cafe-cat', "4", "26", "open"  ), 40.90261483, -74.15737152, 5,   'images/all/18.jpg'],
                // [locationData('listing-single.html', 'images/all/46.jpg', 'Zebra Premium Hotel', "123 School St. Lynchburg, NY ", 'hotels-cat', "4", "12","open" ), 40.79145927, -74.08252716, 6,  'images/all/46.jpg'],
                // [locationData('listing-single2.html', 'images/all/50.jpg', 'Web Design Event', "Mt Carmel Pl, New York, NY", 'event-cat', "5", "12","4 April 2019" ), 40.58423508, -73.96099091, 7, 'images/all/50.jpg'],
                // [locationData('listing-single2.html', 'images/all/25.jpg', 'Premium Gym In NY', "1-30 Hunters Point Ave, Long Island City, NY", 'gym-cat', "3", "7","open"  ), 40.58110616, -73.97678375, 8,   'images/all/25.jpg'],
                // [locationData('listing-single3.html', 'images/all/56.jpg', 'NY Plaza Hotel', "726-1728 2nd Ave, New York, NY", 'hotels-cat', "5", "12","open"  ), 40.73112881, -74.07897948, 9, 'images/all/56.jpg'],
                // [locationData('listing-single3.html', 'images/all/48.jpg', 'Bistro in City Center', "9443 Fairview Ave, North Bergen, NJ", 'cafe-cat', "3", "8","open"  ), 40.67386831, -74.10438536, 10,  'images/all/48.jpg'],
            ];

            //   Map Infoboxes end ------------------
            var map = new google.maps.Map(document.getElementById('map-main'), {
                zoom: 2,
                scrollwheel: false,
                center: new google.maps.LatLng(45.10, -10.90),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                zoomControl: false,
                mapTypeControl: false,
                scaleControl: false,
                panControl: false,
                fullscreenControl: true,
                navigationControl: false,
                streetViewControl: false,
                animation: google.maps.Animation.BOUNCE,
                gestureHandling: 'cooperative',
                styles: [{
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#444444"
                    }]
                }]
            });
            var boxText = document.createElement("div");
            boxText.className = 'map-box'
            var currentInfobox;
            var boxOptions = {
                content: boxText,
                disableAutoPan: true,
                alignBottom: true,
                maxWidth: 0,
                pixelOffset: new google.maps.Size(-150, -55),
                zIndex: null,
                boxStyle: {
                    width: "300px"
                },
                closeBoxMargin: "0",
                closeBoxURL: "",
                infoBoxClearance: new google.maps.Size(1, 1),
                isHidden: false,
                pane: "floatPane",
                enableEventPropagation: false,
            };








            var markerCluster, overlay, i;
            var allMarkers = [];

            var clusterStyles = [{
                textColor: 'white',
                url: '',
                height: 50,
                width: 50
            }];

            var ib = new InfoBox();
            google.maps.event.addListener(ib, "domready", function() {
                cardRaining();

            });
            var markerImg;
            var markerCount;
            for (i = 0; i < locations.length; i++) {
                var labels = '123456789';
                markerImg = locations[i][4];
                markerCount = locations[i][3] + 1;
                var overlaypositions = new google.maps.LatLng(locations[i][1], locations[i][2]),

                    overlay = new CustomMarker(
                        overlaypositions, map, {
                            marker_id: i
                        }, markerImg, markerCount
                    );

                allMarkers.push(overlay);

                google.maps.event.addDomListener(overlay, 'click', (function(overlay, i) {

                    return function() {
                        ib.setOptions(boxOptions);
                        boxText.innerHTML = locations[i][0];
                        ib.close();
                        ib.open(map, overlay);
                        currentInfobox = locations[i][3];

                        var latLng = new google.maps.LatLng(locations[i][1], locations[i][2]);
                        map.panTo(latLng);
                        map.panBy(0, -110);

                        google.maps.event.addListener(ib, 'domready', function() {
                            $('.infoBox-close').click(function(e) {
                                e.preventDefault();
                                ib.close();
                                $('.map-marker-container').removeClass('clicked infoBox-opened');
                            });

                        });

                    }
                })(overlay, i));

            }
            var options2 = {
                imagePath: '',
                styles: clusterStyles,
                minClusterSize: 2
            };
            markerCluster = new MarkerClusterer(map, allMarkers, options2);
            google.maps.event.addDomListener(window, "resize", function() {
                var center = map.getCenter();
                google.maps.event.trigger(map, "resize");
                map.setCenter(center);
            });

            $('.map-item').on("click", function(e) {
                e.preventDefault();
                map.setZoom(15);
                var index = currentInfobox;
                var marker_index = parseInt($(this).attr('href').split('#')[1], 10);
                google.maps.event.trigger(allMarkers[marker_index - 1], "click");
                if ($(window).width() > 1064) {
                    if ($(".map-container").hasClass("fw-map")) {
                        $('html, body').animate({
                            scrollTop: $(".map-container").offset().top + "-110px"
                        }, 1000)
                        return false;
                    }
                }
            });
            $('.nextmap-nav').on("click", function(e) {
                e.preventDefault();
                map.setZoom(15);
                var index = currentInfobox;
                if (index + 1 < allMarkers.length) {
                    google.maps.event.trigger(allMarkers[index + 1], 'click');
                } else {
                    google.maps.event.trigger(allMarkers[0], 'click');
                }
            });
            $('.prevmap-nav').on("click", function(e) {
                e.preventDefault();
                map.setZoom(15);
                if (typeof(currentInfobox) == "undefined") {
                    google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
                } else {
                    var index = currentInfobox;
                    if (index - 1 < 0) {
                        google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
                    } else {
                        google.maps.event.trigger(allMarkers[index - 1], 'click');
                    }
                }
            });
            // Scroll enabling button
            var scrollEnabling = $('.scrollContorl');

            $(scrollEnabling).click(function(e) {
                e.preventDefault();
                $(this).toggleClass("enabledsroll");

                if ($(this).is(".enabledsroll")) {
                    map.setOptions({
                        'scrollwheel': true
                    });
                } else {
                    map.setOptions({
                        'scrollwheel': false
                    });
                }
            });
            var zoomControlDiv = document.createElement('div');
            var zoomControl = new ZoomControl(zoomControlDiv, map);

            function ZoomControl(controlDiv, map) {
                zoomControlDiv.index = 1;
                map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
                controlDiv.style.padding = '5px';
                var controlWrapper = document.createElement('div');
                controlDiv.appendChild(controlWrapper);
                var zoomInButton = document.createElement('div');
                zoomInButton.className = "mapzoom-in";
                controlWrapper.appendChild(zoomInButton);
                var zoomOutButton = document.createElement('div');
                zoomOutButton.className = "mapzoom-out";
                controlWrapper.appendChild(zoomOutButton);
                google.maps.event.addDomListener(zoomInButton, 'click', function() {
                    map.setZoom(map.getZoom() + 1);
                });
                google.maps.event.addDomListener(zoomOutButton, 'click', function() {
                    map.setZoom(map.getZoom() - 1);
                });
            }


            // Geo Location Button
            $(".geoLocation, .input-with-icon.location a").on("click", function(e) {
                e.preventDefault();
                geolocate();
            });

            function geolocate() {

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                        map.setCenter(pos);
                        map.setZoom(12);

                        var avrtimg = $(".avatar-img").attr("data-srcav");
                        var markerIcon3 = {
                            url: avrtimg,
                        }
                        var marker3 = new google.maps.Marker({
                            position: pos,
                            map: map,

                            icon: markerIcon3,
                            title: 'Your location'
                        });
                        var myoverlay = new google.maps.OverlayView();
                        myoverlay.draw = function() {
                            // add an id to the layer that includes all the markers so you can use it in CSS
                            this.getPanes().markerLayer.id = 'markerLayer';
                        };
                        myoverlay.setMap(map);

                    });
                }
            }
        }









        // Custom Map Marker
        // ----------------------------------------------- //

        function CustomMarker(latlng, map, args, markerImg, markerCount) {
            this.latlng = latlng;
            this.args = args;

            this.markerImg = markerImg;
            this.markerCount = markerCount;
            this.setMap(map);
        }

        CustomMarker.prototype = new google.maps.OverlayView();

        CustomMarker.prototype.draw = function() {

            var self = this;

            var div = this.div;

            if (!div) {

                div = this.div = document.createElement('div');
                div.className = 'map-marker-container';

                div.innerHTML = '<div class="marker-container">' +
                    '<span class="marker-count">' + self.markerCount + '</span>' +
                    '<div class="marker-card">' +
                    '<div class="marker-holder"><img src="' + self.markerImg + '" alt=""></div>' +
                    '</div>' +
                    '</div>'


                // Clicked marker highlight
                google.maps.event.addDomListener(div, "click", function(event) {
                    $('.map-marker-container').removeClass('clicked infoBox-opened');
                    google.maps.event.trigger(self, "click");
                    $(this).addClass('clicked infoBox-opened');
                });


                if (typeof(self.args.marker_id) !== 'undefined') {
                    div.dataset.marker_id = self.args.marker_id;
                }

                var panes = this.getPanes();
                panes.overlayImage.appendChild(div);
            }

            var point = this.getProjection().fromLatLngToDivPixel(this.latlng);

            if (point) {
                div.style.left = (point.x) + 'px';
                div.style.top = (point.y) + 'px';
            }
        };

        CustomMarker.prototype.remove = function() {
            if (this.div) {
                this.div.parentNode.removeChild(this.div);
                this.div = null;
                $(this).removeClass('clicked');
            }
        };

        CustomMarker.prototype.getPosition = function() {
            return this.latlng;
        };

        // -------------- Custom Map Marker / End -------------- // 


        var head = document.getElementsByTagName('head')[0];

        // Save the original method
        var insertBefore = head.insertBefore;

        // Replace it!
        head.insertBefore = function(newElement, referenceElement) {

            if (newElement.href && newElement.href.indexOf('https://fonts.googleapis.com/css?family=Roboto') === 0) {
                return;
            }

            insertBefore.call(head, newElement, referenceElement);
        };

        var map = document.getElementById('map-main');
        if (typeof(map) != 'undefined' && map != null) {
            google.maps.event.addDomListener(window, 'load', mainMap);
        }




    })(this.jQuery);
</script>