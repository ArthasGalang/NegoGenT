<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container header-container">
            <div class="logo">
                <img src="../images/negogent-logo.png">
            </div>
            
            <nav class="main-nav">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/categories') }}">Categories</a></li>
                    <li><a href="{{ url('/about') }}" class="active">About</a></li>
                </ul>
            </nav>
            
            <div class="header-actions">
                <button class="icon-button" id="search-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                </button>
                <a href="wishlist.html" class="icon-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                    </svg>
                </a>
                <a href="cart.html" class="icon-button cart-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="8" cy="21" r="1"></circle>
                        <circle cx="19" cy="21" r="1"></circle>
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                    </svg>
                    <span class="badge">2</span>
                </a>
                <div class="dropdown">
                    <button class="icon-button" id="account-dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <a href="login.html">Sign In</a>
                        <a href="register.html">Register</a>
                    </div>
                </div>
            </div>
            
            <button class="mobile-menu-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" x2="20" y1="12" y2="12"></line>
                    <line x1="4" x2="20" y1="6" y2="6"></line>
                    <line x1="4" x2="20" y1="18" y2="18"></line>
                </svg>
            </button>
        </div>
        
        <div class="search-bar" id="search-bar">
            <div class="container">
                <div class="search-input">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input type="text" placeholder="Search for products...">
                    <button class="cancel-button">Cancel</button>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="category-header">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index.html">Home</a> &gt; 
                    <a href="categories.html">Categories</a> &gt; 
                    <span id="current-category">Electronics</span>
                </div>
                <h1 id="category-title">Electronics</h1>
                <p id="category-description">Browse a wide selection of electronics, including gadgets, computers, phones, and more.</p>
            </div>
        </div>

        <section class="category-products-section">
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

                <div class="product-grid">
                    <!-- Product 1 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="/placeholder.svg?height=300&width=300" alt="Smartphone X Pro">
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
                            <h3><a href="product-detail.html?id=1">Smartphone X Pro</a></h3>
                            <div class="product-meta">
                                <div class="product-rating">
                                    <span class="stars">★★★★★</span>
                                    <span class="rating-count">(128)</span>
                                </div>
                                <p class="product-seller">by <a href="shop-profile.html?id=1">TechGadgets</a></p>
                            </div>
                            <p class="product-price">P899.99</p>
                            <button class="button primary full-width">Add to Cart</button>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="/placeholder.svg?height=300&width=300" alt="Wireless Earbuds Pro">
                            <div class="product-badge sale">Sale</div>
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
                            <h3><a href="product-detail.html?id=2">Wireless Earbuds Pro</a></h3>
                            <div class="product-meta">
                                <div class="product-rating">
                                    <span class="stars">★★★★☆</span>
                                    <span class="rating-count">(95)</span>
                                </div>
                                <p class="product-seller">by <a href="shop-profile.html?id=2">AudioWorld</a></p>
                            </div>
                            <p class="product-price"><span class="original-price">P199.99</span> P149.99</p>
                            <button class="button primary full-width">Add to Cart</button>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="/placeholder.svg?height=300&width=300" alt="Ultra HD Smart TV">
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
                            <h3><a href="product-detail.html?id=3">Ultra HD Smart TV</a></h3>
                            <div class="product-meta">
                                <div class="product-rating">
                                    <span class="stars">★★★★★</span>
                                    <span class="rating-count">(76)</span>
                                </div>
                                <p class="product-seller">by <a href="shop-profile.html?id=3">HomeElectronics</a></p>
                            </div>
                            <p class="product-price">P1,299.99</p>
                            <button class="button primary full-width">Add to Cart</button>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="/placeholder.svg?height=300&width=300" alt="Gaming Laptop Pro">
                            <div class="product-badge new">New</div>
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
                            <h3><a href="product-detail.html?id=4">Gaming Laptop Pro</a></h3>
                            <div class="product-meta">
                                <div class="product-rating">
                                    <span class="stars">★★★★☆</span>
                                    <span class="rating-count">(42)</span>
                                </div>
                                <p class="product-seller">by <a href="shop-profile.html?id=4">GamerZone</a></p>
                            </div>
                            <p class="product-price">$P,799.99</p>
                            <button class="button primary full-width">Add to Cart</button>
                        </div>
                    </div>

                    <!-- Product 5 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="/placeholder.svg?height=300&width=300" alt="Wireless Charging Pad">
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
                            <h3><a href="product-detail.html?id=5">Wireless Charging Pad</a></h3>
                            <div class="product-meta">
                                <div class="product-rating">
                                    <span class="stars">★★★★☆</span>
                                    <span class="rating-count">(58)</span>
                                </div>
                                <p class="product-seller">by <a href="shop-profile.html?id=1">TechGadgets</a></p>
                            </div>
                            <p class="product-price">P49.99</p>
                            <button class="button primary full-width">Add to Cart</button>
                        </div>
                    </div>

                    <!-- Product 6 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="/placeholder.svg?height=300&width=300" alt="Smart Home Hub">
                            <div class="product-badge sale">Sale</div>
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
                            <h3><a href="product-detail.html?id=6">Smart Home Hub</a></h3>
                            <div class="product-meta">
                                <div class="product-rating">
                                    <span class="stars">★★★★★</span>
                                    <span class="rating-count">(112)</span>
                                </div>
                                <p class="product-seller">by <a href="shop-profile.html?id=5">SmartHome</a></p>
                            </div>
                            <p class="product-price"><span class="original-price">P129.99</span> $99.99</p>
                            <button class="button primary full-width">Add to Cart</button>
                        </div>
                    </div>

                    <!-- Product 7 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="/placeholder.svg?height=300&width=300" alt="Digital Camera Pro">
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
                            <h3><a href="product-detail.html?id=7">Digital Camera Pro</a></h3>
                            <div class="product-meta">
                                <div class="product-rating">
                                    <span class="stars">★★★★☆</span>
                                    <span class="rating-count">(87)</span>
                                </div>
                                <p class="product-seller">by <a href="shop-profile.html?id=6">PhotoGear</a></p>
                            </div>
                            <p class="product-price">P799.99</p>
                            <button class="button primary full-width">Add to Cart</button>
                        </div>
                    </div>

                    <!-- Product 8 -->
                    <div class="product-card">
                        <div class="product-image">
                            <img src="/placeholder.svg?height=300&width=300" alt="Bluetooth Speaker">
                            <div class="product-badge new">New</div>
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
                            <h3><a href="product-detail.html?id=8">Bluetooth Speaker</a></h3>
                            <div class="product-meta">
                                <div class="product-rating">
                                    <span class="stars">★★★★★</span>
                                    <span class="rating-count">(64)</span>
                                </div>
                                <p class="product-seller">by <a href="shop-profile.html?id=2">AudioWorld</a></p>
                            </div>
                            <p class="product-price">P129.99</p>
                            <button class="button primary full-width">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <div class="pagination">
                    <button class="pagination-button prev" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                        Previous
                    </button>
                    <div class="pagination-numbers">
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <span>...</span>
                        <a href="#">8</a>
                    </div>
                    <button class="pagination-button next">
                        Next
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <div class="footer-logo">
                        <img src="../images/negogent-logo.png">
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="categories.html">Categories</a></li>
                        <li><a href="about.html">About Us</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Customer Service</h3>
                    <ul>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="shipping.html">Shipping Policy</a></li>
                        <li><a href="returns.html">Returns & Refunds</a></li>
                        <li><a href="privacy.html">Privacy Policy</a></li>
                        <li><a href="terms.html">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <address>
                        <p>Purok 2</p>
                        <p>Valenzuela, 1442</p>
                        <p>Brgy. Gen. T. De Leon, De Lupio</p>
                        <p>Email: gen.t@email.com</p>
                        <p>Phone: +63 9123456789</p>
                    </address>
                    <div class="social-links">
                        <a href="https://www.facebook.com/profile.php?id=61550950657692" class="social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 NegoGen.. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
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
            
            // Filter toggle
            const filterToggle = document.getElementById('filter-toggle');
            const filterDropdown = document.getElementById('filter-dropdown');
            
            filterToggle.addEventListener('click', function() {
                filterDropdown.classList.toggle('active');
            });
            
            // Close filter dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.filter-container')) {
                    filterDropdown.classList.remove('active');
                }
            });
            
            // Price slider
            const priceSlider = document.getElementById('price-slider');
            const minPrice = document.getElementById('min-price');
            const maxPrice = document.getElementById('max-price');
            
            priceSlider.addEventListener('input', function() {
                maxPrice.value = this.value;
            });
            
            minPrice.addEventListener('input', function() {
                if (parseInt(this.value) > parseInt(maxPrice.value)) {
                    this.value = maxPrice.value;
                }
            });
            
            maxPrice.addEventListener('input', function() {
                priceSlider.value = this.value;
                if (parseInt(this.value) < parseInt(minPrice.value)) {
                    minPrice.value = this.value;
                }
            });
            
            // Clear filters
            const clearFilters = document.getElementById('clear-filters');
            
            clearFilters.addEventListener('click', function() {
                const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                
                priceSlider.value = 500;
                minPrice.value = 0;
                maxPrice.value = 500;
            });
            
            // Get category from URL
            const urlParams = new URLSearchParams(window.location.search);
            const category = urlParams.get('category');
            
            if (category) {
                const categoryTitle = document.getElementById('category-title');
                const categoryDescription = document.getElementById('category-description');
                const currentCategory = document.getElementById('current-category');
                
                // Format category name (e.g., "electronics" -> "Electronics")
                const formattedCategory = category.charAt(0).toUpperCase() + category.slice(1);
                
                categoryTitle.textContent = formattedCategory;
                currentCategory.textContent = formattedCategory;
                
                // Update description based on category
                const descriptions = {
                    'electronics': 'Browse our wide selection of electronics, including gadgets, computers, phones, and more.',
                    'fashion': 'Explore the latest trends in clothing, shoes, accessories, and jewelry.',
                    'home': 'Discover furniture, decor, kitchen appliances, and garden items for your home.',
                    'beauty': 'Find skincare, makeup, personal care products, and wellness items.',
                    'toys': 'Shop for toys, games, puzzles, and educational items for all ages.',
                    'sports': 'Explore sports equipment, outdoor gear, and fitness items for an active lifestyle.',
                    'books': 'Browse books, e-books, music, movies, and more for entertainment and education.',
                    'food': 'Discover groceries, specialty foods, and beverages from around the world.',
                    'automotive': 'Find car parts, accessories, and maintenance items for your vehicle.',
                    'pets': 'Shop for pet food, toys, accessories, and care items for your furry friends.',
                    'crafts': 'Explore art supplies, crafting materials, and DIY kits for creative projects.',
                    'office': 'Find stationery, office furniture, and business supplies for your workspace.'
                };
                
                if (descriptions[category]) {
                    categoryDescription.textContent = descriptions[category];
                }
            }
        });
    </script>
</body>
</html>