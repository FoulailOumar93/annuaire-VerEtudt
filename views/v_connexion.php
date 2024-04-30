<h2>Identification utilisateur</h2>


<form method="POST" action="index.php?uc=connexion&action=valideConnexion">


    <p>
        <label class="form-label">Login*</label>
        <input class="form-control" id="login" type="text" name="login" size="30" >
    </p>
    <p>
        <label  class="form-label">Mot de passe*</label>
        <input class="form-control" id="mdp" type="password" name="mdp" size="30">
    </p>
    <input class="btn btn-primary" style="background-color:grey;" type="submit" value="Valider" name="valider">
    <input class="btn btn-primary" style="background-color:grey;" type="reset" value="Annuler" name="annuler">

</form>

