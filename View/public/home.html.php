
<h1>Services</h1>

<?php
if (isset($_SESSION['admin'])) {
?>
    <form method="post" action="?c=home">
        <br>
        <div class="add-service">
            <label for="title">Titre :</label>
            <br>
            <input type="text" name="title" id="title">
        </div>
        <div class="add-service">
            <label for="description">Description :</label>
            <br>
            <textarea name="description" id="description" cols="60" rows="5"></textarea>
        </div>
        <input type="submit" name="send" id="send" value="&#10004;">
    </form>
<?php
}