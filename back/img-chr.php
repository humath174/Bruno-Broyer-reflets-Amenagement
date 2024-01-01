<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploader une Photo</title>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="image">Sélectionnez une photo :</label>
    <input type="file" name="image" id="image">
    <input type="submit" value="Envoyer">
</form>

</body>
</html>
