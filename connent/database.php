<?php

namespace connent;

class database
{
    public function createTableDs($conn)
    {
        $sql = "CREATE TABLE thanhvien(
           id VARCHAR(10) NOT NULL,
           hoVaTen VARCHAR(255) NOT NULL,
           gioiTinh CHAR(3) NOT NULL,
           namSinh DATE NOT NULL,
           PRIMARY KEY (id)
          );";
        $conn->exec($sql);
    }
    public function createTableDsCT($conn){
        $sql = "CREATE TABLE ThongTin(
            anh VARCHAR(255) NOT NULL,
            ngayVao DATE NOT NULL,
            chucVu VARCHAR(255) NOT NULL,
            diaChi VARCHAR(255),
            soDT CHAR(13),
            email CHAR(100),
            id VARCHAR(10),
            CONSTRAINT fk_idThanhVien FOREIGN KEY (id) REFERENCES thanhvien(id)
          );";
        $conn->exec($sql);
    }

}