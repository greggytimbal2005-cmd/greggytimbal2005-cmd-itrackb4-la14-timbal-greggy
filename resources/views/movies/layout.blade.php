<!DOCTYPE html>
<html lang="en">
        @include('partials.nav')
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body {
                    background-color: #f8f9fa;
                }
                
                .navbar {
                    box-shadow: 0 2px 4px rgba(62, 35, 35, 0.1);
                }

                .container {
                    background-color: rgb(13, 232, 24);
                    border-radius: 8px;
                    padding: 30px;
                    box-shadow: 0 1px 3px rgba(117, 124, 24, 0.1);
                }
            </style>
        </head>
        <body>
            <nav class="navbar">
                
            </nav>

            <main class="py-4">
                @yield('content')
            </main>

            <footer class="text-center py-4 text-muted">
                <p>&copy; 2026 Movie Database. All rights reserved.</p>
            </footer>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>
</html>