<?php
$test = 'Jj';

if(ctype_upper($test[0])) {
    echo ' GOOD';
} else {
    echo ' Not GOOD';
}
?>

<form method="POST">
        <table align="center">
            <tr>
                <td align="right">
                    <label for="pseudo">
                        <b>Pseudo :</b>
                    </label>
                </td>
                <td>
                    <?php echo($infosUser['pseudo']); ?>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="email">
                        <b>Adresse Email :</b>
                    </label>
                </td>
                <td align="right">
                    <?php echo($infosUser['email']); ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="right">
                    <input type="submit" value="Éditer mon profil" name="editionProfil"/>
                </td>
            </tr>
        </table>
    </form>