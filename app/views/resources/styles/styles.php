<link rel="stylesheet" href="/car-shop/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="/car-shop/vendor/twbs/bootstrap-icons/font/bootstrap-icons.min.css" type="text/css" />
<link rel="stylesheet" href="/car-shop/vendor/datatables.net/datatables.net-bs5/css/dataTables.bootstrap5.min.css" type="text/css" />
<style>
    @font-face {
        font-family: 'Saira Semi Condensed';
        src: url('/car-shop/assets/font/Saira-Semi-Condensed/SairaSemiCondensed-Black.ttf') format('TrueType');
        font-weight: 900;
        font-style: normal;
    }

    @font-face {
        font-family: 'Saira Semi Condensed';
        src: url('/car-shop/assets/font/Saira-Semi-Condensed/SairaSemiCondensed-ExtraBold.ttf') format('TrueType');
        font-weight: 800;
        font-style: normal;
    }

    @font-face {
        font-family: 'Saira Semi Condensed';
        src: url('/car-shop/assets/font/Saira-Semi-Condensed/SairaSemiCondensed-Bold.ttf') format('TrueType');
        font-weight: 700;
        font-style: normal;
    }

    @font-face {
        font-family: 'Saira Semi Condensed';
        src: url('/car-shop/assets/font/Saira-Semi-Condensed/SairaSemiCondensed-SemiBold.ttf') format('TrueType');
        font-weight: 600;
        font-style: normal;
    }

    @font-face {
        font-family: 'Saira Semi Condensed';
        src: url('/car-shop/assets/font/Saira-Semi-Condensed/SairaSemiCondensed-Medium.ttf') format('TrueType');
        font-weight: 500;
        font-style: normal;
    }

    @font-face {
        font-family: 'Saira Semi Condensed';
        src: url('/car-shop/assets/font/Saira-Semi-Condensed/SairaSemiCondensed-Regular.ttf') format('TrueType');
        font-weight: 400;
        font-style: normal;
    }

    @font-face {
        font-family: 'Saira Semi Condensed';
        src: url('/car-shop/assets/font/Saira-Semi-Condensed/SairaSemiCondensed-Light.ttf') format('TrueType');
        font-weight: 300;
        font-style: normal;
    }

    @font-face {
        font-family: 'Saira Semi Condensed';
        src: url('/car-shop/assets/font/Saira-Semi-Condensed/SairaSemiCondensed-ExtraLight.ttf') format('TrueType');
        font-weight: 200;
        font-style: normal;
    }

    @font-face {
        font-family: 'Saira Semi Condensed';
        src: url('/car-shop/assets/font/Saira-Semi-Condensed/SairaSemiCondensed-Thin.ttf') format('TrueType');
        font-weight: 100;
        font-style: normal;
    }

    :root {
        --font-family: 'Saira Semi Condensed', sans-serif;
        --width-standard: 1320px;
        --navbar-height: 60px;
        --footer-height: 130px;
        --footer-margin-top: 20px;

        --color-light: #f5f5f7;
        --color-gray-light: #ededed;
    }

    body {
        font-family: var(--font-family);
        font-size: 1rem;
        line-height: 1.5;
        text-rendering: optimizeSpeed;
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    a[href] {
        /* color: var(--text-color); */
        text-decoration: none;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
        /* Firefox */
    }

    .fs-7 {
        font-size: 14px;
    }

    .text-justify {
        text-align: justify;
    }

    .bg-light {
        background-color: var(--color-light) !important;
    }

    .bg-gray-light {
        background-color: var(--color-gray-light);
    }

    /* ---------------- Các style tuỳ chỉnh lại tooltip ---------------- */
    .tooltip-inner {
        background-color: red;
        color: white;
    }

    .bs-tooltip-end .tooltip-arrow::before {
        border-right-color: red;
        -webkit-border-right-color: red;
    }

    .bs-tooltip-top .tooltip-arrow::before {
        border-top-color: red;
        -webkit-border-top-color: red;
    }

    .bs-tooltip-bottom .tooltip-arrow::before {
        border-bottom-color: red;
        -webkit-border-bottom-color: red;
    }

    /* ---------------------------------------------------------------- */

    .push-footer-down-page {
        min-height: calc(100vh - var(--navbar-height) - var(--footer-height) - var(--footer-margin-top));
    }
</style>