<?php require_once APPROOT . '/views/inc/header.php'; ?>


<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.html" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->


<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        $count = 0;
        foreach ($data['food'] as $food) {
            if ($food['active'] == "Yes") {

        ?>


                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="<?= URLROOT; ?>/food_images/<?= $food['image']; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?= $food['title']; ?></h4>
                        <p class="food-price">$<?= $food['price']; ?></p>
                        <p class="food-detail">
                            <?= $food['description']; ?>
                        </p>
                        <br>
                        <a href="<?php echo URLROOT; ?>/Order/foodOrder/<?php echo $food['id']; ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>

        <?php
            }
        }

        ?>

        <div class="clearfix"></div>

        <p class="text-center">
            <a href="<?php echo URLROOT; ?>/pages/foods">See All Foods</a>
        </p>

</section>
<!-- fOOD Menu Section Ends Here -->
<?php require_once APPROOT . '/views/inc/footer.php'; ?>