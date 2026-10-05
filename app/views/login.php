<!DOCTYPE html>
<html>

<head>

    <title>Login | Just Klowi Things</title>

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

        .hero {
            width: 84%;
            max-width: 1200px;
            margin: 90px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 80px;
        }

        .hero > div:first-child {
            flex: 1;
            min-width: 0;
        }

        .hero .card {
            flex: 0 0 400px;
            width: 400px;
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
            font-size: clamp(45px, 7vw, 78px);
            line-height: 0.95;
            letter-spacing: -4px;
        }

        h1 span {
            color: #ff6fae;
        }

        .description {
            color: #999;
            font-size: 17px;
            line-height: 1.7;
            margin-top: 25px;
            max-width: 500px;
        }

        .buttons {
            margin-top: 35px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 13px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: 0.3s;
        }

        .primary {
            background: #ff6fae;
            color: #0d0d12;
        }

        .primary:hover {
            transform: translateY(-3px);
        }

        .secondary {
            border: 1px solid #33333d;
            color: white;
        }

        .secondary:hover {
            border-color: #ff6fae;
            color: #ff6fae;
        }

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
            margin-bottom: 30px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
        }

        .status {
            color: #65e6a5;
            font-size: 12px;
        }

        .info {
            margin-bottom: 20px;
        }

        .label {
            color: #777;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 13px;
            background: #0d0d12;
            border: 1px solid #33333d;
            border-radius: 8px;
            color: white;
            font-size: 14px;
            outline: none;
        }

        input:focus {
            border-color: #ff6fae;
        }

        .login-button {
            width: 100%;
            padding: 13px 22px;
            border: none;
            border-radius: 8px;
            background: #ff6fae;
            color: #0d0d12;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }

        .login-button:hover {
            transform: translateY(-3px);
        }

        .error {
            background: #21151d;
            border: 1px solid #482538;
            color: #ff6fae;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .login-note {
            text-align: center;
            color: #777;
            font-size: 12px;
            margin-top: 20px;
        }

        footer {
            text-align: center;
            color: #555;
            padding: 30px;
            font-size: 12px;
        }

        @media (max-width: 850px) {

            .hero {
                flex-direction: column;
                align-items: stretch;
                margin: 60px auto;
                gap: 40px;
            }

            .hero .card {
                flex: 1;
                width: 100%;
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
            <a href="<?= base_url(); ?>">
                Login
            </a>
        </div>

    </nav>


    <div class="hero">

        <div>

            <div class="tag">
                ♡ Product Management System
            </div>

            <h1>
                Welcome<br>
                <span>back.</span>
            </h1>

            <p class="description">
                Log in to access your product management
                dashboard and manage your inventory.
            </p>

        </div>


        <div class="card">

            <div class="card-header">

                <div class="card-title">
                    Login
                </div>

                <div class="status">
                    ● Secure
                </div>

            </div>


            <?php if (!empty($error)): ?>

                <div class="error">
                    <?= htmlspecialchars($error); ?>
                </div>

            <?php endif; ?>


            <form
                action="<?= base_url('login'); ?>"
                method="POST"
            >

                <div class="info">

                    <label class="label">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        placeholder="Enter your username"
                        required
                    >

                </div>


                <div class="info">

                    <label class="label">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="login-button"
                >
                    Log In
                </button>

            </form>


            <div class="login-note">
                Only authenticated users can access Product Management.
            </div>

        </div>

    </div>


    <footer>
        Just Klowi Things · Product Management System
    </footer>

</body>

</html>
