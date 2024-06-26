<?php
include ("sessionchecker.php");
include ("connection.php");
include ("head.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\order_status9.css" />
</head>

<body>
    <?php
    $sql = "SELECT * FROM user_table WHERE username='" . $_SESSION['username'] . "'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        ?>


        <nav class="navbar navbar-expand-lg navbar-light bg-light m-0 p-0">
            <div
                class="container-fluid ms-0 ms-md-3 d-flex align-items-center justify-content-space justify-content-md-between d-lg-none w-100">
                <div>
                    <a id="off_nav_button" class="btn btn-light" data-bs-toggle="offcanvas" href="#offcanvasExample"
                        role="button" aria-controls="offcanvasExample">
                        <span class="navbar-toggler-icon" style="width:15px"></span>
                    </a>

                    <a id="img" class="navbar-brand" href="user_landing_page.php">
                        <img src="img/LOGOO.png" alt="YsakaLogo" class="d-inline-block" style="width: 110px">
                    </a>
                </div>

                <div class="off d-lg-none my-2">
                    <button id="notif_button" class="btn p-1" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRightSmall" aria-controls="offcanvasRightSmall" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" title="Notifications">
                        <div class="orders">
                            <div class="order_button">
                                <i class='bx bxs-bell'></i>
                            </div>
                        </div>
                    </button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRightSmall"
                        aria-labelledby="offcanvasRightLabelSmall">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasRightLabelSmall">Notifications</h5>
                            <button id="btn-close" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="notification_section">
                                <a href="#">
                                    <div class="notif_container">
                                        <div class="notif_title">
                                            <p>Notification Title</p>
                                        </div>
                                        <div class="notif_message">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, sequi.
                                            </p>

                                        </div>
                                        <div class="notif_details">
                                            <p>Product name x 00</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="notification_section">
                                <a href="#">
                                    <div class="notif_container">
                                        <div class="notif_title">
                                            <p>Notification Title</p>
                                        </div>
                                        <div class="notif_message">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, sequi.
                                            </p>

                                        </div>
                                        <div class="notif_details">
                                            <p>Product name x 00</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="notification_section">
                                <a href="#">
                                    <div class="notif_container">
                                        <div class="notif_title">
                                            <p>Notification Title</p>
                                        </div>
                                        <div class="notif_message">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, sequi.
                                            </p>

                                        </div>
                                        <div class="notif_details">
                                            <p>Product name x 00</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <div id="offcanvasExampleLabel"
                        class="offcanvas-title d-flex flex-row align-items-center justify-content-center justify-content-md-end me-2">
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <div class="user-off">
                                    <div class="photo ms-2 me-1">
                                        <img src="img/default-profile.jpg" alt="">
                                    </div>
                                    <div class="name ms-1 mt-1">
                                        <p><?php echo $_SESSION['username'] ?></p>
                                    </div>
                                </div>
                            </button>
                            <ul class="dropdown-menu p-2">
                                <li>
                                    <div class="drop_items ">
                                        <a class="ms-2 mt-3" href="user_setting.php">Account</a>
                                    </div>
                                </li>
                                <li>
                                    <div id="log_out" class="drop_items">
                                        <form action="logout.php" method="post">
                                            <button id="log_out_button" type="submit" name="logout"
                                                class="btn p-0 ps-2 text-start">Log
                                                out</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav-fill gap-2 p-0">
                        <li class="nav-item ps-3 ">
                            <a class="nav-link text-dark text-start" href="user_landing_page.php">Home</a>
                        </li>
                        <li class="nav-item ps-3 ">
                            <a class="nav-link text-dark text-start" href="user_products.php">Product</a>
                        </li>
                        <li class="nav-item ps-3 ">
                            <a class="nav-link text-dark text-start" href="user_cart.php">Cart</a>
                        </li>
                        <li class="nav-item ps-3 active">
                            <a class="nav-link text-dark text-start" href="user_order.php">Orders</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="container-fluid ms-0 ms-md-3 d-none d-md-flex align-items-center justify-content-space justify-content-md-between">
                <a id="img" class="navbar-brand" href="user_landing_page.php">
                    <img src="img/LOGOO.png" alt="YsakaLogo" class="d-lg-inline-block float-start d-none"
                        style="width: 110px">
                </a>

                <div class="container navbar-collapse d-flex d-md-none" id="navbarNav">
                    <ul class="navbar-nav nav-fill gap-2 p-0">
                        <li class="nav-item">
                            <a class="nav-link text-dark " href="user_landing_page.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark " href="user_products.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark " href="user_cart.php">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark active" href="user_order.php">Orders</a>
                        </li>

                    </ul>
                </div>

                <div class="right_nav d-none d-lg-flex">
                    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightLarge"
                        aria-controls="offcanvasRightLarge" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Notifications">
                        <div class="orders">
                            <div class="order_button">
                                <i class='bx bxs-bell'></i>
                            </div>
                        </div>
                    </button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRightLarge"
                        aria-labelledby="offcanvasRightLabelLarge">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasRightLabelLarge">Notifications</h5>
                            <button id="btn-close" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="notification_section">
                                <a href="#">
                                    <div class="notif_container">
                                        <div class="notif_title">
                                            <p>Notification Title</p>
                                        </div>
                                        <div class="notif_message">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, sequi.
                                            </p>

                                        </div>
                                        <div class="notif_details">
                                            <p>Product name x 00</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="notification_section">
                                <a href="#">
                                    <div class="notif_container">
                                        <div class="notif_title">
                                            <p>Notification Title</p>
                                        </div>
                                        <div class="notif_message">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, sequi.
                                            </p>

                                        </div>
                                        <div class="notif_details">
                                            <p>Product name x 00</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="notification_section">
                                <a href="#">
                                    <div class="notif_container">
                                        <div class="notif_title">
                                            <p>Notification Title</p>
                                        </div>
                                        <div class="notif_message">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, sequi.
                                            </p>

                                        </div>
                                        <div class="notif_details">
                                            <p>Product name x 00</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="btn-group">
                        <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="user">
                                <div class="name">
                                    <p class="text-end mt-1"><?php echo $_SESSION['username'] ?></p>
                                </div>
                                <div class="photo">
                                    <img src="img/default-profile.jpg" alt="">
                                </div>
                            </div>
                        </button>
                        <ul class="dropdown-menu p-2">
                            <li>
                                <div class="drop_items ">
                                    <a class="me-2" href="user_setting.php">Account</a>
                                </div>
                            </li>
                            <li>
                                <div id="log_out" class="drop_items ">
                                    <form action="logout.php" method="post">
                                        <button type="submit" name="logout" class="btn p-0 py-1 text-end pe-2">Log
                                            out</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <?php
        $sql = "SELECT * FROM chatroom WHERE chat_name='" . $_SESSION['chat_name'] . "'";
        $result = $conn->query($sql);

        while ($row2 = $result->fetch_assoc()) {
            ?>

            <div class="chat">
                <a href="chat_system/user/chatroom.php?id=<?php echo $row2['chatroomid']; ?>">
                    <button value=" <?php echo $row2['chatroomid']; ?>" type="button" class="btn  border-0"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                        <img src="img\chat_icon.png" />
                    </button>
                </a>
            </div>

        <?php } ?>

        <?php

        // Retrieve parameters
        $order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
        $status = isset($_GET['status']) ? $_GET['status'] : '';
        $order_number = isset($_GET['order_number']) ? $_GET['order_number'] : 0;
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        $items = [];
        if ($order_id && $status) {

            $sql = "SELECT oi.*, 
                   GROUP_CONCAT(vc.option SEPARATOR ', ') AS variant_options
            FROM order_items oi
            LEFT JOIN variant_content vc ON FIND_IN_SET(vc.variant_content_id, oi.variant_content_ids)
            WHERE oi.user_id = ? AND oi.order_number = ? AND oi.status = ?
            GROUP BY oi.order_id";

            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("iss", $user_id, $order_number, $status);
                $stmt->execute();
                $result = $stmt->get_result();
                $items = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close();
            } else {
                echo "Error: " . $conn->error;
            }
        }

        if (isset($_POST['selected_items']) && !empty($_POST['selected_items'])) {
            $selectedItems = json_decode($_POST['selected_items'], true);
            $totalPrice = 0;

            foreach ($selectedItems as $order_id) {
                $sql = "SELECT o.*, 
                       GROUP_CONCAT(vc.option SEPARATOR ', ') AS variant_options
                FROM order_table o
                LEFT JOIN variant_content vc ON FIND_IN_SET(vc.variant_content_id, o.variant_content_ids)
                WHERE o.user_id = ? AND o.order_id = ?
                GROUP BY o.order_id";

                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("ii", $user_id, $order_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($item = $result->fetch_assoc()) {
                        $totalPrice += $item['price'] * $item['quantity'];
                        ?>
                        <div id="product_details" class="w-100 rounded border d-flex justify-content-between align-items-end mb-2 p-2">
                            <div class="product_image d-flex justify-content-center align-items-center">
                                <img src="product-images/<?php echo $item['image_file']; ?>" alt="" class="rounded me-2">
                                <div class="m-0">
                                    <h5><?php echo $item['product_name']; ?></h5>
                                    <p>Variation: <?php echo $item['variant_options']; ?> x
                                        <?php echo number_format($item['price'], 2); ?>
                                    </p>
                                </div>
                            </div>
                            <div id="product_description">
                                <div class="container p-0">
                                    <p id="price" class="me-2 mt-2 mb-0 text-end">₱
                                        <?php echo number_format($item['price'] * $item['quantity'], 2); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    $stmt->close();
                } else {
                    echo "Error: " . $conn->error;
                }
            }
            ?>

            <div id="payment_details"
                class="container rounded d-flex justify-content-start align-items-start flex-column mb-2 p-3">
                <div class="mb-3">
                    <h5>Payment Details</h5>
                </div>
                <div class="w-100 d-flex align-items-center justify-content-between">
                    <p id="payment_details_text" class="m-0 ms-2">Merchandise Subtotal</p>
                    <p id="payment_details_text" class="m-0 me-2">₱ <?php echo number_format($totalPrice, 2); ?></p>
                </div>
                <div class="w-100 d-flex align-items-center justify-content-between">
                    <p id="payment_details_text" class="m-0 ms-2">Shipping Subtotal (Luzon/Visayas/Mindanao)</p>
                    <p id="payment_details_text" class="m-0 me-2">₱ 00.00</p>
                </div>
                <div class="w-100 d-flex align-items-center justify-content-between mt-3">
                    <h5 class="ms-2">Total Payment</h5>
                    <h5 id="total_payment" class="me-2">₱ <?php echo number_format($totalPrice, 2); ?></h5>
                </div>
            </div>

            <div id="place_order" class="w-100 rounded d-flex align-items-center justify-content-end">
                <div>
                    <p class="m-0">Total Payment</p>
                    <h5 id="price" class="m-0">₱ <?php echo number_format($totalPrice, 2); ?></h5>
                </div>
                <button id="place_order_button" type="button" class="btn py-3 px-4 ms-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Place Order
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Payment via GCASH</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="payment" class="d-flex flex-column align-items-center p-2">
                                    <div>
                                        <p>Scan the QR code to pay</p>
                                    </div>
                                    <div>
                                        <img src="img/Gcash-BMA-QRcode-768x1024.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form action="user-order-form.php" method="post">
                                    <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
                                    <input type="hidden" name="title" value="Order Placed">
                                    <input type="hidden" name="selected_items" id="selected_items"
                                        value='<?php echo json_encode($selectedItems); ?>'>
                                    <input type="hidden" name="description"
                                        value="Your Order has been placed successfully. Click for more details">
                                    <input type="hidden" name="status" value="Unread">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button id="done_button" type="submit" class="btn btn-primary">Done</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        // Check if there are items
        if ($items): ?>
            <div id="container" class="container-fluid-sm container-md rounded mb-3 mt-3 p-3">
                <div id="shipping_information"
                    class="container rounded d-flex justify-content-start align-items-start flex-column mt-3 p-3">
                    <div class="w-100 mb-3 d-flex align-items-center justify-content-between py-2">
                        <h5 class="m-0">Shipping Information</h5>
                        <p id="shipping_information_text" class="m-0">
                            <?php
                            switch ($status) {
                                case 'Pending':
                                    echo "Waiting for Seller's confirmation";
                                    break;
                                case 'Shipping':
                                    echo 'The seller is preparing the order/s.';
                                    break;
                                case 'Shipped':
                                    echo 'The order/s has been shipped.';
                                    break;
                                case 'Delivered':
                                    echo 'The order/s has been delivered.';
                                    break;
                                default:
                                    echo 'Unknown status';
                                    break;
                            }
                            ?>
                        </p>
                    </div>
                    <div class="w-100 d-flex align-items-center justify-content-between">
                        <p id="payment_details_text" class="m-0 ms-2">Order ID: <?php echo $order_number; ?></p>
                        <p id="payment_details_text" class="m-0 me-2">Order Date:
                            <?php echo date('F j, Y', strtotime($items[0]['order_date'])); ?>
                        </p>
                    </div>
                </div>

                <div id="shipping_address" class="container rounded mt-3 p-3 bg-light">
                    <div id="address_head" class="w-100 d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="m-0">
                                <img id="location_icon" class="mb-1 me-1" src="img/location.png" alt="">
                                Delivery Address
                            </h5>
                        </div>
                    </div>
                    <div id="address_details" class="d-flex flex-column align-items-start ms-4 mt-2">
                        <p class="m-0 mb-1 ms-2"> <?php echo $row['first_name'] . ' ' . $row['last_name']; ?> |
                            <?php echo $row['phone']; ?>
                        </p>
                        <p class="ms-2 me-2">
                            <?php echo $row['blockLot'] . ' ' . $row['subdivision'] . ', ' . $row['barangay'] . ', ' . $row['province'] . ', ' . $row['city'] . ' ' . $row['zip']; ?>
                        </p>
                    </div>
                </div>

                <?php
                $totalPrice = 0;
                foreach ($items as $item):
                    $totalPrice += $item['price'] * $item['quantity'];
                    ?>
                    <div id="order_item" class="rounded mt-3 p-2">
                        <div id="product_details" class="w-100 rounded d-flex justify-content-between align-items-center p-2">
                            <div class="product_image d-flex justify-content-center align-items-center">
                                <img src="product-images/<?php echo $item['image_file']; ?>" alt="" class="rounded me-2">
                                <div class="product_variation">
                                    <h5><?php echo $item['product_name'] . ' | ' . $item['variant_options']; ?></h5>
                                    <p>Quantity: <?php echo $item['quantity']; ?></p>
                                    <p> <?php echo number_format($item['price'], 2); ?></p>
                                </div>
                            </div>
                            <div id="product_description">
                                <div class="container d-flex align-items-center justify-content-center p-0">
                                    <p id="price" class="me-2 mt-2 mb-0">
                                        ₱<?php echo number_format($item['price'] * $item['quantity'], 2); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $shippingCost = 150;
                    $totalPayment = $totalPrice + $shippingCost;
                endforeach; ?>


                <div id="payment_details"
                    class="container rounded d-flex justify-content-start align-items-start flex-column mt-3 mb-2 p-3">
                    <div class="mb-3">
                        <h5>Payment Details</h5>
                    </div>
                    <div class="w-100 d-flex align-items-center justify-content-between">
                        <p id="payment_details_text" class="m-0 ms-2">Merchandise Subtotal</p>
                        <p id="payment_details_text" class="m-0 me-2">₱<?php echo number_format($totalPrice, 2); ?></p>
                    </div>
                    <div class="w-100 d-flex align-items-center justify-content-between">
                        <p id="payment_details_text" class="m-0 ms-2">Shipping Subtotal (
                            <b><?php echo $row['island_group']; ?></b> )
                        </p>
                        <p id="payment_details_text" class="m-0 me-2">₱ <?php echo number_format($shippingCost, 2); ?></p>
                    </div>
                    <div class="w-100 d-flex align-items-center justify-content-between mt-3">
                        <h5 class="ms-2">Total Payment</h5>
                        <h5 id="total_payment" class="me-2">₱<?php echo number_format($totalPayment, 2); ?></h5>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div id="empty_order"
                class="container rounded p-2 text-center d-flex align-items-center justify-content-center bg-light mt-1"
                style="height: 150px">
                <h5>Empty Order.</h5>
            </div>
        <?php endif; ?>
    <?php }
    ?>


    <footer>
        <div class="footer_content flex-wrap">
            <div class="footer_logo">
                <img id="footer-logo" src="img\LOGO.png" alt="">
            </div>
            <div class="footer_details">
                <h4>SOCIALS</h4>
                <div class="socials">
                    <a href="#">
                        <p><i class='bx bxl-facebook-circle'></i>Facebook</p>
                    </a>
                    <a href="#">
                        <p><i class='bx bxl-tiktok'></i>Tiktok</p>
                    </a>
                    <a href="#">
                        <p><i class='bx bxl-instagram-alt'></i>Instagram</p>
                    </a>
                </div>
                <div class="copyright">
                    <p><i class='bx bx-copyright'></i>2021 Jessa Mae O. Figueroa | All Rights Reserve</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>