<!DOCTYPE html>
<html>
<head>
    <title>Phase 1 Test - Basic Laravel</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Phase 1: Basic Laravel Test</h1>

    <div class="test-result">
        <h2>Tests:</h2>
        <p>1. Laravel Loaded: <span class="success">✓</span></p>
        <p>2. PHP Version: {{ PHP_VERSION }}</p>
        <p>3. Environment: {{ app()->environment() }}</p>
        <p>4. Debug Mode: {{ config('app.debug') ? 'ON' : 'OFF' }}</p>
    </div>

    <h3>Next Steps:</h3>
    <ol>
        <li>Check browser console for errors</li>
        <li>Verify this page loads without issues</li>
        <li>Test API endpoint: <a href="/test-phase1">/test-phase1</a></li>
    </ol>
</body>
</html>
