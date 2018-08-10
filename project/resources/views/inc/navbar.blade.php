
<header>
    <div class="header-wrapper">
        <a href="{{url('/')}}" class="logo">
            <img src="images/logo.png" alt="logo">
        </a>
        <div class="mobile-button"><span></span></div>	
        <div class="cart-mobile">
            <a href="/cart/" style="line-height: 0;"><span><i> 0</i></span></a>
        </div>
        <nav class="menu">
            <ul>
                <li class="current-menu-item"><a href="">Services</a></li>
                <li><a href="{{url('/sample')}}">Samples</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#faq">Faq</a></li>
                <li><a href="{{url('/blog')}}">Blog</a></li>
                <li class="login">
                        <a href="#" class="log-in-link">Log In</a>
                    {{-- <a href="{{url('\home')}}" class="log-in-link">Log In</a> --}}
                    <div class="login-drop">
                        <!-- <a href="#" class="log-in-link">Log In</a> -->
                    <a href="#" class="sign-up-link"><i>or</i> Sign Up</a>
                    {{-- <a href="{{url('/register')}}" class="sign-up-link"><i>or</i> Sign Up</a> --}}
                        <a href="#" class="get-back login-hidden">Back to services</a>
                    </div>

                </li>
            </ul>
        </nav>
    </div>
</header>
