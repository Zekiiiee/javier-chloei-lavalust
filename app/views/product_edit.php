<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product — Just Klowi Things</title>

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

        .container {
            width: 84%;
            max-width: 800px;
            margin: 80px auto;
        }

        .tag {
            display: inline-block;
            background: #15151d;
            color: #fff;
            border: 1px solid #33333d;
            padding: 8px 14px;
            border-radius: 50px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: clamp(42px, 6vw, 65px);
            line-height: 0.95;
            letter-spacing: -3px;
        }

        h1 span {
            color: #ff6fae;
        }

        .description {
            color: #999;
            font-size: 16px;
            line-height: 1.7;
            margin-top: 20px;
            margin-bottom: 35px;
        }

        .card {
            background: #15151d;
            border: 1px solid #292933;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .card-header h2 {
            font-size: 22px;
        }

        .status {
            color: #65e6a5;
            font-size: 12px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            color: #aaa;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            background: #0d0d12;
            border: 1px solid #33333d;
            color: #fff;
            padding: 14px 15px;
            border-radius: 8px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: #ff6fae;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 13px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: 0.3s;
            cursor: pointer;
        }

        .primary {
            background: #ff6fae;
            color: #0d0d12;
            border: none;
        }

        .primary:hover {
            transform: translateY(-3px);
        }

        .secondary {
            border: 1px solid #33333d;
            color: white;
            background: transparent;
        }

        .secondary:hover {
            border-color: #ff6fae;
            color: #ff6fae;
        }

        footer {
            text-align: center;
            color: #555;
            padding: 30px;
            font-size: 12px;
        }

        @media (max-width: 700px) {
            nav {
                padding: 20px;
            }

            nav div:last-child {
                display: none;
            }

            .container {
                width: 90%;
                margin: 50px auto;
            }

            .card {
                padding: 25px;
            }

            .row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<nav>

    <div class="logo">
        Just <span>Klowi</span> Things ♡
    </div>

    <div>
        <a href="http://127.0.0.1:3000/products">Products</a>
        <a href="http://127.0.0.1:3000/student">Home</a>
        <a href="http://127.0.0.1:3000/logout">Logout</a>
    </div>

</nav>

<div class="container">

    <span class="tag">♡ Edit Product</span>

    <h1>
        Edit <span>Product.</span>
    </h1>

    <p class="description">
        Update the information of this product and save your changes
        to the inventory.
    </p>

    <div class="card">

        <div class="card-header">
            <h2>Product Information</h2>
            <span class="status">● Editing</span>
        </div>

        <form
            action="http://127.0.0.1:3000/products/update/<?= $product['id']; ?>"
            method="POST"
        >

            <div class="form-group">

                <label for="product_name">
                    Product Name
                </label>

                <input
                    type="text"
                    id="product_name"
                    name="product_name"
                    value="<?= htmlspecialchars($product['product_name']); ?>"
                    required
                >

            </div>

            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                ><?= htmlspecialchars($product['description']); ?></textarea>

            </div>

            <div class="row">

                <div class="form-group">

                    <label for="price">
                        Price
                    </label>

                    <input
                        type="number"
                        id="price"
                        name="price"
                        step="0.01"
                        min="0"
                        value="<?= htmlspecialchars($product['price']); ?>"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="quantity">
                        Quantity
                    </label>

                    <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        min="0"
                        value="<?= htmlspecialchars($product['quantity']); ?>"
                        required
                    >

                </div>

            </div>

            <div class="buttons">

                <button type="submit" class="btn primary">
                    Save Changes
                </button>

                <a
                    href="http://127.0.0.1:3000/products"
                    class="btn secondary"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

<footer>
    © 2026 Just Klowi Things ♡
</footer>

</body>
</html>