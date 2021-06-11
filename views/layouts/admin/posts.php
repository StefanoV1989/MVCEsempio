<h1>Lista post inseriti</h1>
<a href="<?=BASE_URL?>admin/post/new">Aggiungi Post</a>
<table class="table">
    <thead>
        <tr>
            <th>Titolo</th>
            <th>Testo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $post): ?>
        <form action="<?=BASE_URL?>admin/post/delete/<?=$post['id']?>" method="post" id="form_<?=$post['id']?>">
            <?=$methodDelete?>
            <input type="hidden" name="id" value="<?=$post['id']?>" />
        </form>
        <tr>
            <td scope="row"><?=$post['titolo']?></td>
            <td><?=$post['testo']?></td>
            <td>
                <a href="<?=BASE_URL?>admin/post/edit/<?=$post['id']?>">Modifica</a> - 
                <a href="javascript:;" onclick="elimina(<?=$post['id']?>)">Elimina</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br /><br />
<a href="<?=BASE_URL?>logout">Logout</a> - 
<a href="<?=BASE_URL?>">Torna Indietro</a>
<script type="text/javascript">
    function elimina(id)
    {
        if(confirm("Sei sicuro di voler eliminare il post?"))
        {
            var form = document.getElementById('form_' + id);
            form.submit();
        }
        
    }
</script>