<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Negogen.t</title>
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
                    <li><a href="{{ url('/about') }}">About</a></li>
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

    <div class="auth-page">
        <div class="auth-container">
            <div class="auth-logo">
                <h3>Register to NegoGen.T</h3>
            </div>
            <div class="auth-tabs">
                <div class="tab-list">
                    <button class="tab-button active" data-tab="buyer">Buyer</button>
                    <button class="tab-button" data-tab="seller">Seller</button>
                </div>

                <div class="tab-content active" id="buyer-tab">
                    <div class="auth-card">
                        <div class="auth-card-header">
                            <h2>Buyer Registration</h2>
                            <p>Create a your account to start shopping</p>
                        </div>
                        <form class="auth-form" method="POST" action="{{ route('buyer.register') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="buyer-firstName">First Name</label>
                                    <input type="text" id="buyer-firstName" name="FirstName" required>
                                </div>
                                <div class="form-group">
                                    <label for="buyer-lastName">Last Name</label>
                                    <input type="text" id="buyer-lastName" name="LastName" required>
                                </div>
                                <div class="form-group">
                                    <label for="buyer-age">Age</label>
                                    <input type="text" id="buyer-age" name="Age" required>
                                </div>
                                <div class="form-group">
                                    <label for="buyer-mobileNum">Mobile Number</label>
                                    <input type="text" id="buyer-mobileNum" name="ContactNo" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="buyer-email">Email</label>
                                <input type="email" id="buyer-email" name="Email" placeholder="name@example.com" required>
                                @error('Email')
                                    <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="buyer-password">Password</label>
                                <input type="password" id="buyer-password" name="Password" required>
                                @error('Password')
                                    <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="buyer-confirmPassword">Confirm Password</label>
                                <input type="password" id="buyer-confirmPassword" name="Password_confirmation" required>
                                @error('Password_confirmation')
                                    <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="buyer-barangay">Barangay</label>
                                    <input type="text" id="buyer-barangay" name="Barangay" required>
                                </div>
                                <div class="form-group">
                                    <label for="buyer-municipality">Municipality</label>
                                    <input type="text" id="buyer-municipality" name="Municipality" required>
                                </div>
                                <div class="form-group">
                                    <label for="buyer-street">Street</label>
                                    <input type="text" id="buyer-street" name="Street" required>
                                </div>
                                <div class="form-group">
                                    <label for="buyer-zip">ZIP Code</label>
                                    <input type="text" id="buyer-zip" name="ZIP" required>
                                    @error('ZIP')
                                        <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="button primary full-width">Create Account</button>
                            <div class="auth-footer">
                                Already have an account? <a href="login.html">Login</a>
                            </div>

                            <div class="line"></div>

                            <div class="auth-footer-footer">
                                By creating an account and logging in, you agree to NegoGen.T <span>Terms of Use</span> and <span>Privacy Policy</span>.
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-content" id="seller-tab">
                    <div class="auth-card">
                        <div class="auth-card-header">
                            <h2>Seller Registration</h2>
                            <p>Create your account to start selling</p>
                        </div>
                        <form class="auth-form" method="POST" action="{{ route('seller.register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="seller-firstName">First Name</label>
                                    <input type="text" id="seller-firstName" name="FirstName" required>
                                    @error('FirstName')
                                        <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="seller-lastName">Last Name</label>
                                    <input type="text" id="seller-lastName" name="LastName" required>
                                    @error('LastName')
                                        <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="seller-email">Email</label>
                                <input type="email" id="seller-email" name="Email" required>
                                @error('Email')
                                    <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="seller-password">Password</label>
                                <input type="password" id="seller-password" name="Password" required>
                                @error('Password')
                                    <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="seller-confirmPassword">Confirm Password</label>
                                <input type="password" id="seller-confirmPassword" name="Password_confirmation" required>
                                @error('Password_confirmation')
                                    <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="seller-contactNo">Mobile Number</label>
                                <input type="text" id="seller-contactNo" name="ContactNo" required>
                                @error('ContactNo')
                                    <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="seller-barangay">Barangay</label>
                                    <input type="text" id="seller-barangay" name="Barangay" required>
                                    @error('Barangay')
                                        <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="seller-municipality">Municipality</label>
                                    <input type="text" id="seller-municipality" name="Municipality" required>
                                    @error('Municipality')
                                        <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="seller-street">Street</label>
                                    <input type="text" id="seller-street" name="Street" required>
                                    @error('Street')
                                        <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="seller-zip">ZIP Code</label>
                                    <input type="text" id="seller-zip" name="ZIP" required>
                                    @error('ZIP')
                                        <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="seller-businessName">Business Name</label>
                                <input type="text" id="seller-businessName" name="BusinessName" required>
                                @error('BusinessName')
                                    <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="seller-businessPermit">Business Permit (PNG or JPG, max 25MB)</label>
                                <input type="file" id="seller-businessPermit" name="BusinessPermit" accept=".png,.jpg" required>
                                @error('BusinessPermit')
                                    <span class="error-text" style="color: red; font-size: 0.7em;">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="button primary full-width">Create Account</button>
                            <div class="auth-footer">
                                Already have an account? <a href="login.html">Login</a>
                            </div>

                            <div class="line"></div>

                            <div class="auth-footer-footer">
                                By creating an account and logging in, you agree to NegoGen.T <span>Terms of Use</span> and <span>Privacy Policy</span>.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');
            
        
            const hash = window.location.hash.substring(1); 
            if (hash) {
                
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                
                const tabButton = document.querySelector(`.tab-button[data-tab="${hash}"]`);
                if (tabButton) {
                    tabButton.classList.add('active');
                    document.getElementById(`${hash}-tab`).classList.add('active');
                }
            }
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    this.classList.add('active');
                    
                    const tabId = this.getAttribute('data-tab');
                    document.getElementById(`${tabId}-tab`).classList.add('active');
                });
            });

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