<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Report - Negogen.t</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
</head>
<body>
    @include('header')
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
    @include('footer')
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