<?php 
session_start();
	if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		if (isset($_POST['btn'])){

			if (isset($_SESSION['cart'])) 
			{
				$myItems=array_column($_SESSION['cart'],'Item_Name');
				if(in_array($_POST['Item_Name'], $myItems)){
					echo "<script>
						alert('Item Already added in cart');
						window.location.href='index.php';
					</script>";
				}else{
					$count = count($_SESSION['cart']);
				$_SESSION['cart'][$count]= array('Item_Name' => $_POST['Item_Name'], 'Price'=>$_POST['Price'],'Quantity'=>1);
				echo "<script>
						alert('Item  added in cart');
						window.location.href='index.php';
					</script>";
				}

			}else{
				$_SESSION['cart'][0]= array('Item_Name' => $_POST['Item_Name'],'img' => $_POST['img'], 'Price'=>$_POST['Price'],'Quantity'=>1);
				echo "<script>
						alert('Item  added in cart');
						window.location.href='index.php';
					</script>";
			}
		}
		if (isset($_POST['remove_item'])) {
			foreach($_SESSION['cart'] as $key => $value){
				if ($value['Item_Name']==$_POST['Item_Name']) {
					unset($_SESSION['cart'][$key]);
					$_SESSION['cart']=array_values($_SESSION['cart']);
					echo "<script>
								alert('Item removed');
								window.location.href='mycart.php';
							</script>";
				}
			}
		}

	}


?>