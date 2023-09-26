<style>
    .slide {
        width: var(--width-standard);
        overflow: hidden;
    }

    .carousel-item-custom__home-page img {
        width: 100%;
        aspect-ratio: 18/9;
        object-fit: cover;
        object-position: bottom;
    }

    .carousel-no-img-custom__home-page {
        object-position: unset !important;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 8%;
    }

    .shadow-text {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .carousel-shadow-container {
        width: 100%;
        height: 100%;
        backdrop-filter: blur(8px);
    }

    .carousel-shadow {
        position: absolute;
        width: 100%;
        height: 50%;
        transform: translateY(100%);
        background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.5));
    }

    .card-shadow {
        position: absolute;
        width: 100%;
        height: 50%;
        background: linear-gradient(to top, transparent, rgba(0, 0, 0, 0.5));
    }

    .card-custom__home-page {
        border: 0;
        transition: all 0.32s ease;
        overflow: hidden;
    }

    .card-custom__home-page:hover {
        box-shadow: 5px 5px 4px rgba(0, 0, 0, 0.2);
        transition: all 0.32s ease;
        transform: translate(-1px, -1px);
    }

    .card-custom__home-page img {
        width: 100%;
        aspect-ratio: 15/9;
        object-fit: cover;
    }

    .card-custom__type-page {
        transition: background-color 0.32s ease;
    }

    .card-custom__type-page:hover {
        background-color: #f4f4f4;
        transition: background-color 0.32s ease;
    }

    .img-on-card__type-page {
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .card-title {
        bottom: 40px;
        left: 50px;
    }

    .carousel-item-custom__product-page img {
        width: 100%;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .repair-services-img__service-page {
        width: 50%;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .periodic-maintenance-img-1__service-page {
        width: 48%;
        margin: 5px;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .periodic-maintenance-services-img-2__service-page {
        height: 80%;
    }

    .support-img__support-page {
        width: 100%;
        /* aspect-ratio: 16/9; */
        object-fit: cover;
    }

    .container-content-banner__support-page {
        top: 110px;
        width: 50%;
    }

    .content-banner__support-page {
        font-size: 1.25rem;
        font-weight: 500;
    }

    .img-car-on-test-drive__test-drive-page {
        width: 600px;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

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
</style>