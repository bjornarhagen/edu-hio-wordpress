<?php 
    /* Template Name: restaurant 
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package Havnehotellet_i_Halden
    */ 
?>
 <?php get_header(); ?>
    <main id="restaurant-main">
        <?php   
          the_title(); 
          the_content();
          
          $posts = get_posts();
            foreach ( $posts as $post ) : ?>  
            <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
        <?php endforeach;?>

          <form action="" id="bestill-form" method="post">
              <h2>Reserver et bord </h2>
              <label for="kort_id" >&#128288;</label>
              <input type="text" name="kort_id"  placeholder="Kort id">
              <label for="date" >&#128467;</label>
              <input type="date" name="text" placeholder="Dato"> 
              <label for="personer" >&#128694;</label>     
              <input type="text" name="personer" placeholder="2 Personer">
              <label for="time" >&#128343;</label>
              <input type="time" name="time" placeholder="Time">
              <button type="submit">Bestill</button>
          </form>
          <div id="restaurant-bilde"><img src="https://itstud.hiof.no/uinv19/uinv19gr2/wp-content/uploads/2019/04/hh-restaurant2.jpg" alt="Restaurant bilde"></div>
    </main>      
<?php get_footer(); ?>