<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="{{asset('assets/favicon.png')}}">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
        @include('Layouts/css_global')
		
		<title>@yield('title_page')</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
        @include('Layouts/navbar')
		
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>@yield('title')</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->
		<div class="untree_co-section">
        @yield('content')
		</div>
		<!-- Start Footer Section -->
        @include('Layouts/footer')
		
		<!-- End Footer Section -->	


		@include('Layouts/js_global')
	</body>

</html>
