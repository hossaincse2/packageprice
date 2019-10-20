<?php
namespace App\Contracts;

use App\Models\ActivityLog;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompanyInterface
 *
 * @author pavel
 */
interface ActivityLogInterface {
    //put your code here
    public function dataSave($id, $log_txt, $ArrayDataByID, $log_title, $log_type);

    public function allAuditLogs($search = array());

    public function allErrorLogs($search = array());

    public function auditLogDescription($id, $requestExcept, $companyArray);
}
