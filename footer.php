<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Women_Owned_Wineries_Sonoma
 */

$socials = get_field('socials', 'option');
$facebook = $socials['facebook'];
$twitter = $socials['twitter'];
$instagram = $socials['instagram'];
$pinterest = $socials['pinterest'];
$youtube = $socials['youtube'];
$accreditation = get_field('accreditation', 'option');
$made_possible = get_field('made_possible', 'option');
// echo '<pre class="white text">';var_dump($menuitems);echo '</pre>';
?>

<footer id="colophon" class="site-footer">
    <?php echo file_get_contents(get_stylesheet_directory() . '/img/bar.svg'); ?>
    <?php echo file_get_contents(get_stylesheet_directory() . '/img/bar.svg'); ?>
    <div class="container">
        <div class="columns">
            <div class="nav column is-one-quarter">
                <?php
                $menuitems = wp_get_nav_menu_items('footer');

                if ($menuitems) {
                    foreach ($menuitems as $item) {
                        // set up title and url
                        $title = $item->title;
                        $link = $item->url;
                        $target = $item->target;
                        $menu_id = $item->object_id;

                        // item does not have a parent so menu_item_parent equals 0 (false)
                        if (!$item->menu_item_parent) {
                            // save this id for later comparison with sub-menu items
                            $parent_id = $item->ID;
                            $current_class = ($menu_id == $post->ID) ? 'is-active' : '';
                            echo "<h3 class='navbar-item'>";
                            echo "<a href='{$link}' class='link {$current_class}' target='{$target}'>";
                            echo $title;
                            echo "</a>";
                            echo "</h3>";
                        }
                    }
                }
                ?>


                <?php // /endif; 
                ?>
            </div>
            <div class="column is-one-quarter">

            </div>

            <div class="column is-one-third is-offset-2 subscribe">
                <form action="https://wowsonoma.us9.list-manage.com/subscribe/post-json?u=e49f49aef80cb79df223052d3&amp;id=f3ec14ba49" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="form validate" target="_blank" novalidate>
                    <h3 class="title has-text-right has-text-white">Follow us!</h3>
                    <div class="field has-addons">
                        <div class="control is-expanded has-icons-left">
                            <input type="email" value="" placeholder="hello@email.address" name="EMAIL" class="input is-rounded is-inverted required" id="mce-EMAIL" aria-required="true">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_f1120753af05172754a874dee_ac3335af5e" tabindex="-1" value=""></div>
                        </div>
                        <div class="control">
                            <button type="submit" class="button is-rounded is-cta" id="mc-embedded-subscribe">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>


                    <div id="mce-embedded-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>

                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_e49f49aef80cb79df223052d3_f3ec14ba49" tabindex="-1" value=""></div>
                </form>

                <div class="socials">
                    <a href="https://www.instagram.com/wowsonoma/" target="_blank">
                        <span class="icon">
                            <i class="fab fa-instagram"></i>
                        </span>
                    </a>
                    <a href="https://www.facebook.com/wowsonoma" target="_blank">
                        <span class="icon">
                            <i class="fab fa-facebook"></i>
                        </span>
                    </a>
                    <a href="https://twitter.com/wowsonoma" target="_blank">
                        <span class="icon">
                            <i class="fab fa-twitter"></i>
                        </span>
                    </a>
                    <a href="https://www.pinterest.com/wowsonoma/" target="_blank">
                        <span class="icon">
                            <i class="fab fa-pinterest"></i>
                        </span>
                    </a>
                </div>
            </div>

        </div>
        <div class="container">
            <div class="level">
                <div class="level-item has-text-centered"> Copyright © WOWSonoma. All Rights Reserved. </div>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>