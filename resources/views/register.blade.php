<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Negogen.t</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
</head>
<body>
    @include('header')
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
                                Already have an account? <a href="{{ route('login') }}">Login</a>
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
                                Already have an account? <a href="{{ route('login') }}">Login</a>
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
    @include('footer')
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