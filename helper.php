<?php 

    function verifyImageArticle($image) {
        $namaFile = $image['name'];
        $ukuranFile = $image['size'];
        $errorFile = $image['error'];
        $tmpFile = $image['tmp_name'];

        // cek ada tidaknya gambar yang di upload
        // if ($errorFile === 4) {
        //     echo "
        //         <script> alert('pilih gambar terlebih dahulu!'); </script>
        //     ";
        //     return false;
        // }

        // cek apakah yang diupload itu gambar?
        $ekstensi = explode('.', $namaFile);
        $ekstensi = strtolower(end($ekstensi));
        $allowEkstensi = ['jpg', 'jpeg', 'png'];
        
        if (!in_array($ekstensi, $allowEkstensi)){
            return false;
        }
        
        //cek ukuran gambar
        // if ($ukuranFile > 1000000) {
        //     echo "
        //         <script> alert('gambar terlalu besar!'); </script>
        //     ";
        //     return false;
        // }

        // jika berhasil
        $namaFileBaru = uniqid() . '.' . $ekstensi;

        
        move_uploaded_file($tmpFile, realpath(dirname(__FILE__)). "/uploads/image_article/" . $namaFileBaru);

        return $namaFileBaru;
    }

    function verifyImageProduct($image) {
        $namaFile = $image['name'];
        $ukuranFile = $image['size'];
        $errorFile = $image['error'];
        $tmpFile = $image['tmp_name'];

        // cek ada tidaknya gambar yang di upload
        // if ($errorFile === 4) {
        //     echo "
        //         <script> alert('pilih gambar terlebih dahulu!'); </script>
        //     ";
        //     return false;
        // }

        // cek apakah yang diupload itu gambar?
        $ekstensi = explode('.', $namaFile);
        
        $ekstensi = strtolower(end($ekstensi));
        $allowEkstensi = ['jpg', 'jpeg', 'png'];

        if (!in_array($ekstensi, $allowEkstensi)){
            return false;
        }
        
        //cek ukuran gambar
        // if ($ukuranFile > 1000000) {
        //     echo "
        //         <script> alert('gambar terlalu besar!'); </script>
        //     ";
        //     return false;
        // }

        // jika berhasil
        $namaFileBaru = 'product_' . uniqid() . '.' . $ekstensi;
        
        move_uploaded_file($tmpFile, realpath(dirname(__FILE__)). "/uploads/image_product/" . $namaFileBaru);

        return $namaFileBaru;
    }