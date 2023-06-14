@extends('layouts.app')

@section('title')
    Edit Users
@endsection

@section('navbar')
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
        data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold px-3" id="#kt_app_sidebar_menu"
            data-kt-menu="true" data-kt-menu-expand="false">
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="2" width="9" height="9" rx="2"
                                    fill="currentColor" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9"
                                    rx="2" fill="currentColor" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9"
                                    rx="2" fill="currentColor" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9"
                                    rx="2" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Dashboards</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="/home">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Graphic</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item pt-5">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase fs-7">Master Data</span>
                </div>
                <!--end:Menu content-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @role('Administrator')
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">User Management</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link active" href="/view-user">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">User List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="/view-roles">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Roles List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="/view-permission">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Permissions</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
            @endrole
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">eCommerce</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span
                                    class="bullet bullet-dot"></span></span><span class="menu-title">Catalog</span><span
                                class="menu-arrow"></span></span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link--><a class="menu-link"
                                    href="#"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Products</span></a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link--><a class="menu-link"
                                    href="#"><span class="menu-bullet"><span
                                            class="bullet bullet-dot"></span></span><span
                                        class="menu-title">Categories</span></a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Purchase Request</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link--><a class="menu-link" href="#">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Orders Listing</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
        </div>
        <!--end::Menu-->
    </div>
@endsection

@section('content')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">

            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Edit Users
                        </h1>
                        <!--end::Title-->


                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="/home" class="text-muted text-hover-primary">
                                    Home </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                User Management </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="/view-user" class="text-muted text-hover-primary">
                                    Users </a>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="/edit-user" class="text-muted text-hover-primary">
                                    Edit Users </a>
                            </li>
                            <!--end::Item-->

                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->

            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-xxl ">
                    <!--begin::Card-->
                    <div class="card">

                        <!--begin::Card body-->
                        <div class="card-body py-4">

                            <!--begin::Input group-->
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="/update-user/{{ $user->id }}" method="POST">
                                @csrf
                                <div class="form-floating mb-7">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Full Name" name="name" value="{{ $user->name }}">
                                    <label for="floatingInput">Full Name</label>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="form-floating mb-7">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="email" value="{{ $user->email }}">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="form-floating mb-7">
                                    <input type="password" class="form-control" id="floatingPassword"
                                        placeholder="Password" name="password"
                                        value="{{ old('password'), $user->password }}">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="form-floating mb-7">
                                    <input type="password" class="form-control" id="floatingPassword"
                                        placeholder="Repeat Password" name="confirm-password">
                                    <label for="floatingPassword">Repeat Password</label>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="roles[]">
                                        <option selected disabled>Select Role</option>
                                        @foreach ($roles as $item)
                                            @if ($item == 'Super Admin')
                                                <option value="{{ $item }}" hidden>{{ $item }}</option>
                                            @else
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Choose Role</label>
                                </div>
                                <!--end::Input group-->

                                <br>

                                <div class="form-floating">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">
                                            Submit
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
@endsection
