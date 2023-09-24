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
    }

    .card-custom__home-page img {
        width: 100%;
        aspect-ratio: 15/9;
        object-fit: cover;
    }

    .card-type-page-custom {
        transition: background-color 0.32s ease;
    }

    .card-type-page-custom:hover {
        background-color: #f4f4f4;
        transition: background-color 0.32s ease;
    }

    .img-on-card {
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
        object-position: bottom;
    }
</style>