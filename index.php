<html>

<head>
    <title>Multiple File Upload Using PHP</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data" id="frm">
        <h2>Upload Multiple Files Using PHP</h2>
        <label for="fselect">Select Files to Upload:</label>&nbsp;&nbsp;
        <input type="file" name="file[]" id="file" multiple="multiple"><br><br>
        <input type="submit" name="sub" value="Submit">
    </form>

    <?php
    if (isset($_POST["sub"])) {
        if (count($_FILES['file']['name']) > 0) {     // Count of files is greater than 0 means...
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {  // this loop counts the no of file ($i<count)=>(0<1)...it will increments
                $tmp = $_FILES['file']['tmp_name'][$i];  // to store the files in temporary name with the count
                if ($tmp != "") {    // temporary variable is not equal to null ...so there is a value
                    $name = $_FILES['file']['name'][$i];   // To get the name of the file
                    $path = "Files/" . $_FILES['file']['name'][$i];   //It determines the folder(Files folder) path
                    if (move_uploaded_file($tmp, $path)) {     // from the temporary name ,it is moved to original destination folder(Folder Name:Files)
                        $files[] = $name;    // File names is stored in $files(array variable)
                    }
                }
            }
        }
        if (is_array($files)) {  // if $files is a array variable then it uploads the files
            echo "Uploaded Files Successfully";
        }
    }
    ?>

</body>

</html>