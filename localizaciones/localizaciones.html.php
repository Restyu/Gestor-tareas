<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Localizaciones</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.css">

	<style>
	
	.localizacion{
		display: inline-block;
	}
	

	</style>


</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-1 col-lg-9">
				<div class="row">
					<div class="col-lg-8">
						<h1><a href="<?=$base_url?>">Tareas</a></h1>
						<h2>Localizaciones</h2>
					</div>
				</div>

				<?php if ( !empty($localizaciones) ): ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>localizacion</th>
							<th>latitud</th>
							<th>longitud</th>
							<th>Eliminar</th>
						</tr>	
					</thead>

					<tbody>
						<?php foreach($localizaciones as $loca): ?>

						<tr>
							<td><?=$loca['name']?></td>
							<td><?=$loca['lat']?></td>
							<td><?=$loca['lon']?></td>
							<td>
								<form action="?borrarlocalizacion" method="post">
									<input type="hidden" name="idlocalizacion" value="<?=$loca['id']?>">
									<button type="submit" class="btn btn-link btn-sm listiconbutton"><i class="glyphicon glyphicon-trash"></i></button>
								</form>
							</td>
						</tr>

						<?php endforeach; ?>
					</tbody>
						
				</table>

				<?php endif ?>	

				<form action="?nuevalocalizacion" method="POST">
					<div class="form-group">

						<div class="form-group col-xs-12 col-lg-4">
							<input class="form-control" type="text" name="localizacion" placeholder="localizacion" value="<?php if (isset($localizacion)) echo $localizacion; ?>">
						</div>
						<div class="form-group col-xs-12 col-lg-3">
							<input class="form-control" type="text" name="latitud" placeholder="latitud" value="<?php if (isset($latitud)) echo $latitud; ?>">
						</div>
						<div class="form-group col-xs-12 col-lg-3">
							<input class="form-control" type="text" name="longitud" placeholder="longitud" value="<?php if (isset($longitud)) echo $longitud; ?>">
						</div>
						<div class="form-group col-xs-12 col-lg-2">
							<button class="btn btn-info" type="submit">enviar</button>
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>