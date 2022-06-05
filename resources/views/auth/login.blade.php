@extends('themes.metronic.login-side')

@section('content')
<h1>{{ __('Login') }}</h1>
<p> We are integrated with SSO LIPI Account. Only internal account has authorization to this app. </p>
<form action="javascript:;" class="login-form" method="post" novalidate="novalidate">
	<div class="row">
		<div class="col-sm-8 text-right">
			
			<!-- TAMBAHKAN LINE INI -->
			@if (Route::has('password.request'))
				<a class="btn btn-link" href="https://sso.lipi.go.id/auth/forgot_password">
					{{ __('Forgot Your Password?') }}
				</a>
			@endif
		</div>
	</div>
</form>
@endsection

@push("custom-script")
<script>
var Login = function() {

    var handleLogin = function() {

        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                },
                remember: {
                    required: false
                }
            },

            messages: {
                email: {
                    required: "Email is required."
                },
                password: {
                    required: "Password is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('.login-form')).show();
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                form.submit(); // form validation success, call ajax form submit
            }
        });

        $('.login-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });

        $('.forget-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
                return false;
            }
        });

        $('#forget-password').click(function(){
            $('.login-form').hide();
            $('.forget-form').show();
        });

        $('#back-btn').click(function(){
            $('.login-form').show();
            $('.forget-form').hide();
        });
    }

 
  

    return {
        //main function to initiate the module
        init: function() {

            handleLogin();

            // init background slide images
            $('.login-bg').backstretch([
                "{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/pages/img/login/bg1.jpg",
                "{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/pages/img/login/bg2.jpg",
                "{{ config('constants.cdn_themes', 'where-cdn-should-come-from') }}/themes/metronic_v4.7.5/theme/assets/pages/img/login/bg3.jpg"
                ], {
                  fade: 1000,
                  duration: 8000
                }
            );

            $('.forget-form').hide();

        }

    };

}();

jQuery(document).ready(function() {
    Login.init();
});
</script>
@endpush