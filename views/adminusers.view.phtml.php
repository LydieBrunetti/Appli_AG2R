<?php require(__DIR__ . '/../includes/userlist.php'); ?>

<div class="jumbotron" style="padding:5vw">
    <h1 style="margin-left:37vw;margin-top:2vw;" class="display-5">Gestion d'utilisateurs</h1>
    <div class="table-responsive">
    <form action="includes/usermanager.php" method="POST">
        <table class="table table-bordered table-condensed table-body-center">
            <thead style="background-color:rgba(22, 23, 25,0.2)" >
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Code Confidentiel</th>
                <th scope="col">Event</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody id="addSlotDiv">

            <?php
            foreach ($users as $value) {
                $confCode = htmlentities($value->getConfidentialCode());
                echo "<tr>";
                echo "<td>" . "<input style=\"margin-top:0.4vw;margin-bottom:0.5vw\" type=\"text\" name=\"email_" . $value->getEmail() . "\" value=\"{$value->getEmail()}\" />" . "</td>";
                echo "<td>" . "<input style=\"margin-top:0.4vw;margin-bottom:0.5vw\" type=\"text\" name=\"name_" . $value->getEmail() . "\" value=\"{$value->getName()}\" />" . "</td>";
                echo "<td>" . "<input value=\"{$value->getSurname()}\" style=\"margin-top:0.4vw;margin-bottom:0.5vw\" type=\"text\" name=\"surname_" . $value->getEmail() . "\" />" . "</td>";
                echo "<td>" . "<input readonly style=\"margin-top:0.4vw;margin-bottom:0.5vw;background-color:#dbdee0;opacity:0.67;\" type=\"text\" name=\"confidentialCode_" .$value->getEmail(). "\" value=\"" . trim(htmlentities($value->getConfidentialCode())) . "\"/>" . "</td>";
                echo "<td>" . "<input style=\"margin-top:0.4vw;margin-bottom:0.5vw\" type=\"text\" name=\"event_" . $value->getEmail() . "\" value=\"{$value->getEventRegisteredName($conn)}\" />" . "</td>";
                echo "<td><input role=\"button\" type=\"submit\" name=\"remove_{$value->getName()}\" class=\"btn btn-danger btn-lg\" value=\"Supprimer\"></td>";
                echo "</tr>";
            }
            ?>

            </tbody>
        </table>
        <input role="button" type="submit" name="submit" class="btn btn-primary btn-lg" value="Valider"
               style="float:left;">
    </form>
    <input type="submit" id="addSlot" value="Rajouter" role="button" class="btn btn-primary btn-lg"
           style="margin-left:0.7vw;" onclick="createUserRow()">
    </div>
</div>