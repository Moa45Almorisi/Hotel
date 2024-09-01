<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helton Hotel</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background-image: none;
        }
    </style>

<?php 
// يتحقق هذا الشرط إذا كانت طريقة الطلب هي POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // تعريف دالة remove
    function remove(){
        // يتحقق هذا الشرط إذا تم إرسال متغير id عبر النموذج
        if (isset($_POST['id'])) {
            // تخزين قيمة id المرسلة في متغير x
            $x = $_POST['id'];
            // تعريف متغيرات الاتصال بقاعدة البيانات
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbName = "hotel";
        
            // إنشاء اتصال بقاعدة البيانات
            $conn = mysqli_connect($host,$user,$password,$dbName);
            // التحقق من نجاح الاتصال
            if ($conn) {
                // إعداد استعلام SQL لحذف العميل بناءً على id
                $st = $conn->prepare("DELETE FROM `customer` WHERE id = ?");
                // ربط المتغير x بالاستعلام
                $st->bind_param('i',$x);
                // تنفيذ الاستعلام
                if ($st->execute()) {
                    // إذا تم تنفيذ الاستعلام بنجاح، يتم عرض هذه الرسالة
                    echo "<h2 style='text-align:center'>تم حذف المستخدم بنجاح</h2>";
                } else {
                    // إذا فشل تنفيذ الاستعلام، يتم عرض هذه الرسالة
                    echo "<h2 style='color:red'>حدث خطأ أثناء الحذف</h2>";
                }
                // إغلاق الاستعلام
                $st->close();
            } else {
                // إذا فشل الاتصال بقاعدة البيانات، يتم عرض هذه الرسالة
                echo "<h2 style='color:red'>لا يمكن الاتصال بقاعدة البيانات</h2>";
            }
        } else {
            // إذا لم يتم إرسال متغير id، يتم عرض هذه الرسالة
            echo "<h2 style='color:red'>لم يتم إرسال الID</h2>";
        }
    }
    // استدعاء دالة remove
    remove();
}
?>


</head>
<body>
  <div class="main">
    
   <div style="text-align:center;border-style: solid;padding:20px;">
      <h2 >حذف مستخدم</h2>  

       <form action="admin.php" method="POST" style="text-align:center;">
         ادخل الID <input type="text" name="id">
         <input type="submit" value="حذف">
       </form><hr><br>

   
    </div>
    
 </body>

</html>