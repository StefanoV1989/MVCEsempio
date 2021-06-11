<h1>Modifica Post #</h1>
<form action="<?=BASE_URL?>admin/post/edit/<?=$data['id']?>" method="post">

    <?=$methodPatch?>

    <p>Titolo:<br />
    <input type="text" name="titolo" id="titolo" value="<?=$data['titolo']?>"></p>

    <p>Testo:<br />
    <textarea name="testo" id="testo" rows="10" cols="50"><?=$data['testo']?></textarea></p>

    <p><input type="submit" value="Modifica"></p>

</form>