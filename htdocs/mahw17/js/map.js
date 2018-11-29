/**
 * Javascripts functions for render map based on IP-address
 */
ipMap = (function() {
    "use strict";

var ipFunctions = {
    "initMap": function (lat=59, lon=18, zoom=10) {

    var map = new OpenLayers.Map("mapdiv");
    var mapnik = new OpenLayers.Layer.OSM();
    map.addLayer(mapnik);

      var lonlat = new OpenLayers.LonLat(lon, lat).transform(
          new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
          new OpenLayers.Projection("EPSG:900913") // to Spherical Mercator
      );

    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);
    markers.addMarker(new OpenLayers.Marker(lonlat));

    map.setCenter(lonlat, zoom);
    }
};
return ipFunctions;
})();
