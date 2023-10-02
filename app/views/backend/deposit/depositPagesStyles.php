<style>
    .toolbar-custom {
        border: 1px solid rgba(209, 213, 219, 1);
        backdrop-filter: blur(15px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        background-color: rgba(255, 255, 255, 0.75);
        top: 5px;
    }

    .table th,
    .table td {
        /* Ngăn văn bản bị ngắt dòng */
        white-space: nowrap;
        /* Ẩn nội dung vượt qua kích thước tiêu đề */
        overflow: hidden;
    }

    .table td {
        text-overflow: ellipsis;
        max-width: 200px;
        user-select: none;
    }

    .table-active {
        background-color: #dddddd !important;
    }

    .preview-img {
        width: 60%;
        border-radius: 10px;
        aspect-ratio: 16/9;
        object-fit: cover;
    }
</style>