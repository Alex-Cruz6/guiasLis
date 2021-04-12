<aside id="sidebar">
    <section class="widget">
        <h4 class="widgettitulo">Noticias</h4>
        <ul>
            <?php
                $submenuoptions = array("Diseño Web", "Diseño Gráfico", "WordPress", "Joomla", "Drupal","Redes Sociales","SEO");
                $listsubmenu = "";
                foreach($submenuoptions as $itemsub):
                    $listsubmenu .= "\n<li>\n\n<a href=\"javascript:void(0);\">$itemsub</a>\n</li>\n";
                endforeach;
                echo $listsubmenu;
            ?>
        </ul>
        </section>
        <section class="widget">
            <h4 class="widgettitulo">Sitos Web</h4>
            <ul>
                <?php
                    $externallinks = array("http://www.tutosytips.com/" => "Tutosytips.com",
                        "http://www.wordpress.org.com/" => "Wordpress",
                        "http://www.Joomla.org/" => "Joomla",
                        "http://www.twetter.com/" => "Twetter",
                        "http://www.facebook.com/" => "Facebook",
                        "http://www.youtube.com/" => "YouTube",
                        "javascript:void(0);" => "SEO"
                    );
                    $listext = "";
                    foreach($externallinks as $extlink => $extitem):
                        $listext .= "\n<li>\n\n<a href=\"$extlink\">$extitem</a>\n</li>\n";
                    endforeach;
                    echo $listext;
                ?>
            </ul>
        </section>
    </section>
</aside>