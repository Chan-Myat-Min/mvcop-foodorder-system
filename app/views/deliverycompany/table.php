<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>

<!--  Main Content Section Starts-->
<div class="main-content">
    <div class="wrapper">
        <h2>Delivery Company</h2>
        <br />

        <a href="<?php echo URLROOT; ?>/Dashboard/createDeliveryCompany" class="btn-primary">New Category</a>
        <br><br>

        <table class=" tbl-full">
            <tr>
                <th>S.N</th>
                <th>Images</th>
                <th>Title</th>
                <th>Action</th>
            </tr>

            <?php
            $sn = 1;
            foreach ($data['delivery_company'] as $delivery_company) :
            ?>
                <tr>
                    <td><?= $sn++; ?></td>
                    <td>

                        <?php
                        $deliCompanyImage = $delivery_company['image'];
                        if ($deliCompanyImage != "") {
                        ?>
                            <img src="<?php echo URLROOT; ?>/public/deliverycompany_images/<?php echo $deliCompanyImage; ?>" width="100px">
                        <?php
                        } else {
                        ?>
                            <div><?= setMessage('error', 'Image is not Available'); ?></div>
                        <?php
                        }
                        ?>
                    </td>

                    <td><?= $delivery_company['company_name']; ?></td>
                    <td>
                        <a href="<?php echo URLROOT ;?>/" class="btn-danger">Delete Delivery Company</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

    </div>
</div>

<!--  Main Content Ends-->
<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>

?