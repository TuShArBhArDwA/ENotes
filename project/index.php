<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload System</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            color: #333;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .upload-container {
            background-color: #fff;
            padding: 30px;
            width: 500px;
            max-width: 600px ;
            height : 500px ;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }

        .upload-container:hover {
            transform: translateY(-10px);
        }

        .upload-container h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #333;
        }

        .upload-container input[type="file"] {
            padding: 10px;
            border: 2px solid #007bff;
            border-radius: 5px;
            width: 100%;
            background-color: #f8f9fa;
            margin-bottom: 15px;
            transition: border-color 0.3s ease;
        }

        .upload-container input[type="file"]:focus {
            border-color: #0056b3;
        }

        .upload-container input[type="submit"] {
            padding: 12px 30px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .upload-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .file-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .file-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .main{
            display: flex;
            /* flex-direction: row; */
            gap: 50px ; 
        }

        .file-item:hover {
            transform: translateY(-5px);
        }

        .file-item span {
            font-size: 1rem;
            color: #333;
        }

        .file-item .buttons {
            display: flex;
            gap: 10px;
        }

        .download-button,
        .delete-button {
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-size: 0.9rem;
            display: inline-block;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .download-button {
            background-color: #28a745;
        }

        .download-button:hover {
            background-color: #218838;
        }

        .delete-button {
            background-color: #e74c3c;
        }

        .delete-button:hover {
            background-color: #c0392b;
        }

        .message {
            font-size: 1rem;
            color: #28a745;
            margin-top: 15px;
        }

        @media (max-width: 600px) {
            .upload-container {
                padding: 20px;
                width: 90%;
            }

            .file-item {
                flex-direction: column;
                text-align: center;
            }

            .file-item .buttons {
                flex-direction: column;
                gap: 5px;
            }

            .download-button,
            .delete-button {
                padding: 8px 12px;
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>

    <h1>File Upload System</h1>

    <div class="main">
    <div class="upload-container">
        <h2>Upload File</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" required>
            <br>
            <input type="submit" name="upload" value="Upload">
        </form>
    </div>

    <div class="upload-container">
        <h2>Uploaded Files</h2>
        <ul class="file-list">
            <?php
            $files = glob("uploads/*");
            if (empty($files)) {
                echo "<p>No files uploaded.</p>";
            } else {
                foreach ($files as $file) {
                    $fileName = basename($file);
                    echo "<li class='file-item'>";
                    echo "<span>$fileName</span>";
                    echo "<div class='buttons'>";
                    echo "<a href='download.php?file=" . urlencode($fileName) . "' class='download-button'>Download</a>";
                    echo "<form action='delete.php' method='POST' style='display:inline;'>
                            <input type='hidden' name='file_name' value='$fileName'>
                            <input type='submit' class='delete-button' value='Delete'>
                          </form>";
                    echo "</div>";
                    echo "</li>";
                }
            }
            ?>
        </ul>
        <?php if (isset($_GET['message'])): ?>
            <p class="message"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php endif; ?>
    </div>
    </div>

</body>
</html>
