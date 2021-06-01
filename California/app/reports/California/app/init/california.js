    
    M.AutoInit();  
        
    
    document.addEventListener('DOMContentLoaded', function() {
        
        //Navbar
        var sdnv = document.querySelectorAll('.sidenav');
        var instancesSdnv = M.Sidenav.init(sdnv);
        //Parallax
        var prllx = document.querySelectorAll('.parallax');
        var instancesPrllx = M.Parallax.init(prllx);
        //Modal
        var mdl = document.querySelectorAll('.modal');
        var instancesMdl = M.Modal.init(mdl);
        //Collapsable
        var cllpsbl = document.querySelectorAll('.collapsible');
        var instancesCllpsbl = M.Collapsible.init(cllpsbl);
        //Materialboxed
        var mtlbx = document.querySelectorAll('.materialboxed');
        var instancesMtlbx = M.Materialbox.init(mtlbx);
        //Carousel
        var crsl = document.querySelectorAll('.carousel');
        var instancescrsl = M.Carousel.init(crsl, {
          fullWidth: true,
          indicators: true
        });  
        //dropdown
        const elemsDropdown = document.querySelectorAll(".dropdown-trigger");
        const instancesDropdown = M.Dropdown.init(elemsDropdown, {coverTrigger: false,});
        //$('#textarea1').val('New Text');
        //M.textareaAutoResize($('#textarea1'));
        //boton fixed
        var btnfx = document.querySelectorAll('.fixed-action-btn');
        var instancesbtnfx = M.FloatingActionButton.init(bntfx, {
            direction: 'buttom',
            hoverEnabled: false
        });
        //Tooltip
        var tltp = document.querySelectorAll('.tooltipped');
        var instancestltp = M.Tooltip.init(tltp, options);
        //Range
        var slider = document.getElementById('test-slider');
        noUiSlider.create(slider, {
            start: [20, 80],
            connect: true,
            step: 1,
            orientation: 'horizontal', // 'horizontal' or 'vertical'
            range: {
                    'min': 0,
                    'max': 100
                },
            format: wNumb({
                    decimals: 0
                })
        });
        //animacion inicial scala
        let scln = document.querySelectorAll(".scale-in-init");
        for(var i=0; i< scln.length; i++){
            scln[i].classList.add("scale-in");
        }

    });

    //Animaciones

    let elementUp = document.querySelectorAll(".up");    
    let elementDown = document.querySelectorAll(".down");
    let animate = document.querySelectorAll(".scale-out");

    function AnimatedScrollUp(){
        let scrollTop = document.documentElement.scrollTop;
        for(var i=0;i< elementUp.length; i++){
            let heightElementUp = elementUp[i].offsetTop;
            if(heightElementUp- 400 < scrollTop){
                elementUp[i].style.opacity = 1;
                elementUp[i].classList.add("appear-up");
            }
        }
        for(var i=0;i< elementDown.length; i++){
            let heightElementDown = elementDown[i].offsetTop;
            if(heightElementDown- 400 < scrollTop){
                elementDown[i].style.opacity = 1;
                elementDown[i].classList.add("appear-down");
            }
        }
        for(var i=0;i< animate.length; i++){
            let heightanimate = animate[i].offsetTop;
            if(heightanimate- 400 < scrollTop){
                animate[i].style.opacity = 1;
                animate[i].classList.add("scale-in");
            }
        }
    }
    
    window.addEventListener('scroll',AnimatedScrollUp);

    
    