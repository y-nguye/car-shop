<style>
    @media (max-width: 1024px) {
        .img-car-on-cart {
            width: 200px !important;
        }

        .car-name__cart-page {
            font-size: 20px;
        }

        .car-price__cart-page {
            font-size: 18px !important;
        }

        .registration-fee__cart-page {
            font-size: 16px !important;
        }
    }

    @media (max-width: 767px) {
        .img-car-on-cart {
            width: 100px !important;
        }

        .car-name__cart-page {
            font-size: 16px;
        }

        .car-price__cart-page {
            font-size: 14px !important;
        }

        .registration-fee__cart-page {
            font-size: 12px !important;
        }
    }

    .img-car-on-cart {
        max-width: 500px;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .img-car-on-registration-fee,
    .img-car-on-pay {
        width: 80%;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .toast-custom {
        top: 70px;
        left: 50%;
        transform: translateX(-50%);
    }

    .disabled-btn-back-to-registration-fee__pay-page {
        color: #6c757d;
        pointer-events: none;
        cursor: default;
    }
</style>