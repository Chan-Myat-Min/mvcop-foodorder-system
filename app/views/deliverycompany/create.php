<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Add Delivery-Company</h1>

        <br /><br />


        <!-- Add Category Form Starts-->
        <form action="<?php echo URLROOT; ?>/DeliveryCompany/store" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Select Image</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <td colspan="2">
                    <input type="submit" name="submit" value="Add Delivery" class="btn-secondary">

                </td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>