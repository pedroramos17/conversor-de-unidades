<?php
    require_once 'UnitType.php';
    require_once 'Conversor.php';

    $conversor = new Conversor();

    if(isset($_POST['value']) && isset($_POST['from']) && isset($_POST['to'])) {
        if(empty($_POST['value']) || empty($_POST['from']) || empty($_POST['to'])) {
            header('Location: /');
            die();
        }
        $conversor->convert($_POST['value'], $_POST['from'], $_POST['to']);
        $meters = $conversor->convertToMeters($conversor->getFrom());
        $result = $conversor->convertFromMeters($conversor->getTo());
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Conversor de Unidades</title>

		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500&family=Roboto:wght@400;700&display=swap"
			rel="stylesheet"
		/>
		<script src="https://cdn.tailwindcss.com"></script>
		<script>
			tailwind.config = {
				theme: {
					fontFamily: {
						sans: ["Roboto", "sans-serif"],
					},
				},
			};
		</script>
		<style type="text/tailwindcss">
			label {
				@apply mb-2 font-bold;
			}

			input,
			select {
				@apply p-2 border border-gray-200 rounded-sm;
			}
		</style>
	</head>
	<body
		class="min-h-screen w-full flex flex-col justify-center items-center font-sans"
	>
		<div
			class="w-1/2 px-6 py-8 bg-white rounded-sm drop-shadow-xl border border-gray-200"
		>
			<h1 class="text-2xl text-center font-bold">
            Conversor de Unidades
			</h1>

			<form action="" method="post" class="flex flex-col gap-2">
				<label for="value">Digite a quantidade:</label>
				<input type="number" name="value" id="value" />

				<label for="from">De:</label>
				<select name="from" id="from">
					<option value="<?php echo Unit::METERS->value ?>">Metros</option>
					<option value="<?php echo Unit::KILOMETERS->value ?>">Quilômetros</option>
					<option value="<?php echo Unit::CENTIMETERS->value ?>">Centímetros</option>
					<option value="<?php echo Unit::MILIMETERS->value ?>">Milímetros</option>
				</select>

                <label for="to">Para:</label>
				<select name="to" id="to">
					<option value="<?php echo Unit::METERS->value ?>">Metros</option>
					<option value="<?php echo Unit::KILOMETERS->value ?>">Quilômetros</option>
					<option value="<?php echo Unit::CENTIMETERS->value ?>">Centímetros</option>
					<option value="<?php echo Unit::MILIMETERS->value ?>">Milímetros</option>
				</select>

				<button
					type="submit"
					class="my-4 px-4 py-2 bg-green-600 rounded-sm text-white"
				>
					Converter
				</button>
			</form>
			<div class="flex flex-col gap-2">
				<label for="tip">Resultado:</label>
				<input type="text" disabled
				value=" <?php echo $result?>" />
			</div>
		</div>
	</body>
</html>