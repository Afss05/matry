<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background-image: url('<?php echo base_url("assets_index/images/background/admin2.jpg"); ?>');
            background-size: cover;
            /* background-position: center; */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: rgba(255,255,255,0.95);
            border-radius: 12px;
            box-shadow: 0 0 24px rgba(0,0,0,0.15);
            padding: 2.5rem 2rem;
            max-width: 400px;
            width: 100%;
        }
        .login-container h3 {
            color: #222;
            font-family: Precious, sans-serif;
            margin-bottom: 1.5rem;
        }
        .form-control {
            background: transparent;
            color: #222 !important;
        }
        .btn-login {
            width: 100%;
            background-color: #dc3545;
            color: #fff;
            border-radius: 4px;
            margin-top: 1rem;
        }
        .btn-login:hover {
            background-color: #198754;
        }
        .alert {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container mx-auto">
        <h3 class="text-center">Admin</h3>
        <form class="mt-3" role="form" action="<?php echo base_url(); ?>adminmainlogin/loginsubmit" method="post">
            <?php if($this->session->flashdata('message')): ?>
                <div class="alert alert-success success" id="flash-message">
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <script>
                    setTimeout(function() {
                        var msg = document.getElementById('flash-message');
                        if(msg) msg.style.display = 'none';
                    }, 5000);
                </script>
            <?php endif; ?>
            <div class="mb-3">
                <input class="form-control" name="user" type="text" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="pass" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
