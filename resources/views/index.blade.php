<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negogen.t - E-Marketplace</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    @include('header')
    <main>
        <section class="hero">
            <div class="container">
                <h1>Experience Community Commerce at its Finest</h1>
                <p>Your Gateway to Local Treasures in Barangay Gen. T. De Leon</p>
                <div class="hero-buttons">
                    <a href="{{ url('/register#buyer') }}" class="button primary">Shop Now</a>
                    <a href="{{ url('/register#seller') }}" class="button secondary">Sell Now</a>
                </div>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <h2>How It Works</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                            </svg>
                        </div>
                        <h3>Shop Products</h3>
                        <p>Browse thousands of products from various sellers and find exactly what you need.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h3>Sell Your Items</h3>
                        <p>Create your seller account, list your products, and start selling to customers worldwide.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                                <path d="M3 9h18"></path>
                                <path d="M9 21V9"></path>
                                <path d="m14 15-2 2 2 2"></path>
                                <path d="m10 15 2 2-2 2"></path>
                            </svg>
                        </div>
                        <h3>Manage Your Business</h3>
                        <p>Track orders, manage inventory, and grow your business with our powerful tools.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="featured-benefits">
            <div class="container">
                <h2>Why <span>NEGOGEN.T</span>?</h2>
                <div class="benefits">
                    <i class="icon">✔️</i>
                        <h3>No Hassle</h3>
                    <p>User-friendly platform for a seamless shopping experience.</p>
                </div>
                <div class="benefits">
                    <i class="icon">🛡️</i>
                        <h3>Secure Payment</h3>
                    <p>Enjoy safe and reliable transactions with our trusted payment system.</p>
                </div>
                <div class="benefits">
                    <i class="icon">🚚</i>
                        <h3>Reliable Delivery</h3>
                    <p>Fast and efficient delivery straight to your doorstep.</p>
                </div>
                <div class="benefits">
                    <i class="icon">🤝</i>
                        <h3>Support Local</h3>
                    <p>Empower local entrepreneurs and discover unique products from Barangay Gen. T. De Leon.</p>
                </div>
                <div class="benefits">
                    <i class="icon">🚨</i>
                        <h3>Report Center</h3>
                    <p>Easily report suspicious activities and keep our marketplace safe.</p>
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