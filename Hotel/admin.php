<?php 
    // تضمين ملف header.php الذي يحتوي على الجزء العلوي من الصفحة
    include "header.php";
?>

<!-- إنشاء جدول HTML لعرض البيانات -->
<table>
    <!-- تعريف رؤوس الأعمدة في الجدول -->
    <th>الرقم</th>
    <th>اسم العميل</th>
    <th>رقم الهاتف </th>
    <th>التاريخ</th>
<?php 
    // تعريف متغيرات الاتصال بقاعدة البيانات
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbName = "hotel";

    // الاتصال بقاعدة البيانات
    $conn = mysqli_connect($host,$user,$password,$dbName);

    // إنشاء استعلام SQL لاسترجاع جميع البيانات من جدول customer
    $query = "SELECT * FROM customer";
    // تنفيذ الاستعلام وتخزين النتيجة في المتغير $result
    $result = mysqli_query($conn,$query);
    
    // التحقق من نجاح تنفيذ الاستعلام
    if($result){
        // استخدام حلقة while لاسترجاع كل صف من النتائج
        while($row = mysqli_fetch_assoc($result)){
            // طباعة بيانات كل صف في صف جديد داخل الجدول
            echo "<tr><td>".$row['id']."</td><td>".$row['Name']."</td><td>".$row['Number']."</td><td>".$row['Date']."</td></tr>";
        }
        // إغلاق الجدول
        echo "</table>";
    }
?>
