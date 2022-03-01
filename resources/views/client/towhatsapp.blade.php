<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whatsapp Redirect</title>

    @php
        $text = "*INFORMASI PEMESANAN BARU*";
        $text .= "%0a";
        $text .= "%0a";

        $text .= "Nama Pemesan : " . $login->login_nama;
        $text .= "%0a";

        $text .= "Paket : " . $paket->paket_nama;
        $text .= "%0a";

        $text .= "Kode Paket : " . $paket->paket_kode;
        $text .= "%0a";

        $text .= "Harga : " . $paket->paket_harga;
        $text .= "%0a";

        $text .= "Status Pemesanan : " . $paket->paket_status;
        $text .= "%0a";
        $text .= "%0a";
    @endphp

    <script>
    //   window.location.replace("https://wa.me/6285342072185?text=Saya%20tertarik%20dengan%20mobil%20Anda%20yang%20dijual" );
      window.location.replace("https://wa.me/6285342072185?text=<?php echo $text; ?>" );
    </script>
</head>
<body>

</body>
</html>
