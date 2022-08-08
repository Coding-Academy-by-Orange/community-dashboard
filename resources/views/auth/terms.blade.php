<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description"
	content="user registration website - registration process - coding academy by orange ">
	<meta name="keywords"
	content="registration,coding,orange, laravel, learning">
	<meta name="author" content="Marya Alzubi">
	<title>@yield('title')</title>
	<link rel="preload" href="{{asset('assets/boosted/dist/fonts/HelvNeue55_W1G.woff2')}}" as="font"
	type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="{{asset('assets/boosted/dist/fonts/HelvNeue75_W1G.woff2')}}" as="font"
	type="font/woff2" crossorigin="anonymous">
	<link href="{{asset('assets/boosted/dist/css/orangeHelvetica.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/boosted/dist/css/orangeIcons.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/boosted/dist/css/boosted.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('assets/css/client.css')}}" rel="stylesheet">
	<link rel="preconnect" href="https://code.jquery.com" crossorigin="anonymous">
	<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
	integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="{{asset('assets/js/countries.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.0.2/js/countrySelect.min.js" integrity="sha512-agmFjG7H3K/n7ca70w6lzdO0MxUFWYcaDrw5WpwBMjhXxfrchssrKyZrJOSEN7q4vIeTcHUX5A7mM6zjbE2ZAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	@yield('links')
	<style>
		@yield('style')
		h1,h2,h3,h4{
			color:#FF7700;
		}
	</style>
</head>
<body>
	<div class="d-md-flex flex-md-equal h-100 ">
		<div class="col-lg-4 p-0 auth-slider my-div" style="position: fixed;top: 0; bottom:0; left: 0; height: 100%">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block h-100 my-div" src="{{asset('assets/img/1.jpg')}}" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block h-100 my-div" src="{{asset('assets/img/2.jpg')}}" alt="Second slide">
					</div>
					<!-- <div class="carousel-item">
						<img class="d-block h-100 my-div" src="{{asset('assets/img/3.png')}}" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block h-100 my-div" src="{{asset('assets/img/4.png')}}" alt="Second slide">
					</div> -->
				</div>
			</div>
		</div>
		<div class="col-lg-8 px-0" style="position: absolute;top: 0; bottom: 0; right: 0">
			<header role="banner">
				<nav role="navigation" id="mainNav" class="navbar navbar-light bg-white navbar-expand-md pt-2 border-bottom pb-0 mb-2 pt-1"
				aria-label="Main navigation">
				<div class="container-fluid">
					<a href="/">
						<img src="{{asset('assets/boosted/dist/img/ORANGE_LOGO_rgb-black.jpg')}}"
						class="d-inline-block align-bottom mr-3" alt="Back to homepage" title="Back to homepage"
						height="70" loading="lazy" />
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#orange-navbar-collapse"
					aria-controls="orange-navbar-collapse" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse justify-content-end collapse" id="orange-navbar-collapse">
					<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link" href="/help">Help </a></li>
						<li class="nav-item"><a class="nav-link" href="/login"> Back To Home</a></li>
					</ul>
					<ul class="navbar-nav">
						@guest

						@else
						<li  class="nav-item dropdown">
							<a class="nav-link logout-style" href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();" >Logout
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>
</header>
<section class="wizard-section mt-4">
	<div class="form-wizard">
		<form method="post" class="signup-step1" action="{{route('register.step1')}}">
			@csrf
			<div class="d-flex align-items-center flex-column">
				<div class="form-group col-lg-6 col-md-7">
					<h1 class="text-warning">Terms & Conditions</h1>
				</div>
				<div class="col-lg-9 col-md-7" style="margin-left: 15px;">                    	
					<h4 class="orange-txt mt-3 >1. Acceptance of Terms of Use</h4>
					<div>The following Terms apply to anyone ( corporate and individuals) accessing and using Orange website for the subscription in Single Sign on Services or any part of it (&quot;Site&quot;) which include content, text, information, advertising, data, audio/visual materials and ,software (the &quot;Content&quot;) to subscribe 
					By using this Site you agree to be bound by these Terms. 

					 <h4 class="orange-txt mt-3">Acceptance of Terms of Use:</h4>
					 <div>
					 	The following Terms apply to anyone ( corporate and individuals) accessing and using Orange Coding Academy website for the subscription in Coding Academy registration application which include content, text, information, advertising, data, audio/visual materials and ,software (the "Content") to subscribe
						By using this Site you agree to be bound by these Terms. 

					 </div>
					<h4 class="orange-txt mt-3">Privacy Policy and Property Rights:</h4>
					<div>The provisions of the Privacy Policy apply to the Academy and all the courses it offers during the entire training period and until the end of the contract between them. The Coding Academy by Orange has the right to:
						<div>
					•	Collect, use and maintain the information that is collected from me in the manner deemed appropriate by the Coding Academy by  Orange Jordan
					</div> 
					<div>
					•	The training materials that are provided at the Academy and all files that are sent to students may not be used or sent abroad the Academy except with a written permission from the authorized administration in Orange Jordan.
					</div>
					<div>
					•	All students’ small and large projects are educational outputs by the Coding Academy by Orange in Jordan. The Academy has the right to use these projects and/or present them to the concerned authorities without my prior permission. Also the Academy has the right to obtain programming files for any application that I will create during the training period.
				</div>
					•	The Academy has the right to photo-shoot me and filming / photo-shoot my projects and use them in the media without my prior permission.
					
					</div>
					<h4 class="orange-txt mt-3">ACCESS</h4>
					<div>-Whenever you provide information on our Site, you agree to: (a) provide true, accurate, current and complete information and (b) maintain and promptly update such information to keep it true, accurate, current and complete. If you provide any information that is, or we have reasonable grounds to suspect that the information is, untrue, inaccurate, not current or incomplete, Orange may without notice suspend or terminate your access to our Site and refuse any and all current or future use of our Site.</div>

					<div>-You are responsible for maintaining the confidentiality of the password and account identification, and you are fully responsible for all activities or transactions including and not limited to  , paying bills, filing complaints and add/ remove services that occur under your password or account identification. You agree to immediately notify Orange of any unauthorized use of your password or account or any other breach of security. Without limiting any rights which Orange may otherwise have, Orange reserves the right to take any and all actions, as it deems necessary or reasonable, to ensure the security of the Site and your account, including without limitation terminating your account, changing your password, or requesting additional Notwithstanding the foregoing, Orange rely no authority of anyone accessing your account or using your password and in no event and under no circumstances shall Orange be held liable to you for any liabilities or damages resulting from or arising out of (i) any action or omission by Orange, (ii) any compromise of the confidentiality of your account or password and (iii) any unauthorized access to your account or use of your password. You may not use anyone else's account at any time, without the permission of the account holder.</div>

					<div>- The security of your personally identifying information is important to us. While there is no such thing as "perfect security" on the Internet, we will take reasonable steps to help ensure the safety of your personally identifying information. However, you understand and agree that such steps do not guarantee that use of the Site is invulnerable to all security breaches, and that Orange makes no warranty, guarantee, or representation that use of any of our Site is protected from viruses, security threats or other vulnerabilities.</div>
				
					<h4 class="orange-txt mt-3">Creating Your Profile</h4>
					<div>1- Log on to orangecodingacademy.com website;</div>
					<div>2- Access Sign on Services&#160; from the homepage;</div>
					<div>3- Fill in the registration form;</div>
					
					<div>
						<br />
					</div>
					<div>&#160;</div>
					<h4 class="orange-txt mt-3">PRIVACY POLICY</h4>
					<div>PLEASE VIEW OUR PRIVACY POLICY, WHICH EXPLAINS OUR PRACTICES RELATING TO THE COLLECTION AND USE OF YOUR INFORMATION THROUGH OR IN CONNECTION WITH OUR SITE. ORANGE´S USE OF YOUR INFORMATION IS GOVERNED AT ALL TIMES BY OUR PRIVACY POLICY, WHICH IS INCORPORATED BY REFERENCE INTO THESE TERMS. YOU UNDERSTAND THAT THROUGH YOUR USE OF THE SITE YOU CONSENT TO THE COLLECTION AND USE OF THIS INFORMATION (AS SET FORTH IN THE PRIVACY POLICY).</div>
					<h4 class="orange-txt mt-3">DISCLAIMER OF WARRANTIES AND LIMITATION OF LIABILITY</h4>
					<div>
						- The Site is provided on "as is" and "as available" basis.
						We make no representations or warranties of any kind, express or implied, as to the operation of the Site. You expressly agree that your use of the Site is at your sole risk. To the maximum extent permissible by any applicable law, we disclaim all warranties, express or implied.

					</div>



					<div>
						- Orange does not warrant that the Site including the servers and e-mails are free of viruses or other harmful components. We will not be liable for any damages of any kind whatsoever arising from or in connection with the use of this Site, including, without limitations; direct, indirect, incidental, punitive, and consequential damages.
					</div>

					<div>
						-    Moreover, we shall not be liable for any loss of use, profits or data or any indirect, special or consequential damages or losses, whether such losses or damages arise in contract, negligence, tort or any other legal theory including without limitation to the foregoing any losses in relation to:

					</div>

					<div>
						<br/>
					</div>

					<div>
						-    your use of, reliance upon or inability to use our Content or any information contained in any materials on the Site;
					</div>

					<div>
						-    the deletion with or without notice or cause of any of your data or information stored on the Site or your account;
					</div>

					<div>
						-    any loss of your data or material resulting from delays, non-deliveries, missed deliveries, service interruptions or a failure, suspension or withdrawal of all or part of the Products and Services at any time.
					</div>
						<div>
						<br />
					</div>
					<div>
						<br />
					</div>
					

				</div>
				<div class="ms-clear"></div>


			</div>
		</div>
	</div>


</div>
</form>
</div>
</section>
</div>
</div>
<script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/boosted@4.5.3/dist/js/boosted.bundle.min.js"
integrity="sha384-hQFBUEXKv1tPjGNFpCctXthNheXFWEyT+cKHsR5+8VYwGoe2L0SIaDNXDpE1LlTK"
crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="{{asset('assets/boosted/dist/js/jquery-slim.min.js')}}"><\/script>')</script>
<script src="{{asset('assets/boosted/dist/js/boosted.bundle.min.js')}}"></script>
{{-- sweet alert cdn and use --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    // create a record
    @if(session('status_store'))
    swal({
    	title: "{{session('status_store')}}",
    	icon: "success",
    	button: "ok",
    });
    @endif
    // update a record
    @if(session('status_update'))
    swal({
    	title: "{{session('status_update')}}",
    	icon: "success",
    	button: "ok",
    });
    @endif
    // delete a record
    @if(session('status_destroy'))
    swal({
    	title: "{{session('status_destroy')}}",
    	icon: "error",
    	button: "ok",
    });
    @endif
</script>
</body>
</html>

