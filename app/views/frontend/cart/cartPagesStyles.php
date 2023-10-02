<style>
    .img-car-on-cart {
        width: 500px;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .img-car-on-registration-fee,
    .img-car-on-pay {
        width: 600px;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .bg-custom {
        background-color: #ededed;
    }

    .toast-custom {
        top: 70px;
        left: 50%;
        transform: translateX(-50%);
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

    .disabled-btn-back-to-registration-fee__pay-page {
        color: #6c757d;
        pointer-events: none;
        cursor: default;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
    }
</style>