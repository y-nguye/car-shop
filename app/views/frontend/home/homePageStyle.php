<style>
    .slide {
        width: var(--width-standard);
        overflow: hidden;
    }

    .carousel-item img {
        width: 100%;
        aspect-ratio: 16/9;
        object-fit: cover;
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
</style>