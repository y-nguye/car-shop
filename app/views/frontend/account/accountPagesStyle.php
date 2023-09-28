<style>
    .btn-update {
        visibility: hidden;
    }

    .active {
        visibility: visible;
    }

    .nav-item {
        cursor: pointer;
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

    .avatar-container {
        width: 150px;
        position: relative;
        aspect-ratio: 1/1;
        /* overflow: hidden; */
    }

    .avatar-edit {
        width: 150px;
        aspect-ratio: 1/1;
        position: absolute;
        top: 0;
        opacity: 0;
        transition: all 0.2s linear;
    }

    .avatar-edit:hover {
        opacity: 1;
        transition: all 0.2s linear;
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.2);
    }

    .avatar {
        width: 150px;
        aspect-ratio: 1/1;
        object-fit: cover;
    }

    .update-button-group {
        display: none;
        position: absolute;
        top: 0;
        left: 100%;
        width: 150px;
        aspect-ratio: 1/1;
    }

    .update-button-group-active {
        display: inline;
    }

    .btn-ok-update-avatar {
        position: absolute;
        top: 0;
    }

    .btn-cancer-update-avatar {
        position: absolute;
        bottom: 0;
    }



    .img-car-deposit {
        width: 150px;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .min-width-250px {
        min-width: 250px;
    }
</style>