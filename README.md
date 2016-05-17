# easy_php_file_uploader
# Warning
Not finished yet!  But a simple file uploader that works with an html form.
# Status
In it's current form you can actually upload a file in a very basic way.
# Installation instructions.
Simply require easy_php_file_uploader.php

```  require('easy_php_file_uploader.php'); ```
# Example:
Create a new instance of the UploadeHandler
    
Set upload folder in configuration upload_handler.php using $uploaddir
like so:
```$uploaddir = 'public/files/funny/images' ```

Call uploadFile inside any php file that has access to ```$_FILES``` inside of the ```$_POST``` array.

To handle the file upload simply call
``` $uploader->uploadFile(); ```
