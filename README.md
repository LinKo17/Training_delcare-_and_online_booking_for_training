Summary

This is "Training delcare and online booking for training ".It includes both user section and admin section.


Follow the instruction to run this project 

- first your computer must have xampp package (or) if you don't have , download xampp

- put this project folder into C:\xampp\htdocs folder.

- open the project and open commend.

- run this commend

* composer install
* composer dump-autoload

- run the project 
if you don't know how to run do like this.
* localhost/(your project path)

example

localhost/MyProject/Training_delcare _and_online_booking_for_training/

- copy the project url link

- open ( _classess/Helper/HTTP.php ) file and change like this

    static $base = "your project url link"

- Now , let talk about database section

- open ( _classess/Libs/Database/MySQL.php ) you will see like this 

    public function __construct(
        $dbHost = "localhost",
        $dbName = "pratice_school_management_system",
        $dbUser = "root",
        $dbPassword = "",
    ){
        $this->dbHost = $dbHost;
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
    }

- you can change $dbHost,$dbName,$dbUser,$dbPassword by using your own database host,database name ,database user ,database password.

- open php myMyAdmin ( or ) copy http://localhost/dashboard/ on your broswer

- build your own database  and you have to build  11 database table in your database 

(*** you have to exactly follow the instruction to build 11 database table i gave ***).

- click SQL tag and copy and paste step by step

### about_us table

CREATE TABLE about_us (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    about_us TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    hide INT(11) NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NULL
);


### class_posts table

CREATE TABLE class_posts (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    image VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    description TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    category_id INT(11) NOT NULL,
    teacher_id INT(11) NOT NULL,
    class_date VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    class_time VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    open_close VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'open',
    wait VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'not wait',
    created_at DATETIME NOT NULL,
    update_at DATETIME NULL
);

### class_registered_students table

CREATE TABLE class_registered_students  (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    stu_name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    stu_phone_number VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    stu_email VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    stu_address TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    stu_pay_system VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    stu_pay_photo TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    class_open_date VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    class_open_time VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    course VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    batch_id INT(11) NOT NULL,
    teacher_name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    course_fee VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `show` INT(11) DEFAULT 0,
    ad_veri_code VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'not yet',
    re_veri_code VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'not yet',
    registered_done VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'not yet',
    registered_date_time VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'not yet',
    reject INT(11) DEFAULT 0,
    ad_name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

###  courses table

CREATE TABLE  courses  (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    course TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    fee VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    hide INT(11) NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NULL
);

### reject_reasons table

CREATE TABLE reject_reasons  (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    ad_name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    reason_1 VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    reason_2 VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    reason_3 VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    reason_4 VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    reason_5 VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    reason_6 VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    reason_7 VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    ad_reason TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    stu_id INT(11) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NULL
);

### roles table

CREATE TABLE roles  (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    role VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

### social_media table

CREATE TABLE social_media  (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    facebook VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    viber VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    telegram VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    phone_1 VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    phone_2 VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    phone_3 VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    mail VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    mail_2 VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    open_date VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    open_time VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    close_date VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    quote VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    my_address TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    eng_address VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NULL
);

### teachers table

CREATE TABLE  teachers  (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    teacher_img VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    teacher_name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    category_id INT(11) NOT NULL,
    description TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    hide INT(11) NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NULL
);

### user_contents table

CREATE TABLE user_contents  (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    content TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    done INT(11) NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

### user_login table

CREATE TABLE user_login  (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    email VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    password VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    ban INT(11) NOT NULL DEFAULT 0,
    role_id INT(11) NOT NULL DEFAULT 1,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NULL
);


### wait_btn_not_wait_btns table

CREATE TABLE  wait_btn_not_wait_btns  (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    wait_not_wait INT(255) DEFAULT 0,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

- after  all these instruction have done , you can use this project .If you want to look admin section follow these instruction .

- open  database table (user_login) and then change first row of the table (role_id)  to 4 .
- after that login again with first row of the table user .

### Image 
- you can use course image from courses folder and  teacher image from teacher folder .
