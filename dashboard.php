<?php include 'db.php'; ?>
<?php 
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Check if user just registered
$justRegistered = isset($_SESSION['just_registered']) && $_SESSION['just_registered'] === true;
// Clear the flag after using it
unset($_SESSION['just_registered']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .welcome-container {
            color: #64ffda;
            animation: fadeInUp 1s ease-out;
            background: rgba(255, 255, 255, 0.05);
            padding: 40px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }
        .btn-danger {
            background: #ff6b6b;
            border: none;
            padding: 10px 30px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn-danger:hover {
            background: #ff5252;
            box-shadow: 0 0 15px rgba(255, 107, 107, 0.4);
            transform: translateY(-2px);
        }
        h2 {
            font-size: 3.5rem;
            margin-bottom: 2rem;
            text-shadow: 0 0 10px rgba(100, 255, 218, 0.3);
        }
        .welcome-message {
            color: #8892b0;
            font-size: 1.5rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.3s;
            opacity: 0;
            animation-fill-mode: forwards;
            line-height: 1.6;
        }
        .highlight {
            color: #64ffda;
            font-weight: bold;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .emoji {
            font-size: 2rem;
            margin: 0 5px;
            animation: bounce 1s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body>
    <div id="particles-js"></div>
    <div class="content">
        <div class="welcome-container">
            <?php if($justRegistered): ?>
                <span class="emoji">🎉</span>
                <h2>Welcome aboard, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
                <p class="welcome-message">
                    Thank you for joining us! <br>
                    Your journey into the world of coding begins here. <br>
                    <span class="highlight">Let's create something amazing together!</span>
                </p>
            <?php else: ?>
                <h2>Welcome back, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
                <p class="welcome-message">Great to see you again!</p>
            <?php endif; ?>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
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
