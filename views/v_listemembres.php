<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
    </tr>
    </thead>
    <tbody>

    <?php 
    foreach($les_membres as $membre)
    { 
        ?>
    <tr>
        <td><?php echo $membre['id'];?> </td>
        <td><?php echo $membre['nom'];?> </td>
        <td><?php echo $membre['prenom'];?> </td>

    </tr>
<?php 
}

?>


    </tbody>
</table>
<ul>
    <li><a href='index.php'>retour accueil</a></li>
</ul>
