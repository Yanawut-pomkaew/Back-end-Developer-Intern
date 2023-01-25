<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/32kk6vxxhyshhr5zh8zaqpylqqur8ghyx9676ihz3w4g0qqw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline removeformat forecolor backcolor | align lineheight | link image media table mergetags | spellcheckdialog a11ycheck typography | checklist numlist bullist indent outdent | emoticons charmap | strikethrough',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      
    });
  </script>
    <title>Backend - Assignment</title>
</head>
<body>
    <h1 style="text-align : center;">ตั้งกระทู้ใหม่</h1>

    <form method="post" >

        <div>
            <input name="header" type="text" placeholder="หัวข้อ" style="width:98.2% ;border :1px solid lightgray ; padding : 10px ; margin-bottom : 40px;"> 
        </div>

        <div>
            <textarea name="content" placeholder="ลองแชร์ประสบการณ์ของคุณสิ..."></textarea>
        </div>

        <div style="margin-top : 30px; display : flex ; justify-content : center">
            <button style="background-color : #56DA46; padding : 10px 20px; border : none">ตั้งกระทู้</button>
        </div>
    
    </form>

    <h3 style="text-align : center;margin-top : 50px;margin-bottom : 20px;">กระทู้ที่พึ่งตั้ง</h3>
    <div style="margin-top : 20px; border : 1px solid black; padding : 20px;">

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $headerLen = strlen($_POST["header"]);


        //ดูว่าหัวกระทู้ใส่ tag html มาหรือปล่าว
        $test1 = strlen(strip_tags($_POST["header"]));

    if ($test1 != $headerLen) {
        echo '<script language="javascript">';
        echo "alert('หัวกระทู้ไม่สามารถใส่ HTML ได้')";  
        echo '</script>';
        exit;
    }

    if ( $headerLen < 4 || $headerLen > 140) {  
        echo '<script language="javascript">';
        echo "alert('หัวกระทู้จะตั้งมีความยาวตั้งแต่ 4-140 ตัวอักษร')";  
        echo '</script>';
        exit;
    }

    //ดูว่าเนื้อหามีน้อยกว่า 6 ตัวอักษร หรือมีมากกว่า 2000 ตัวอักษรไหม
    $contentLen = strlen($_POST["content"]);
    if ( $contentLen < 13 || $contentLen > 2007) {  
        echo '<script language="javascript">';
        echo "alert('เนื้อหากระทู้จะตั้งมีความยาวตั้งแต่ 6-2000 ตัวอักษร')";  
        echo '</script>';
        exit;
    }

    }
    ?>
    
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

       
        <div style="font-weight : bold ; font-size : 40px; text-align : center"><?= $_POST['header'] ?></div>
        
        <div><?= htmlspecialchars_decode($_POST["content"]) ?></div>

    <?php endif; ?>

    </div>
    
</body>
</html>