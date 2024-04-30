<form action="index.php?uc=gerer&action=controlesupprimer_membre" method = "POST">
  <select name="id" size="1">  
  <option value="" selected>Selectionner un membre </option>
<?php foreach($les_membres as $k=>$membre): ?>
  <option value="<?php echo $membre['id'];?>"><?php echo $membre['prenom'];?>  <?php echo $membre['nom'];?></option>
<?php endforeach ?>
</select>
<button type="submit" class="btn btn-primary">Supprimer le membre</button>

</form>

<?php
            