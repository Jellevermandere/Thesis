

<!DOCTYPE html>

<html lang="en">
    <head>
        <title></title>
    </head>

    <body>
        <form action="includes/uploadGebouw.php" method="POST" enctype="multipart/form-data">
            <p>Building name: </p>
            
            <input type="text" name="buildingName"  >
            <br>
            <p>Architect: </p>
            
            <input type="text" name="architect" >
            <br>
            <p>Short description: </p>
            
            <textarea name="description">enter short description</textarea>
            <br>
            <p>3d model file: </p>
            
            <input type="file" name="file">
            <br>
            <button type="submit" name="submit">UPLOAD</button>
        </form>

        <form action="includes/uploadArchitect.php" method="POST" enctype="multipart/form-data">
            <p>Architect name: </p>
            
            <input type="text" name="naam"  >
            <br>
            <p>Nationaliteit </p>
            
            <input type="text" name="nationaliteit" >
            <br>

            <p>Birthdate: </p>
            <input type="date" name="geboortedatum" >
            <br>

            <p>Short description: </p>
            
            <textarea name="description">enter short description</textarea>
            <br>
            <p>profile image: </p>
            
            <input type="file" name="file">
            <br>
            <button type="submit" name="submit">UPLOAD</button>
        </form>


    </body>
</html>
    