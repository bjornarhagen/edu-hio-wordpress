<?php 
    /* Template Name: bilde-galleri 
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package Havnehotellet_i_Halden
    */ 
?>
 <?php get_header(); ?>

    <main id="restaurant-main">
        <?php havnehotellet_i_halden_post_thumbnail(); ?>
        <div id="havnekroa_tittel"> 
            <h2>  <?php the_field('header_felt');?> </h2>
            <p> <?php the_field('beskrivelse_felt');?> </p>       
        </div>
        <div id="openning_time"> 
            <p> <?php the_field('info_felt');?> </p>       
        </div>
        <div id="linker">
            <a href="http://localhost:3000/se-meny/">Se meny</a> 
            <a href="http://localhost:3000/bilde-galleri/">Bilde galleri</a>
            <a href="http://havnehotellet-i-halden.local/se-mer-informasjon/"> Se mer informasjon </a>
            <p id="galleri"><?php the_field('galleri_felt');?></p> 
        </div>

        <form action="" id="bestill-form" method="post">
            <h2>Reserver et bord </h2>
            <label for="kort_id" >&#128288;</label>
            <input type="text" name="kort_id"  placeholder="Kort id" required>
            <label for="date" >&#128467;</label>
            <input type="date" name="text" placeholder="Dato" required> 
            <label for="personer" >&#128694;</label>     
            <input type="text" name="personer" placeholder="2 Personer" required>
            <label for="time" >&#128343;</label>
            <input type="time" name="time" placeholder="Time" required>
            <button type="submit">Bestill</button>
        </form>
           
        <div id="restaurant-bilde">
            <img src="<?php  the_field('bilde_felt') ;?>" alt="restaurant bilde" >
        </div>

        <div id="kontakt_link">
            <h2> Vi hjelper deg gjerne </h2> 
            <a href="<?php the_field('link_field') ?>"> Kontakt oss </a>
        </div>
    </main>  
     
<?php get_footer(); ?>