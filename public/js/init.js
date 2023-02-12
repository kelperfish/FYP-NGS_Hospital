(function($){
  $(function(){
    $(".sidenav").sidenav();

    //init slider

    $(".slider").slider({
      fullWidth: true,
      indicators: false,
      height: 600
    });
    
  }); // end of document ready
})(jQuery); // end of jQuery name space
