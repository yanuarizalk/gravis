<?php
    if (!isset($nodirect)) die('nope');
?>

<div class="member-head">
    <div>
        <h1>Daftar Member</h1>
    </div><!--
--><div>
        <button class="btn btn-green" id='add'>
            <img src="<?php echo $cfg['path']['img']; ?>icon/add.png">
            <div class="btn-text">Tambah</div>
        </button>
    </div>
</div>
<div class="member-body">
<?php
    $db['query'] = $db['con'] -> prepare('SELECT id, name_full, name_call, role FROM members');
    if ($db['query'] -> execute()) {
        $db['res'] = $db['query'] -> fetchAll();
        foreach ($db['res'] as $row) {
            ?><div class="col profile" data-id=<?php echo $row['id']; ?>>
                <div class="photo">
                    <img src="<?php 
                        echo $cfg['path']['img'].'profile/';
                        if (file_exists(getcwd().'/'.$cfg['path']['img'].'profile/'.$row['id'].'.png') == true) {
                            echo $row['id'].'.png';
                        } else {
                            echo 'default.png';
                        }
                    ?>" alt="Profile Photo">
                </div><!--
                --><div class="text">
                    <h3><?php echo $row['name_call']; ?></h3>
                    <h5><?php echo $row['role']; ?></h5>
                </div>
            </div><?php
        }
    }

?>
</div>

<script>
    $('.profile').click(function() {
        window.location.href = 'index.php?page=detail&id=' + $(this).data('id');
    });
    $('#add').click(function() {
        window.location.href = 'index.php?page=detail';
    });
</script>


