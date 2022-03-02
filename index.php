<html>
<head>
    <title>GERE</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="style.js"></script>
</head>
 
<body>


<form action='' class='form' method="POST">
    <h1 class="field" style="color:white">GERE (Guest Electronic REcorder)<br> Isi Buku Tamu</h1>
  <p class='field required'>
    <label class='label required' for='nama'>Nama Lengkap</label>
    <input class='text-input' id='nama' name='nama' required type='text' value=''>
  </p>
  <p class='field required'>
    <label class='label' for='nohp'>Nomor HP</label>
    <input class='text-input' id='nohp' name='nohp' type='phone'>
  </p>
  <p class='field required'>
    <label class='label required' for='alamat'>Alamat</label>
    <input class='text-input' id='alamat' name='alamat' required type='text' value=''>
  </p>
  <div class='field'>
    <label class='label'>Jenis Kelamin</label>
    <ul class='options'>
      <li class='option'>
        <input class='option-input' id='pria' name='kelamin' type='radio' value='Pria'>
        <label class='option-label' for='pria'>Pria</label>
      </li>
      <li class='option'>
        <input class='option-input' id='wanita' name='kelamin' type='radio' value='Wanita'>
        <label class='option-label' for='wanita'>Wanita</label>
      </li>
    </ul>
  </div>
  <div class='field'>
    <label class='label'>Keperluan</label>
    <ul class='options'>
      <li class='option'>
        <input class='option-input' id='option-1' name='keperluan' type='radio' value='Informasi'>
        <label class='option-label' for='option-1'>Informasi</label>
      </li>
      <li class='option'>
        <input class='option-input' id='option-2' name='keperluan' type='radio' value='Sidang'>
        <label class='option-label' for='option-2'>Sidang</label>
      </li>
      <li class='option'>
        <input class='option-input' id='option-3' name='keperluan' type='radio' value='Pendaftaran'>
        <label class='option-label' for='option-3'>Pendaftaran</label>
      </li>
      <li class='option'>
        <input class='option-input' id='option-4' name='keperluan' type='radio' value='Mediasi'>
        <label class='option-label' for='option-4'>Mediasi</label>
      </li>
      <li class='option'>
        <input class='option-input' id='option-5' name='keperluan' type='radio' value='Pengambilan Produk'>
        <label class='option-label' for='option-5'>Pengambilan Produk</label>
      </li>
      <li class='option'>
        <input class='option-input' id='option-6' name='keperluan' type='radio' value='Pengaduan'>
        <label class='option-label' for='option-6'>Pengaduan</label>
      </li>
      <li class='option'>
        <input class='option-input' id='option-7' name='keperluan' type='radio' value='Lainnya'>
        <label class='option-label' for='option-7'>Lainnya</label>
      </li>
      
    </ul>
  </div>
  <p class='field half'>
    <input class='button' type='submit' value='Lanjut' name='Lanjut'>
  </p>
</form>

    
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Lanjut'])) {
        $nama = $_POST['nama'];
        $kelamin = $_POST['kelamin'];
        $alamat = $_POST['alamat'];
        $nohp = $_POST['nohp'];
        $keperluan = $_POST['keperluan'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $sql = "INSERT INTO daftar_tamu (nama,kelamin,alamat,nohp,keperluan) VALUES('$nama','$kelamin','$alamat','$nohp','$keperluan')";
        
        mysqli_query($conn, $sql);
        $last_id = mysqli_insert_id($conn);
        header("Location: takephoto.php?id=$last_id");
    }
    ?>
</body>
</html>