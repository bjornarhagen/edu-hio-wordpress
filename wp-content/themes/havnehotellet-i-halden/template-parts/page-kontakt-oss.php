<?php 
    /* Template Name: kontakt oss 
        * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
        *
        * @package Havnehotellet_i_Halden
    */ 
?>
<?php get_header(); ?>

    <main id="kontakt-oss-main" class="site-main" role="main"> 
        <?php havnehotellet_i_halden_post_thumbnail(); ?>
   
        <div id="kontakt_oss"> 
            <h2> <?php the_field('header_felt');?> </h2>
            <p> <?php the_field('info_felt');?> </p>        
        </div>
        
         <div id="caldera"> <?php the_content() ;?> </div>

        <div id="kart">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1113.3045993390604!2d11.374066338380414!3d59.12043012889054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464412e79ad06d7f%3A0xbb42eec55d72276d!2sMathias+Bj%C3%B8rns+gate%2C+Halden!5e0!3m2!1sno!2sno!4v1554376651339!5m2!1sno!2sno" 
                height="250" width="99%"
                allowfullscreen>
            </iframe>
        </div>
    </main>
<?php get_footer(); ?>


