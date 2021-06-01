  M.AutoInit();
   
  $(".dropdown-trigger").dropdown();
    

  document.addEventListener('DOMContentLoaded', function() {
        
    //Navbar
    var sdnvpv = document.querySelectorAll('.sidenav');
    var instancesSdnvpv = M.Sidenav.init(sdnvpv);
    //Parallax
    var prllxpv = document.querySelectorAll('.parallax');
    var instancesPrllxpv = M.Parallax.init(prllxpv);
    //Modal
    var mdlpv = document.querySelectorAll('.modal');
    var instancesMdlpv = M.Modal.init(mdlpv);
    //Collapsable
    var cllpsblpv = document.querySelectorAll('.collapsible');
    var instancesCllpsblpv = M.Collapsible.init(cllpsblpv);
    //Materialboxed
    var mtlbxpv = document.querySelectorAll('.materialboxed');
    var instancesMtlbxpv = M.Materialbox.init(mtlbxpv);
    //Carousel    
    var crslpv = document.querySelectorAll('.carousel');
    var instancescrslpv = M.Carousel.init(crslpv, {
      fullWidth: true,
      indicators: true
    });  
  });

    // Or with jQuery

    $(document).ready(function(){
        //Navbar
       $('.sidenav').sidenav();
        //Parallax
       $('.parallax').parallax();
       //date time
       $('#fecha').datepicker();
    });
    
  
    // Or with jQuery
  
    $('.carousel.carousel-slider').carousel({
      fullWidth: true,
      indicators: true
      
    });
    $(document).ready(function(){
      $('#btn-6').floatingActionButton();
       direction: 'top left buttom right'
       hoverEnabled: true
    });
    $(document).ready(function(){
      $('#btn-5').floatingActionButton();
       direction: 'top left buttom right'
       hoverEnabled: true
    });
    $(document).ready(function(){
      $('#btn-4').floatingActionButton();
       direction: 'top left buttom right'
       hoverEnabled: true
    }); 
    $(document).ready(function(){
      $('#btn-3').floatingActionButton();
       direction: 'top left buttom right'
       hoverEnabled: true
    });  
    $(document).ready(function(){
      $('#btn-2').floatingActionButton();
       direction: 'top left buttom right'
       hoverEnabled: true
    });     
    $(document).ready(function(){
      $('#btn-1').floatingActionButton();
       direction: 'top left buttom right'
       hoverEnabled: true
    });      
    $(document).ready(function(){
      $('.modal').modal();
    });
    $(document).ready(function(){
      $('select').formSelect();
    });
    $(document).ready(function(){
      $('.moda2').modal();
    });     
    $(document).ready(function(){
      $('.moda3').modal();
    });   
    $(document).ready(function(){
      $('.moda4').modal();
    });       
    $(document).ready(function(){
      $('.moda5').modal();
    });       
    $(document).ready(function(){
      $('.moda6').modal();
    });       
    $(document).ready(function(){
      $('.moda7').modal();
    });     
    $(document).ready(function(){
      $('.moda8').modal();
    });       
    $(document).ready(function(){
      $('.moda9').modal();
    });       
    $(document).ready(function(){
      $('.moda10').modal();
    });       
    $(document).ready(function(){
      $('.moda11').modal();
    });       
          
          
          
            
          