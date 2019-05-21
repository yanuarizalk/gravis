<?php
    if (!isset($nodirect)) die('nope');
?>

<form id="login" class="page-login">
    <h2>USER LOGIN</h2>
    <input type="email" placeholder="Email" name="email" >
    <input type="password" placeholder="Password" name="pass" >
    <button class="btn btn-green">
        <img src="<?php echo $cfg['path']['img']; ?>icon/save.png">
        <div class="btn-text">Masuk</div>
    </button>
</form>

<script>
    $('#login').submit(function(ev) {
        ev.preventDefault();
        $.ajax({
            url: 'api.php?act=login',
            method: 'POST',
            data: {
                email: $('input[name="email"]').val(),
                pass: $('input[name="pass"]').val()
            }, 
            dataType: 'json',
            success: function(data, stat) {
                if (data.status == 'success') {
                    window.location.href = 'index.php?page=members';
                } else if (data.status == 'wrong') {
                    alert('Invalid Email / Password');
                    $('input[name="email"]').focus();
                } else {
                    alert('Invalid Server callback');
                }
            },
            error: function(xhr, stat) {
                alert('Internal Server Error\r\nPlease contact administrator for further information');
            }
        });
    });
</script>


