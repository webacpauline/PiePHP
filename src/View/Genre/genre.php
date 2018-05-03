<!--<?php //echo $_SESSION['in'];?>-->

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