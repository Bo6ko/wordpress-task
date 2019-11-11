
$(document).ready(function() {
  $( function() {
    $( ".datepicker" ).datepicker({
      showButtonPanel: true
    });
  } );

  function init() {
      var input = document.getElementById('event_location');
      var autocomplete = new google.maps.places.Autocomplete(input);
  }

  google.maps.event.addDomListener(window, 'load', init);
});
