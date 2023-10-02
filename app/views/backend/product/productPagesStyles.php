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

    .preview-image-container-item {
        width: 30%;
        display: inline-block;
        padding: 4px;
        margin-top: 4px;
    }

    .preview-img {
        width: 100%;
        border-radius: 10px;
        aspect-ratio: 16/9;
        object-fit: cover;
    }

    .preview-no-img {
        cursor: pointer;
    }

    .container-validate {
        border: 1px solid red !important;
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

    .bs-tooltip-bottom .tooltip-arrow::before {
        border-bottom-color: red;
        -webkit-border-bottom-color: red;
    }

    .ckeditor-invalidate {
        border-color: red !important;
    }
</style>