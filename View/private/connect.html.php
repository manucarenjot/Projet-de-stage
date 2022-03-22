<?php

?>

<br><br>

<form method="post" action="/index.php?c=connect&a=login">
    <table>
        <tr>
            <td>
                <label for="mail">Adresse e-mail :</label>
            </td>
            <td>
                <input type="email" name="mail" id="mail">
            </td>
        </tr>
        <tr>
            <td>
                <label for="password">Password :</label>
            </td>
            <td>
                <input type="password" name="password" id="password">
            </td>
        </tr>
        <tr>
            <td align="right">

            </td>
            <td>
                <input type="submit" name="send" id="send">
            </td>
            <td>
                <a href="">Mot de passe oublié</a>
            </td>
        </tr>



    </table>

</form>
