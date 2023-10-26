<style>
    @media (max-width: 1399px) {
        .column-info-car {
            padding-left: 10px !important;
        }
    }

    @media (max-width: 767px) {
        .slide__product-page {
            margin-bottom: 20px;
        }
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 8%;
    }

    .card-title {
        bottom: 40px;
        left: 50px;
    }

    .toast-custom {
        top: 70px;
        left: 50%;
        transform: translateX(-50%);
    }

    .slide__home-page,
    .slide__product-page {
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

    .carousel-shadow-container {
        width: 100%;
        height: 100%;
        backdrop-filter: blur(8px);
    }

    .carousel-shadow__home-page {
        position: absolute;
        width: 100%;
        height: 50%;
        transform: translateY(100%);
        background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.5));
    }

    .card-shadow__home-page {
        position: absolute;
        width: 100%;
        height: 50%;
        background: linear-gradient(to top, transparent, rgba(0, 0, 0, 0.5));
    }

    .card-custom__home-page {
        border: 0;
        transition: all 0.32s ease;
        overflow: hidden;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
    }

    .card-custom__home-page:hover {
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
        transition: all 0.32s ease;
        transform: scale(101%);
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

    .overlay-custom__product-page {
        opacity: 0;
        transition: opacity 0.32s ease;
        background-color: white;
        visibility: hidden;
    }

    .btn-close__product-page {
        z-index: 99;
    }

    .carosel-controll-icon__overlay {
        font-size: 64px;
    }

    .slide__product-page--overlay {
        width: 100vw;
        overflow: hidden;
    }

    .carousel-item-custom__product-page--overlay img {
        width: 100vw;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .carousel-item-custom__product-page {
        cursor: pointer;
    }

    .carousel-item-custom__product-page img {
        width: 100%;
        aspect-ratio: 5/3;
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
        min-height: 250px;
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
        width: 80%;
        aspect-ratio: 16/9;
        object-fit: cover;
    }
</style>