<!DOCTYPE html>
<html>

<head>

    <title>Products | Just Klowi Things</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #0d0d12;
            color: #f5f5f5;
            min-height: 100vh;
        }

        /* =========================
           NAVIGATION
        ========================= */

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 22px 8%;
            border-bottom: 1px solid #252530;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

        .logo span {
            color: #ff6fae;
        }

        nav a {
            color: #aaa;
            text-decoration: none;
            margin-left: 25px;
            font-size: 14px;
            transition: 0.3s;
        }

        nav a:hover {
            color: #ff6fae;
        }

        /* =========================
           MAIN
        ========================= */

        .container {
            width: 84%;
            max-width: 1200px;
            margin: 75px auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 50px;
            margin-bottom: 40px;
        }

        .page-intro {
            flex: 1;
        }

        .tag {
            display: inline-block;
            background: #21151d;
            color: #ff6fae;
            border: 1px solid #482538;
            padding: 8px 14px;
            border-radius: 50px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: clamp(45px, 7vw, 75px);
            line-height: 0.95;
            letter-spacing: -4px;
        }

        h1 span {
            color: #ff6fae;
        }

        .description {
            color: #999;
            font-size: 16px;
            line-height: 1.7;
            margin-top: 25px;
            max-width: 520px;
        }

        /* =========================
           ADD BUTTON
        ========================= */

        .add-button {
            display: inline-block;
            background: #ff6fae;
            color: #0d0d12;
            padding: 13px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: 0.3s;
            white-space: nowrap;
        }

        .add-button:hover {
            transform: translateY(-3px);
            background: #ff82b8;
        }

        /* =========================
           PRODUCT CARD
        ========================= */

        .card {
            background: #15151d;
            border: 1px solid #292933;
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
        }

        .status {
            color: #65e6a5;
            font-size: 12px;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        th {
            color: #777;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: left;
            padding: 15px 12px;
            border-bottom: 1px solid #292933;
        }

        td {
            padding: 18px 12px;
            border-bottom: 1px solid #24242d;
            color: #ddd;
            font-size: 14px;
            vertical-align: middle;
        }

        tbody tr {
            transition: 0.25s;
        }

        tbody tr:hover {
            background: #191921;
        }

        .product-id {
            color: #666;
            font-size: 13px;
        }

        .product-name {
            color: #f5f5f5;
            font-weight: bold;
        }

        .description-cell {
            color: #999;
            max-width: 260px;
            line-height: 1.5;
        }

        .price {
            color: #ff6fae;
            font-weight: bold;
        }

        .quantity {
            color: #65e6a5;
            font-weight: bold;
        }

        /* =========================
           ACTION BUTTONS
        ========================= */

        .actions {
            display: flex;
            align-items: center;
            gap: 12px;
            white-space: nowrap;
        }

        .action-btn {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            transition: 0.3s;
        }

        .edit {
            border: 1px solid #383842;
            color: #f5f5f5;
            background: #1b1b24;
        }

        .edit:hover {
            border-color: #ff6fae;
            color: #ff6fae;
            background: #21151d;
        }

        .delete {
            border: 1px solid #482538;
            color: #ff6fae;
            background: #21151d;
        }

        .delete:hover {
            border-color: #ff6fae;
            background: #321c29;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty {
            text-align: center;
            padding: 70px 20px;
            color: #777;
        }

        .empty-icon {
            color: #ff6fae;
            font-size: 36px;
            margin-bottom: 15px;
        }

        /* =========================
           BOTTOM LINKS
        ========================= */

        .bottom-links {
            margin-top: 25px;
        }

        .bottom-links a {
            color: #777;
            text-decoration: none;
            font-size: 13px;
            transition: 0.3s;
        }

        .bottom-links a:hover {
            color: #ff6fae;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            text-align: center;
            color: #555;
            padding: 30px;
            font-size: 12px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 850px) {

            nav {
                padding: 20px 6%;
            }

            nav a {
                margin-left: 12px;
            }

            .container {
                width: 90%;
                margin: 55px auto;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 25px;
            }

        }

        @media (max-width: 600px) {

            nav {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            nav a {
                margin-left: 0;
                margin-right: 15px;
            }

            h1 {
                font-size: 50px;
            }

            .card {
                padding: 20px;
            }

        }

    </style>

</head>


<body>


    <!-- =========================
         NAVIGATION
    ========================== -->

    <nav>

        <div class="logo">
            Just <span>Klowi</span> Things ♡
        </div>

        <div>

            <a href="<?= base_url('student'); ?>">
                Home
            </a>

            <a href="<?= base_url('student/profile'); ?>">
                Profile
            </a>

            <a href="<?= base_url('products'); ?>">
                Products
            </a>

            <a href="<?= base_url('logout'); ?>">
                Logout
            </a>

        </div>

    </nav>


    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <div class="container">


        <div class="page-header">


            <div class="page-intro">

                <div class="tag">
                    ♡ Inventory
                </div>

                <h1>
                    Product<br>
                    <span>Management.</span>
                </h1>

                <p class="description">
                    Manage your products, prices, descriptions,
                    and inventory quantities in one place.
                </p>

            </div>


            <div>

                <a
                    href="<?= base_url('products/create'); ?>"
                    class="add-button"
                >
                    + Add Product
                </a>

            </div>


        </div>


        <!-- =========================
             PRODUCT TABLE CARD
        ========================== -->

        <div class="card">


            <div class="card-header">

                <div class="card-title">
                    All Products
                </div>

                <div class="status">
                    ● Connected
                </div>

            </div>


            <?php if (!empty($products)): ?>


                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    ID
                                </th>

                                <th>
                                    Product
                                </th>

                                <th>
                                    Description
                                </th>

                                <th>
                                    Price
                                </th>

                                <th>
                                    Quantity
                                </th>

                                <th>
                                    Created
                                </th>

                                <th>
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            <?php foreach ($products as $product): ?>


                                <tr>


                                    <td class="product-id">
                                        #<?= htmlspecialchars($product['id']); ?>
                                    </td>


                                    <td class="product-name">
                                        <?= htmlspecialchars($product['product_name']); ?>
                                    </td>


                                    <td class="description-cell">
                                        <?= htmlspecialchars($product['description']); ?>
                                    </td>


                                    <td class="price">
                                        ₱<?= number_format((float)$product['price'], 2); ?>
                                    </td>


                                    <td class="quantity">
                                        <?= htmlspecialchars($product['quantity']); ?>
                                    </td>


                                    <td>
                                        <?= htmlspecialchars($product['created_at']); ?>
                                    </td>


                                    <td>


                                        <div class="actions">


                                            <a
                                                href="<?= base_url('products/edit/' . $product['id']); ?>"
                                                class="action-btn edit"
                                            >
                                                Edit
                                            </a>


                                            <a
                                                href="<?= base_url('products/delete/' . $product['id']); ?>"
                                                class="action-btn delete"
                                                onclick="return confirm('Are you sure you want to delete this product?');"
                                            >
                                                Delete
                                            </a>


                                        </div>


                                    </td>


                                </tr>


                            <?php endforeach; ?>


                        </tbody>

                    </table>

                </div>


            <?php else: ?>


                <div class="empty">

                    <div class="empty-icon">
                        ♡
                    </div>

                    <p>
                        No products found.
                    </p>

                </div>


            <?php endif; ?>


        </div>


        <!-- =========================
             BACK LINK
        ========================== -->

        <div class="bottom-links">

            <a href="<?= base_url('student'); ?>">
                ← Back to Home
            </a>

        </div>


    </div>


    <footer>
        ♡ Just Klowi Things · Product Management System
    </footer>


</body>

</html>
