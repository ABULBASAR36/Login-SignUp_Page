<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #0a192f, #112240, #1a365d);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .content {
            position: relative;
            z-index: 1;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #64ffda;
        }

        .welcome-text {
            font-size: 4rem;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            animation: fadeInUp 1s ease-out;
            font-weight: bold;
        }

        .sub-text {
            font-size: 1.8rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
            animation: fadeInUp 1s ease-out 0.5s;
            opacity: 0;
            animation-fill-mode: forwards;
            color: #8892b0;
        }

        .code-text {
            font-family: 'Courier New', monospace;
            color: #8892b0;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.7s;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .auth-buttons {
            animation: fadeInUp 1s ease-out 1s;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .auth-buttons .btn {
            margin: 0 10px;
            padding: 12px 35px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            border-radius: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .auth-buttons .btn-light {
            background: #64ffda;
            color: #0a192f;
            border: none;
        }

        .auth-buttons .btn-outline-light {
            border-color: #64ffda;
            color: #64ffda;
        }

        .auth-buttons .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(100, 255, 218, 0.3);
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

        .typing-effect::after {
            content: '|';
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
    </style>
</head>
<body>
    <!-- Particles.js Container -->
    <div id="particles-js"></div>

    <!-- Content -->
    <div class="content">
        <h1 class="welcome-text">Welcome to My Website</h1>
        <p class="code-text">&lt;code&gt; Your Journey Starts Here &lt;/code&gt;</p>
        <p class="sub-text typing-effect">Explore the world of coding with us</p>
        <div class="auth-buttons">
            <a href="login.php" class="btn btn-light">Login</a>
            <a href="login.php?form=signup" class="btn btn-outline-light">Sign Up</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js',
        {
            "particles": {
                "number": {
                    "value": 100,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#64ffda"
                },
                "shape": {
                    "type": ["circle", "triangle", "edge"],
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": true
                },
                "size": {
                    "value": 3,
                    "random": true
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#64ffda",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 4,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false
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
                            "opacity": 1
                        }
                    }
                }
            },
            "retina_detect": true
        });
    </script>
</body>
</html> 