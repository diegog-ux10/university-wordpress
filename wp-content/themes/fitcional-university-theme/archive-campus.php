<!-- Site Header -->
<?php get_header(); ?>

<!-- Page Banner -->
<?php get_template_part('template-parts/content', 'page-banner', array(
        'title' => 'All Campuses',
        'subtitle' => "We have very great Campuses"
))?><!-- Page Banner End-->

    <!-- Container to show all programs -->
    <div class="container container--narrow page-section">
        <div class="acf-map">
        <?php
        /**
         * Loop Show Programs
         */
        $locationArr = [];
        while (have_posts()):
            the_post(); 
            $mapLocation = get_field('map_location');
            array_push($locationArr, [$mapLocation["lat"], $mapLocation["lng"]]);
        endwhile; ?>
            <div id='map' style='width: 100%; height: 100%;'></div>
            <script>
                    mapboxgl.accessToken = 'pk.eyJ1IjoiZGllZ29ndXgxMCIsImEiOiJjbGhiN3Nva3Mwb2thM2VzMHo5djY2ajI0In0.aBdGBRG6FWX1XGUSlGMUJw';
                    const map = new mapboxgl.Map({
                    container: 'map', // container ID
                    style: 'mapbox://styles/mapbox/streets-v12', // style URL
                    center: ['-118.21916900979939', '34.00289791124215'], // starting position [lng, lat]
                    zoom: 15, // starting zoom
                });

                // Create a new marker.
                const marker = new mapboxgl.Marker()
                
                let locations = <?php echo json_encode($locationArr) ?>

                marker.setLngLat(['-118.21916900979939', '34.00289791124215'])
                .addTo(map);    
            </script>
        </div>
        <?php echo paginate_links(); ?>
    </div><!-- Container to show all programs End-->
<?php get_footer(); ?>