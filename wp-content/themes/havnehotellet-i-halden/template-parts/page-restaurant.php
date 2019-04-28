<?php 
    /* Template Name: restaurant 
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package Havnehotellet_i_Halden
    */ 
?>
 <?php get_header(); ?>

    <main id="restaurant-main" role="main">
        <?php havnehotellet_i_halden_post_thumbnail(); ?>
        
        <div id="havnekroa_tittel"> 
            <h2>  <?php the_field('header_felt');?> </h2>
            <p> <?php the_field('beskrivelse_felt');?> </p>       
        </div>
        <div id="openning_time"> 
            <p> <?php the_field('openning_time_felt');?> </p>       
        </div>
        <div id="innhold">
            <a href="<?php echo get_post_type_archive_link('meal'); ?>"> Se meny</a> 
            <a href="<?php echo esc_url( get_permalink(get_page_by_title('Bilde galleri'))); ?>">Bilde galleri</a>
            <a href="<?php echo esc_url( get_permalink(get_page_by_title('Se mer informasjon'))); ?>"> Se mer informasjon </a>
            <p> <?php the_field('innhold_felt');?></p>
        </div>

        <form action="" id="bestill-form" method="post">
            <h2>Reserver et bord </h2>
            <input type="text" name="kort_id"  placeholder="Kort id" required>
            <input type="date" name="text" placeholder="Dato" required> 
            <input type="text" name="personer" placeholder="2 Personer" required>
            <input type="time" name="time" placeholder="Time" required>
            <button type="submit">Bestill</button>
        </form>
           
        <div id="slide-bilder">
            <?php the_field('bilde_felt') ;?>
        </div>

        <div id="kontakt_link">
            <h2> Vi hjelper deg gjerne </h2> 
            <a href="<?php echo esc_url(get_permalink(get_page_by_title('Kontakt oss'))); ?>"> Kontakt oss </a>
        </div>
    </main>  
     
<?php get_footer(); ?>