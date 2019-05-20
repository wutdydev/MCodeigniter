<?php
function convest_br($string) {
    $string = str_replace(",", '</br>', $string);
    return $string;
}

function trimvb($string) {
    $text = trim($string);
    $text = str_replace(" ", ',', $text);
    return $text;
}

function conv_date($date,$count) {//543 or 0
    list($Yv1, $mv1, $dv1) = explode('-', $date);
    $Yv1 = $Yv1 + count;
    return "$dv1/$mv1/$Yv1";
}


function convdate_null($date) {
    if ($date == null) {
        $date = "";
    } else {
        list($Yv1, $mv1, $dv1) = explode('-', $date);
        $Yv1 = $Yv1 + 543;
        $date = "$dv1/$mv1/$Yv1";
    }
    return $date;
}

function alertjsc($data) {
    echo "<script>
                  alert('" . $data['name'] . "');
                  window.close(0);
                  </script>"; //แสดง alert และเด้งกลับไปที่หน้าเดิม
}

function alertjs($data) {
    echo "<script>
                  alert('" . $data['name'] . "');
                  window.location.href='" . $data['base'] . "';
                  </script>"; //แสดง alert และเด้งกลับไปที่หน้าเดิม
}


function empt_fm($num) {
    if (!empty($num)) {
        $num = number_format($num, 3);
        list($whole, $decimal) = explode('.', $num);    // results in 3
        $new_number = $whole . ($decimal > 0 ? "." . $decimal : '');
        return $new_number;
    } else {
        return 0;
    }
}

function empt_fm2($num) {
    if (!empty($num)) {
        $num = number_format($num, 2);
        list($whole, $decimal) = explode('.', $num);    // results in 3
        $new_number = $whole . ($decimal > 0 ? "." . $decimal : '');
        return $new_number;
    } else {
        return 0;
    }
}

function convert_thai($number) {
    $txtnum1 = array('ศูนย์', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า', 'สิบ');
    $txtnum2 = array('', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน');
    $number = str_replace(",", "", $number);
    $number = str_replace(" ", "", $number);
    $number = str_replace("บาท", "", $number);
    $number = explode(".", $number);
    if (sizeof($number) > 2) {
        return 'ทศนิยมหลายตัวนะจ๊ะ';
        exit;
    }
    $strlen = strlen($number[0]);
    $convert = '';
    for ($i = 0; $i < $strlen; $i++) {
        $n = substr($number[0], $i, 1);
        if ($n != 0) {
            if ($i == ($strlen - 1) AND $n == 1) {
                $convert .= 'เอ็ด';
            } elseif ($i == ($strlen - 2) AND $n == 2) {
                $convert .= 'ยี่';
            } elseif ($i == ($strlen - 2) AND $n == 1) {
                $convert .= '';
            } else {
                $convert .= $txtnum1[$n];
            }
            $convert .= $txtnum2[$strlen - $i - 1];
        }
    }

    $convert .= 'บาท';
    if ($number[1] == '0' OR $number[1] == '00' OR
            $number[1] == '') {
        $convert .= 'ถ้วน';
    } else {
        $strlen = strlen($number[1]);
        for ($i = 0; $i < $strlen; $i++) {
            $n = substr($number[1], $i, 1);
            if ($n != 0) {
                if ($i == ($strlen - 1) AND $n == 1) {
                    $convert .= 'เอ็ด';
                } elseif ($i == ($strlen - 2) AND
                        $n == 2) {
                    $convert .= 'ยี่';
                } elseif ($i == ($strlen - 2) AND
                        $n == 1) {
                    $convert .= '';
                } else {
                    $convert .= $txtnum1[$n];
                }
                $convert .= $txtnum2[$strlen - $i - 1];
            }
        }
        $convert .= 'สตางค์';
    }
    return $convert;
}

function datestr($date_s, $date_e) {
    list($y, $m, $d) = explode('-', $date_s);
    list($yy, $mm, $dd) = explode('-', $date_e);

    switch ($m) {
        case "01":
            $m_thai = "มกราคม";
            break;
        case "02":
            $m_thai = "กุมภาพันธ์";
            break;
        case "03":
            $m_thai = "มีนาคม";
            break;
        case "04":
            $m_thai = "เมษายน";
            break;
        case "05":
            $m_thai = "พฤษภาคม";
            break;
        case "06":
            $m_thai = "มิถุนายน";
            break;
        case "07":
            $m_thai = "กรกฎาคม";
            break;
        case "08":
            $m_thai = "สิงหาคม";
            break;
        case "09":
            $m_thai = "กันยายน";
            break;
        case "10":
            $m_thai = "ตุลาคม";
            break;
        case "11":
            $m_thai = "พฤศจิกายน";
            break;
        case "12":
            $m_thai = "ธันวาคม";
            break;
    }

    switch ($mm) {

        case "01":
            $m_thai2 = "มกราคม";
            break;
        case "02":
            $m_thai2 = "กุมภาพันธ์";
            break;
        case "03":
            $m_thai2 = "มีนาคม";
            break;
        case "04":
            $m_thai2 = "เมษายน";
            break;
        case "05":
            $m_thai2 = "พฤษภาคม";
            break;
        case "06":
            $m_thai2 = "มิถุนายน";
            break;
        case "07":
            $m_thai2 = "กรกฎาคม";
            break;
        case "08":
            $m_thai2 = "สิงหาคม";
            break;
        case "09":
            $m_thai2 = "กันยายน";
            break;
        case "10":
            $m_thai2 = "ตุลาคม";
            break;
        case "11":
            $m_thai2 = "พฤศจิกายน";
            break;
        case "12":
            $m_thai2 = "ธันวาคม";
            break;
    }
    $y = $y + 543;
    $yy = $yy + 543;

    if ($m == $mm) {
        if ($d == $dd) {
            $date_print = $d . ' ' . $m_thai . ' ' . $y;
        } else {
            $date_print = $d . '-' . $dd . ' ' . $m_thai . ' ' . $y;
        }
    } else {
        $date_print = $d . ' ' . $m_thai . ' ' . $y . " - " . $dd . ' ' . $m_thai2 . ' ' . $yy;
    }

    return $date_print;
}

function str_dmonth($date) {
    list($y, $m, $d) = explode('-', $date);
    switch ($m) {
        case "01":
            $m = "มกราคม";
            break;
        case "02":
            $m = "กุมภาพันธ์";
            break;
        case "03":
            $m = "มีนาคม";
            break;
        case "04":
            $m = "เมษายน";
            break;
        case "05":
            $m = "พฤษภาคม";
            break;
        case "06":
            $m = "มิถุนายน";
            break;
        case "07":
            $m = "กรกฎาคม";
            break;
        case "08":
            $m = "สิงหาคม";
            break;
        case "09":
            $m = "กันยายน";
            break;
        case "10":
            $m = "ตุลาคม";
            break;
        case "11":
            $m = "พฤศจิกายน";
            break;
        case "12":
            $m = "ธันวาคม";
            break;
    }
    return $d."/ ".$m." / ".$y;
}


?>