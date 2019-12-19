<?php

/* @var $this yii\web\View */

$this->title = 'หน้าแรก';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>This is the Webbox project.</h2>
    </div>
    <div class='container'>
        <?php
            if(count($data) > 0){
                ?>
                <table class='table table-hover'>
                    <thead>
                        <tr>
                            <th># ลำดับ</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>รหัสผ่าน</th>
                            <th>อีเมลล์</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $index = 1;
                            foreach($data as $item){
                                print '<tr>';
                                    print '<td>'.$index.'</td>';
                                    print '<td>'.$item->username.'</td>';
                                    print '<td>'.$item->password.'</td>';
                                    print '<td>'.$item->email.'</td>';
                                print '</tr>';
                                ++$index;
                            }
                        ?>
                    </tbody>
                </table>
                <?php
            }else{
                ?>
                <hr>
                <h3 class='text-center text-danger'>ไม่พบข้อมูล</h3>
                <hr>
                <?php
            }
        ?>
    </div>
</div>
