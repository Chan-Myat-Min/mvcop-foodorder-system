<?php require_once APPROOT . '/views/inc/header.php'; ?>


<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <a href="category-foods.html">
            <div class="box-3 float-container">
                <img src="<?= URLROOT; ?>/images/pizza.jpg" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white">Pizza</h3>
            </div>
        </a>


        <?php
        foreach ($data['tbl_category'] as $category) {
            if ($category['active'] == "Yes") {
        ?>
                <a href="category-foods.html">
                    <div class="box-3 float-container">
                        <img src="<?php echo URLROOT; ?>/category_images/<?php echo $category['image']; ?>" alt="Pizza" class="img-responsive img-curve">

                        <h3 class="float-text text-white"><?php echo $category['title']; ?></h3>
                    </div>
                </a>
        <?php
            }
        }
        ?>

        <a href="#">
            <div class="box-3 float-container">
                <img src="<?= URLROOT; ?>/images/momo.jpg" alt="Momo" class="img-responsive img-curve">

                <h3 class="float-text text-white">Momo</h3>
            </div>
        </a>



        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<?php require_once APPROOT . '/views/inc/footer.php'; ?>