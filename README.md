# easy_php_file_uploader
Warning
    Not finished yet!  But a simple file uploader that works with an html form.
Status
    In it's current form you can actually upload a file in a very basic way.
Installation instructions.
    Simply require easy_php_file_uploader.php
Example:
    require('lib/upload_handler.php');
    Create a new instance of the UploadeHandler
    Set upload folder in configuration upload_handler.php using $uploaddir
    Call uploadFile inside of the php file your form's action points to.
    For instance if your form looks like this:
    <form enctype="multipart/form-data" action="index.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
    </form>
    Call uploader from within index.php like so.
    $uploader->uploadFile();
