<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Msalev extends CI_Model {

    /*public function list_company() {
        $sql = "";
        return $this->db->query($sql)->result();
    }*/

    /*public function query_exvb_show($code) {
        $sql = "select * from export_detail_test where ex_detail_ex = 1 and ex_code = '$code' ";
        return $this->db->query($sql)->result_array();
    }*/

    /*public function query_line_request($data) {

        $sql = "insert into `sv_line_request`(`slr_type`, `slr_emp`, `slr_id`, `slr_code`, `slr_status`, `slr_detail`) VALUES
                ('" . $data['slr_type'] . "','" . $this->session->userdata('employee_id') . "','" . $data['slr_id'] . "','" . $data['slr_code'] . "','" . $data['slr_status'] . "','" . $data['slr_detail'] . "')";
        $this->db->query($sql);
        return $this->db->insert_id();
    }*/

    /*public function query_paper_order_ppo_edit($type, $id) {
        $sql = "update paper_order set ppo_edit = '$type' WHERE ppo_id='$id' ";
        $this->db->query($sql);
    }*/

    /*public function customer_ins($data) {

        $sql = "insert into `customer`(`status_cus`, `type_cus`, `deduction`, `vat7`, `code`
                                , `cust_id`, `cus_name`, `cus_fristname`
                                , `cus_lastname`, `cus_tower`, `cus_tel`, `cus_fax`, `cus_email`
                                , `cus_type_address`, `cus_prefix`, `cus_address`
                                , `cus_building`, `cus_room`, `cus_floor`, `cus_number`
                                , `cus_swine`, `cus_alley`, `cus_road`, `cus_sub_district`, `cus_district`
                                , `cus_province`, `cus_zipcode`, `cus_taxno`, `cus_namebuy`, `cus_telbuy`
                                , `cus_nameaccount`, `cus_telaccount`, `cus_bill`, `credit_type`, `condate`, `condate_detail`
                                , `cus_detail`, `type_company`, `company`, `status`, `cus_set1`) VALUES
                ('$_POST[status_cus]','$_POST[type_cus]','$_POST[deduction]','$_POST[vat7]','$_POST[status_cus]$_POST[type_cus]$_POST[deduction]$_POST[vat7]'
                ,'$_POST[cus_title]','" . htmlspecialchars($_POST['cus_name'], ENT_QUOTES) . "','" . htmlspecialchars($data['frist_name'], ENT_QUOTES) . "'
                ,'" . htmlspecialchars($data['frist_name'], ENT_QUOTES) . "','" . htmlspecialchars($_POST['cus_tower'], ENT_QUOTES) . "','$_POST[cus_tel]','$_POST[cus_fax]','" . htmlspecialchars($_POST['cus_email'], ENT_QUOTES) . "'
                ,'$_POST[cus_type_address]','$_POST[cus_prefix]','" . htmlspecialchars($_POST['cus_address_ex'], ENT_QUOTES) . "'
                ,'" . htmlspecialchars($_POST['cus_building'], ENT_QUOTES) . "','$_POST[cus_room]','$_POST[cus_floor]','$_POST[cus_number]'
                ,'$_POST[cus_swine]','$_POST[cus_alley]','$_POST[cus_road]','$_POST[cus_sub_district]','$_POST[cus_district]'
                ,'" . htmlspecialchars($_POST['cus_province'], ENT_QUOTES) . "','$_POST[cus_zipcode]','$_POST[cus_taxno]','$_POST[cus_namebuy]','$_POST[cus_telbuy]'
                ,'$_POST[cus_nameaccount]','$_POST[cus_telaccount]','" . htmlspecialchars($_POST['cus_bill'], ENT_QUOTES) . "','$_POST[credit_type]','$_POST[condate]','" . htmlspecialchars(str_replace("\n", "<br>", "$_POST[condate_detail]"), ENT_QUOTES) . "'
                ,'" . htmlspecialchars(str_replace("\n", "<br>", "$_POST[cus_detail]"), ENT_QUOTES) . "','" . $this->session->userdata('bu') . "','" . $this->session->userdata('company') . "','1','$_POST[optradio]')";
        $this->db->query($sql);

        return array("id" => $id = $this->db->insert_id()
            , "warn" => ($this->db->affected_rows() >= 1) ? true : false);
    }*/


    /*public function query_customer_list($data) {
        $sql = "SELECT tb2.company_img AS tb2_company_img,
                                   tb1.cus_edit AS tb1_cus_edit,
                                   tb1.cus_name AS tb1_cus_name,
                                   tb1.cus_tower AS tb1_cus_tower,
                                   tb1.cus_taxno AS tb1_cus_taxno,
                                   tb1.cus_ins AS tb1_cus_ins,
                                   tb1.cus_code AS tb1_cus_code,
                                   tb3.JOBMIW AS tb3_JOBMIW,
                                   tb3.data_id AS tb3_data_id,
                                   tb1.cus_check AS tb1_dcus_check,
                                   tb1.cus_id AS tb1_cus_id,
                                   tb4.cusl_id AS tb4_cusl_id,
                                   CASE tb1.status_cus
                                   WHEN  '0' THEN 'เจ้าหนี้'
                                   WHEN  '1' THEN 'ลูกหนี้'
                                   ELSE 'Unknown'
                                   END AS tb1_status_cus,
                                   tb5.sce_code as tb5_sce_code,
                                   tb5.date_time as tb5_date_time,
                                   tb5.sce_detail as tb5_sce_detail,
                                   tb5.fname_thai as tb5_fname_thai,
                                   tb5.lname_thai as tb5_lname_thai
                                from customer tb1 
                                LEFT JOIN company_new tb2 on tb2.cid = tb1.type_company
                                LEFT JOIN(select data_id,cus_id,JOBMIW from main_data GROUP BY cus_id ORDER BY cus_id DESC)tb3 on tb3.cus_id = tb1.cus_id
                                LEFT JOIN(select cusl_id,cus_id from customer_log GROUP BY cus_id ORDER BY cusl_id ASC)tb4 on tb4.cus_id = tb1.cus_id
                                LEFT JOIN(select * from customer_send_edit,user where customer_send_edit.emp_id = user.employee_id and customer_send_edit.cse_type = 0 and customer_send_edit.sce_type_send = 1 ORDER BY customer_send_edit.cse_id DESC limit 1)tb5 on tb5.cus_id = tb1.cus_id
                                WHERE tb1.type_company IN('" . $this->session->userdata('Fixbu') . "') $data
                and tb1.status = 1 ORDER BY tb1.cus_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_ins_customer_log($data) {

        $sql = "insert into customer_log (`cus_id`, `cusl_name`, `cusl_emp`
                         , `cusl_status_cus`, `cusl_type_cus`, `cusl_deduction`, `cusl_vat7`, `cusl_code`
                         , `cusl_cust_id`, `cusl_cus_name`, `cusl_cus_fristname`, `cusl_cus_lastname`
                         , `cusl_cus_tower`, `cusl_cus_tel`, `cusl_cus_fax`, `cusl_cus_email`
                         , `cusl_cus_address`, `cusl_cus_type_address`, `cusl_cus_building`, `cusl_cus_room`, `cusl_cus_floor`
                         , `cusl_cus_number`, `cusl_cus_swine`, `cusl_cus_alley`, `cusl_cus_road`
                         , `cusl_cus_sub_district`, `cusl_cus_district`, `cusl_cus_province`, `cusl_cus_zipcode`
                         , `cusl_cus_taxno`, `cusl_cus_namebuy`, `cusl_cus_telbuy`, `cusl_cus_nameaccount`
                         , `cusl_cus_telaccount`, `cusl_cus_bill`, `cusl_credit_type`, `cusl_condate`, `cusl_condate_detail`
                         , `cusl_cus_detail`, `cusl_type_company`, `cusl_company`, `cusl_status`, `cusl_cus_set1`, `cusl_cus_editaddress`, `cusl_cus_prefix`, `cusl_cus_edit`, `cusl_cse_id`)
               values('" . $data[0]['cus_id'] . "','แก้ไข','" . $this->session->userdata('employee_id') . "'
                      ,'" . $data[0]['status_cus'] . "','" . $data[0]['type_cus'] . "','" . $data[0]['deduction'] . "','" . $data[0]['vat7'] . "','" . $data[0]['code'] . "'
                      ,'" . $data[0]['cust_id'] . "','" . $data[0]['cus_name'] . "','" . $data[0]['cus_fristname'] . "','" . $data[0]['cus_lastname'] . "'
                      ,'" . $data[0]['cus_tower'] . "','" . $data[0]['cus_tel'] . "','" . $data[0]['cus_fax'] . "','" . $data[0]['cus_email'] . "'
                      ,'" . $data[0]['cus_address'] . "','" . $data[0]['cus_type_address'] . "','" . $data[0]['cus_building'] . "','" . $data[0]['cus_room'] . "','" . $data[0]['cus_floor'] . "'
                      ,'" . $data[0]['cus_number'] . "','" . $data[0]['cus_swine'] . "','" . $data[0]['cus_alley'] . "','" . $data[0]['cus_road'] . "'
                      ,'" . $data[0]['cus_sub_district'] . "','" . $data[0]['cus_district'] . "','" . $data[0]['cus_province'] . "','" . $data[0]['cus_zipcode'] . "'
                      ,'" . $data[0]['cus_taxno'] . "','" . $data[0]['cus_namebuy'] . "','" . $data[0]['cus_telbuy'] . "','" . $data[0]['cus_nameaccount'] . "'
                      ,'" . $data[0]['cus_telaccount'] . "','" . $data[0]['cus_bill'] . "','" . $data[0]['credit_type'] . "','" . $data[0]['condate'] . "','" . $data[0]['condate_detail'] . "'
                      ,'" . $data[0]['cus_detail'] . "','" . $data[0]['type_company'] . "','" . $data[0]['company'] . "','" . $data[0]['status'] . "','" . $data[0]['cus_set1'] . "','" . $data[0]['cus_editaddress'] . "','" . $data[0]['cus_prefix'] . "','" . $data[0]['cus_edit'] . "','" . $data[0]['cse_id'] . "') ";

        $this->db->query($sql);
        return $this->db->insert_id();
    }*/

/*
    public function query_recievem_delete($id) {
        $sql = "delete from recieve_money where rc_id = '$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }*/


//    SUM(case when tb1.jobname LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.am_job else 0 end) as sum_am,

    /*public function query_vatbuy_list_show($id) {

        $sql = "select
            tb1.id as tb1_id,
            tb1.ppo_id as tb1_ppo_id,
            tb1.no_vat as tb1_no_vat,
            tb1.ppo_job as tb1_ppo_job,
            tb1.ppo_cid as tb1_ppo_cid,
            tb1.amount as tb1_amount,
            tb1.vat7 as tb1_vat7,
            tb1.typevat as tb1_typevat,
            tb1.new_datevat as tb1_new_datevat,
            tb1.ppo_waitpay as tb1_ppo_waitpay,
            tb2.company_name as tb2_company_name,
            tb2.company_img as tb2_company_img,
            tb4.cus_name as tb4_cus_name,
            tb4.cus_tower as tb4_cus_tower,
            tb4.cus_taxno as tb4_cus_taxno,
            tb4.cus_id as tb4_cus_id,
            CASE tb1.ppo_waitpay
                WHEN '0' THEN 'ยังไม่จ่าย' 
                WHEN '1' THEN 'จ่ายแล้ว' 
                ELSE ''
                END AS tb1_color_ppo_waitpay,
            CASE tb1.typevat
                WHEN '0' THEN 'ใบกำกับภาษี' 
                WHEN '1' THEN 'ใบลดหนี้' 
                ELSE ''
                END AS tb1_typevat_name,
            CASE tb1.typevat
                WHEN '0' THEN '+' 
                WHEN '1' THEN '-' 
                ELSE ''
                END AS tb1_typevatp
            from tb_vatbuy tb1
            LEFT JOIN company_new tb2 on tb2.cid = tb1.bid
            LEFT JOIN customer tb4 on tb4.cus_id = tb1.cus_id
            WHERE tb1.ppo_id ='$id'";
        return $this->db->query($sql)->result();
    }*/

}
