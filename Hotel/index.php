<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helton Hotel</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="main">
            <br><br>
            <div class="reserve">
                <h6 class="title" style="background-color: rgba(255,255,255,0.5);width:60%;margin-right:300px;margin-top:100px;"> Welcome to Helton Hotel</h6>
                <a href="admin.php" ><button>Admin</button></a>
                
                <form action="index.php" method="POST">
                    <input type="text" placeholder="ادخل الاسم" name="name" />
                    <input type="text" placeholder="ادخل رقم الهاتف " name="phone" />
                    <input type="date" name="date" />
                    <input type="submit" value="احجز الآن" name="send" />
                </form>









 <?php
    // تعريف متغيرات للاتصال بقاعدة البيانات
    $host = "localhost"; // الخادم الذي يستضيف قاعدة البيانات
    $user = "root"; // اسم المستخدم لقاعدة البيانات
    $password = ""; // كلمة المرور لقاعدة البيانات
    $dbName = "hotel"; // اسم قاعدة البيانات التي سنتصل بها
    // محاولة الاتصال بقاعدة البيانات
    $conn = mysqli_connect($host, $user, $password, $dbName);

    // التحقق من نجاح الاتصال بقاعدة البيانات
    if ($conn) {
        // التحقق من أن البيانات المطلوبة قد تم إرسالها عبر النموذج
        if (isset($_POST['name'], $_POST['phone'], $_POST['date'], $_POST['send'])) {
            // تنظيف البيانات المرسلة لمنع هجمات الحقن SQL
            $pName = mysqli_real_escape_string($conn, $_POST['name']);
            $pPhone = mysqli_real_escape_string($conn, $_POST['phone']);
            $pDate = mysqli_real_escape_string($conn, $_POST['date']);
            $pSend = $_POST['send']; // زر الإرسال

            // التحقق من ضغط زر الإرسال
            if ($pSend) {
                // إنشاء استعلام SQL لإضافة البيانات إلى جدول customer
                $query = "INSERT INTO customer(Name,Number,Date) VALUES ('$pName','$pPhone','$pDate')";    
                // تنفيذ الاستعلام والحصول على النتيجة
                $result = mysqli_query($conn, $query);
                // التحقق من نجاح تنفيذ الاستعلام
                if ($result) {
                    // إظهار رسالة نجاح الحجز باللون الأخضر
                    echo "<h1 style='color:green'>تم الحجز</h1>";
                } else {
                    // إظهار رسالة خطأ في حالة فشل الاستعلام
                    echo "<h1 style='color:red'>حدث خطأ...حاول مجددا</h1>";
                }
            }
        } 
    } else {
        // إظهار رسالة فشل الاتصال بقاعدة البيانات
        echo "<h1 style='color:red'>لا يمكن الاتصال بقاعدة البيانات</h1>";
    }
?>
            </div>
        </div>
    </div>
</body>

</html>