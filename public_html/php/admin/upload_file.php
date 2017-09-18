<?php
    require "admin_functions.php";

    // Set size limits and allowed amoutn of uploads
    ini_set('post_max_size', '40M');
    ini_set('upload_max_filesize', '40M');
    ini_set('max_file_uploads', 10);

    $table = $_GET['table'];
    $type = $_GET['type'];
    $dir = $_GET['dir'];

    // Security checks
    $size = $_FILES[$type]["size"];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $_FILES[$type]['tmp_name']);

    $uploaded_file = $_FILES[$type]["name"];

    $target = "../../../Uploads/" . $dir . "/" . $uploaded_file;
    $file_type = pathinfo($uploaded_file, PATHINFO_EXTENSION);

    // Check that the user selected a file to upload
    if (empty($_FILES[$type]['name'])) {
        echo "<script type='text/javascript'>alert('Please select a file to upload.')</script>";
    }

    elseif ($size > 5242880) {
        echo "<script type='text/javascript'>alert('File size exceeds the allowable limit..')</script>"; 
    }

    // Check if the file already exists
    elseif (check_if_file_exists($table, $uploaded_file))
    {         
        echo "<script type='text/javascript'>alert('File $uploaded_file already exists. Please rename the file and try again.')</script>";
    }

    // Allow only PDF file formats, Part 1
    elseif($mime_type != 'application/pdf') {
        echo "<script type='text/javascript'>alert('Unsupported MIME type.')</script>";
    }

    // Allow only PDF file formats, Part 2
    elseif($file_type != "pdf") {
        echo "<script type='text/javascript'>alert('Only PDF files are able to be uploaded.')</script>";
    }

    // Try to upload the file
    elseif (move_uploaded_file($_FILES[$type]["tmp_name"], $target)) {

        if (add_file_to_database($table, $uploaded_file, $target)) {
            echo "<script type='text/javascript'>alert('$uploaded_file was successfully uploaded')</script>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('$uploaded_file was NOT uploaded successfully')</script>";
        }
    }
    else {
        echo "<script type='text/javascript'>alert('$uploaded_file was NOT uploaded successfully')</script>";
    }
    
    header('refresh: 0; URL=../../Admin.php');
?>