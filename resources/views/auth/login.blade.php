<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Bootstrap Market trusted by over 4,000 beginners and professionals. Multi-demo, Dark Mode, RTL support. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="keen, bootstrap, bootstrap 5, bootstrap 4, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Keen - Multi-demo Bootstrap 5 HTML Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/keen" />
    <meta property="og:site_name" content="Keenthemes | Keen" />
    <link rel="canonical" href="https://preview.keenthemes.com/keen" />
    <link rel="shortcut icon" href="{{ asset('template/assets/media/logos/favicon.ico') }}" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->



    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('template/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!--Begin::Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');
    </script>
    <!--End::Google Tag Manager -->
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover  bgi-position-center"
                style="background-image: url({{ asset('template/assets/media/misc/auth-bg.png)') }}">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center p-6 p-lg-10 w-100">
                    <!--begin::Logo-->
                    <a href="{{ asset('template/../demo1/index.html') }}" class="mb-0 mb-lg-20">
                        <img alt="Logo" src="{{ asset('template/assets/media/logos/default-white.svg') }}"
                            class="h-40px h-lg-50px" />
                    </a>
                    <!--end::Logo-->

                    <!--begin::Image-->
                    <img class="d-none d-lg-block mx-auto w-300px w-lg-75 w-xl-500px mb-10 mb-lg-20"
                        src="{{ asset('template/assets/media/misc/auth-screens.png') }}" alt="" />
                    <!--end::Image-->

                    <!--begin::Title-->
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bold text-center mb-7">
                        Fast, Efficient and Productive
                    </h1>
                    <!--end::Title-->

                    <!--begin::Text-->
                    <div class="d-none d-lg-block text-white fs-base text-center">
                        In this kind of post, <a href="#"
                            class="opacity-75-hover text-warning fw-semibold me-1">the blogger</a>

                        introduces a person they’ve interviewed <br /> and provides some background information about

                        <a href="#" class="opacity-75-hover text-warning fw-semibold me-1">the interviewee</a>
                        and their <br /> work following this is a transcript of the interview.
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--begin::Aside-->

            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">

                        <!--begin::Form-->
                        <form class="form w-100" action="{{ route('login') }}" method="POST">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3">
                                    Sign In
                                </h1>
                                <!--end::Title-->

                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">
                                    Your Social Campaigns
                                </div>
                                <!--end::Subtitle--->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group--->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="email" placeholder="Email" name="email" id="email"
                                    autocomplete="off" class="form-control bg-transparent"
                                    @error('email') is-invalid @enderror />
                                <!--end::Email-->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!--end::Input group--->
                            <div class="fv-row mb-3">
                                <!--begin::Password-->
                                <input type="password" placeholder="Password" name="password" id="password"
                                    autocomplete="off" class="form-control bg-transparent"
                                    @error('password') is-invalid @enderror />
                                <!--end::Password-->
                            </div>
                            @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!--end::Input group--->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>

                                <!--begin::Link-->
                                <a href="forgot-password" class="link-primary">
                                    Forgot Password ?
                                </a>
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">

                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">
                                        Sign In</span>
                                    <!--end::Indicator label-->

                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->

                            <!--begin::Sign up-->
                            <div class="text-gray-500 text-center fw-semibold fs-6">
                                Not a Member yet?

                                <a href="register" class="link-primary">
                                    Sign up
                                </a>
                            </div>
                            <!--end::Sign up-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->



    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "{{ asset('template/assets/') }}";
    </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('template/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('template/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->


    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('template/assets/js/custom/authentication/sign-in/general.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

</body>
<!--end::Body-->

</html>
