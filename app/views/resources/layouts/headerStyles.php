<style>
    .custom-navbar {
        border: 1px solid rgba(209, 213, 219, 0.5);
        backdrop-filter: blur(15px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        background-color: rgba(255, 255, 255, 0.75);
        transition: all 0.3s ease;
    }

    @media (max-width: 991px) {
        .navbar .nav-item {
            margin-left: 5px !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            padding: 8px 0;
        }
    }

    .navbar-toggler:focus,
    .bag:focus {
        box-shadow: none;
    }

    .navbar-list {
        width: 100%;
    }

    .expand-navbar-by-bag {
        height: 0;
        transition: all 0.3s ease;
        visibility: hidden;
        overflow: hidden;
    }

    .extension-navbar {
        visibility: visible;
    }

    .bag-into {
        opacity: 0;
        transition: all 0.3s ease;
    }

    .extension-bag-into {
        padding-top: 30px;
        opacity: 1;
        transition: all 0.3s ease;
    }

    .img-item-on-bag {
        width: 100px;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .empty-space-below-navbar {
        height: var(--navbar-height);
    }

    .blur-below-navbar {
        height: 100vh;
        opacity: 0;
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        background-color: rgba(255, 255, 255, 0.4);
        transition: opacity 0.32s ease;
        visibility: hidden;
    }

    .blurred {
        opacity: 1;
        visibility: visible;
    }
</style>