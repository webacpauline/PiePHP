<!--<?php //echo $_SESSION['in'];?>-->

<h2>Détails du film</h2>
<table>
	<tr>
		<th>Titre</th>
		<th>Genre</th>
		<th>Resum</th>
		<th>Date</th>
		<th>Duration</th>
	</tr>
	<?php foreach ($elements as $element): ?>
 	<tr>
 		<td class="td"> <?php echo htmlspecialchars($element['titre'])?> </td>
 		<td class="td2"> <?php echo htmlspecialchars($element['nom'])?> </td>
 		<td class="td2"> <?php echo htmlspecialchars($element['resum'])?> </td>
 		<td class="td2"> <?php echo htmlspecialchars($element['annee_prod'])?> </td>
 		<td class="td2"> <?php echo htmlspecialchars($element['duree_min'])?> </td>
 	</tr>
 	<?php endforeach; ?>
</table>

<h2>Modifier un film</h2>
<form method="POST" action="/PiePHP/FilmController/updateAction">
	<label>Titre du film </label><br>
	<input type="text" name="filmname"></><br>
	<label>Nouveau genre</label><br>
	<input type="text" name="changegenre"></><br>
	<label>Nouveau résumé</label><br>
	<input type="text" name="changeresum" size=50></><br>
	<input type="submit" value="modify" class="button"></><br>
</form><br>