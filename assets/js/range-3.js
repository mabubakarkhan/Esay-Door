 $(document).ready(function() {
        $( "#mySlider" ).slider({
          range: true,
          min: 10,
          max: 1000,
          values: [ 0, 1000 ],
          slide: function( event, ui ) {
         $( "#price" ).val( "Rs" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
         }
      });
          
      $( "#price" ).val( "Rs" + $( "#mySlider" ).slider( "values", 0 ) +
		   " - $" + $( "#mySlider" ).slider( "values", 1 ) 
		  );
          
     });