<?php require_once APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/table.css">

<section class="food-search_profile">
    <h1>Shopping Cart Table</h1>

    <table id="customers" class="table">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>Sn1</td>
            <td>Image</td>
            <td>Pizza</td>
            <td>100mmk</td>
            <td>4</td>
            <td>400mmk</td>
            <td>
                <a href="" class="btn-danger">Remove</a>
            </td>
        </tr>

    </table>

    <?php require_once APPROOT . '/views/inc/footer.php'; ?>