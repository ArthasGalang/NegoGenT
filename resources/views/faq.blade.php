<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NegoGen.t - E-Marketplace</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <style>
        .contact-card {
            display: flex;
            flex-direction: row; /* Two-column layout */
            align-items: center;
            text-align: left;
            background-color: var(--card);
            border-radius: var(--radius);
            padding: 3rem 2rem;
            box-shadow: var(--shadow);
            max-width: 800px;
            margin: 0 auto;
            gap: 2rem;
        }
        .contact-content {
            flex: 2; /* Left column */
        }
        .contact-image {
            flex: 1; /* Right column */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .contact-image svg {
            color: var(--primary);
            opacity: 0.8;
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    @include('header')
    <main>
        <div class="page-header faq-page-header">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index.html">Home</a> &gt; 
                    <span>FAQ</span>
                </div>
                <h1>Frequently Asked Questions</h1>
                <p>Find answers to common questions about our marketplace</p>
            </div>
        </div>

        <section class="faq-section">
            <div class="container">
                <div class="faq-tabs">
                    <button class="faq-tab active" data-category="general">General</button>
                    <button class="faq-tab" data-category="account">Account</button>
                    <button class="faq-tab" data-category="orders">Orders & Shipping</button>
                    <button class="faq-tab" data-category="payments">Payments</button>
                    <button class="faq-tab" data-category="returns">Returns & Refunds</button>
                    <button class="faq-tab" data-category="sellers">For Sellers</button>
                </div>

                <div class="faq-search">
                    <div class="search-input">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                        <input type="text" id="faq-search-input" placeholder="Search for questions...">
                    </div>
                </div>

                <div class="faq-content">
                    <!-- General FAQs -->
                    <div class="faq-category active" id="general">
                        <div class="faq-accordion">
                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>What is NegoGen.T?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>NegoGen.T is an e-marketplace platform that connects buyers and sellers. Our platform allows individuals and businesses to buy and sell products across various categories. We provide a secure, user-friendly environment for online commerce with features like secure payments, seller verification, and buyer protection.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>How do I contact customer support?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>You can contact our customer support team through multiple channels:</p>
                                    <ul>
                                        <li>Email: negogen.t@email.com</li>
                                        <li>Phone: +639123456789 (Monday to Friday, 9 AM - 6 PM EST)</li>
                                    </ul>
                                    <p>We typically respond to inquiries within 24 hours during business days.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>Is NegoGen.T available in other barangay?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>No, NegoGen.T is available only in Barangay Gen.T de Leon, Valenzuela City.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>How does NegoGen.T ensure product quality?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>We implement several measures to ensure product quality:</p>
                                    <ul>
                                        <li>Seller verification process to confirm the identity of merchants.</li>
                                        <li>Customer review system to provide feedback on products and sellers.</li>
                                        <li>Quality guidelines that sellers must adhere to.</li>
                                        <li>Buyer protection policy that allows for returns and refunds for items not as described.</li>
                                        <li>Regular monitoring of seller performance and product listings.</li>
                                    </ul>
                                    <p>If you receive a product that doesn't meet your expectations, please refer to our Returns & Refunds policy.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>What are the accepted payment methods?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>We accept two(2) payment methods to provide flexibility for our customers:</p>
                                    <ul>
                                        <li>GCASH QR COde (Seller will provide this)</li>
                                        <li>Cash on Delivery</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account FAQs -->
                    <div class="faq-category" id="account">
                        <div class="faq-accordion">
                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>How do I create an account?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>Creating an account on NegoGen.T is simple:</p>
                                    <ol>
                                        <li>Click on the "Register" link in the top right corner of the website OR Click the button in the Home Page.</li>
                                        <li>Fill out the registration form.</li>
                                        <li>If you register as Seller, you need to verify your account in Barangay Hall Office with your documents needed for verification.</li>
                                        <li>If you register as Buyer, the admin will verify your account first.</li>
                                    </ol>
                                    <p>You can also register using your Google for a faster sign-up process.</p>
                                </div>
                            </div>

                            

                    <!-- Orders & Shipping FAQs -->
                    <div class="faq-category" id="orders">
                        <div class="faq-accordion">
                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>How do I track my order?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>You can track your order in several ways:</p>
                                    <ol>
                                        <li>Log in to your account and go to "My Orders"</li>
                                        <li>Click on the specific order you want to track</li>
                                        <li>Click the "Track Order" button to see the current status</li>
                                    </ol>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>How long will it take to receive my order?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>Delivery times vary depending on several factors:</p>
                                    <ul>
                                        <li>The seller's processing time (typically 1-2 business days)</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>Can I change or cancel my order?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>You can request to change or cancel your order, but it depends on the order status:</p>
                                    <ul>
                                        <li><strong>Order Placed (Not Yet Processed):</strong> You can usually cancel through your account by going to "My Orders" and selecting "Cancel Order"</li>
                                        <li><strong>Order Processing:</strong> Contact the seller directly as soon as possible to request cancellation</li>
                                        <li><strong>Order Shipped:</strong> Orders cannot be cancelled once shipped, but you can refuse delivery or return the item once received</li>
                                    </ul>
                                    <p>To change order details (like shipping address or product variations):</p>
                                    <ol>
                                        <li>Contact the seller immediately through the order messaging system</li>
                                        <li>Explain the changes you need</li>
                                    </ol>
                                    <p>Note that sellers are not obligated to accept change requests, especially if they've already begun processing your order.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>What should I do if my order arrives damaged?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>If your order arrives damaged, follow these steps:</p>
                                    <ol>
                                        <li>Take clear photos of the damaged packaging and product</li>
                                        <li>Contact the seller within 48 hours of delivery through your order details page</li>
                                        <li>Provide a detailed description of the damage along with the photos</li>
                                        <li>Keep all original packaging until the issue is resolved</li>
                                    </ol>
                                    <p>Most sellers will offer a replacement or refund for damaged items. If the seller doesn't respond within 2 business days or you're not satisfied with their response, you can report it in our <a href = "report.html">Report Page.</a></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payments FAQs -->
                    <div class="faq-category" id="payments">
                        <!-- Payment FAQs content here -->
                        <div class="faq-accordion">
                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>Is it safe to use my GCASH QR Code on NegoGen.T?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>Yes, using GCash QR codes on NegoGen.T can be safe if you verify the seller, confirm the transaction details, and avoid sharing personal information.</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Returns & Refunds FAQs -->
                    <div class="faq-category" id="returns">
                        <!-- Returns FAQs content here -->
                        <div class="faq-accordion">
                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>What is your return policy?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>Return policies may vary by seller, but our marketplace policy ensures that:</p>
                                    <ul>
                                        <li>Most items can be returned within 7 days of delivery</li>
                                        <li>Items must be in original condition with all packaging and tags</li>
                                    </ul>
                                    <p>Each product page clearly displays the return policy for that specific item. To initiate a return:</p>
                                    <ol>
                                        <li>Message the Seller.</li>
                                        <li>Follow the prompts to complete the return request</li>
                                    </ol>
                                    <p>The seller will review your request and provide return instructions or issue a refund depending on the circumstances.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>How long do refunds take to process?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>Refund processing times depend on several factors:</p>
                                    <ul>
                                        <li><strong>Return Inspection:</strong> 1-3 business days after the seller receives your return</li>
                                        <li><strong>Refund Initiation:</strong> 1-2 business days after inspection approval</li>
                                        <li><strong>Payment Method:</strong> 
                                            <ul>
                                                <li>Credit/Debit Cards: 3-10 business days to appear on your statement</li>
                                                <li>PayPal/Digital Wallets: 1-3 business days</li>
                                                <li>Store Credit: Immediate</li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <p>You'll receive email notifications when your return is received, when the refund is processed, and when the refund is complete. You can also check the status in your account under "My Orders."</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- For Sellers FAQs -->
                    <div class="faq-category" id="sellers">
                        <!-- Seller FAQs content here -->
                        <div class="faq-accordion">
                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>How do I become a seller on NegoGen.T?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>To become a seller on Negogen.t:</p>
                                    <ol>
                                        <li>Create a seller account or log in to your existing account</li>
                                        <li>Complete the seller application form, which includes:
                                            <ul>
                                                <li>Business information</li>
                                                <li>Contact information</li>
                                            </ul>
                                        </li>
                                        <li>Verify your identity  by going to the Barangay Hall Office of Gen.T de Leon</li>
                                        <li>Accept the seller terms and conditions</li>
                                        <li>Set up your shop profile with a name, logo, and description</li>
                                    </ol>
                                    <p>Once approved, you can start listing products and selling on our platform. The approval process typically takes 1-3 business days.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>What fees do sellers pay?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="faq-answer">
                                    <p>NegoGen.T is a free site, no need paying.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-section">
            <div class="container">
                <div class="contact-card">
                    <div class="contact-content">
                        <h2>Still have questions?</h2>
                        <p>We're here to help you with any questions or concerns you may have.</p>
                        <a href="contact.html" class="button primary">Contact Us</a>
                    </div>
                    <div class="contact-image">
                        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('footer')
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
            
            // FAQ tabs
            const faqTabs = document.querySelectorAll('.faq-tab');
            const faqCategories = document.querySelectorAll('.faq-category');
            
            faqTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    faqTabs.forEach(t => t.classList.remove('active'));
                    
                    // Add active class to clicked tab
                    this.classList.add('active');
                    
                    // Hide all categories
                    faqCategories.forEach(category => {
                        category.classList.remove('active');
                    });
                    
                    // Show the selected category
                    const categoryId = this.getAttribute('data-category');
                    document.getElementById(categoryId).classList.add('active');
                });
            });
            
            // FAQ accordion
            const faqQuestions = document.querySelectorAll('.faq-question');
            
            faqQuestions.forEach(question => {
                question.addEventListener('click', function() {
                    const item = this.parentElement;
                    const isActive = item.classList.contains('active');
                    
                    // Close all items
                    document.querySelectorAll('.faq-item').forEach(faqItem => {
                        faqItem.classList.remove('active');
                        const answer = faqItem.querySelector('.faq-answer');
                        answer.style.maxHeight = null;
                    });
                    
                    // If the clicked item wasn't active, open it
                    if (!isActive) {
                        item.classList.add('active');
                        const answer = item.querySelector('.faq-answer');
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                    }
                });
            });
            
            // FAQ search functionality
            const searchInput = document.getElementById('faq-search-input');
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                if (searchTerm.length < 2) {
                    // Reset view if search term is too short
                    faqQuestions.forEach(question => {
                        question.parentElement.style.display = 'block';
                    });
                    
                    // Show the active category
                    faqCategories.forEach(category => {
                        category.style.display = 'block';
                    });
                    
                    return;
                }
                
                // Show all categories for search
                faqCategories.forEach(category => {
                    category.classList.add('active');
                });
                
                // Remove active class from all tabs
                faqTabs.forEach(t => t.classList.remove('active'));
                
                let hasResults = false;
                
                // Filter questions
                faqQuestions.forEach(question => {
                    const questionText = question.querySelector('span').textContent.toLowerCase();
                    const answerText = question.nextElementSibling.textContent.toLowerCase();
                    
                    if (questionText.includes(searchTerm) || answerText.includes(searchTerm)) {
                        question.parentElement.style.display = 'block';
                        hasResults = true;
                        
                        // Highlight the search term in the question
                        const regex = new RegExp(`(${searchTerm})`, 'gi');
                        const highlightedText = question.querySelector('span').textContent
                            .replace(regex, '<mark>$1</mark>');
                        question.querySelector('span').innerHTML = highlightedText;
                    } else {
                        question.parentElement.style.display = 'none';
                    }
                });
                
                // If no results, show a message
                if (!hasResults) {
                    // You could add a "no results" message here
                }
            });
        });        
    </script>
</body>
</html>