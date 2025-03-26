<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negogen.t - E-Marketplace</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
</head>
<body>
    @include('header')
    <main>
        <div class="shop-header">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index">Home</a> &gt; 
                    <a href="categories">Shops</a>
                </div>
                <h1>Browse Shops</h1>
                <p>Discover trusted sellers and unique products</p>
            </div>
        </div>

        <section class="shop-filters">
            <div class="container">
                <div class="filters-container">
                    <div class="search-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                        <input type="text" placeholder="Search shops..." class="search-input">
                    </div>
                    
                    <div class="filter-controls">
                        <select class="filter-select">
                            <option value="all">All Categories</option>
                            <option value="electronics">Electronics</option>
                            <option value="fashion">Fashion</option>
                            <option value="home">Home & Garden</option>
                            <option value="beauty">Beauty & Health</option>
                            <option value="toys">Toys & Games</option>
                            <option value="toys">Foods</option>
                        </select>
                        
                        <select class="filter-select">
                            <option value="all">All Locations</option>
                            <option value="asterville">Asterville Subdivision Road</option>
                            <option value="atlis">Atis Street</option>
                            <option value="demitillo">B. Demitillo Street</option>
                            <option value="bantigue">Bantigue Street</option>
                            <option value="bcl">BCL Homes Street</option>
                            <option value="berlin">Berlin Street</option>
                            <option value="durian">Durian Street</option>
                            <option value="fredel">Fredel Compound III</option>
                            <option value="hermogena">Hermogena Street</option>
                            <option value="demitillo">I. Demitillo Street</option>
                            <option value="ilang-ilang">Ilang-Ilang Street</option>
                            <option value="independence">Independence Street</option>
                            <option value="bernardino">L. Bernardino Street</option>
                            <option value="bernardino">L. Bernardino Street Extension</option>
                            <option value="macopa">Macopa Street</option>
                            <option value="mercado">Mercado Street</option>
                            <option value="quintin">Quintin Demetillo Street</option>
                            <option value="rafael">Rafael Alba Street</option>
                            <option value="rosario">Rosario Street</option>
                            <option value="sampaloc">Sampaloc Street</option>
                            <option value="san-gregorio">San Gregorio Street</option>
                            <option value="star">Star Apple Street</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('footer')
    <script>
        // Basic JavaScript for interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Search bar toggle
            const searchButton = document.getElementById('search-button');
            const searchBar = document.getElementById('search-bar');
            const cancelButton = document.querySelector('.cancel-button');
            
            searchButton.addEventListener('click', function() {
                searchBar.classList.toggle('active');
                searchBar.querySelector('input').focus();
            });
            
            cancelButton.addEventListener('click', function() {
                searchBar.classList.remove('active');
            });
            
            // Mobile menu toggle
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mainNav = document.querySelector('.main-nav');
            
            mobileMenuButton.addEventListener('click', function() {
                mainNav.classList.toggle('active');
            });
            
            // Account dropdown
            const accountDropdown = document.getElementById('account-dropdown');
            const dropdownMenu = document.querySelector('.dropdown-menu');
            
            accountDropdown.addEventListener('click', function() {
                dropdownMenu.classList.toggle('active');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.dropdown')) {
                    dropdownMenu.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>