<?php
    if (!isset($nodirect)) die('nope');
?>

<h1>Detail Member</h1>
<form class="page-detail" id="detail">
    <div>
        <table class="form-group">
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="name_full" style="width: 50%;" id="" required></td>
            </tr>
            <tr>
                <td>Nama Panggilan</td>
                <td><input type="text" name="name_call" style="width: 40%;" id="" required></td>
            </tr>
            <tr>
                <td>Role</td>
                <td><input type="text" name="role" id="" style="width: 40%;" required></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><input type="text" name="birth_place" style="width: 40%;" id="" required></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="birth_date" style="width: 30%;" id="" required></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>
                    <select name="religion" style="width: 30%;" id="" required>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Pendidikan Terakhir</td>
                <td><input type="text" name="education" style="width: 50%;" id="" required></td>
            </tr>
            <tr>
                <td>Tgl. Mulai Bekerja</td>
                <td><input type="date" name="start_date" style="width: 30%;" id="" required></td>
            </tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr>
                <td>Alamat KTP</td>
                <td><input type="text" name="address_ktp" style="width: 70%;" id="" required></td>
            </tr>
            <tr>
                <td>Alamat Tempat Tinggal</td>
                <td><input type="text" name="address_now" style="width: 70%;" id="" required></td>
            </tr>
            <tr>
                <td>No. Handphone</td>
                <td><input type="text" name="no_hp" style="width: 30%;" id="" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" style="width: 40%;" id="" required></td>
            </tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr>
                <td>Facebook</td>
                <td><input type="text" name="social_facebook" style="width: 50%;" id=""></td>
            </tr>
            <tr>
                <td>Twitter</td>
                <td><input type="text" name="social_twitter" style="width: 50%;" id=""></td>
            </tr>
            <tr>
                <td>Google+</td>
                <td><input type="text" name="social_google" style="width: 50%;" id=""></td>
            </tr>
            <tr>
                <td>Linkedin</td>
                <td><input type="text" name="social_linkedin" style="width: 50%;" id=""></td>
            </tr>
            <tr>
                <td><input type="hidden" name="act" value="add"></td>
            </tr>
        </table>
    </div><!--
    --><div class="photo">
        <img src="<?php echo $cfg['path']['img']; ?>profile/default.png" onerror="usedefault();" alt="Photo">
        <input type="file" name="pp" onchange="preview(this)" id="" hidden>
        <input type="hidden" name="id" id="">
        <button class="btn btn-blue" type="button" id="upload">
            <img src="<?php echo $cfg['path']['img']; ?>icon/upload.png" alt="">
            <div class="btn-text">Upload</div>
        </button>
    </div>
    <button class="btn btn-red" type="button" id="delete">
        <img src="<?php echo $cfg['path']['img']; ?>icon/close.png" alt="">
        <div class="btn-text">Hapus</div>
    </button>
    <button class="btn btn-green" type="submit">
        <img src="<?php echo $cfg['path']['img']; ?>icon/save.png" alt="">
        <div class="btn-text">Simpan</div>
    </button>
</form>

<script>
    $('#upload').click(function(){
        $('input[name="pp"]').trigger('click');
    });
    $('#delete').click(function() {
        if ( (isNaN($('input[name="id"]').val())) || ($('input[name="id"]').val() == '') ) {
            $('#detail').trigger('reset');
        } else {
            if (confirm('Anda yakin ingin menghapus member ini?')) {
                $.ajax({
                    url: 'api.php?data=member&act=del',
                    method: 'POST',
                    data: {
                        'id' : $('input[name="id"]').val()
                    },
                    success: function(data, status) {
                        if (data.status == 'success') {
                            alert('Data member berhasil dihapus');
                            window.location.href = 'index.php?page=members';
                        } else if (data.status == 'error') {
                            alert(data.desc);
                        }
                    }, error: function(xhr, status) {

                    }
                });
            } else {
                
            }
        }
    });

    function usedefault(){
        $('.photo > img').attr('src', '<?php echo $cfg['path']['img'].'profile/default.png'; ?>');
    }

    function preview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(ev) {
                $('.photo > img').attr('src', ev.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    let frm;
    $('#detail').submit(function(ev) {
        ev.preventDefault();
        if ($('input[name="act"]').val() == 'add') {
            frm =  new FormData(document.getElementById('detail'));
            $.ajax({
                url: 'api.php?data=member&act=add',
                method: 'POST',
                processData: false,
                contentType: false,
                data: frm,
                success: function(data, status) {
                    if (data.status == 'success') {
                        alert('Data berhasil ditambahkan');
                        window.location.href = 'index.php?page=members';
                    } else if (data.status == 'error') {
                        alert(data.desc);
                    }
                }, error: function(xhr, status) {

                }
            });
        } else if ($('input[name="act"]').val() == 'update') {
            frm =  new FormData(document.getElementById('detail'));
            $.ajax({
                url: 'api.php?data=member&act=edit',
                method: 'POST',
                processData: false,
                contentType: false,
                data: frm,
                success: function(data, status) {
                    if (data.status == 'success') {
                        alert('Data berhasil diubah');
                        window.location.href = 'index.php?page=members';
                    } else if (data.status == 'error') {
                        alert(data.desc);
                    }
                }, error: function(xhr, status) {

                }
            });
        }
    });

<?php
    function update($data) {
        global $cfg;
        ?>
        $('input[name="id"]').val('<?php echo $data[0]['id']; ?>');
        $('input[name="name_full"]').val('<?php echo $data[0]['name_full']; ?>');
        $('input[name="name_call"]').val('<?php echo $data[0]['name_call']; ?>');
        $('input[name="role"]').val('<?php echo $data[0]['role']; ?>');
        $('input[name="birth_place"]').val('<?php echo $data[0]['birth_place']; ?>');
        $('input[name="birth_date"]').val('<?php echo $data[0]['birth_date']; ?>');
        $('select[name="religion"]').val('<?php echo $data[0]['religion']; ?>');
        $('input[name="education"]').val('<?php echo $data[0]['education']; ?>');
        $('input[name="start_date"]').val('<?php echo $data[0]['start_date']; ?>');
        $('input[name="address_ktp"]').val('<?php echo $data[0]['address_ktp']; ?>');
        $('input[name="address_now"]').val('<?php echo $data[0]['address_now']; ?>');
        $('input[name="no_hp"]').val('<?php echo $data[0]['no_hp']; ?>');
        $('input[name="email"]').val('<?php echo $data[0]['email']; ?>');
        $('input[name="social_facebook"]').val('<?php echo $data[0]['social_facebook']; ?>');
        $('input[name="social_twitter"]').val('<?php echo $data[0]['social_twitter']; ?>');
        $('input[name="social_google"]').val('<?php echo $data[0]['social_google']; ?>');
        $('input[name="social_linkedin"]').val('<?php echo $data[0]['social_linkedin']; ?>');
        $('.photo > img').attr('src', '<?php echo $cfg['path']['img'].'profile/'.$data[0]['id']; ?>.png');

        $('input[name="act"]').val('update');
        <?php
    }

    if (isset($_GET['id'])) {
        if (!is_nan($_GET['id'])) {
            $db['query'] = $db['con'] -> prepare('SELECT * FROM members WHERE id=:id');
            if ($db['query'] -> execute(array(
                ':id' => $_GET['id']
            ))) {
                if ($db['query'] -> rowcount() > 0) {
                    $db['res'] = $db['query'] -> fetchAll();
                    update($db['res']);
                } else {
                    //dadi tambah, cos raono
                }
            } else {
                ?>
                console.log('Query Error');
                <?php
            }
        } else {

        }
    } else {
        
    }
?>
</script>


