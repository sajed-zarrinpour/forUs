<div>
    <h1>Custom Page</h1>
    <p>This is your custom page content. Only authenticated users can view this.</p>

    <!-- Button to open the main application -->
    <button onclick="openMainWindow()">Open Main Application</button>

    <script>
        function openMainWindow() {
            fetch('/open-main-window', { method: 'POST' });
        }
    </script>
</div>
