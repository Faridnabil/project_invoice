@extends('layouts.app')

@section('title')
    Roles List
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
                            <a class="menu-link" href="/view-user">
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
                            <a class="menu-link active" href="/view-roles">
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
                            Roles List
                        </h1>
                        <!--end::Title-->


                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="/home" class="text-muted text-hover-primary">
                                    Home
                                </a>
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
                                <a href="/view-roles" class="text-muted text-hover-primary">
                                    Roles
                                </a>
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

                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
                        <!--begin::Col-->
                        @foreach ($role as $item)
                            <div class="col-md-4">
                                <!--begin::Card-->
                                <div class="card card-flush h-md-100">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>{{ $item->name }}</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body pt-1">
                                        <!--begin::Users-->
                                        <div class="fw-bold text-gray-600 mb-5">Total users with this role:
                                            1</div>
                                        <!--end::Users-->

                                        <!--begin::Permissions-->
                                        <div class="d-flex flex-column text-gray-600">
                                            <div class="d-flex align-items-center py-2"><span
                                                    class="bullet bg-primary me-3"></span> All Admin Controls
                                            </div>
                                            <div class="d-flex align-items-center py-2"><span
                                                    class="bullet bg-primary me-3"></span> View and Edit
                                                Financial Summaries</div>
                                            <div class="d-flex align-items-center py-2"><span
                                                    class="bullet bg-primary me-3"></span> Enabled Bulk Reports
                                            </div>
                                            <div class="d-flex align-items-center py-2"><span
                                                    class="bullet bg-primary me-3"></span> View and Edit Payouts
                                            </div>
                                            <div class="d-flex align-items-center py-2"><span
                                                    class="bullet bg-primary me-3"></span> View and Edit
                                                Disputes</div>

                                            <div class='d-flex align-items-center py-2'><span
                                                    class='bullet bg-primary me-3'></span> <em>and 7
                                                    more...</em></div>
                                        </div>
                                        <!--end::Permissions-->
                                    </div>
                                    <!--end::Card body-->

                                    <!--begin::Card footer-->
                                    <div class="card-footer flex-wrap pt-0">
                                        <a type="button" class="btn btn-light btn-active-light-primary my-1"
                                            href="edit-roles/{{ $item->id }}">
                                            Edit Role
                                        </a>

                                        <a type="button" class="btn btn-light btn-active-danger my-1 me-2"
                                            href="delete-roles/{{ $item->id }}">
                                            Delete Role
                                        </a>
                                    </div>
                                    <!--end::Card footer-->
                                </div>
                                <!--end::Card-->
                            </div>
                        @endforeach
                        <!--end::Col-->


                        <!--begin::Add new card-->
                        <div class="ol-md-4">
                            <!--begin::Card-->
                            <div class="card h-md-100">
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-center">
                                    <!--begin::Button-->
                                    <a type="button" class="btn btn-clear d-flex flex-column flex-center"
                                        href="create-roles">
                                        <!--begin::Illustration-->
                                        <img src="{{ asset('template/assets/media/illustrations/sketchy-1/4.png') }}"
                                            alt="" class="mw-100 mh-150px mb-7" />
                                        <!--end::Illustration-->

                                        <!--begin::Label-->
                                        <div class="fw-bold fs-3 text-gray-600 text-hover-primary">Add New
                                            Role</div>
                                        <!--end::Label-->
                                    </a>
                                    <!--begin::Button-->
                                </div>
                                <!--begin::Card body-->
                            </div>
                            <!--begin::Card-->
                        </div>
                        <!--begin::Add new card-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
@endsection
