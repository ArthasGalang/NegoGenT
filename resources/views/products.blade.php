<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - {{ request('category') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .product-card {
            max-width: 60%; /* Increase the width of each product card */
            width:255px;
            margin: 15px; /* Add spacing between cards */
            border: 1px solid #ddd; /* Optional: Add a border for better visibility */
            border-radius: 8px; /* Optional: Add rounded corners */
            overflow: hidden; /* Ensure content doesn't overflow */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle shadow */
        }
        .products-grid {
            display: flex;
            flex-wrap: wrap; /* Allow wrapping of product cards */
            justify-content: center; /* Center the product cards */
            gap: 25px; /* Add spacing between cards */
        }
        .product-image img {
            width: 100%; /* Ensure the image fits the card width */
            height: auto; /* Maintain aspect ratio */
        }
        .product-details {
            padding: 15px; /* Add padding inside the card */
            text-align: left; /* Align product details to the left */
        }
        .product-details .button {
            text-align: center; /* Center the Add to Cart button */
            display: block;
            margin: 10px auto 0; /* Add spacing and center the button */
        }
        .filter-sort-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .filter-container, .sort-container {
            display: flex;
            align-items: center;
        }
        .filter-button, .sort-container select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
            cursor: pointer;
        }
        .filter-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 300px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            z-index: 10;
        }
        .filter-dropdown.active {
            display: block;
        }
        .filter-section {
            margin-bottom: 1.5rem;
        }
        .filter-section h3 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }
        .price-range {
            margin-top: 0.5rem;
        }
        .price-slider {
            width: 100%;
            margin-bottom: 1rem;
        }
        .price-inputs {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
        }
        .price-input {
            flex: 1;
        }
        .price-input label {
            display: block;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }
        .price-input input {
            width: 100%;
            padding: 0.5rem;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 0.875rem;
        }
        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .filter-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
        }
        .filter-actions {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            margin-top: 1.5rem;
        }
    </style>
</head>
<body>
    @include('header')
    
    <main>
        <div class="category-header">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a> &gt; 
                    <a href="{{ url('/categories') }}">Categories</a> &gt; 
                    <span id="current-category">{{ ucfirst(request('category')) }}</span>
                </div>
                <h1 id="category-title">{{ ucfirst(request('category')) }}</h1>
                <p id="category-description">
                    @php
                        $descriptions = [
                            'electronics' => 'Browse our wide selection of electronics, including gadgets, computers, phones, and more.',
                            'fashion' => 'Explore the latest trends in clothing, shoes, accessories, and jewelry.',
                            'home' => 'Discover furniture, decor, kitchen appliances, and garden items for your home.',
                            'beauty' => 'Find skincare, makeup, personal care products, and wellness items.',
                            'toys' => 'Shop for toys, games, puzzles, and educational items for all ages.',
                            'sports' => 'Explore sports equipment, outdoor gear, and fitness items for an active lifestyle.',
                            'books' => 'Browse books, e-books, music, movies, and more for entertainment and education.',
                            'food' => 'Discover groceries, specialty foods, and beverages from around the world.',
                            'automotive' => 'Find car parts, accessories, and maintenance items for your vehicle.',
                            'pets' => 'Shop for pet food, toys, accessories, and care items for your furry friends.',
                            'crafts' => 'Explore art supplies, crafting materials, and DIY kits for creative projects.',
                            'office' => 'Find stationery, office furniture, and business supplies for your workspace.'
                        ];
                        echo $descriptions[request('category')] ?? 'Explore products in this category.';
                    @endphp
                </p>
            </div>
        </div>

        <section class="products-section">
            <div class="container">
                <div class="filter-sort-container">
                    <div class="filter-container">
                        <button class="filter-button" id="filter-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="4" y1="21" x2="4" y2="14"></line>
                                <line x1="4" y1="10" x2="4" y2="3"></line>
                                <line x1="12" y1="21" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12" y2="3"></line>
                                <line x1="20" y1="21" x2="20" y2="16"></line>
                                <line x1="20" y1="12" x2="20" y2="3"></line>
                                <line x1="1" y1="14" x2="7" y2="14"></line>
                                <line x1="9" y1="8" x2="15" y2="8"></line>
                                <line x1="17" y1="16" x2="23" y2="16"></line>
                            </svg>
                            Filter
                        </button>
                        <div class="filter-dropdown" id="filter-dropdown">
                            <div class="filter-section">
                                <h3>Price Range</h3>
                                <div class="price-range">
                                    <input type="range" min="0" max="1000" value="500" class="price-slider" id="price-slider">
                                    <div class="price-inputs">
                                        <div class="price-input">
                                            <label for="min-price">Min</label>
                                            <input type="number" id="min-price" value="0" min="0">
                                        </div>
                                        <div class="price-input">
                                            <label for="max-price">Max</label>
                                            <input type="number" id="max-price" value="500" min="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-section">
                                <h3>Brand</h3>
                                <div class="filter-options">
                                    <label class="filter-option">
                                        <input type="checkbox" name="brand" value="apple"> Apple
                                    </label>
                                    <label class="filter-option">
                                        <input type="checkbox" name="brand" value="samsung"> Samsung
                                    </label>
                                    <label class="filter-option">
                                        <input type="checkbox" name="brand" value="sony"> Sony
                                    </label>
                                    <label class="filter-option">
                                        <input type="checkbox" name="brand" value="lg"> LG
                                    </label>
                                    <label class="filter-option">
                                        <input type="checkbox" name="brand" value="dell"> Dell
                                    </label>
                                </div>
                            </div>
                            <div class="filter-section">
                                <h3>Rating</h3>
                                <div class="filter-options">
                                    <label class="filter-option">
                                        <input type="checkbox" name="rating" value="5"> 5 Stars
                                    </label>
                                    <label class="filter-option">
                                        <input type="checkbox" name="rating" value="4"> 4 Stars & Up
                                    </label>
                                    <label class="filter-option">
                                        <input type="checkbox" name="rating" value="3"> 3 Stars & Up
                                    </label>
                                    <label class="filter-option">
                                        <input type="checkbox" name="rating" value="2"> 2 Stars & Up
                                    </label>
                                </div>
                            </div>
                            <div class="filter-actions">
                                <button class="button secondary" id="clear-filters">Clear All</button>
                                <button class="button primary" id="apply-filters">Apply Filters</button>
                            </div>
                        </div>
                    </div>
                    <div class="sort-container">
                        <label for="sort-select">Sort by:</label>
                        <select id="sort-select">
                            <option value="relevance">Relevance</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                            <option value="rating">Customer Rating</option>
                            <option value="newest">Newest Arrivals</option>
                        </select>
                    </div>
                </div>

                <div class="products-grid">
                    @php
                        $products = DB::table('tbl_products')->where('category', request('category'))->get();
                    @endphp

                    @forelse ($products as $product)
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ $product->Product_Image ? asset('storage/' . $product->Product_Image) : asset('images/default-product.png') }}" alt="{{ $product->Product_Name }}">
                                <div class="product-actions">
                                    <button class="icon-button wishlist-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                                        </svg>
                                    </button>
                                    <button class="icon-button quick-view-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="product-details">
                                <h3><a href="product-detail.html?id={{ $product->Product_Id }}">{{ $product->Product_Name }}</a></h3>
                                <p class="product-seller">by <a href="shop-profile.html?id={{ $product->Seller_Id }}">Seller</a></p>
                                <p class="product-price">P{{ number_format($product->Price, 2) }}</p>
                                <button class="button primary full-width">Add to Cart</button>
                            </div>
                        </div>
                    @empty
                        <p>No products found in this category.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
    @include('footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterToggle = document.getElementById('filter-toggle');
            const filterDropdown = document.getElementById('filter-dropdown');

            // Ensure the elements exist before adding event listeners
            if (filterToggle && filterDropdown) {
                // Toggle the filter dropdown
                filterToggle.addEventListener('click', function (event) {
                    event.stopPropagation(); // Prevent click from propagating to the document
                    filterDropdown.classList.toggle('active');
                });

                // Close the dropdown when clicking outside
                document.addEventListener('click', function (event) {
                    if (!event.target.closest('.filter-container')) {
                        filterDropdown.classList.remove('active');
                    }
                });
            } else {
                console.error('Filter toggle or dropdown element not found.');
            }
        });
    </script>
</body>
</html>
