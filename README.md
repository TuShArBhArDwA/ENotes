# ENotes - Online Notes Sharing Platform  

ENotes is a dynamic platform that facilitates seamless sharing of academic resources. Designed to enhance collaboration among students, it enables users to upload, download, and manage PDF notes efficiently in a secure and user-friendly environment.

---

## Table of Contents  

- [Introduction](#introduction)  
- [Features](#features)  
- [Technologies Used](#technologies-used)  
- [Getting Started](#getting-started)  
  - [Prerequisites](#prerequisites)  
  - [Installation](#installation)  
- [Usage](#usage)  
- [Contributing](#contributing)  
- [License](#license)  
- [Acknowledgements](#acknowledgements)  

---

## Introduction  

ENotes is an online platform where students can easily upload and download PDF files of notes. The system ensures secure file sharing through validation processes and provides an intuitive interface for academic collaboration.

---

## Features  

- **Upload Notes**: Share academic resources by uploading PDF files.  
- **Download Notes**: Access uploaded files with a single click.  
- **File Validation**: Ensure security with size and format restrictions.  
- **Secure Database**: Manage file metadata efficiently using a centralized database.  
- **User-Friendly Interface**: Simplify interactions with an intuitive design.  

---

## Technologies Used  

- **Frontend**: HTML, CSS  
- **Backend**: PHP  
- **Database**: MySQL (managed via PHPMyAdmin)  
- **Development Environment**: XAMPP Server  

---

## Getting Started  

### Prerequisites  

To run this project locally, ensure you have the following installed:  
- **XAMPP Server**  
- **Web Browser**  

### Installation  

1. Clone the repository:  
   ```bash
   git clone https://github.com/TuShArBhArDwA/enotes.git
2. Move the project to the XAMPP htdocs directory:
   ```bash
   mv enotes /path-to-xampp/htdocs/
3. Start the XAMPP server and enable Apache and MySQL.
4. Set up the database:
  - Open PHPMyAdmin and create a database named enotes_db.
  - Import the enotes.sql file from the project folder into the database.
5. Configure database credentials:
  - Edit the dbconfig.php file in the project folder and update with your database details:
    ```php
    <?php
    $servername = "localhost";
    $username = "your-username";
    $password = "your-password";
    $dbname = "enotes_db";
    ?>
6. Access the application:
- Open your browser and navigate to:
   ```arduino
   http://localhost/enotes

## Usage
- Navigate to the homepage to browse available notes.
- Use the upload feature to share PDF notes with the community.
- Download desired files with ease using the download functionality.
- Enjoy a secure and collaborative academic resource-sharing experience.

## Contributing
Contributions are welcome! If you have suggestions or improvements, please submit a pull request or open an issue.

1. Fork the repository.
2. Create your feature branch:
   ```bash
   git checkout -b feature/YourFeature
3. Commit your changes:
   ```bash
   git commit -m 'Add some feature'
4. Push to the branch:
   ```bash
   git push origin feature/YourFeature
5. Open a pull request.


## License
This project is licensed under the MIT License.

## Acknowledgements
- Inspired by the need for seamless academic collaboration.
- Thanks to the open-source community for tools and support.
