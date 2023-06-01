<?php require_once APPROOT . '/views/inc/header.php'; ?>


<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php
        foreach ($data['category'] as $category) {
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

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<?php require_once APPROOT . '/views/inc/footer.php'; ?>