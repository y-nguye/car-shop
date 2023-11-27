<?php

class UserData extends DatabaseManager
{
    private $table = "user";

    public function getData($user_username)
    {
        $sql = "SELECT * FROM $this->table WHERE user_username = ? OR user_email = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Lỗi khi chuẩn bị lệnh query: " . $this->conn->error);
        }

        $stmt->bind_param('ss', $user_username, $user_username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            die("Lỗi khi lấy dữ liệu tài khoản: " . $stmt->error);
        }

        $data = $result->fetch_assoc();
        $stmt->close();

        return $data;
    }

    public function checkDataByUsername($user_username)
    {
        $sql = "SELECT * FROM $this->table WHERE user_username = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Lỗi khi chuẩn bị lệnh query: " . $this->conn->error);
        }

        $stmt->bind_param('s', $user_username);
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();

        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function checkDataByEmail($user_email)
    {
        $sql = "SELECT * FROM $this->table WHERE user_email = ?";

        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Lỗi khi chuẩn bị lệnh query: " . $this->conn->error);
        }

        $stmt->bind_param('s', $user_email);
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();

        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }


    public function getAllData()
    {
        $sql = "SELECT * FROM $this->table;";
        $this->result = $this->execute($sql);;

        if ($this->result->num_rows > 0) {
            return $this->result;
        }
        return null;
    }

    public function setData($user_username, $user_password, $user_fullname, $user_tel, $user_email, $user_province_id)
    {
        $sql = "INSERT INTO $this->table
            (user_id,
            user_username,
            user_password,
            user_fullname,
            user_tel,
            user_email,
            user_province_id,
            user_avt,
            user_is_admin)
            VALUES (
            null,
            ?,
            ?,
            ?,
            ?,
            ?,
            $user_province_id,
            NULL,
            0);";

        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Lỗi khi chuẩn bị lệnh query: " . $this->conn->error);
        }

        $stmt->bind_param('sssss', $user_username, $user_password, $user_fullname, $user_tel, $user_email);
        $stmt->execute();

        if ($stmt->affected_rows === -1) {
            die("Lỗi khi thêm dữ liệu: " . $stmt->error);
        }

        $stmt->close();
    }

    public function updateData($user_id, $user_fullname, $user_tel, $user_province_id)
    {
        $sql = "UPDATE $this->table SET user_fullname = ?, user_tel = ?, user_province_id = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Lỗi khi chuẩn bị lệnh query: " . $this->conn->error);
        }

        $stmt->bind_param('ssii', $user_fullname, $user_tel, $user_province_id, $user_id);
        $stmt->execute();

        // Kiểm tra lỗi khi thực hiện câu truy vấn
        if ($stmt->affected_rows === -1) {
            die("Lỗi khi cập nhật dữ liệu: " . $stmt->error);
        }

        $stmt->close();

        return true;
    }

    public function updateAvatar($user_id, $user_avt_new,  $user_avt_old, $uploadDir)
    {
        if (!is_writable($uploadDir)) {
            echo "Thư mục không có quyền ghi";
            die;
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $name =  date('Ymd_His_') . $user_avt_new['name'];
        if (!move_uploaded_file($user_avt_new['tmp_name'], $uploadDir . $name)) {
            $error = error_get_last();
            echo "Lỗi: " . $error['message'] . ". Không thể thêm hình ảnh";
            die();
        }

        // Xoá hình cũ để tránh rác
        if ($user_avt_old && file_exists($uploadDir . $user_avt_old)) unlink($uploadDir . $user_avt_old);

        $sql = "UPDATE $this->table SET user_avt = '$name' WHERE user_id = $user_id;";
        return $this->execute($sql);
    }

    public function updateAdmin($user_ids)
    {
        if ($user_ids == '') return;
        $ids = implode(' ,', $user_ids);
        $sql = "UPDATE $this->table
                SET user_is_admin = (CASE WHEN user_id IN ($ids) THEN 1 ELSE 0 END);";
        return $this->execute($sql);
    }

    public function deleteData($user_username)
    {
        $sql = "DELETE FROM $this->table WHERE user_username = '$user_username';";
        return $this->execute($sql);
    }
}
