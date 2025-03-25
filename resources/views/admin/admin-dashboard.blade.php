<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="admin-dashboard">
        <h1>Admin Dashboard</h1>
        <div class="actions">
            <button id="delete-database">Delete Database</button>
            <button id="remove-tables">Remove All Tables</button>
            <button id="clear-tables">Clear All Table Entries</button>
            <button id="insert-sample-buyers">Insert Sample Buyers</button> <!-- New Button -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const csrfToken = '{{ csrf_token() }}';

            // Button 1: Delete Database
            document.getElementById('delete-database').addEventListener('click', function () {
                if (confirm('Are you sure you want to delete the database?')) {
                    fetch('{{ url("/admin/dashboard/delete-database") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => alert(data.message))
                    .catch(error => console.error('Error:', error));
                }
            });

            // Button 2: Remove All Tables
            document.getElementById('remove-tables').addEventListener('click', function () {
                if (confirm('Are you sure you want to remove all tables?')) {
                    fetch('{{ url("/admin/dashboard/remove-tables") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => alert(data.message))
                    .catch(error => console.error('Error:', error));
                }
            });

            // Button 3: Clear All Table Entries
            document.getElementById('clear-tables').addEventListener('click', function () {
                if (confirm('Are you sure you want to clear all table entries?')) {
                    fetch('{{ url("/admin/dashboard/clear-tables") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => alert(data.message))
                    .catch(error => console.error('Error:', error));
                }
            });

            // Button 4: Insert Sample Buyers
            document.getElementById('insert-sample-buyers').addEventListener('click', function () {
                if (confirm('Are you sure you want to insert sample buyers?')) {
                    fetch('{{ url("/admin/dashboard/insert-sample-buyers") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => alert(data.message))
                    .catch(error => console.error('Error:', error));
                }
            });
        });
    </script>
</body>
</html>
