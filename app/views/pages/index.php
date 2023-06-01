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

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php
        $count = 0;
        foreach ($data['category'] as $category) {
            $count++;
            if ($count < 4) {
                if ($category['featured'] == "Yes" && $category['active'] == "Yes") {
                    $categoryId = $category['id'];
        ?>
                    <a href="category-foods.html">
                        <div class="box-3 float-container">
                            <img src="<?= URLROOT; ?>/category_images/<?= $category['image']; ?>" alt="Pizza" class="img-responsive img-curve">

                            <h3 class="float-text text-white"><?= $category['title']; ?></h3>
                        </div>
                    </a>

        <?php
                }
            }
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>


        <?php
        //filter food array based on the condition
        $filteredFood = array_filter($data['food'], function ($food) {
            return $food['featured'] == "Yes" && $food['active'] == 'Yes';
        });

        // Get random keys from the food array
        $randomKeys = (count($filteredFood) >= 4) ? array_rand($filteredFood, 4) : array_keys($filteredFood);

        foreach ($randomKeys as $key) {
            $food = $filteredFood[$key];

            // if ($food['featured'] == "Yes" && $food['active'] == 'Yes') {
        ?>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="<?= URLROOT; ?>/food_images/<?= $food['image']; ?>" alt="Chicken Hawaiian Pizza" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4><?= $food['title']; ?></h4>
                    <p class="food-price">$<?= $food['price']; ?></p>
                    <p class="food-detail">
                        <?= $food['description']; ?>
                    </p>
                    <br>

                    <a href="<?php echo URLROOT; ?>/Order/foodorder/<?php echo $food['id']; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>

        <?php
            // }
        }
        ?>




        <div class="clearfix"></div>



    </div>

    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->
<?php require_once APPROOT . '/views/inc/footer.php'; ?>