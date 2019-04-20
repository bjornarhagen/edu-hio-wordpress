<?php 
    /* Template Name: restaurant 
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
            <a  href=""> Se meny </a>
            <a  href=""> Bildegalleri </a>
            <a  href=""> Se mer informasjon </a> 
            <?php the_field('se_meny');?>
            <?php the_field('galleri_felt');?>
            <?php the_field('se_mer_informasjon');?>     
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
           
        <div id="restaurant-bilde"><img src="https://itstud.hiof.no/uinv19/uinv19gr2/wp-content/uploads/2019/04/hh-restaurant2.jpg" alt="Restaurant bilde"></div>
        <div id="pagination"> 
            <?php 
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'havnehotellet-i-halden' ),
                    'after'  => '</div>',
                ) );
            ;?>      
        </div>
        <div id="kontakt_link">
            <h2> Vi hjelper deg gjerne </h2> 
            <a href="<?php the_field('link_field') ?>"> Kontakt oss </a>
        </div>
    </main>  
     
<?php get_footer(); ?>