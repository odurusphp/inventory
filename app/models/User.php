<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 4/18/2019
 * Time: 10:26 AM
 */

class User extends BaseUser
{


    public static function getUserByParam($param ,$searchvalue){
        $rowbyparam = parent::getRecordByParams(self::TABLENAME,array($param => $searchvalue));

        if((!$rowbyparam) || count($rowbyparam) !== 1){
            return false;
        } else {
            $userbyparam = new User($rowbyparam->uid);
            return $userbyparam;
        }

    }

    public static function passwordMD5($password){
        return md5($password);
    }

    public static function getUserData($page, $limit){
        global $fdadb;
        $query = "select * from users  where status is null limit $page, $limit ";
        $fdadb->prepare($query);
        return $fdadb->resultSet();

    }


    public static function userIdByEmail($email){
        global $fdadb;
        $query = "select uid from users where email  = '$email'  ";
        $uid = $fdadb->prepare($query);
        $uid = $fdadb->fetchColumn();
        return $uid;
    }

    public static function userinfo($email){
        global $fdadb;
        $query = "select * from users where email  = '$email'  ";
       $fdadb->prepare($query);
       return  $fdadb->singleRecord();

    }
    public static function checkUserCredentials($email, $password){
        global $fdadb;
        $password = self::passwordMD5($password);
        $query = "select count(*) as ct from users where email  = '$email' and password = '$password' ";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();

    }


    public static function getUserCount(){
        global $fdadb;
        $query = "select count(*) as ct from users  where status is null ";
        $count = $fdadb->prepare($query);
        $count = $fdadb->fetchColumn();
        return $count;
    }


    public static function getUserCountbyUserID($uid){
        global $fdadb;
        $query = "select count(*) as ct from users  where uid = $uid ";
        $count = $fdadb->prepare($query);
        $count = $fdadb->fetchColumn();
        return $count;
    }



    public static function getUserCountByEmail($email){
        global $fdadb;
        $query = "select count(*) as ct from users where email  = '$email'   ";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();

    }


    public static function getrolebyUserId($uid)
    {
        global $fdadb;
        $query = "select roles_roleid from user_roles  where  users_uid  = $uid  ";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();
    }


    public static function getRolebyRoleId($roleid){
        global $fdadb;
        $query = "select role from roles  where  roleid = $roleid  ";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();
    }

    public static function insertCustomerUser($uid, $cmid){
        global $fdadb;
        $query = "INSERT INTO company_users  (users_uid, cmid) values ($uid, $cmid)  ";
        $fdadb->prepare($query);
        $fdadb->execute();
    }

    public static function checkCustomerUser($cmid){
        global $fdadb;
        $query = "SELECT  count(*) as count from  company_users where cmid = $cmid   ";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();
    }

    public static function getCustomerUsers($cmid){
        global $fdadb;
        $query = "SELECT users.*, company_users.*, user_roles.* FROM users INNER JOIN company_users
                  ON users.uid = company_users.users_uid  inner join  user_roles
                  ON users.uid = user_roles.users_uid WHERE cmid = $cmid 
                  ";
        $fdadb->prepare($query);
        return $fdadb->resultSet();
    }

    public static function getSystemUsers(){
        global $fdadb;
        $query = "SELECT users.* , user_roles.*  FROM  users INNER JOIN
                  user_roles ON users.uid = user_roles.users_uid  WHERE user_roles.roles_roleid = 1 ";
        $fdadb->prepare($query);
        return $fdadb->resultSet();
    }

    public static function updatePassword($uid, $password){
        global $fdadb;
        $password  = MD5($password);
        $query = "UPDATE users SET password = '$password' where uid = '$uid'  ";
        $fdadb->prepare($query);
        $fdadb->execute();
    }

    public function deletuserrole($userid){
        global $fdadb;
        $query = "DELETE from user_roles where users_uid = $userid  ";
        $fdadb->prepare($query);
        $fdadb->execute();
    }

    public static function  userStatus($userid, $status){
        global $fdadb;
        $query = "INSERT INTO  user_reset_status (uid, status) VALUES ($userid, $status)   ";
        $fdadb->prepare($query);
        $fdadb->execute();
    }

    public static function  checkexpiredStutus($userid){
        global $fdadb;
        $query = "SELECT count(*) as count  from user_reset_status where uid = $userid and status = 1";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();
    }


    public static function updateUserStatus($userid, $status){
        global $fdadb;
        $query = "UPDATE  user_reset_status SET status=$status where uid = $userid ";
        $fdadb->prepare($query);
        $fdadb->execute();
    }

    public static function deleteCompanyUsers($uid, $cmid){
        global $fdadb;
        $query = "DELETE from  company_users  where users_uid  = $uid and cmid  = $cmid ";
        $fdadb->prepare($query);
        $fdadb->execute();
    }

    public static function deleteAllCompanyUsers($cmid){
        global $fdadb;
        $query = "DELETE from  company_users  where  cmid  = $cmid ";
        $fdadb->prepare($query);
        $fdadb->execute();
    }

    public static function deactivateUser($userid){
        global $fdadb;
        $query = "UPDATE  users SET status=5 where uid = $userid ";
        $fdadb->prepare($query);
        $fdadb->execute();
    }


    public static function companyUserCount($cmid){
        global $fdadb;
        $query = "SELECT count(*) as ct from company_users where cmid = $cmid ";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();
    }

    public static function companyUserCountByUid($uid){
        global $fdadb;
        $query = "SELECT count(*) as ct from company_users where users_uid = $uid";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();
    }



    public static function getSystemUsersCount(){
        global $fdadb;
        $query = "SELECT count(*) as ct  FROM  users INNER JOIN
                  user_roles ON users.uid = user_roles.users_uid  WHERE user_roles.roles_roleid = 1 ";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();
    }


    public static function roleCount($role){
        global $fdadb;
        $query = "SELECT count(*) as ct from roles where  role = '$role' ";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();
    }


    public static function getRoles(){
        global $fdadb;
        $query = "SELECT role from roles ";
        $fdadb->prepare($query);
        return $fdadb->resultSet();
    }

    public static function getroleIdbyRole($role){
        global $fdadb;
        $query = "SELECT roleid from roles where  role = '$role' ";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();
    }

    public static function insertUserRoles($userid, $roleid){
        global $fdadb;
        $query = "INSERT INTO user_roles (users_uid, roles_roleid) values ($userid, $roleid) ";
        $fdadb->prepare($query);
        $fdadb->execute();
    }



    public static function getCompanyUsers($page, $limit){
        global $fdadb;
        $query = "SELECT company_users.*, users.* FROM company_users INNER JOIN users
                  ON company_users.users_uid = users.uid WHERE STATUS IS NULL LIMIT $page, $limit";
        $fdadb->prepare($query);
        return $fdadb->resultSet();
    }


    public static function getCompanyIdByUserId($uid){
        global $fdadb;
        $query = "SELECT company_users.*, users.* FROM company_users INNER JOIN users
                  ON company_users.users_uid = users.uid WHERE  company_users.users_uid  = $uid";
        $fdadb->prepare($query);
        return $fdadb->singleRecord();
    }

    public static function getCompanyIdFromCompanyUsers($uid){
        global $fdadb;
        $query = "SELECT cmid from company_users where users_uid = $uid";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();
    }

























}