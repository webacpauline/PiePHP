<!--<?php //echo $_SESSION['in'];?>-->

<h2>Films</h2>
@foreach ($elements as $element)
<form method="POST" action="/PiePHP/FilmController/detailAction">
	<input class="films" type="submit" name ="title" value="{{$element['titre']}}"></input>
</form>
@endforeach 