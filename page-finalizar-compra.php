<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.1.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

  <section class="shop-hero-epic">
      <!-- Circuit pattern animado -->
      <div class="hero-circuit-pattern"></div>
      <div class="hero-particles"></div>
      <div class="scan-line"></div>

      <!-- Nodos de conexión pulsantes -->
      <div class="circuit-nodes">
          <div class="circuit-node"></div>
          <div class="circuit-node"></div>
          <div class="circuit-node"></div>
      </div>

      <!-- Data flow (líneas que viajan) -->
      <div class="data-flow data-flow-1"></div>

      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-12 text-center">
                  <div class="shop-hero-content" data-aos="fade-up">
                      <div class="hero-icon mb-3" data-aos="zoom-in" data-aos-delay="100">
                          <i class="bi bi-file-earmark"></i>
                      </div>
                  
                      <?php the_title('<h1 class="shop-hero-title ' . apply_filters('bootscore/class/entry/title', '', 'page') . '" data-aos="fade-up" data-aos-delay="200">', '</h1>'); ?>
                      
                      <p class="shop-hero-subtitle" data-aos="fade-up" data-aos-delay="300">
                          &nbsp;
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <div id="content" class="site-content <?= apply_filters('bootscore/class/container', 'container', 'page'); ?> <?= apply_filters('bootscore/class/content/spacer', 'pt-4 pb-5', 'page'); ?>">
    <div id="primary" class="content-area">

      <div class="row">

        <div class="col-12">

          <main id="main" class="site-main">
            
             <div class="entry-content">
          <?php the_post(); ?>
          <?php the_content(); ?>
        </div>

          </main>

        </div>
        
      </div>

    </div>
  </div>

<?php
get_footer();
