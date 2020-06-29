
  <script>
    $(document).ready(function(){
    
      let owl = $('.owl-carousel');
      owl.owlCarousel({
        stagePadding: 50,
        loop:false,
        dots:true,
        dotsEach:true,
        lazyLoad:true,
        touchDrag:false,
        navText:['<i class="material-icons">arrow_back  </i>',
        '<i class="material-icons"> arrow_forward</i>'],
       
        items:1,
        margin:10,
        nav:true,
      });

      owl.on('mousewheel', '.owl-stage', function (e) {
          if (e.deltaY>0) {
              owl.trigger('next.owl');
          } else {
              owl.trigger('prev.owl');
          }
          e.preventDefault();
      });


     


      


    });
  </script>
