<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400;500&display=swap" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  <script src="style.js">
</script>
   <h2 class="subtitle">Mendoan</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="dashboard.php" id="login_form">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input name ="email" type="email" placeholder="Email" />
			<input name ="password"type="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h2>Man Tsabata Nabata</h2>
				<blockquote>"Barang siapa yang fokus di satu titik, dia yang akan tumbuh"</blockquote>
				<!-- <button class="ghost" id="signUp">Sign Up</button> -->
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script>
        // jQuery codes
        $(document).ready(function () {

            // trigger when login form is submitted
            $(document).on('submit', '#login_form', function () {

                // get form data
                var login_form = $(this);
                var form_data = JSON.stringify(login_form.serializeObject());

                // submit form data to api
                $.ajax({
                    url: "api/login.php",
                    type: "POST",
                    contentType: 'application/json',
                    data: form_data,
                    success: function (result) {

                        // store jwt to cookie
                        setCookie("jwt", result.jwt, 1);

                        // show home page & tell the user it was a successful login
                        showHomePage();
                        $('#response').html("<div class='alert alert-success'>Successful login.</div>");

                    },
                    error: function (xhr, resp, text) {
                        // on error, tell the user login has failed & empty the input boxes
                        $('#response').html("<div class='alert alert-danger'>Login failed. Email or password is incorrect.</div>");
                        login_form.find('input').val('');
                    }
                });

                return false;
            });


            // function to set cookie
            function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }

            // show home page
            function showHomePage() {

                // validate jwt to verify access
                var jwt = getCookie('jwt');
                $.post("api/validate_token.php", JSON.stringify({ jwt: jwt })).done(function (result) {

                    // if valid, show homepage
                    window.location = "dashboard.php";

                    $('#content').html(html);
                    showLoggedInMenu();
                })

                    // show login page on error
                    .fail(function (result) {
                        showLoginPage();
                        $('#response').html("<div class='alert alert-danger'>Please login to access the home page.</div>");
                    });
            }

            // get or read cookie
            function getCookie(cname) {
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }

                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            // if the user is logged in
            function showLoggedInMenu() {
                // hide login and sign up from navbar & show logout button
                $("#login, #sign_up").hide();
                $("#logout").show();
            }



            // function to make form values to json format
            $.fn.serializeObject = function () {

                var o = {};
                var a = this.serializeArray();
                $.each(a, function () {
                    if (o[this.name] !== undefined) {
                        if (!o[this.name].push) {
                            o[this.name] = [o[this.name]];
                        }
                        o[this.name].push(this.value || '');
                    } else {
                        o[this.name] = this.value || '';
                    }
                });
                return o;
            };
        });
    </script>
 
</body>
</html>