<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negogen.t - E-Marketplace</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <style>
        .about-intro {
            display: flex;
            flex-direction: row; /* Two columns */
            gap: 2rem;
            align-items: center;
        }
        .about-intro-content {
            flex: 1; /* Left column */
        }
        .about-intro-image {
            flex: 1; /* Right column */
        }
        .mission-values {
            display: flex;
            flex-direction: row; /* Side-by-side layout */
            gap: 2rem;
        }
        .mission-card {
            flex: 1; /* Equal width for both cards */
        }
        .values-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columns */
            gap: 1.5rem;
        }
    </style>
</head>
<body>
    @include('header')

    <main>
        <div class="page-header about-page-header">
            <div class="container">
                <div class="breadcrumbs">
                    <span>About Us</span>
                </div>
                <h1>About NegoGen.T</h1>
                <p>Connecting buyers and sellers in a community marketplace</p>
            </div>
        </div>

        <section class="about-intro-section">
            <div class="container">
                <div class="about-intro">
                    <div class="about-intro-content">
                        <h2>Our Story</h2>
                        <p>Founded in 2025, NegoGen.T began with a simple mission: to empower local entrepreneurs in Barangay Gen. T. De Leon by providing a fair, accessible marketplace where anyone could buy and sell products with ease. What started as a community-focused platform for small businesses and artisans has grown into a thriving digital marketplace connecting countless buyers and sellers.</p>
                        <p>Our name, NegoGen.T, reflects our dedication to Barangay Gen. T. De Leon. The "Gen.T" in our name honors the community we proudly serve, while "Nego" symbolizes the vibrant negosyo (business) spirit we support. By offering user-friendly tools, secure payment processing, and seamless transaction management, we empower local entrepreneurs to expand their reach and achieve success.</p>
                        <p>Today, we’re proud to host a growing number of local sellers offering a diverse range of products across various categories. Our commitment to transparency, security, and customer satisfaction remains at the heart of everything we do. As we continue to grow, we aim to uplift more businesses, strengthen our community, and drive inclusive economic progress.</p>
                        <p>Welcome to NegoGen.T – where local businesses thrive and opportunities grow.</p>
                    </div>
                    <div class="about-intro-image">
                        <img src="/placeholder.svg?height=400&width=600" alt="Negogen.t office">
                    </div>
                </div>
            </div>
        </section>

        <section class="about-mission-section">
            <div class="container">
                <div class="mission-values">
                    <div class="mission-card">
                        <div class="mission-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <h3>Our Mission</h3>
                        <p>To provide a fair, accessible, and innovative digital marketplace that empowers local entrepreneurs in Barangay Gen. T. De Leon, fostering economic growth and creating opportunities for all.</p>
                    </div>
                    <div class="mission-card">
                        <div class="mission-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 3v18h18"></path>
                                <path d="m19 9-5 5-4-4-3 3"></path>
                            </svg>
                        </div>
                        <h3>Our Vision</h3>
                        <p>To become the leading e-marketplace for local businesses in Barangay Gen. T. De Leon, recognized for our commitment to community growth, technological innovation, and customer satisfaction.</p>
                    </div>
                </div>

                <div class="values-grid">
                    <h2>Our Core Values</h2>
                    <div class="values-container">
                        <div class="value-card">
                            <div class="value-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <path d="m9 15 2 2 4-4"></path>
                                </svg>
                            </div>
                            <h3>Community Empowerment</h3>
                            <p>We support and uplift local entrepreneurs by providing tools and resources that foster growth and success.</p>
                        </div>
                        <div class="value-card">
                            <div class="value-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </div>
                            <h3>Security</h3>
                            <p>We are committed to protecting user data and maintaining secure transactions.</p>
                        </div>
                        <div class="value-card">
                            <div class="value-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>
                            </div>
                            <h3>Transparency</h3>
                            <p>We operate with honesty and clarity to build trust among our users.</p>
                        </div>
                        <div class="value-card">
                            <div class="value-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <h3>Customer Satisfaction</h3>
                            <p>We prioritize the needs of our buyers and sellers to ensure a positive experience for all.</p>
                        </div>
                        <div class="value-card">
                            <div class="value-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 12a9 9 0 0 1-9 9m9-9a9 9 0 0 0-9-9m9 9H3m9 9a9 9 0 0 1-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"></path>
                                </svg>
                            </div>
                            <h3>Accessibility</h3>
                            <p>We strive to make e-commerce accessible to everyone, regardless of location, background, or technical expertise.</p>
                        </div>
                        <div class="value-card">
                            <div class="value-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                                    <path d="m15 9-6 6"></path>
                                    <path d="m9 9 6 6"></path>
                                </svg>
                            </div>
                            <h3>Innovation</h3>
                            <p>We embrace technological advancements to create a seamless and efficient marketplace experience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <div class="container">
                <div class="cta-card">
                    <div class="cta-content">
                        <h2>Join Our Community</h2>
                        <p>Whether you're looking to buy unique products or start selling your own, NegoGen.T is the perfect platform to connect with your community.</p>
                        <div class="cta-buttons">
                            <a href="register.html?role=buyer" class="button primary">Create an Account</a>
                            <a href="register.html?role=seller" class="button secondary">Become a Seller</a>
                        </div>
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