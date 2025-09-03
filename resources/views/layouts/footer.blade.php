<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'SYS Express') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        footer {
            background: #212529;
            color: #bbb;
            padding: 40px 0;
            margin-top: 50px;
        }
        footer a {
            color: #28a745;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

 <!-- Footer -->
    <footer>
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>CustomerApp</h5>
                    <p>Better service for a better life.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/products') }}">Products</a></li>
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Contact</h5>
                    <p>Email: sys@express.org</p>
                    <p>Phone: +8801786601210</p>
                </div>
            </div>
            <hr class="bg-secondary">
            <p class="mb-0">&copy; {{ date('Y') }} SYS Express. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
