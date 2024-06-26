<?php

use Core\Helper;
use Config\Config;

 include "partials/head.php" ?>
<div class="cont">
    <form action="<?php Helper::route('/explore') ?>" method="GET" class="sidebar">
        <h2>Filter</h2>
        <div class="filter-section">
            <span style="display:flex; justify-content:space-around;align-items:center;">
                <h3>Type of Places</h3>
                <span class="dropdown-icon"><i class="bi bi-caret-down-fill" style="font-size: 25px;"></i></span>
            </span>
            <ul>
                <li><input type="checkbox" id="restaurant" name="restaurant"><label for="restaurant">Restaurant</label></li>
                <li><input type="checkbox" id="cafe" name="cafe"><label for="cafe">Cafe</label></li>
                <li><input type="checkbox" id="park" name="park"><label for="park">Park</label></li>
                <li><input type="checkbox" id="museum" name="museum"><label for="museum">Museum</label></li>
                <li><input type="checkbox" id="museum" name="museum"><label for="museum">Museum</label></li>
            </ul>
        </div>
        <div class="filter-section">
            <h3>Price Range</h3>
            <input type="number" id="minPrice" name="minPrice" placeholder="Min" step="1">
            <input type="number" id="maxPrice" name="maxPrice" placeholder="Max" step="1">
        </div>
        <div class="filter-section">
            <h3>Distance Range</h3>
            <input type="range" id="distanceRange" name="distanceRange" min="0" max="50" value="25">
            <span id="distanceValue">25 miles</span>
        </div>
        <button class="apply-filter">Apply Filter</button>
    </form>
    <div class="main-content">
        <div class="container py-5">
            <div class="row listing">
                <?php
                if(!empty($places)){
                    foreach($places as $place){
                        echo '<div class="col-lg-4 col-md-6 col-sm-12">';
                        echo '<div class="card">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">'.$place['Name'].'</h5>';
                        echo '<p class="card-text">'.$place['Type'].'</p>';
                        echo "<img class='img-fluid' src='".Config::$root_url.'/image/'.$place['Image']."' alt='".$place['Image']."'/>";
                        echo '<p class="card-text">'.$place['Description'].'</p>';
                        echo '<p class="card-text">'.$place['isFree'].'</p>';
                        echo '<a href="'.Helper::url("/details/place/{$place['ID']}").'"><button>See more...</button></a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterSections = document.querySelectorAll('.filter-section');

        filterSections.forEach(section => {
            const title = section.querySelector('h3');
            title.addEventListener('click', function() {
                section.classList.toggle('active');
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const filterSections = document.querySelectorAll('.filter-section');

        filterSections.forEach(section => {
            const title = section.querySelector('.dropdown-icon');
            title.addEventListener('click', function() {
                section.classList.toggle('active');
            });
        });
    });
</script>
<?php require "partials/scripts.php" ?>

</body>

</html>