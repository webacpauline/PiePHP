<a class="logout" href="/PiePHP/"> &#128274; Log out</a>
<form method="POST" action="/PiePHP/FilmController/filmAction">
	<input type="submit" value="Films" class="bigbutton"></>
</form>

<div class="profil">
	<h2>Profil</h2>
	<p>Bienvenue  <?php echo htmlspecialchars($member['email'])?>  sur votre compte</p>
	<p>votre password est <strong> <?php echo htmlspecialchars($member['password'])?> </strong</p>
</div>
<?php if (count($member) === 1): ?>
<?php elseif (count($member) > 1): ?>
<?php else: ?>
<?php endif; ?>

<?php if (isset($member)): ?>
<!-- $records is defined and is not null... -->
<?php endif; ?>

<?php if (empty($member)): ?>
<!-- $records is "empty"... -->
<?php endif; ?>
<div class="bloc">
	<h2>Modifier son compte</h2>
	<form method="POST" action="/PiePHP/userController/updateAction">
		<label>Login </label><br>
		<input type="email" name="email" size=30></><br>
		<label>Nouveau login </label><br>
		<input type="email" name="newemail" size=30></><br>
		<label>Password </label><br>
		<input type="password" name="password"/><br>
		<label>Nouveau password </label><br>
		<input type="password" name="newpassword"/><br>
		<input type="submit" value="modify" class="button"></>
	</form>
</div>
<div class="bloc">
	<h2>Supprimer son compte</h2>
	<form method="POST" action="/PiePHP/userController/deleteAction">
		<label>Login </label><br>
		<input type="email" name="email" size=30></><br>
		<label>Password </label><br>
		<input type="password" name="password"/><br>
		<input type="submit" value="delete" class="button"></>
	</form>
</div>
<div class="bloc">
	<h2>Gerer les genres</h2>
	<form method="POST" action="/PiePHP/genreController/listAction">
		<label>Lister les films d'un genre </label><br>
		<input type="text" name="search"></>
		<input type="submit" value="go" class="button" />
	</form><br>
	<form method="POST" action="/PiePHP/genreController/addAction">
		<label>Ajouter un genre </label><br>
		<input type="text" name="newgenre"></>
		<input type="submit" value="enter" class="button"></>
	</form><br>
	<form method="POST" action="/PiePHP/genreController/deleteAction">
		<label>Supprimer un genre </label><br>
		<input type="text" name="supressgenre"></>
		<input type="submit" value="delete" class="button"></>
	</form><br>
</div>
<div class="bloc">
	<h2>Modifier un genre</h2>
	<form method="POST" action="/PiePHP/genreController/updateAction">
		<label>Genre</label><br>
		<input type="text" name="oldgenre"></><br>
		<label>Nouveau genre </label><br>
		<input type="text" name="modifygenre"></><br>
		<input type="submit" value="modify" class="button"></>
	</form><br>
</div>
<div class="bloc">
	<h2>Ajouter un film</h2>
	<form method="POST" action="/PiePHP/FilmController/addAction">
		<label class="align">Genre </label>
		<input type="text" name="filmgenre"></><br>
		<label class="align">Distributeur </label>
		<input type="text" name="filmdistrib"></><br>
		<label class="align">Titre </label>
		<input type="text" name="filmtitle"></><br>
		<label class="align">Résumé </label>
		<input type="text" name="filmresum"></><br>
		<label class="align">Début affiche </label>
		<input type="text" name="filmdeb"></><br>
		<label class="align">Fin affiche </label>
		<input type="text" name="filmend"></><br>
		<label class="align">Durée </label>
		<input type="text" name="filmmin"></><br>
		<label class="align">Année de prod</label>
		<input type="text" name="filmprod"></><br>
		<input type="submit" value="enter" class="button"></><br>
	</form><br>
</div>
<div class="bloc">
	<h2>Supprimer un film</h2>
	<form method="POST" action="/PiePHP/FilmController/deleteAction">
		<label>Titre du film </label><br>
		<input type="text" name="supressfilm"></>
		<input type="submit" value="delete" class="button"></><br>
	</form><br>
</div>