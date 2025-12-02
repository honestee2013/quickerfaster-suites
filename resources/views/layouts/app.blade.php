<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'Dashboard')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4e73df;
            --success-color: #1cc88a;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
        }

        body {
            padding-top: 20px;
            background-color: #f8f9fc;
        }

        .navbar-custom {
            background-color: var(--primary-color);
        }

        .test-card {
            border-left: 4px solid var(--primary-color);
        }

        /* Livewire loading indicator */
        [wire\:loading] {
            opacity: 0.5;
            pointer-events: none;
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
        <div class="container">
            <a class="navbar-brand" href="/progressive">
                <i class="bi bi-lightning-charge-fill me-2"></i>
                Progressive SaaS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/progressive/phase1-test">
                            <i class="bi bi-1-circle me-1"></i>
                            Phase 1
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/progressive/phase2-test">
                            <i class="bi bi-2-circle me-1"></i>
                            Phase 2
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/progressive/phase3-test">
                            <i class="bi bi-3-circle me-1"></i>
                            Phase 3
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-5 py-4 text-center text-muted">
        <div class="container">
            <p>Progressive Deployment Test • Phase 3: Livewire Components</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>









<!-- In resources/views/layouts/app.blade.php, before @livewireScripts -->
<script>
    // Fix Livewire endpoint for subdirectory
    if (typeof Livewire !== 'undefined') {
        // Override Livewire's default endpoint
        Livewire.config.appUrl = 'https://quickerfaster.com/progressive';

        // Or set it dynamically
        Livewire.hook('request', ({uri, options}) => {
            // Ensure requests go to /progressive subdirectory
            if (uri.startsWith('livewire/')) {
                options.baseURL = '/progressive';
            }
        });

        console.log('Livewire configured for subdirectory:', Livewire.config.appUrl);
    }
</script>


    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Phase 3: Livewire loaded successfully');

            // Listen for Livewire events
            Livewire.on('component-mounted', (component) => {
                console.log('Livewire component mounted:', component.id);
            });

            Livewire.on('component-updated', (component) => {
                console.log('Livewire component updated:', component.id);
            });
        });

        // Debug function to check Livewire status
        window.checkLivewire = function() {
            if (typeof Livewire === 'undefined') {
                console.error('Livewire is not loaded!');
                return false;
            }
            console.log('Livewire version:', Livewire.version);
            console.log('Alpine version:', Alpine?.version);
            return true;
        };
    </script>

    @stack('scripts')
</body>
</html>
