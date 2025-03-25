<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Report - Negogen.t</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container header-container">
            <div class="logo">
                <img src="../images/negogent-logo.png">
                </a>
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
                        <hr>
                        <a href="buyer-dashboard.html">My Account</a>
                        <a href="buyer-orders.html">My Orders</a>
                        <a href="buyer-wishlist.html">My Wishlist</a>
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
    </header>

    <main>
        <div class="container">
            <div class="page-header">
                <h1>Submit a Report</h1>
                <p>Use this form to report issues, users, or content that violates our policies.</p>
            </div>

            <div class="report-tabs">
                <div class="tab-list">
                    <button class="tab-button active" data-tab="issue">Issue Report</button>
                    <button class="tab-button" data-tab="user">User Report</button>
                    <button class="tab-button" data-tab="content">Content Report</button>
                </div>

                <div class="tab-content active" id="issue-tab">
                    <div class="card">
                        <div class="card-header">
                            <h2>Report an Issue</h2>
                            <p>Report problems with products, orders, payments, or technical issues</p>
                        </div>
                        <form class="report-form">
                            <div class="form-group">
                                <label for="issue-type">Issue Type</label>
                                <select id="issue-type" required>
                                    <option value="" disabled selected>Select issue type</option>
                                    <option value="product">Product Issue</option>
                                    <option value="order">Order Problem</option>
                                    <option value="payment">Payment Issue</option>
                                    <option value="delivery">Delivery Problem</option>
                                    <option value="technical">Technical Issue</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="issue-order-id">Order ID (if applicable)</label>
                                <input type="text" id="issue-order-id" placeholder="e.g., ORD-12345">
                            </div>
                            <div class="form-group">
                                <label for="issue-description">Describe the Issue</label>
                                <textarea id="issue-description" rows="5" placeholder="Please provide details about the issue..." required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="issue-priority">Priority</label>
                                <select id="issue-priority" required>
                                    <option value="low">Low - Not urgent</option>
                                    <option value="medium" selected>Medium - Needs attention</option>
                                    <option value="high">High - Urgent issue</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="issue-evidence">Upload Evidence (optional)</label>
                                <div class="file-upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                    <span>Upload Files</span>
                                    <p>Images, screenshots, or documents (max 5MB)</p>
                                    <input type="file" id="issue-evidence" multiple>
                                </div>
                            </div>
                            <button type="submit" class="button primary">Submit Report</button>
                        </form>
                    </div>
                </div>

                <div class="tab-content" id="user-tab">
                    <div class="card">
                        <div class="card-header">
                            <h2>Report a User</h2>
                            <p>Report a buyer or seller for policy violations or inappropriate behavior</p>
                        </div>
                        <form class="report-form">
                            <div class="form-group">
                                <label for="user-type">User Type</label>
                                <select id="user-type" required>
                                    <option value="" disabled selected>Select user type</option>
                                    <option value="buyer">Buyer</option>
                                    <option value="seller">Seller</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user-id">Username or Email</label>
                                <input type="text" id="user-id" placeholder="Enter username or email" required>
                            </div>
                            <div class="form-group">
                                <label for="user-reason">Reason for Report</label>
                                <select id="user-reason" required>
                                    <option value="" disabled selected>Select reason</option>
                                    <option value="harassment">Harassment or Bullying</option>
                                    <option value="scam">Scam or Fraud</option>
                                    <option value="impersonation">Impersonation</option>
                                    <option value="inappropriate">Inappropriate Behavior</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user-description">Describe the Issue</label>
                                <textarea id="user-description" rows="5" placeholder="Please provide details about the user's behavior..." required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="user-evidence">Upload Evidence (optional)</label>
                                <div class="file-upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                    <span>Upload Files</span>
                                    <p>Screenshots, messages, or other evidence (max 5MB)</p>
                                    <input type="file" id="user-evidence" multiple>
                                </div>
                            </div>
                            <button type="submit" class="button primary">Submit Report</button>
                        </form>
                    </div>
                </div>

                <div class="tab-content" id="content-tab">
                    <div class="card">
                        <div class="card-header">
                            <h2>Report Content</h2>
                            <p>Report inappropriate listings, reviews, or messages</p>
                        </div>
                        <form class="report-form">
                            <div class="form-group">
                                <label for="content-type">Content Type</label>
                                <select id="content-type" required>
                                    <option value="" disabled selected>Select content type</option>
                                    <option value="product">Product Listing</option>
                                    <option value="review">Review</option>
                                    <option value="message">Message</option>
                                    <option value="other">Other Content</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content-id">Content ID or URL</label>
                                <input type="text" id="content-id" placeholder="Enter ID or paste URL" required>
                            </div>
                            <div class="form-group">
                                <label for="content-reason">Reason for Report</label>
                                <select id="content-reason" required>
                                    <option value="" disabled selected>Select reason</option>
                                    <option value="inappropriate">Inappropriate Content</option>
                                    <option value="illegal">Illegal Items</option>
                                    <option value="counterfeit">Counterfeit Products</option>
                                    <option value="misleading">Misleading Information</option>
                                    <option value="spam">Spam</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content-description">Describe the Issue</label>
                                <textarea id="content-description" rows="5" placeholder="Please provide details about the content issue..." required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="content-evidence">Upload Evidence (optional)</label>
                                <div class="file-upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                    <span>Upload Files</span>
                                    <p>Screenshots or other evidence (max 5MB)</p>
                                    <input type="file" id="content-evidence" multiple>
                                </div>
                            </div>
                            <button type="submit" class="button primary">Submit Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
            // Tab functionality
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
            
            // Form submission
            const reportForms = document.querySelectorAll('.report-form');
            
            reportForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // In a real application, you would send the form data to the server here
                    alert('Thank you for your report. It has been submitted to our administrators and will be reviewed shortly.');
                    
                    // Reset the form
                    form.reset();
                });
            });
        });
    </script>
</body>
</html>