<?php get_header(); ?>


  <body>
    
    <header class="xrow h_10vh">
      <div id="logo" class="small-12 medium-3 columns imgLiquid imgLiquidNoFill h_90">
        <img src="http://fakeimg.pl/300x100?text=Logo" alt="">
      </div>
      <div id="menu" class="small-12 medium-6 columns">
        <div class="medium-3 columns">Elemento Menú</div>
        <div class="medium-3 columns">Elemento Menú</div>
        <div class="medium-3 columns">Elemento Menú</div>
        <div class="medium-3 columns">Elemento Menú</div>
      </div>
      <div id="language" class="small-12 medium-3 columns">
        <a href="#">Es</a>
        <span>|</span>
        <a href="#">En</a>
      </div>
    </header>




    <div id="map" class="abs h_50vh small-2 columns">
      Mapa
    </div>

    <div id="text" class="absUpR h_50vh small-2 columns fontS">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolorem vitae dolores inventore, non nam.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore facilis nam veniam sapiente ullam vero, sequi aliquam facere excepturi, ratione, reiciendis tempora nostrum odio qui?</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium aspernatur, quod corporis?</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
    </div>

    <section id="gallery" class="xrow h_80vh">
      <div id="slider" class="h_100 slick">
      
      <?php for($i=0; $i < 10; $i++) : ?>
        
        <div class="slide h_full xrow imgLiquid imgLiquidFill">
          <img src="http://fakeimg.pl/1280x600?text=Slide_<?php echo $i; ?>" alt="" class="h_full">
        </div>

      <?php endfor; ?>

      </div>
    
    </section>


<?php get_footer(); ?>