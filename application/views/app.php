<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>
<body>
    <a href="<?php echo base_url() ?>index.php/logout">Logout</a>
    <?php if($this->session->userdata('role') == 'admin') { ?>
    <div style="border:1px solid green; margin-top:20px;">
        <h2><?php echo strtoupper($this->session->userdata('role')) ?> ACCOUNT</h2>
        <h3>User <?php echo ucwords($this->session->userdata('role')) ?></h3>
        <button onclick="setTambahAccount('<?php echo base_url().'index.php/app/tambah' ?>')">Tambah</button>
        <table border="1">
            <tr>
                <td>Nama</td>
                <td>Username</td>
                <td>Role</td>
                <td>Aksi</td>
            </tr>
            <?php foreach($account as $row) { ?>
                <tr>
                    <td><?php echo $row->name ?></td>
                    <td><?php echo $row->username ?></td>
                    <td><?php echo $row->role ?></td>
                    <td>
                        <a href="<?php echo base_url()."index.php/app/hapus?username=".$row->username ?>">Hapus</a>
                        <a href="#" onclick="setUbahAccount('<?php echo base_url().'index.php/app/ubah?username='.$row->username ?>', '<?php echo $row->name ?>', '<?php echo $row->username ?>', '<?php echo $row->password ?>' )">Ubah</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <form id="forminput" action="" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" id="name" placeholder="Nama">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <input type="submit" name="submit" value="SUBMIT">
            <input type="reset" name="reset" value="RESET">
        </form>
    </div>
    <?php } ?>


    <div style="border:1px solid blue; margin-top:20px;">
        <h2><?php echo strtoupper($this->session->userdata('role')) ?> POST</h2>
        <h3>User <?php echo ucwords($this->session->userdata('role')) ?></h3>
        <button onclick="setTambahPost('<?php echo base_url().'index.php/app/tambahpost' ?>')">Tambah</button>
        <table border="1">
            <tr>
                <td>No</td>
                <td>Title</td>
                <td>Content</td>
                <td>Date</td>
                <td>Username</td>
                <td>Aksi</td>
            </tr>
            <?php $a=1; foreach($post as $row) { ?>
                <tr>
                    <td><?php echo $a ?></td>
                    <td><?php echo $row->title ?></td>
                    <td><?php echo $row->content ?></td>
                    <td><?php echo $row->date ?></td>
                    <td><?php echo $row->username ?></td>
                    <td>
                        <a href="<?php echo base_url()."index.php/app/hapuspost?idpost=".$row->idpost ?>">Hapus</a>
                        <a href="#" onclick="setUbahPost('<?php echo base_url().'index.php/app/ubahpost?idpost='.$row->idpost ?>', '<?php echo $row->title ?>', '<?php echo $row->content ?>' )">Ubah</a>
                    </td>
                </tr>
            <?php $a++; } ?>
        </table>
        <form id="forminputpost" action="" method="post">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" id="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" id="content"></textarea>
            </div>
            <input type="submit" name="submit" value="SUBMIT">
            <input type="reset" name="reset" value="RESET">
        </form>
    </div>

    <script>
        window.onload = () => {
            document.getElementById("forminput").hidden = true;
            document.getElementById("forminputpost").hidden = true;
        }
        function setTambahAccount(url) {
            document.getElementById("forminput").action = url;
            document.getElementById("forminput").hidden = false;
        }
        function setUbahAccount(url, name, username, password) {
            document.getElementById("forminput").action = url;
            document.getElementById("forminput").hidden = false;
            document.getElementById("name").value = name;
            document.getElementById("username").value = username;
            document.getElementById("password").value = password;
        }
        function setTambahPost(url) {
            document.getElementById("forminputpost").action = url;
            document.getElementById("forminputpost").hidden = false;
        }
        function setUbahPost(url, title, content) {
            document.getElementById("forminputpost").action = url;
            document.getElementById("forminputpost").hidden = false;
            document.getElementById("title").value = title;
            document.getElementById("content").value = content;
        }
    </script>
</body>
</html>