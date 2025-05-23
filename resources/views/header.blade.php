<header class="header">
    <div class="container header-container">
        <div class="logo">
            <img src="../images/negogent-logo.png">
        </div>
        
        <nav class="main-nav">
            <ul>
                <li><a href="{{ url('/') }}" class="active">Home</a></li>
                <li><a href="{{ url('/shop') }}">Shop</a></li>
                <li><a href="{{ url('/categories') }}">Categories</a></li>
                <li><a href="{{ url('/about') }}" >About</a></li>
            </ul>
        </nav>
        
        <div class="header-actions">
            <button class="icon-button" id="search-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
            </button>
            <a href="wishlist" class="icon-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                </svg>
            </a>
            <a href="cart" class="icon-button cart-button">
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
                    @if(Session::has('buyer_id'))
                        <span style="display: block; text-align: center; margin-top: 7px;">{{ DB::table('tbl_buyer')->where('Buyer_Id', Session::get('buyer_id'))->value('FirstName') }}</span>
                        <hr>
                        <a href="{{ url('/buyer/account') }}">Account</a>
                        <a href="{{ url('/logout') }}" class="logout-button">Log Out</a>
                    @else
                        <a href="{{ url('/login') }}">Sign In</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
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
