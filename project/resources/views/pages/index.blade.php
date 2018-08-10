@extends('main')
@section('content')
<style>
    .button_box2 {
margin:5px auto;
}
/*-------------------------------------*/
.cf:before, .cf:after{
content:"";
display:table;
}
.cf:after{
clear:both;
}
.cf{
zoom:1;
}
/*-------------------------------------*/

.form-wrapper-2 {
width: 330px;
padding: 15px;
background: #555;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
-moz-box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
}
.form-wrapper-2 input {
width: 190px;
height: 40px;
padding: 10px 5px;
float: left;
font: bold 15px 'Raleway', sans-serif;
border: 0;
background: #eee;
-moz-border-radius: 3px 0 0 3px;
-webkit-border-radius: 3px 0 0 3px;
border-radius: 3px 0 0 3px;
}
.form-wrapper-2 input:focus {
outline: 0;
background: #fff;
-moz-box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
-webkit-box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
}
.form-wrapper-2 input::-webkit-input-placeholder {
color: #999;
font-weight: normal;
font-style: italic;
}
.form-wrapper-2 input:-moz-placeholder {
color: #999;
font-weight: normal;
font-style: italic;
}
.form-wrapper-2 input:-ms-input-placeholder {
color: #999;
font-weight: normal;
font-style: italic;
}
.form-wrapper-2 button {
overflow: visible;
position: relative;
float: right;
border: 0;
padding: 0;
cursor: pointer;
height: 40px;
width: 110px;
font: bold 15px/40px 'Raleway', sans-serif;
color: #fff;
text-transform: uppercase;
background: #D88F3C;
-moz-border-radius: 0 3px 3px 0;
-webkit-border-radius: 0 3px 3px 0;
border-radius: 0 3px 3px 0;
text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);
}
.form-wrapper-2 button:hover{
background: #FA8807;
}
.form-wrapper-2 button:active,
.form-wrapper-2 button:focus{
background: #c42f2f;
}
.form-wrapper-2 button:before {
content: '';
position: absolute;
border-width: 8px 8px 8px 0;
border-style: solid solid solid none;
border-color: transparent #D88F3C transparent;
top: 12px;
left: -6px;
}
.form-wrapper-2 button:hover:before{
border-right-color: #FA8807;
}
.form-wrapper-2 button:focus:before{
border-right-color: #c42f2f;
}
.form-wrapper-2 button::-moz-focus-inner {
border: 0;
padding: 0;
}
</style>
<body id="home">
        <section id="services" class="services"><!-- SECTION SERVICES START -->
            <div class="wrapper no-flex">
                <div class="left main-heading button_box2">
                    <h1 data-option="main-text" style="color:white">Get Ultra-high quality</h1>
                    <p class="subheader" data-option="main-text2"> 
                    Search for Articles</p>
                    <div class="button_box2">
                    <form action="{{URL::to('/article')}}" method="POST" role="search" class=" form-wrapper-2 cf" >
                        {{ csrf_field() }}
                        <input type="text"placeholder="Search here..." required name="q" >
                        <button type="submit" placeholder="Search...">Search</button>
                    </form>
                </div>   
                </div>
                <div class="right">
                <form action="{{url('/services')}}" id="services-form" class="services-form form-active s1"  name="services-form" method="POST" enctype="multipart/form-data" >
                    @csrf
                      <input type="hidden" name="addcustomcarts" value="1">
                      <div class="step-1 step current-step" data-step="step-1">
                        <h2 class="form-header">
                            <b>Choose</b> your service
                        </h2>
    
    
                        <select name="type" id="service-option">
                            <option value="0">Select an option</option>
                            <option >Articles (professional writers) $0.80 per 100 words</option>
                            <option >Authority Content - Native English writers only ($3 per 100 words)</option>
                            <option >Article to Video ($5 per video)</option>
                            <option >Press Release ($1 per 100 words)</option>
                        </select>
    
                        <span class="step-number">Step #1</span>
                        <a class="next-step">Next</a>
                    </div>
                    <div class="form-columns">
    
                        <div class="left quantity">
                         <div>
                            <input type="number" maxlength="7" id="no-articles" value="1" min="1" max="100" step="1" name="numberofarticle">
                            <label for="no-articles" class="label label-articles" style="color:black;">No. of Articles:</label>
                            {{-- <div class="info-holder"> --}}
                                {{-- <textarea autocomplete="off" disabled name="titles" class="insnothide" id="" cols="30" rows="10" placeholder="Titles (one per line)"></textarea> --}}
                                {{-- <i></i> --}}
                                
                            {{-- </div> --}}
                            <input type="text" placeholder="Title" class="form-control" style="margin-bottom: 5px" name="title">
                            <input class="form-control" rows="3" placeholder="Description" name="description" style="width:300px; height:100px;">

                            {{-- <div class="custom-file-upload">
                                <input type="file" id="file" size="50" name="upload_attachment[]" multiple />
                                <input type="hidden"id="uploadede_file" name="uploadede_files" />
                                <input type="hidden" id="my_image_upload_nonce" name="my_image_upload_nonce" value="b989722636" /><input type="hidden" name="_wp_http_referer" value="/" />                            <div class="upload_msg">
    
                                </div>
                            </div> --}}
                            <div class="prod-services">
    
                            </div>
                            <span class="step-number">Step #2</span>
                            <a class="prev-step">Back</a>
                            <a class="next-step">Next</a>
                        </div> 
                    </div>
    
                    <div class="right quantity">
                        <div class="step step-3" data-step="step-3">
                            <input type="number" id="no-words" value="200" min="200" max="300000" step="100" name="numberofwords">
                            <label for="no-words" class="label label-words" style="color:black;">No. of Words:</label>
                            <div class="info-holder">
                                {{-- <textarea autocomplete="off" disabled placeholder="Instructions" name="instructions" class="insnot pls-2" id="" cols="30" rows="10" ></textarea>
                                <div class="hideonotices">
                                    <i></i>
                                    <span>Please provide clear, concise instructions related to your order. (Ex: tone, examples, voice, 1st, 2nd, or 3rd person, etc.) The clearer your instructions, the better your final outcome.</span>
                                </div>
                                <div class="showonnotices">
                                    <i></i>
                                    <span>Please provide any additional information about this order that you want us to be aware of. For further information and ideas, please see the FAQ, below. We know that you have unique needs with each order, and our FAQ is the best place to find additional information on communicating that to us.</span>
                                </div> --}}
                            </div>
                            
                            <span class="step-number">Step #3</span>
                            <a class="prev-step">Back</a>
                            <a class="next-step">Next</a>
                        </div>
                    </div>
                </div>
                <div class="form-columns up_files">
                    <div class="form-group">
                        
                        <button class="btn btn-primary" style="margin-top:15px;">Submit</button>
                    </div>
                </div>
    
                <div class="form-columns order">
    
                    <div class="left">
                     <div class="step step-4" data-step="step-4">
                        {{-- <h2 class="order-header">
                            Your <b>Order</b>
                        </h2>
                        <ul class="order-list">
                            <li class="order-list-header">
                                <span>Product</span>
                                <span>Total</span></li>
                                <li>
                                    <span class="product-name"><b>Product Name</b> x <i>1</i></span>
                                    <span class="product-price">0</span>
                                </li>
                                <li>
                                    <span class="subtotal">Subtotal</span>
                                    <span class="subtotal-price">0</span>
                                </li>
                                <li class="total">
                                    <span>Total</span>
                                    <span class="total-price">0</span>
                                    <input type="hidden" name="total-price" value="0" id="total-price">
                                </li>
                            </ul>
                            <span class="step-number">Step #4</span>
                            <a class="prev-step">Back</a>
                            <a class="next-step">Next</a> --}}
                        </div>
                    </div>
                    <div class="right">
                     <div class="step step-5" data-step="step-5">
                        <div class="cupon">
                            <div class="cupon-click">
                                {{-- <p>Have a coupon?</p>
                                <p>Click here to enter your code</p>
                                <input type="text" id="cupon" name="cupon_1"> --}}
                            </div>
                            {{-- <input type="text" class="cupon-input" id="cupon-input" placeholder="Enter your code" name="service-cupon"> --}}
                        </div>
                        <div class="paypall-check">
                         {{-- <div class="pay-flex">
                             <input type="radio" checked name="paypall" value="true" id="paypall">
                             <label for="paypall" class="label-paypall"><span>PayPal express Checout</span></label>
                             <img src="{{asset("images/icon-paypall.png")}}" alt="pay pall">
                         </div> --}}
                     </div>
                     <br>
                     <div class="terms-check">
                        {{-- <input type="checkbox" value="true" id="terms" required>
                        <label for="terms">I've read & accept the <a href="/terms-and-conditions/">Terms & conditions*</a></label> --}}
                    </div>
                    {{-- <input type="hidden" value="" name="prod_art_name">
                    <input type="hidden" name="prod_services" id="prod_services">
                    <input type="hidden" name="files_obj" id="files_obj">
                    <input type="hidden" name="prod_type" id="prod_type">
                    <input type="hidden" name="price_for_one" id="price_for_one">
                    <input type="hidden" name="per_word" id="per_word">
                    <input type="submit" value="Continue to payment" class="order-submit"> --}}
                    <div class="order_msg">
    
                    </div>
    
                    <span class="step-number">Step #5</span>
                    {{-- <a class="prev-step">Back</a> --}}
                </div>
            </div>
        </div>
    
    </form>
    
<form action="{{ route('register') }}" id="sign-up-form" class="sign-up-form" method="POST"  aria-label="{{ __('Register') }}">
    @csrf     
    <div class="form-background">
        <h2>Sign Up</h2>
        <div class="social-sign-up">
            <a href="www.facebook.com" class="fb-button">Sign up with facebook</a>
            <a href="www.gmail.com" class="gplus-button">Sign up with Google</a>
        </div>
        <span class="or">or</span>
        <span class="form-or click-to">Click to Sign Up with e-mail</span>
    
        <div class="or-email">
            <h3>Sign Up with your <b>Email Address</b></h3>
            <label for="up-name">Name<span style="color: #f00; position: absolute; left: 9px !important;" class="required" title="required"></span><input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus></label>
            <label for="up-email">E-mail<span style="width:50%; color: #f00; position: absolute; left: 9px !important;" class="required" title="required"></span><input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required></label>
            <label for="up-password">Password<span style="color: #f00; position: absolute; left: 9px !important;" class="required" title="required"></span><input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required></label>
            <label for="up-confirm">Confirm Password<span style="color: #f00; position: absolute; left: 9px !important;" class="required" title="required"></span><input id="password-confirm" type="password" class="form-control" name="password_confirmation" required></label>
            
            <button type="submit" class="btn btn-primary" style="margin-left:170px;">
                    {{ __('Register') }}
            </button>
        </div>
        
        <div class="required-box">
    
           <p>By clicking on Sign Up, you agree to <a href="/terms-and-conditions/">Terms & Conditions</a> and <a href="/privacy-policy/">Privacy policy</a></p>
       </div>
    </div>
    </form>
    
<form id="log-in-form" class="log-in-form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf    
    <div class="form-background">
            <h2>Log In</h2>
            <a href="#" class="switch-sign-up">Sign Up</a>
            <div class="social-sign-up">
                <a href="#" class="fb-button">Sign in with facebook</a>
                <a href="#" class="gplus-button">Sign in with Google</a>
            </div>
            <span class="or">or</span> 
            <div class="or-login">
                <input type="text" name="login" placeholder="Your Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                <input type="password" name="pass" placeholder="Your password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                {{-- <input type="submit"  name="loginbutton" value="submit"> --}}
                <button type="submit" class="btn btn-primary" style="margin-left:155px;">
                                    {{ __('Login') }}
                </button>
            </div>
            <a href="#" class="lost-password">Lost your password?</a>
        </div> 
    </form>
    
    <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}" id="lost-password-form" class="lost-password-form">
       @csrf
        <div class="form-background">
            <h2>Lost your password?</h2>
            <span class="or">Type your e-mail</span>               
            <div class="or-login">
                <input type="text" placeholder="Your Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                <input type="submit" value="submit">
            </div>
            <a href="#" class="remember">I remembered the password</a>
        </div>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
            </span>
         @endif 
    </form>
    
    </div>
    </div>
    </section><!-- SECTION SERVICES END -->    
    
    <section id="about" class="about"><!-- SECTION ABOUT START -->
        <div class="wrapper">
            <div class="about-content">
                <h2>who we are</h2>
                <p data-option="who-we-are1">Our goal is to make a difference in the industry and we take our business very, very seriously. We are not here just to make a quick buck.</p>
                <p id="wwd" data-option="who-we-are2">Our business model relies on creating long-term relationships so we get regular work while spending less on marketing, and you get high quality content delivered on time and at a great price…every single time.</p>
                <p ><span class="green" data-option="who-we-are3" >This Way, We Both Win! </span><br>
                    <span data-option="who-we-are4">Just take a look at what we can do… </span></p>
                    <a href="{{url('/sample')}}" class="about-button">
                        <img src={{url("images/samples.png")}} alt="samples">
                        <span>Our samples</span>
                    </a>
            </div>
        </div>
    </section><!-- SECTION ABOUT END --> 
    <section id="why-us" class="why-us"><!-- SECTION WHY US START -->
        <div class="wrapper">
            <h2>Why Us</h2>
            
            <div class="items-section">
                <div class="item">
                    <img src={{asset("images/winner.png")}} alt="winner">
                    <p data-option="whyus1">All articles are written by professional writers</p>
                </div>
                <div class="item">
                    <img src={{asset("images/guarantee.png")}} alt="guarantee">
                    <p data-option="whyus2">Guaranteed original and copy-scaped tested</p>
                </div>
                <div class="item">
                    <img src={{asset("images/quick.png")}} alt="quick">
                    <p data-option="whyus3">Quick 5-7 days turnaround</p>
                </div>
                <div class="item">
                    <img src={{asset("images/payment.png")}} alt="payment">
                    <p data-option="whyus4">The best price you will find for high quality content, anywhere</p>
                </div>
            </div>
            
            <div class="items-section">
                <div class="item">
                    <img src={{asset("images/search.png")}} alt="search">
                    <p data-option="whyus5">Well researched content (we do our homework)</p>
                </div>
                <div class="item">
                    <img src={{asset("images/keywords.png")}} alt="keywords">
                    <p data-option="whyus6">Natural keyword density, LSI, Google friendly (no keywords stuffing)</p>
                </div>
                <div class="item">
                    <img src={{asset("images/present.png")}} alt="present">
                    <p data-option="whyus7">Complete ownership of content transferring to you</p>
                </div>
                <div class="item">
                    <img src={{asset("images/revisions.png")}} alt="revisions"ii>
                    <p data-option="whyus8">Unlimited revisions</p>
                </div>
            </div>
        </div>
    </section><!-- SECTION WHY US END -->                 
    
    <section id="testimonials" class="testimonials"><!-- SECTION TESTIMONIALS START -->
        <div class="wrapper">
            <h2>Testimonials</h2>
            <div class="items-section">
                @foreach($data["testimonials"] as $d)
                <div class="testi-item">
                 <div class="img-wrapper">
                  <img src="{{ url('/storage/images')}}/{{$d->image}}" alt="pic">
              </div>
              <div class="testi-content">
                <img src={{asset("images/quote.png")}} alt="quote">
                <p>{{$d->description}}</p>
                <div class="author">
                    <span><b>{{$d->name}}</b></span>
                    <span class="green">(Sammy.M from Warrior forum)</span>
                </div>
            </div>
        </div>
            @endforeach
      
    </div>
    </div>
    </section><!-- SECTION TESTIMONIALS END --> 
    
    <section id="how-to" class="how-to"><!-- SECTION HOW TO ORDER START -->
        <div class="wrapper">
            <h2>How to order</h2>
            <p class="subheader" data-option="howtoorder1">It’s really simple and takes just 3 easy steps:</p>
            
            <div class="items-section">
                <div class="how-to-item">
                    <img src={{asset("images/1.png")}} alt="step 1">
                    <span class="step-name" data-option="howtoorder2">Select</span>
                    <span data-option="howtoorder3">Choose the service you need
                    </span>
                </div>
                
                <div class="how-to-item">
                    <img src={{asset("images/2.png")}} alt="step 2">
                    <span class="step-name" data-option="howtoorder4">Enter</span>
                    <span data-option="howtoorder5">Give us the instructions</span>
                </div>
                
                <div class="how-to-item">
                    <img src={{asset("images/3.png")}} alt="step 3">
                    <span class="step-name" data-option="howtoorder6">Click</span>
                    <span data-option="howtoorder7">Click the order button,Then just sit back and relax.</span>
                </div>
            </div>
            
            <a href="#" class="click-me" >Click Here To Order</a>
    
            <p data-option="howtoorder9">We’ll start working on your content right away so you can go back to doing what you do best; managing your business. When your articles are finished we’ll have them delivered straight to your inbox…no hassle.
    
            </p>
            <p class="green" data-option="howtoorder10">Couldn’t be simpler, huh?
            </p>
            <p><b data-option="howtoorder11">Go place an order now and experience the magic firsthand. Your online business will never be the same again.</b></p>
        </div>
    </section><!-- SECTION HOW TO ORDER END -->   
    
    <section id="faq" class="faq"><!-- SECTION FAQ START -->
        <div class="wrapper">
            <h2>Faq</h2>
            <div class="faq-area">
                @if(count($data["faq"])>0)
                @foreach($data["faq"] as $d)
                <div class="faq-item">  
                    
                    <div class="faq-header"><i><span></span></i>
                        {{$d->title}}                   
                    </div>
                        
                    <div class="faq-content">
                        <p>{{$d->description}}</p>
                         <p>&nbsp;</p>
                    </div>     
                </div>

                @endforeach
                @endif
               
    
    
            </div>
        </div>
    </section><!-- SECTION FAQ END -->                  
    
    <section id="contact" class="contact"><!-- SECTION CONTACT START -->
        <div class="wrapper">
            <h2>Contact Us</h2>
            <form action="{!!url('mail')!!}" class="contact-for" method="POST">
                @csrf
                <div class="inputarea">
                    <div class="area-one">
                        <input type="text"  name="name" placeholder="Name">
                        <input type="text"  name="order_number" placeholder="Order number">
                        <input type="email" name="email" placeholder="E-mail">
                        <input type="text"  name="subject" placeholder="Subject">
                    </div>
                    <div class="area-two">
                        <textarea name="message" id="" cols="30" rows="10" placeholder="Type message here.."></textarea>
                    </div>
                </div>
                <input type="submit" value="Send" class="contact-submit">
                
            </form>
        </div>
    </section><!-- SECTION CONTACT END -->
    
    <!-- SECTION LATEST PRODUCTS END -->
    
    <section id="labels" class="labels"><!-- SECTION LABELS START -->
        <div class="wrapper">
            <div class="labels-area">
                <div class="label-item"><img src={{asset("images/Blank.png")}} alt="example"></div>
                <div class="label-item"><img src={{asset("images/WF-1.png")}} alt="example"></div>
                <div class="label-item"><img src={{asset("images/GrowthRocks.png")}} alt="example"></div>
                <div class="label-item"><img src={{asset("images/PRBUZZ.png")}} alt="example"></div>
                <div class="label-item"><img src={{asset("images/Blank.png")}} alt="example"></div>
            </div>
        </div>
    </section><!-- SECTION LABELS END -->                              
    <a href="#home" class="scroll-top" title="Scroll top"></a> 
@endsection