<?php
class Searchindex_model extends CI_Model
{
       
    public function __construct()
    {

	parent::__construct();	
    }
   
   
	
	//----------------------------------------------   
    public function getprofile_searchtotal($userReligionId,$usercaste,$MProfileCounts=0)
    {
		$gender=$this->session->userdata('gender');
		$tail='';
		
		
		if (!empty($_REQUEST['status'])) {
		$status=trim($_REQUEST['status']);              
		$tail .= " and (MaritalStatus='$status')";
		}
		
		if (!empty($_REQUEST['fromage']) && !empty($_REQUEST['endage']) ) {
		$age_from=trim($_REQUEST['fromage']);   
		$age_to=trim($_REQUEST['endage']);  		
		if($age_from!='' && $age_to!='' && $age_from!='0' && $age_to!='0'){ 
		$tail .= " and  ( Age Between '$age_from' and '$age_to' )" ; 
		}
		}
		
		
		if($userReligionId!=""){
			$religion="";
			if (!empty($_REQUEST['religion'])) {
			$religion=trim($_REQUEST['religion']); 
		
			$tail .= " and (ReligionId='$userReligionId' or ReligionId='$religion' )";
		
			}else{
				$tail .= " and (ReligionId='$userReligionId' )";
			}
			
		}else{
			$religion="";
			if (!empty($_REQUEST['religion'])) {
			$religion=trim($_REQUEST['religion']); 
			$tail .= " and (ReligionId='$religion')";
			}
		}
		
		
		
		if($usercaste!=""){
			$caste="";
			if (!empty($_REQUEST['caste'])) {
			$caste=trim($_REQUEST['caste']); 
				$tail .= " and (CastName='$usercaste' or CastName='$caste' )";
			}
			
		}else{
			$caste="";
			if (!empty($_REQUEST['caste'])) {
			$caste=trim($_REQUEST['caste']); 
			$tail .= " and (CastName='$caste')";
			}
		}
		
		
		
		if (!empty($_REQUEST['SearchByID'])) {
		$SearchByID=trim($_REQUEST['SearchByID']);     
		$tail="";		
		$tail .= " and (MemberCode='$SearchByID')";
		}
		$location="";
		if (!empty($_REQUEST['location'])) {
		$location=trim($_REQUEST['location']); 
		$tail .= " and (CityId='$location')";
		}
		
        $mother="";
        if (!empty($_REQUEST['mother'])) {
        $mother=trim($_REQUEST['mother']); 
        $tail .= " and (MotherTongue='$mother')";
        }

		if($gender!=""){
			if($gender=="M"){
			$tail .= " and (Gender='F')";
			}elseif($gender=="F"){
			$tail .= " and (Gender='M')";
			}
		}else{
			if (!empty($_REQUEST['gender'])) {
			$gender=trim($_REQUEST['gender']);              
			$tail .= " and (Gender='$gender')";
			}
		}
		
		$tail .= " and PStatus='1' and PublishStatus='1' order by ProAlignment asc";
		if($MProfileCounts==1)
		{
		    	$tail .=" limit 40";
		}

		$sql = "select *  from " . TBL__PREFIX . "member where 1=1 $tail";
		//echo $sql;die;
		$query = $this->db->query($sql);
		return $query->num_rows();
    }
	
	
	
	//-----------------------------------------------
    public function getprofile_searchreport($limit,$offset,$userReligionId,$usercaste){ 
	
	
	$gender=$this->session->userdata('gender');
		$tail='';
		
		if (!empty($_REQUEST['status'])) {
		$status=trim($_REQUEST['status']);              
		$tail .= " and (MaritalStatus='$status')";
		}
		
		if (!empty($_REQUEST['fromage']) && !empty($_REQUEST['endage']) ) {
		$age_from=trim($_REQUEST['fromage']);   
		$age_to=trim($_REQUEST['endage']);  		
		if($age_from!='' && $age_to!='' && $age_from!='0' && $age_to!='0'){ 
		$tail .= " and  ( Age Between '$age_from' and '$age_to' )" ; 
		}
		}
		
		
		if($userReligionId!=""){
			$religion="";
			if (!empty($_REQUEST['religion'])) {
			$religion=trim($_REQUEST['religion']); 
		
			$tail .= " and (ReligionId='$userReligionId' or ReligionId='$religion' )";
		
			}else{
				$tail .= " and (ReligionId='$userReligionId' )";
			}
			
		}else{
			$religion="";
			if (!empty($_REQUEST['religion'])) {
			$religion=trim($_REQUEST['religion']); 
			$tail .= " and (ReligionId='$religion')";
			}
		}
		
		
		
		if($usercaste!=""){
			$caste="";
			if (!empty($_REQUEST['caste'])) {
			$caste=trim($_REQUEST['caste']); 
				$tail .= " and (CastName='$usercaste' or CastName='$caste' )";
			}
			
		}else{
			$caste="";
			if (!empty($_REQUEST['caste'])) {
			$caste=trim($_REQUEST['caste']); 
			$tail .= " and (CastName='$caste')";
			}
		}
		
		
		
		if (!empty($_REQUEST['SearchByID'])) {
		$SearchByID=trim($_REQUEST['SearchByID']);     
		$tail="";		
		$tail .= " and (MemberCode='$SearchByID')";
		}
		
		if($gender!=""){
			if($gender=="M"){
			$tail .= " and (Gender='F')";
			}elseif($gender=="F"){
			$tail .= " and (Gender='M')";
			}
		}else{
			if (!empty($_REQUEST['gender'])) {
			$gender=trim($_REQUEST['gender']);              
			$tail .= " and (Gender='$gender')";
			}
		}
	$location="";
	if (!empty($_REQUEST['location'])) {
	$location=trim($_REQUEST['location']); 
	$tail .= " and (CityId='$location')";
	}
	
	$mother="";
	if (!empty($_REQUEST['mother'])) {
	$mother=trim($_REQUEST['mother']); 
	$tail .= " and (MotherTongue='$mother')";
	}
	
	$tail .= " and PStatus='1' and PublishStatus='1' order by ProAlignment asc";
	
	$tail .= " limit $offset,$limit";
	$sql = "select *  from " . TBL__PREFIX . "member where 1=1 $tail";
	//echo $sql;die;
	$query = $this->db->query($sql);
		
	return $query->result();

    }  
	
	
	
	
	
	
	
	
}

?>
