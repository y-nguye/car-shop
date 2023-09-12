<style>
    .custom-navbar {
        border: 1px solid rgba(209, 213, 219, 0.5);
        backdrop-filter: blur(15px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        background-color: rgba(255, 255, 255, 0.75);
    }

    @media (max-width: 991px) {
        .navbar .nav-item {
            margin-left: 0 !important;
            margin-bottom: -12px;
            padding: 8px 0;
        }
    }

    .navbar-toggler:focus {
        box-shadow: none;
    }

    .navbar-list {
        width: 100%;
    }

    .empty-space-below-navbar {
        height: 70px;
    }
</style>