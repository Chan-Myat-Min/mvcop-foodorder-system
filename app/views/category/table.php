<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>

<!--  Main Content Section Starts-->
<div class="main-content">
    <div class="wrapper">
        <h2>Manage Category</h2>
        <br /><br>

        <a href="<?php echo URLROOT; ?>/Dashboard/createCategory" class="btn-primary">New Category</a>


        <table class=" tbl-full">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Images</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
            $sn = 1;
            foreach ($data['tbl_category'] as $category) {


            ?>
                <tr>
                    <td><?= $sn++; ?></td>
                    <td><?= $category['title']; ?></td>
                    <td>
                        <?php
                        $categoryImage = $category['image'];
                        if ($categoryImage != "") {
                        ?>
                            <img src="<?php echo URLROOT; ?>/public/category_images/<?php echo $categoryImage; ?>" width="100px">
                        <?php

                        } else {
                        ?>
                            <div><?= setMessage('error', 'Image is not Available'); ?></div>
                        <?php
                        }


                        ?>
                    </td>
                    <td><?= $category['featured']; ?></td>
                    <td><?= $category['active']; ?></td>
                    <td>
                        <a href="<?php echo URLROOT; ?>/Category/edit/<?php echo base64_encode($category['id']);  ?>" class="btn-secondary">Update Category</a>
                        <a href="<?php echo URLROOT; ?>/Category/destroy/<?php echo $category['id']; ?>" class="btn-danger">Delete Category</a>

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