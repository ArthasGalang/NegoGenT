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
        <div class="page-header">
            <div class="container">
                <h1>Product Categories</h1>
                <p>Browse products by category to find exactly what you're looking for</p>
            </div>
        </div>
        <section class="categories-section">
            <div class="container">
                <div class="categories-grid">
                    <a href="{{ url('/products?category=electronics') }}" class="category-card">
                        <div class="category-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                <rect x="9" y="9" width="6" height="6"></rect>
                                <line x1="9" y1="1" x2="9" y2="4"></line>
                                <line x1="15" y1="1" x2="15" y2="4"></line>
                                <line x1="9" y1="20" x2="9" y2="23"></line>
                                <line x1="15" y1="20" x2="15" y2="23"></line>
                                <line x1="20" y1="9" x2="23" y2="9"></line>
                                <line x1="20" y1="14" x2="23" y2="14"></line>
                                <line x1="1" y1="9" x2="4" y1="9"></line>
                                <line x1="1" y1="14" x2="4" y2="14"></line>
                            </svg>
                        </div>
                        <h3>Electronics</h3>
                        <p>Gadgets, computers, phones, and more</p>
                        <span class="category-count">{{ DB::table('tbl_products')->where('category', 'electronics')->count() }} products</span>
                    </a>
                    
                    <a href="{{ url('/products?category=fashion') }}" class="category-card">
                        <div class="category-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"></path>
                            </svg>
                        </div>
                        <h3>Fashion</h3>
                        <p>Clothing, shoes, accessories, and jewelry</p>
                        <span class="category-count">{{ DB::table('tbl_products')->where('category', 'fashion')->count() }} products</span>
                    </a>
                    
                    <a href="{{ url('/products?category=home') }}" class="category-card">
                        <div class="category-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                        <h3>Home & Garden</h3>
                        <p>Furniture, decor, kitchen, and garden items</p>
                        <span class="category-count">{{ DB::table('tbl_products')->where('category', 'home')->count() }} products</span>
                    </a>
                    
                    <a href="{{ url('/products?category=beauty') }}" class="category-card">
                        <div class="category-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </div>
                        <h3>Beauty & Health</h3>
                        <p>Skincare, makeup, personal care, and wellness</p>
                        <span class="category-count">{{ DB::table('tbl_products')->where('category', 'beauty')->count() }} products</span>
                    </a>
                    
                    <a href="{{ url('/products?category=toys') }}" class="category-card">
                        <div class="category-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                                <polyline points="17 2 12 7 7 2"></polyline>
                            </svg>
                        </div>
                        <h3>Toys & Games</h3>
                        <p>Toys, games, puzzles, and educational items</p>
                        <span class="category-count">{{ DB::table('tbl_products')->where('category', 'toys')->count() }} products</span>
                    </a>
                    
                    <a href="{{ url('/products?category=sports') }}" class="category-card">
                        <div class="category-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                <path d="M2 12h20"></path>
                            </svg>
                        </div>
                        <h3>Sports & Outdoors</h3>
                        <p>Sports equipment, outdoor gear, and fitness items</p>
                        <span class="category-count">{{ DB::table('tbl_products')->where('category', 'sports')->count() }} products</span>
                    </a>
                    
                    <a href="{{ url('/products?category=books') }}" class="category-card">
                        <div class="category-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                        </div>
                        <h3>Books & Media</h3>
                        <p>Books, e-books, music, movies, and more</p>
                        <span class="category-count">{{ DB::table('tbl_products')->where('category', 'books')->count() }} products</span>
                    </a>
                    
                    <a href="{{ url('/products?category=food') }}" class="category-card">
                        <div class="category-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                <line x1="6" y1="1" x2="6" y2="4"></line>
                                <line x1="10" y1="1" x2="10" y2="4"></line>
                                <line x1="14" y1="1" x2="14" y2="4"></line>
                            </svg>
                        </div>
                        <h3>Food & Beverages</h3>
                        <p>Groceries, specialty foods, and beverages</p>
                        <span class="category-count">{{ DB::table('tbl_products')->where('category', 'food')->count() }} products</span>
                    </a>
                    
                    <a href="{{ url('/products?category=automotive') }}" class="category-card">
                        <div class="category-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="1" y="6" width="22" height="12" rx="2" ry="2"></rect>
                                <path d="M4 12h16"></path>
                                <path d="M7 12v3"></path>
                                <path d="M17 12v3"></path>
                                <path d="M5 18h14"></path>
                            </svg>
                        </div>
                        <h3>Automotive</h3>
                        <p>Car parts, accessories, and maintenance items</p>
                        <span class="category-count">{{ DB::table('tbl_products')->where('category', 'automotive')->count() }} products</span>
                    </a>
                    
                    <a href="{{ url('/products?category=pets') }}" class="category-card">
                        <div class="category-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="8" cy="8" r="1"></circle>
                                <circle cx="16" cy="8" r="1"></circle>
                                <path d="M9 15a3 3 0 0 0 6 0"></path>
                            </svg>
                        </div>
                        <h3>Pet Supplies</h3>
                        <p>Food, toys, accessories, and care items for pets</p>
                        <span class="category-count">{{ DB::table('tbl_products')->where('category', 'pets')->count() }} products</span>
                    </a>
                    
                    <a href="{{ url('/products?category=crafts') }}" class="category-card">
                        <div class="category-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                            </svg>
                        </div>
                        <h3>Arts & Crafts</h3>
                        <p>Art supplies, crafting materials, and DIY kits</p>
                        <span class="category-count">{{ DB::table('tbl_products')->where('category', 'crafts')->count() }} products</span>
                    </a>
                    
                    <a href="{{ url('/products?category=office') }}" class="category-card">
                        <div class="category-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                        </div>
                        <h3>Office Supplies</h3>
                        <p>Stationery, office furniture, and business supplies</p>
                        <span class="category-count">{{ DB::table('tbl_products')->where('category', 'office')->count() }} products</span>
                    </a>
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