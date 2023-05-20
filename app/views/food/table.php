<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>

<!--  Main Content Section Starts-->
<div class="main-content">
    <div class="wrapper">
        <h2>Manage Food </h2>
        <br /><br>

        <a href="<?php echo URLROOT; ?>/Dashboard/createFood" class="btn-primary">New Food</a>


        <table class=" tbl-full">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php
            $sn = 1;
            foreach ($data['tbl_food'] as $tbl_food) {


            ?>


                <tr>
                    <td><?= $sn++; ?></td>
                    <td><?= $tbl_food['title']; ?></td>
                    <td><?= $tbl_food['price']; ?></td>
                    <td>
                        <?php
                        $foodImage = $tbl_food['image'];
                        if ($foodImage != "") {
                        ?>
                            <img src="<?php echo URLROOT; ?>/public/food_images/<?php echo $foodImage; ?>" width="100px">
                        <?php

                        } else {
                        ?>
                            <div><?= setMessage('error', 'Image is not Available'); ?></div>
                        <?php
                        }
                        ?>
                    </td>

                    <td><?= $tbl_food['description']; ?></td>

                    <td>
                        <?= $tbl_food['featured']; ?>
                    </td>
                    <td>
                        <?= $tbl_food['active']; ?>
                    </td>
                    <td>
                        <a href="<?php echo URLROOT; ?>/Food/edit/<?php echo base64_encode($tbl_food['id']);  ?>" class="btn-secondary">Update Food</a>
                        <a href="<?= URLROOT; ?>/Food/destroy/<?php echo $tbl_food['id']; ?>" class="btn-danger">Delete Food</a>
                    </td>
                    </td>
                </tr>
            <?php
            }
            ?>

        </table>

    </div>
</div>

<!--  Main Content Ends-->
<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>