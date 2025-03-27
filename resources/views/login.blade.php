<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Negogen.t</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
</head>
<body>
    @include('header')
    <div class="auth-page">
        <div class="auth-container">
            <div class="tab-content active" id="buyer-tab">
                <div class="auth-card">
                    <div class="auth-card-header">
                        <h2>Welcome to NegoGen.T</h2>
                        <p>Your Gateway to Local Treasures in Barangay Gen. T. De Leon</p>
                    </div>
                    <form class="auth-form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="name@example.com" required>
                        </div>
                        <div class="form-group">
                            <div class="password-header">
                                <label for="password">Password</label>
                                <a href="forgot-password" class="forgot-password">Forgot password?</a>
                            </div>
                            <input type="password" id="password" required>
                        </div>
                        <button type="submit" class="button primary full-width">Login</button>
                        <div class="auth-footer">
                            Don't have an account? <a href="register">Register</a>
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
    @include('footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Show corresponding content
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

        document.querySelector('.auth-form').addEventListener('submit', async function(event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            try {
                const response = await fetch('{{ url("/login") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ email, password })
                });

                if (!response.ok) {
                    const errorText = await response.text(); // Read the response as text
                    console.error('Error response:', errorText);
                    alert('An error occurred. Please try again.');
                    return;
                }

                const result = await response.json();

                if (result.status === 'not_verified') {
                    alert('Your account is not verified. Please verify your email.');
                } else if (result.status === 'success') {
                    window.location.href = '{{ url("/shop") }}';
                } else {
                    alert('Invalid email or password.');
                }
            } catch (error) {
                console.error('Error during login:', error);
                alert('An error occurred. Please try again.');
            }
        });
    </script>
</body>
</html>