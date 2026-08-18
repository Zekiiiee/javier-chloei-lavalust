<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Just Klowi Things</title>

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
            max-width: 1100px;
            margin: 80px auto;
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 50px;
            align-items: center;
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
            max-width: 600px;
        }

        .buttons {
            margin-top: 35px;
        }

        .btn {
            display: inline-block;
            padding: 13px 22px;
            margin-right: 10px;
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
            padding: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
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
        }

        .value {
            margin-top: 5px;
            font-size: 16px;
        }

        .social {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #292933;
        }

        .social a {
            color: #ff6fae;
            text-decoration: none;
            margin-right: 15px;
            font-size: 14px;
        }

        .social a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            color: #555;
            padding: 30px;
            font-size: 12px;
        }

        @media (max-width: 800px) {
            .hero {
                grid-template-columns: 1fr;
                margin-top: 50px;
            }

            nav {
                padding: 20px;
            }

            nav div:last-child {
                display: none;
            }
        }
    </style>
</head>

<body>

<nav>
    <div class="logo">Just Klowi Things</div>

    <div>
        <a href="/student">Home</a>
        <a href="/student/profile">Profile</a>
    </div>
</nav>

<section class="hero">

    <div>
        <div class="tag">✦ Student Mode: ON</div>

        <h1>
            Just<br>
            <span>Klowi Things.</span>
        </h1>

        <p class="description">
            Welcome po Team Ryzza
        </p>

        <div class="buttons">

            <a class="btn primary" href="/student/profile">
                View My Profile →
            </a>

            <a class="btn secondary" href="#contact">
                Contact Me
            </a>

        </div>
    </div>


    <div class="card">

        <div class="card-header">
            <strong>Basic Info</strong>
            <span class="status">● online</span>
        </div>

        <div class="info">
            <div class="label">Student ID</div>
            <div class="value"><?= $student_id; ?></div>
        </div>

        <div class="info">
            <div class="label">Course</div>
            <div class="value"><?= $course; ?></div>
        </div>

        <div class="info">
            <div class="label">Year Level</div>
            <div class="value"><?= $year; ?></div>
        </div>

        <div class="info">
            <div class="label">Section</div>
            <div class="value"><?= $section; ?></div>
        </div>

        <div class="info">
            <div class="label">Email</div>
            <div class="value"><?= $email; ?></div>
        </div>

        <div class="social" id="contact">

            <div class="label">Find me online</div>

            <br>

            <a href="https://instagram.com/klowiiie" target="_blank">
                Instagram
            </a>

            <a href="#" target="_blank">
                Facebook
            </a>

            <p style="margin-top:15px; color:#888;">
                📱 0975 053 2959
            </p>

        </div>

    </div>

</section>

<footer>
    © <?= date('Y'); ?> Just Klowi Things — Built with LavaLust ✦
</footer>

</body>
</html>