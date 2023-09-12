<link rel="stylesheet" href="/car-shop/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="/car-shop/vendor/twbs/bootstrap-icons/font/bootstrap-icons.min.css" type="text/css" />
<link rel="stylesheet" href="/car-shop/vendor/datatables.net/datatables.net-bs5/css/dataTables.bootstrap5.min.css" type="text/css" />
<link rel="stylesheet" href="/car-shop/vendor/enyo/dropzone/dist/min/dropzone.min.css" type="text/css" />
<style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap');

    :root {
        --width-standard: 1320px;

        --font-family: 'IBM Plex Sans', sans-serif;
    }

    * {
        margin: 0;
        padding: 0;
        /* Đỡ hại não khi tính toán width height */
        box-sizing: border-box;
    }

    html {
        /* Sử dụng đơn vị REM (Root EM) */
        font-size: 16px;
    }

    body {
        font-family: var(--font-family);
        font-size: 1rem;
        line-height: 1.5;
        text-rendering: optimizeSpeed;
        color: var(--text-color);
    }


    ul {
        /* Loại bỏ dấu chấm từ danh sách không sắp xếp (unordered list) */
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    a[href] {
        /* color: var(--text-color); */
        text-decoration: none;
    }

    /* a[href]:hover {
        color: var(--text-color);
        text-decoration: underline;
    } */
</style>