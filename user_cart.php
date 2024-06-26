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
    <link rel="stylesheet" href="css\cart.css" />
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
                            <?php
                            $notifs = mysqli_query($conn, "SELECT * FROM notification_table WHERE user_id = '" . $_SESSION["user_id"] . "' ORDER BY date desc");
                            while ($notif = mysqli_fetch_assoc($notifs)) {
                                $date = date("F j, Y, g:i a", strtotime($notif["date"]));
                                $user_id = $notif["user_id"]; // Assuming you have an order_id field in the notification_table
                                $title = $notif["title"];

                                // Determine the URL based on the title
                                $url = "#";
                                if ($title == "Order Placed") {
                                    $url = "user_order.php";
                                } elseif ($title == "Order Confirm") {
                                    $url = "user_order_to_ship.php";
                                } elseif ($title == "Order Delivered") {
                                    $url = "user_order_delivered.php";
                                }
                                ?>
                                <a href="<?php echo $url; ?>" style="text-decoration: none;">
                                    <div class="notification_section">
                                        <div class="notif_container">
                                            <div class="notif_title d-flex align-content-center justify-content-between">
                                                <p><?php echo $notif["title"]; ?></p>
                                                <p style="font-size: 18px"><?php echo $date; ?></p>
                                            </div>
                                            <div class="notif_message">
                                                <p class="ms-2"><?php echo $notif["description"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
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
                                        <img src="profile_picture/<?php echo $row['image_file'] ?>" alt="">
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
                        <li class="nav-item ps-3 active">
                            <a class="nav-link text-dark text-start" href="user_cart.php">Cart</a>
                        </li>
                        <li class="nav-item ps-3">
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
                            <a class="nav-link text-dark active" href="user_cart.php">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="user_order.php">Orders</a>
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
                            <?php
                            $notifs = mysqli_query($conn, "SELECT * FROM notification_table WHERE user_id = '" . $_SESSION["user_id"] . "' ORDER BY date desc");
                            while ($notif = mysqli_fetch_assoc($notifs)) {
                                $date = date("F j, Y, g:i a", strtotime($notif["date"]));
                                $user_id = $notif["user_id"]; // Assuming you have an order_id field in the notification_table
                                $title = $notif["title"];

                                // Determine the URL based on the title
                                $url = "#";
                                if ($title == "Order Placed") {
                                    $url = "user_order.php";
                                } elseif ($title == "Order Confirm") {
                                    $url = "user_order_to_ship.php";
                                } elseif ($title == "Order Delivered") {
                                    $url = "user_order_delivered.php";
                                }
                                ?>
                                <a href="<?php echo $url; ?>" style="text-decoration: none;">
                                    <div class="notification_section">
                                        <div class="notif_container">
                                            <div class="notif_title d-flex align-content-center justify-content-between">
                                                <p><?php echo $notif["title"]; ?></p>
                                                <p style="font-size: 18px"><?php echo $date; ?></p>
                                            </div>
                                            <div class="notif_message">
                                                <p class="ms-2"><?php echo $notif["description"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
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
                                    <img src="profile_picture/<?php echo $row['image_file'] ?>" alt="">
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

    <?php } ?>

    <div class="chat">
        <a href="chat_system/user/chatroom.php?id=<?php echo $row['chatroomid']; ?>">
            <button value=" <?php echo $row['chatroomid']; ?>" type="button" class="btn  border-0"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                <img src="img\chat_icon.png" />
            </button>
        </a>
    </div>

    <div id="container" class="container-fluid-sm container-md d-flex flex-column mb-3 mt-3 p-3"
        style="min-height: 650px;">
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'];
        $sql = "
        SELECT o.*, 
               GROUP_CONCAT(vc.option SEPARATOR ', ') AS variant_options
        FROM order_table o
        LEFT JOIN variant_content vc ON FIND_IN_SET(vc.variant_content_id, o.variant_content_ids)
        WHERE o.user_id = $user_id
        GROUP BY o.order_id
    ";

        $result = $conn->query($sql);

        ?>

        <div id="container" class="container-fluid-sm container-md d-flex flex-column mb-3 mt-3 p-3"
            style="min-height: 650px;">
            <?php if ($result->num_rows > 0): ?>
                <div id="select_all"
                    class="container rounded p-2 mb-2 ps-2 d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center ps-2">
                        <input type="checkbox" name="selectAllCheckbox" id="selectAllCheckbox">
                        <label for="selectAllCheckbox" class="ms-2 py-3">Select All</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3 d-flex flex-column align-items-end justify-content-start">
                            <p class="m-0">Total</p>
                            <h5 id="price" class="m-0">₱ 0.00</h5>
                        </div>
                        <form id="checkoutForm" action="user_check_out.php" method="post">
                            <input type="hidden" name="selected_items" id="selected_items">
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                            <?php endwhile; ?>
                            <button id="check_out" class="py-3 p-2 rounded">Check Out</button>
                        </form>
                    </div>
                </div>
                <?php
                $result->data_seek(0);
                while ($item = $result->fetch_assoc()):
                    ?>
                    <div class="cart_item">
                        <div id="product_details">
                            <div class="check_box">
                                <input type="checkbox" class="itemCheckbox" data-index="<?php echo $item['order_id']; ?>"
                                    data-price="<?php echo $item['price'] * $item['quantity']; ?>">
                            </div>
                            <div class="product_image">
                                <img src="product-images/<?php echo $item['image_file']; ?>" alt="Product Image">
                            </div>
                            <div class="product_description">
                                <h5><?php echo $item['product_name'] . ' | ' . $item['variant_options']; ?></h5>
                                <div class="product_variation">
                                    <p>Quantity: <?php echo $item['quantity']; ?></p>
                                    <p>Price: ₱ <?php echo number_format($item['price'], 2); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="edit_delete">
                            <div class="edit_button">
                                <a
                                    href="user_product_update.php?product_id=<?php echo $item['product_id']; ?>&order_id=<?php echo $item['order_id']; ?>">
                                    <button>Edit</button>
                                </a>
                            </div>
                            <div class="delete_button ms-2">
                                <form action="delete-from-cart.php" method="post">
                                    <input type="hidden" name="order_id" value="<?php echo $item['order_id']; ?>">
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <div class="cart_item d-flex align-self-center justify-content-center" style="height:50dvh;">
                    <h5>Click <a href="user_products.php">here</a> for more products.</h5>
                </div>
            <?php else: ?>
                <div id="select_all"
                    class="container rounded p-2 mb-2 ps-2 d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center ps-2">
                        <input type="checkbox" id="selectAllCheckbox">
                        <p class="ms-2 mt-3">Select All</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3 d-flex flex-column align-items-end justify-content-start">
                            <p class="m-0">Total</p>
                            <h5 id="price" class="m-0">₱ 0.00</h5>
                        </div>
                        <a href="user_check_out.php"><button id="check_out" class="py-3 p-2 rounded" disabled>Check
                                Out</button></a>
                    </div>
                </div>
                <div id="empty_cart" class="container rounded p-2">
                    <h5>Your cart is empty. Order <a href="user_products.php">here</a>.</h5>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const selectAllCheckbox = document.getElementById("selectAllCheckbox");
            const itemCheckboxes = document.querySelectorAll(".itemCheckbox");
            const checkoutForm = document.getElementById("checkoutForm");
            const selectedItemsInput = document.getElementById("selected_items");
            const totalPriceElement = document.getElementById("price");
            const checkoutButton = document.getElementById("check_out");

            function updateSelectedItems() {
                const selectedItems = [];
                let totalPrice = 0;

                itemCheckboxes.forEach(function (checkbox) {
                    if (checkbox.checked) {
                        selectedItems.push(checkbox.getAttribute('data-index'));
                        totalPrice += parseFloat(checkbox.getAttribute('data-price'));
                    }
                });

                selectedItemsInput.value = JSON.stringify(selectedItems);
                totalPriceElement.innerText = `₱ ${totalPrice.toFixed(2)}`;
                checkoutButton.innerText = `Check Out (${selectedItems.length})`;

                // Enable or disable checkout button based on selected items
                if (selectedItems.length > 0) {
                    checkoutButton.removeAttribute('disabled');
                } else {
                    checkoutButton.setAttribute('disabled', 'disabled');
                }
            }

            selectAllCheckbox.addEventListener("click", function () {
                itemCheckboxes.forEach(function (checkbox) {
                    checkbox.checked = selectAllCheckbox.checked;
                });
                updateSelectedItems();
            });

            itemCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener("click", updateSelectedItems);
            });

            checkoutForm.addEventListener("submit", function (event) {
                updateSelectedItems();
                if (selectedItemsInput.value === '[]') {
                    event.preventDefault();
                    alert("Please select at least one item to check out.");
                }
            });
        });
    </script>




    <footer>
        <div class="footer_content flex-wrap flex-md-nowrap">
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