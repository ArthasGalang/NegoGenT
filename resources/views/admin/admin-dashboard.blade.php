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
            <button id="insert-sample-product">Insert Sample Product</button>
            <button id="insert-sample-buyer">Insert Sample Buyer</button> <!-- Add this button -->
            <button id="insert-sample-seller">Insert Sample Seller</button> <!-- Add this button -->
        </div>

        <h2>Buyers</h2>
        <table border="1" class="admin-table">
            <thead>
                <tr>
                    <th>Buyer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Verified</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buyers as $buyer)
                    <tr>
                        <td>{{ $buyer->Buyer_Id }}</td>
                        <td>{{ $buyer->FirstName }}</td>
                        <td>{{ $buyer->LastName }}</td>
                        <td>{{ $buyer->Email }}</td>
                        <td>{{ $buyer->Verified ? 'Yes' : 'No' }}</td>
                        <td>
                            @if (!$buyer->Verified)
                                <form method="POST" action="{{ route('admin.verify.buyer', $buyer->Buyer_Id) }}">
                                    @csrf
                                    <button type="submit" class="button verify-button">Verify</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Sellers</h2>
        <table border="1" class="admin-table">
            <thead>
                <tr>
                    <th>Seller ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Business Name</th>
                    <th>Verified</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sellers as $seller)
                    <tr>
                        <td>{{ $seller->Seller_Id }}</td>
                        <td>{{ $seller->FirstName }}</td>
                        <td>{{ $seller->LastName }}</td>
                        <td>{{ $seller->Email }}</td>
                        <td>{{ $seller->BusinessName }}</td>
                        <td>{{ $seller->Verified ? 'Yes' : 'No' }}</td>
                        <td>
                            @if (!$seller->Verified)
                                <form method="POST" action="{{ route('admin.verify.seller', $seller->Seller_Id) }}">
                                    @csrf
                                    <button type="submit" class="button verify-button">Verify</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Products</h2>
        <table border="1" class="admin-table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Seller ID</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Verified</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->Product_Id }}</td>
                        <td>{{ $product->Seller_Id }}</td>
                        <td>{{ $product->Category }}</td>
                        <td>{{ $product->Product_Name }}</td>
                        <td>P{{ number_format($product->Price, 2) }}</td>
                        <td>{{ $product->Stock }}</td>
                        <td>{{ $product->Verified ? 'Yes' : 'No' }}</td>
                        <td>
                            @if (!$product->Verified)
                                <form method="POST" action="{{ route('admin.verify.product', $product->Product_Id) }}">
                                    @csrf
                                    <button type="submit" class="button verify-button">Verify</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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

            // Button: Insert Sample Product
            document.getElementById('insert-sample-product').addEventListener('click', function () {
                if (confirm('Are you sure you want to insert a sample product?')) {
                    fetch('{{ url("/admin/dashboard/insert-sample-product") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        alert(data.message); // Show success message
                        location.reload(); // Reload the page to reflect the new product
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to insert sample product. Please check the console for more details.');
                    });
                }
            });

            // Button: Insert Sample Buyer
            document.getElementById('insert-sample-buyer').addEventListener('click', function () {
                if (confirm('Are you sure you want to insert a sample buyer?')) {
                    fetch('{{ url("/admin/dashboard/insert-sample-buyer") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        alert(data.message); // Show success message
                        location.reload(); // Reload the page to reflect the new buyer
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to insert sample buyer. Please check the console for more details.');
                    });
                }
            });

            // Button: Insert Sample Seller
            document.getElementById('insert-sample-seller').addEventListener('click', function () {
                if (confirm('Are you sure you want to insert a sample seller?')) {
                    fetch('{{ url("/admin/dashboard/insert-sample-seller") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        alert(data.message); // Show success message
                        location.reload(); // Reload the page to reflect the new seller
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to insert sample seller. Please check the console for more details.');
                    });
                }
            });
        });
    </script>
</body>
</html>
