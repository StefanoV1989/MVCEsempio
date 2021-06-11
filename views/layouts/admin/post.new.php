<h1>Nuovo Post</h1>

<form action="<?=BASE_URL?>admin/post/new" method="post">

    <p>Titolo:<br />
    <input type="text" name="titolo" id="titolo"></p>

    <p>Testo:<br />
    <textarea name="testo" id="testo" cols="50" rows="10"></textarea></p>

    <p><input type="submit" value="Aggiungi"></p>

</form>