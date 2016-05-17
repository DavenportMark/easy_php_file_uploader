/* Upload handler is a starter class, unfinished. That helps you upload files using a form.*/
class UploadHandler {
    
    private $uploaddir = '/var/www/html/public/images';
    private $recursive_file_creation_for_upload_dir = true;
    
    /*
    uploadFile handles all of the details of a regular file upload.
    Needs to be called in the file that is in the action of the form submitting a picture for a normal form
    Form example: 
    <form enctype="multipart/form-data" action="index.php" method="POST">
        <!-- MAX_FILE_SIZE must precede the file input field -->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <!-- Name of input element determines name in $_FILES array -->
        Send this file: <input name="userfile" type="file" />
        <input type="submit" value="Send File" />
    </form>
    Reutrn void;   
    Called:
    uploadHandler::uploadFile();
    */
    public function uploadFile(){
        // make sure that everything is good to go. 
        // Direcotry exists, and other useful details.
        $is_valid = $this->validateUploadRequest();
        if($is_valid){
            $time_obj=time();
            $time_stamp = date("Y-m-d_H:i:s",$time_obj);
            var_dump($_FILES);
            $user_file_name = $_FILES['userfile']['name'];
            $uploadfile = $this->uploaddir . '/' . $time_stamp . '-' . $user_file_name ;
              
            // Attempt the move_uploaded_file
            move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
                              
        }
            
    }
    
    private function validateUploadRequest(){
        $is_valid = false;
        
        // Check if upload directory exists
 
        $upload_dir_exists = (is_dir($this->uploaddir))?true:false;
        $file_made_it = (empty($_FILES['userfile']['name']))?false:true;
        
        
        if($upload_dir_exists && $file_made_it){
        
            $is_valid = true;
         
         }
         else {
             // Fixme: Put in bebtter error reporting
             
             $report = 'Error: <br />';
             if(!$upload_dir_exists){
                $report = $report . ' Your upload directory doesn\'t exist! Please check $uploaddir <br />';
             }
             if(!$file_made_it){
                $report = $report . ' No image arrived, check to see if you submitted a file correctly <br />';
             }
            
             echo $report;
         }
        return $is_valid;
    
    }
    
    private function boolToString($bool){
        $string_of_bool = ($bool) ? 'true' : 'false';
        return $string_of_bool;
    }
    
}

// Create a new object of class Uploadhandler.
// $uploader = new UploadHandler();

// Example: usage
// Call:
// $uploader->uploadFile();
// at the file that in your html form's action