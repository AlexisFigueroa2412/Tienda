    $(".dropdown-trigger").dropdown();

    document.addEventListener('DOMContentLoaded', function() {
        
        //Navbar
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, options);
        //Parallax
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function(){
        //Navbar
        $('.sidenav').sidenav();
        //Parallax
        $('.parallax').parallax();
    });
    