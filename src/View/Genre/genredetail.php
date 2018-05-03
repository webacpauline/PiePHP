<!--<?php //echo $_SESSION['in'];?>-->

<table>
	<tr>
		<th>Titre</th>
		<th>Genre</th>
		<th>Resum</th>
		<th>Date</th>
		<th>Duration</th>
	</tr>
	@foreach ($elements as $element)
 	<tr>
 		<td class="td">{{$element['titre']}}</td>
 		<td class="td2">{{$element['nom']}}</td>
 		<td class="td2">{{$element['resum']}}</td>
 		<td class="td2">{{$element['annee_prod']}}</td>
 		<td class="td2">{{$element['duree_min']}}</td>
 	</tr>
 	@endforeach 
</table>