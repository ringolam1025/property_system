
(function ($) {
  "use strict";

$(function() {

    // Snazzy Map Style - https://snazzymaps.com/style/8097/wy
    var mapStyle = [{
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [{ "color": "#444444" }]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{"color": "#f2f2f2"}]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{"visibility": "off"}]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{"saturation": -100}, {"lightness": 45}]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{"visibility": "simplified"}]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [{"visibility": "off"}]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [{"visibility": "off"}]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{"color": "#2bbafc"}, {"visibility": "on"}]
                    }];
    var center = { lat: 22.28552, lng: 114.15769 };    
	var offsetCenter = function(dx, dy) {
        return { lat: center.lat + dx, lng: center.lng + dy };
    };
    var markersArr = [];
	// Add a custom marker
    var markerIcon = {
        path: 'M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z',
        fillColor: '#0025f7',
        fillOpacity: 0.95,
        scale: 2,
        strokeColor: '#fff',
        strokeWeight: 3,
        anchor: new google.maps.Point(12, 24)
    };

    // Set latitude longitude units of the map where you want to center your map
    var map = new google.maps.Map($('.map-canvas')[0], {
        zoom: 12,
        styles: mapStyle,
        center: new google.maps.LatLng(22.28552, 114.15769)
    });   

    // Blow you can find all map listing items. You can add/edit/remove these listings as per your need
    // Map Listing items START
	var dx = 0.003;    
    // Map Listing items END

    $.each(placements, function(i, e) {
        var newLat = e.LatLng.lat + (Math.random() -.5) / 1500;
        var newLng = e.LatLng.lng + (Math.random() -.5) / 1500;

        var marker = new google.maps.Marker({
            map: map,
            icon: markerIcon,
            position: new google.maps.LatLng(newLat, newLng) //e.LatLng 
        });
        markersArr.push(marker); 

        // Set up handle bars
        var template = Handlebars.compile($('#marker-content-template').html());

        // Set up a close delay for CSS animations
        var info = null;
        var closeDelayed = false;
        var closeDelayHandler = function() {
            $(info.getWrapper()).removeClass('active');
            setTimeout(function() {
                closeDelayed = true;
                info.close();
            }, 300);
        };
        // Add a Snazzy Info Window to the marker
        info = new SnazzyInfoWindow({
            marker: marker,
            wrapperClass: 'custom-window',
            offset: { top: '-72px' },
            edgeOffset: { top: 50, right: 60, bottom: 50 },
            closeWhenOthersOpen: true,
            border: false,
            closeButtonMarkup: '<button type="button" class="custom-close">&#215;</button>',
            content: template({
                title: e.title,
                link:e.link,
                subtitle: e.subtitle,
                bgImg: e.bgImg,
                body: e.body
            }),
            callbacks: {
                open: function() {
                    $(this.getWrapper()).addClass('open');
                },
                afterOpen: function() {
                    var wrapper = $(this.getWrapper());
                    wrapper.addClass('active');
                    wrapper.find('.custom-close').on('click', closeDelayHandler);
                },
                beforeClose: function() {
                    if (!closeDelayed) {
                        closeDelayHandler();
                        return false;
                    }
                    return true;
                },
                afterClose: function() {
                    var wrapper = $(this.getWrapper());
                    wrapper.find('.custom-close').off();
                    wrapper.removeClass('open');
                    closeDelayed = false;
                }
            }
        });
    });
    // Continue creating markers like above...
    var markers = markersArr;
    const h = 40;
    var clusterStyles = [
        {
          textColor: 'black',
          url: 'assets/icons/white-home.svg',
          height: h,
          width: h
        },
       {
          textColor: 'black',
          url: 'assets/icons/white-home.svg',
          height: h,
          width: h
        },
       {
          textColor: 'black',
          url: 'assets/icons/white-home.svg',
          height: h,
          width: h
        }
      ];
    var mcOptions = { gridSize: 50, styles: clusterStyles, maxZoom: 15 };  
    var markerCluster = new MarkerClusterer(map, markers, mcOptions);
        //{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
    // Open the Snazzy Info Window
    // info.open();
});

})(jQuery);
