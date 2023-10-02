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

    .btn-ok-update-avatar:hover,
    .btn-cancer-update-avatar:hover {
        /* background-color: #e8e9ec; */
        background-color: var(--color-gray-light);
    }

    .img-car-deposit {
        width: 150px;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .min-width-250px {
        min-width: 250px;
    }

    .container-deposit-list {
        /* border: 1px solid #cbcccd; */
        height: 560px;
        overflow-y: auto;
    }

    /* Hiển thị thanh cuộn mặc định */
    ::-webkit-scrollbar {
        width: 10px;
        /* Đặt chiều rộng thanh cuộn */
    }

    /* Tùy chỉnh màu nền và đường viền cho thanh cuộn */
    ::-webkit-scrollbar-thumb {
        background-color: #cbcccd;
        /* Màu nền của thanh cuộn */
        border-radius: 5px;
        /* Đường viền cong */
    }

    /* Ẩn thanh cuộn khi không sử dụng */
    ::-webkit-scrollbar-thumb:hover {
        background-color: #555;
        /* Màu nền của thanh cuộn khi đưa chuột lên */
    }

    /* Ẩn thanh cuộn khi không sử dụng */
    ::-webkit-scrollbar-track {
        background-color: transparent;
        /* Màu nền của vùng chứa thanh cuộn */
    }
</style>