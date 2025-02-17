<?php include 'db.php'; ?>

<?php
$showSignup = isset($_GET['form']) && $_GET['form'] === 'signup';
$signupSuccess = isset($_GET['signup']) && $_GET['signup'] === 'success';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user'] = $username;
                header("Location: dashboard.php");
            } else {
                $error = "Invalid password";
            }
        } else {
            $error = "User not found";
        }
    } elseif (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            header("Location: login.php?signup=success");
            exit();
        } else {
            $signupError = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login & Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            display: none;
            backdrop-filter: blur(10px);
            color: #64ffda;
        }
        .active {
            display: block;
        }
        .toggle-buttons {
            position: fixed;
            top: 20px;
            right: 20px;
        }
        .home-button {
            position: fixed;
            top: 20px;
            left: 20px;
        }
        .alert {
            margin-bottom: 20px;
        }
        .success-message {
            background: rgba(100, 255, 218, 0.1);
            color: #64ffda;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #64ffda;
            animation: fadeInDown 0.5s ease-out;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div id="particles-js"></div>
    <div class="content">
        <a href="index.php" class="btn btn-light home-button">← Home</a>

        <?php if($signupSuccess): ?>
            <div class="success-message">
                Registration successful! Please login with your credentials.
            </div>
        <?php endif; ?>

        <div class="toggle-buttons">
            <button onclick="showForm('login')" class="btn btn-light">Login</button>
            <button onclick="showForm('signup')" class="btn btn-light">Sign Up</button>
        </div>

        <!-- Login Form -->
        <div id="loginForm" class="form-container <?php echo !$showSignup ? 'active' : ''; ?>">
            <h2 class="text-center mb-4">Login</h2>
            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if(isset($_GET['registered'])): ?>
                <div class="alert alert-success">Registration successful! Please login.</div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" required placeholder="Username">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" required placeholder="Password">
                </div>
                <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
            </form>
        </div>

        <!-- Sign Up Form -->
        <div id="signupForm" class="form-container <?php echo $showSignup ? 'active' : ''; ?>">
            <h2 class="text-center mb-4">Sign Up</h2>
            <?php if(isset($signupError)): ?>
                <div class="alert alert-danger"><?php echo $signupError; ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" required placeholder="Username">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" required placeholder="Password">
                </div>
                <button type="submit" name="signup" class="btn btn-success w-100">Sign Up</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        function showForm(formType) {
            document.getElementById('loginForm').classList.toggle('active', formType === 'login');
            document.getElementById('signupForm').classList.toggle('active', formType === 'signup');
            
            if (<?php echo $signupSuccess ? 'true' : 'false'; ?>) {
                document.getElementById('loginForm').classList.add('active');
                document.getElementById('signupForm').classList.remove('active');
            }
        }

        window.addEventListener('load', function() {
            <?php if($signupSuccess): ?>
                showForm('login');
            <?php else: ?>
                showForm(<?php echo $showSignup ? "'signup'" : "'login'"; ?>);
            <?php endif; ?>
        });

        particlesJS('particles-js',
        {
            "particles": {
                "number": {
                    "value": 160,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    }
                },
                "opacity": {
                    "value": 0.8,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.1,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": true,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 140,
                        "line_linked": {
                            "opacity": 0.3
                        }
                    }
                }
            },
            "retina_detect": true
        });
    </script>
</body>
</html>
