<!DOCTYPE html>
<html lang="en">
<!-- For RTL verison -->
<!-- <html lang="en" dir="rtl"> -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Primary Meta Tags -->
    <title>AdminLTE 4 | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="title" content="AdminLTE 4 | Dashboard"/>
    <meta name="author" content="ColorlibHQ"/>
    <meta
        name="description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS."
    />
    <meta
        name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!-- By adding ./css/dark/adminlte-dark-addon.css then the page supports both dark color schemes, and the page author prefers / default is light. -->
    <meta name="color-scheme" content="light dark"/>
    <!-- By adding ./css/dark/adminlte-dark-addon.css then the page supports both dark color schemes, and the page author prefers / default is dark. -->
    <!-- <meta name="color-scheme" content="dark light"> -->

    <!-- OPTIONAL LINKS -->

    <!-- Google Font: Source Sans Pro -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <link rel="stylesheet" href="{{asset('backend/plugins/sweetalert2/sweetalert2.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

    <!-- overlayScrollbars -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.1/css/OverlayScrollbars.min.css"
        integrity="sha256-WKijf8KI68sbq8Znd6yMepIuFF0wdWfIt6gk3JWcQfk="
        crossorigin="anonymous"
    />

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css"
        integrity="sha256-mUZM63G8m73Mcidfrv5E+Y61y7a12O5mW4ezU3bxqW4="
        crossorigin="anonymous"
    />

    <!-- REQUIRED LINKS -->

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/css/adminlte.css')}}"/>

    <!-- For RTL verison use ./css/rtl/adminlte.rtl.css, remove dist/css/adminlte.css -->
    <!-- <link rel="stylesheet" href="./css/rtl/adminlte.rtl.css""> -->

    <!-- For dark mode use ./css/dark/adminlte-dark-addon.css, do not remove dist/css/adminlte.css or if usinf RTL version do not remove ./css/rtl/adminlte.rtl.css-->
    <!-- ... and then the alternate CSS first as a snap-on for dark color scheme preference -->
    <!-- <link rel="stylesheet" href="./css/dark/adminlte-dark-addon.css" media="(prefers-color-scheme: dark)""> -->

    <link
        rel="stylesheet"
        href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />

    @livewireStyles
</head>
<body class="layout-fixed">
<div class="wrapper">
    @includeIf('layouts.partials.navbar')
    @includeIf('layouts.partials.aside')
    <div class="content-wrapper">
        {{$slot}}
    </div>
    <!-- /.content-wrapper -->
    @includeIf('layouts.partials.footer')
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- overlayScrollbars -->
<script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.1/js/OverlayScrollbars.min.js"
    integrity="sha256-7mHsZb07yMyUmZE5PP1ayiSGILxT6KyU+a/kTDCWHA8="
    crossorigin="anonymous"
></script>
<!-- Bootstrap 5 -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha256-9SEPo+fwJFpMUet/KACSwO+Z/dKMReF9q4zFhU/fT9M="
    crossorigin="anonymous"
></script>

<script src="{{asset('backend/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>



script

<!-- REQUIRED SCRIPTS -->

<!-- AdminLTE App -->
<script src="{{asset('backend/js/adminlte.js')}}"></script>

<script>
    window.addEventListener('show-modal', (event) => {
        let myModal = new bootstrap.Modal(document.getElementById(event.detail.modalName))
        document.getElementById(event.detail.modalName + 'Label').innerHTML = event.detail.title;
        document.getElementById('modalSubmit').innerHTML = event.detail.button;
        myModal.show()
    });
    window.addEventListener('hide-modal', event => {
        bootstrap.Modal.getInstance(document.getElementById(event.detail.target)).hide();
    });

    window.addEventListener('swal:modal', event => {
        Swal.fire({
            icon: event.detail.icon,
            title: event.detail.title,
            text: event.detail.text,
            showConfirmButton: false,
            timer: 2000,
        });
    });
    window.addEventListener('swal:confirm', event => {
        Swal.fire({
            icon: event.detail.icon,
            title: event.detail.title,
            text: event.detail.text,
            showCancelButton: true,
            confirmButtonText: 'Yes!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit(event.detail.action, event.detail.id);
            }
        });
    });
</script>
@livewireScripts
</body>
</html>
