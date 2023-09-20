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

    .card {
        border: none;
    }

    .img-large {
        width: 100%;
        aspect-ratio: 16/9;
        object-fit: cover;
        transition: opacity 0.2s ease;
    }

    .img-small {
        width: 100px;
        aspect-ratio: 16/9;
        object-fit: cover;
        cursor: pointer;
    }

    .dot-img-small {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        transition: all 0.32s ease;
        background-color: transparent;
    }

    .dot-img-small-active {
        background-color: var(--bs-secondary);
    }
</style>