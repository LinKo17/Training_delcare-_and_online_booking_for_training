<?php 
include("../../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersContentTable;
use Helper\HTTP;

$content = htmlspecialchars($_POST["content"]);
$gmail = htmlspecialchars($_POST["gmail"]);

// ------- check regular expression content
function content($content){

        if(preg_match('/^.{1,}$/',$content)){
            return $content;
        }else{
            session_start();
            $_SESSION["send_fail"] = "Please check your Content.";
            HTTP::redirect("/others/contact_us.php"); 
        }
    }

// ------- check regular expression content


// ------- check regular expression email

function gmail($gmail){
    if(preg_match("/^.{1,}@gmail.com$/",$gmail)){
        return $gmail;
    }else{
        session_start();
        $_SESSION["send_fail"] = "Please check your Gmail.";
        HTTP::redirect("/others/contact_us.php"); 
    }
}
// ------- check regular expression email

$checkContent = content($content);
$checkGmail = gmail($gmail);



$database = new UsersContentTable(new MySQL());
echo "<br>";
if(isset($checkContent) && isset($checkGmail)){
    $send = $database->insertUsersContent($checkContent,$checkGmail);
    if($send){
        session_start();
        $_SESSION["send_success"] = "You have send a mail to Admin.We will reply your mail later.";
        HTTP::redirect("/others/contact_us.php");
    }else{
        session_start();
        $_SESSION["send_fail"] = "You haven't send a mail to Admin.Please check again.";
        HTTP::redirect("/others/contact_us.php"); 
    }

}else{
    session_start();
    $_SESSION["send_fail"] = "You haven't send a mail to Admin.Please check again.";
    HTTP::redirect("/others/contact_us.php"); 
}

