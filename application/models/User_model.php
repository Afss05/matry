<?php
class User_model extends CI_Model
{
       
    public function __construct()
    {

	parent::__construct();	
    }
   
   
	public function download_profileinactive(){
		
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'userwhistlist');
		$this->db->where('Status', '2');
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		
		foreach($row as $item){
			$id=$item->Id;
			$ActiveDates=$item->ActiveDates;
			$currentdate=$this->chsslibrary->call_date();
			if(strtotime($ActiveDates) < strtotime($currentdate)){
			$data = array
			(
			'Status' =>'3',
			);
			$this->db->set($data); 
			$this->db->where('Id', $id);
			$this->db->update(TBL__PREFIX.'userwhistlist',$data);
			}
		}
	} 
	public function userpremimum_profileinactive(){
		
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'userprem_request');
		$this->db->where('Status', '2');
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		
		foreach($row as $item){
			$id=$item->Id;
			$ActiveDates=$item->ActiveDates;
			//echo $ActiveDates."<br>";
			$currentdate=$this->chsslibrary->call_date();
			//echo $currentdate;
			if(strtotime($ActiveDates) < strtotime($currentdate)){
			$data = array
			(
			'Status' =>'3',
			);
			$this->db->set($data); 
			$this->db->where('Id', $id);
			$this->db->update(TBL__PREFIX.'userprem_request',$data);
			
				//echo $this->db->last_query();exit;
			}
		}
	} 

   
	public function vendorpremimum_profileinactive(){
		
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'vendorprem_request');
		$this->db->where('Status', '2');
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		
		foreach($row as $item){
			$id=$item->Id;
			$ActiveDates=$item->ActiveDates;
			$currentdate=$this->chsslibrary->call_date();
			if(strtotime($ActiveDates) < strtotime($currentdate)){
			$data = array
			(
			'Status' =>'3',
			);
			$this->db->set($data); 
			$this->db->where('Id', $id);
			$this->db->update(TBL__PREFIX.'vendorprem_request',$data);
			}
		}
	} 

   

    //------------------------------------------------------------------------------
    function call_timesecond(){    
    $time = date("s");
    return $time;
    }
    //------------------------------------------------------------------------------
    function call_datemonth(){    
    $time = date("m");
    return $time;
    }
    //------------------------------------------------------------------------------
    function call_date_Year(){
    $date = date("y");
    return $date;
    }


    //------------------------------------------------------------------------------    
    public function getMemberCount(){ 
        $this->db->select('MAX(Id) AS Totalcount');
        $this->db->from(TBL__PREFIX.'member');
        $sql=$this->db->get();
        return $sql->result();
    }
    //------------------------------------------------------------------------------    
    public function getMemberCode($count){
        $second=$this->call_timesecond();
        $month=$this->call_datemonth();
        $year=$this->call_date_Year();
        $result="A";
        $member_code=$result.$count.$second.$month.$year;
        return $member_code;
    }
    
    
    
    //------------------------------------------------------------------------------        
    public function checkAdminLogin($email,$password){  
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'member');
        $this->db->where('Email', $email);
        $this->db->where('Password', $password);
		$this->db->where('PStatus','1');
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }
    //------------------------------------------------------------------------------        
    public function checkVendorLogin($email,$password){  
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorlogin');
        $this->db->where('Email', $email);
        $this->db->where('Password', $password);
		$this->db->where('PStatus','1');
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }

    
    //------------------------------------------------------------------------------        
    public function checkemail_Byuser($email){

        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'member');
        $this->db->where('Email', $email);
        $query = $this->db->get();
       //echo $this->db->last_query();exit;
        return $query->result();
    }
    
	 //------------------------------------------------------------------------------        
    public function checkphone_Byuser($email){

        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'member');
        $this->db->where('ContactNumber', $email);
        $query = $this->db->get();
       // echo $this->db->last_query();exit;
        return $query->result();
    }
	 //------------------------------------------------------------------------------        
    public function checkphone_Byvendor($email){

        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorlogin');
        $this->db->where('Phone', $email);
        $query = $this->db->get();
       // echo $this->db->last_query();exit;
        return $query->result();
    }
    //------------------------------------------------------------------------------        
    public function check_vendoremail($email){

        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorlogin');
        $this->db->where('Email', $email);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }
	
    //------------------------------------------------------------------------------    
    public function addreigster($data){  
	$this->db->insert(TBL__PREFIX.'member',$data); 
	    //echo $this->db->last_query();exit;
        return $this->db->insert_id();
    }
    //------------------------------------------------------------------------------    
    public function update_reigster($data,$id){  
        $this->db->set($data); //value that used to update column  
        $this->db->where('Id', $id); //which row want to upgrade  
        $this->db->update(TBL__PREFIX.'member',$data);
        //echo $this->db->last_query();exit;
    }
    
    
    
    //------------------------------------------------------------------------------    
    public function add_vendor($data){  
	$this->db->insert(TBL__PREFIX.'vendorlogin',$data); 
        return $this->db->insert_id();
    }
    
    
    //------------------------------------------------------------------------------        
    public function getuserlist(){  
	$this->db->select('*');
	$this->db->from(TBL__PREFIX.'member');
	$query = $this->db->get();
	return $query->result();	 
    }
   
    //------------------------------------------------------------------------------
    public function getvendordetails_byid($id){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorlogin');
        $this->db->where('Id', $id);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }  
    
  
    
  
	
	
	//------------------------------------------------------------------------------    
    public function update_profile_byuser($data,$id){  
        $this->db->set($data); //value that used to update column  
        $this->db->where('Id', $id); //which row want to upgrade  
        $this->db->update(TBL__PREFIX.'member',$data);
        //echo $this->db->last_query();exit;
    }
	
	
	
	 //------------------------------------------------------------------------------        
    public function checkOldPassword($old,$userid){
		$this->db->select('*');
        $this->db->from(TBL__PREFIX.'member');
        $this->db->where('Id', $userid);
		$this->db->where('Password', $old);
        $query = $this->db->get();
       // echo $this->db->last_query();exit;
        return $query->result();
    }
	
	//------------------------------------------------------------------------------
    public function updatepassword_byuser($data,$id){ 
        $this->db->set($data); //value that used to update column  
        $this->db->where('Id', $id); //which row want to upgrade  
        $this->db->update(TBL__PREFIX.'member',$data);
    }    
	
	
	 //------------------------------------------------------------------------------        
    public function checkVenoderOldPassword($old,$userid){
		$this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorlogin');
        $this->db->where('Id', $userid);
		$this->db->where('Password', $old);
        $query = $this->db->get();
       // echo $this->db->last_query();exit;
        return $query->result();
    }
	
	//------------------------------------------------------------------------------
    public function updatepassword_byvendor($data,$id){ 
        $this->db->set($data); //value that used to update column  
        $this->db->where('Id', $id); //which row want to upgrade  
        $this->db->update(TBL__PREFIX.'vendorlogin',$data);
    }    
	
	//------------------------------------------------------------------------------    
    public function update_Vendordetails($data,$id){  
        $this->db->set($data); //value that used to update column  
        $this->db->where('Id', $id); //which row want to upgrade  
        $this->db->update(TBL__PREFIX.'vendorlogin',$data);
        //echo $this->db->last_query();exit;
    }
	
	
	//------------------------------------------------------------------------------     
    public function gettotal_vendorprofile($id)
    {
        $this->db->select('*');
        $sql= $this->db->from(TBL__PREFIX.'member');
		$this->db->where('VendorId', $id);
		if (isset($_GET['searchtext'])) {
		$searhc_text=trim($_GET['searchtext']); 
		if($searhc_text!=''){
		$this->db->or_where('Email', $searhc_text);
		$this->db->or_where('Name', $searhc_text);
		}
		}
		return $sql->count_all_results();
    }
	
	//------------------------------------------------------------------------------
    public function getvendoraddprofile_byid($id,$limit,$offset){ 
	/* 	$this->db->select('*');
		$this->db->from(TBL__PREFIX.'member');
		$this->db->where('VendorId', $id);
		if (isset($_GET['searchtext'])) {
		$searhc_text=trim($_GET['searchtext']); 
		if($searhc_text!=''){
		$this->db->or_where('Email', $searhc_text);
		$this->db->or_like('Name', $searhc_text);
		}
		}
		
		$this->db->order_by("Id", "DSEC");
		$this->db->limit($limit, $offset);
		$sql=$this->db->get();
		//$query = $this->db->get();
		echo $this->db->last_query();exit;
		return $sql->result();
		  */
		 
		 $tail='';
		if (!empty($_GET['searchtext'])) {
		$searchtext=trim($_GET['searchtext']);              
		$tail .= " and (Email like '%$searchtext%' or Name='$searchtext')";
		}


		$tail .= " and (VendorId='$id')";
		$tail .= "order by Id desc limit $offset,$limit";
		$sql = "select * from " . TBL__PREFIX . "member where 1=1 $tail";

		//echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->result();

		
		
		//$tail='';
		/* if (!empty($_GET['from_date'])&&!empty($_GET['to_date'])) {
		$from_date= $_GET['from_date'];
		$to_date= $_GET['to_date'];
		$to_date=$this->oglibrary->dateIncrement($to_date);
		$tail .= " and AddedDate between '$from_date' and '$to_date'";
		} */
	/* 	if (!empty($_GET['searchtext'])) {
		$searchtext=trim($_GET['searchtext']);              
		$tail .= " and (Email like '%$searchtext%' or Name='$searchtext')";
		}


		$tail .= " and (VendorId='$id')";
		$tail .= "order by Id desc limit $offset,$limit";
		$sql = "select * from " . TBL__PREFIX . "member where 1=1 $tail";

		//echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->result(); */
	
    }  
	

	
    
	//------------------------------------------------------------------------------
    public function getstar_list(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'star');
		$this->db->order_by("StarName", "asc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }
	//------------------------------------------------------------------------------
    public function getrasi_list(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'rasi');
		//$this->db->order_by("RasiName", "asc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }
	
	
	//------------------------------------------------------------------------------     
    public function getprofile_searchtotalbymemid($userStar,$userRasi,$usercaste,$userPrefer_Caste,$memcode)
    {
    
		$gender=$this->session->userdata('gender');
		
			
		$tail='';
		
	
		
		if (!empty($_GET['status'])) {
		$status=trim($_GET['status']);              
		$tail .= " and (MaritalStatus='$status')";
		}
	
		if (!empty($_GET['Star'])) {
		$Star=trim($_GET['Star']);              
		$tail .= " and (Star='$Star')";
		}
		
		if (!empty($_GET['Rasi'])) {
		$Rasi=trim($_GET['Rasi']);              
		$tail .= " and (Rasi='$Rasi')";
		} 
		
		
		if (!empty($_GET['fromage']) && !empty($_GET['endage']) ) {
		$age_from=trim($_GET['fromage']);   
		$age_to=trim($_GET['endage']);  		
		 if($age_from!='' && $age_to!='' && $age_from!='0' && $age_to!='0'){ 
		 $tail .= " and  ( Age Between '$age_from' and '$age_to' )" ; 
		 }
		}
		          
		$tail .= " and (MemberCode='$memcode')";
		
	 
		if (!empty($_GET['complexion'])) {
		$complexion=trim($_GET['complexion']);              
		$tail .= " and (Complexion='$complexion')";
		}
		$caste="";
		if (!empty($_GET['caste'])) {
		$caste=trim($_GET['caste']); 
		}
		$pref_caste="";
		if (!empty($_GET['pref_caste'])) {
			$pref_caste=$_GET['pref_caste'];     
			$tail12="";
			if($pref_caste!=''){
			$countdiet=count($pref_caste);
				if(in_array('Any',$pref_caste)){
					$pref_caste="Any";
				}else{
					for($i=0; $i<$countdiet; $i++){
					$tail12.=$pref_caste[$i].",";
					}
					$length1=strlen($tail12)-1;
					$pref_caste = substr($tail12, 0,$length1);
				}
			}
		}
		//echo $pref_caste; die;
		
		if($caste!="0" && $caste!="" && $pref_caste!="0" && $pref_caste!="" && $pref_caste!="Any" ){
		$value=$caste.",".$pref_caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste not like  '%Any%'";
		}elseif($caste!="0" && $caste!="" && $pref_caste!="0" && $pref_caste!=""  && $pref_caste=="Any"){
			$tail .= " and (CastName = $caste  and PreferenceCaste like '%$pref_caste%') ";
		}elseif($caste!="0" && $caste!="" && $pref_caste==""){
			$tail .= " and (CastName = $caste)";
		}elseif($caste=="" && $pref_caste=="Any"){
			$tail .= " and (PreferenceCaste like '%$pref_caste%')";
		}elseif($caste=="" && $pref_caste!="Any"  && $pref_caste!=""){
			$tail .= " and (PreferenceCaste in ($pref_caste)) ";
		}
		
		
	
		if($gender!=""){
			if($gender=="M"){
				$tail .= " and (Gender='F')";
			}elseif($gender=="F"){
					$tail .= " and (Gender='M')";
			}
		}else{
			if (!empty($_GET['gender'])) {
			$gender=trim($_GET['gender']);              
			$tail .= " and (Gender='$gender')";
			}
		}
		
		
		if($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!="" && $userPrefer_Caste!="Any" ){
		$value=$usercaste.",".$userPrefer_Caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste not like  '%Any%'";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!=""  && $userPrefer_Caste=="Any"){
			$tail .= " and (CastName = $usercaste  and PreferenceCaste like '%$userPrefer_Caste%') ";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste=="0" ){
			$tail .= " and (CastName = $usercaste)";
		}elseif($userPrefer_Caste=="Any"){
			$tail .= " and (PreferenceCaste like '%$userPrefer_Caste%')";
		}elseif($usercaste=="" && $userPrefer_Caste!="Any"  && $userPrefer_Caste!=""){
			$tail .= " and (PreferenceCaste in ($userPrefer_Caste))";
		}
		
		if($userStar!='' && $userRasi!='' ){
				$tail .= " and (Star = $userStar)";
				$tail .= " and (Rasi = $userRasi)";
		}
		
		$tail .= " and PStatus='1' and EmailVerify='1' and PublishStatus='1' ";
		$value="";
	
		if(isset($_GET['singlebutton'])){
			if($userStar==""){
				$value="RAND()";
			}else{
				$value="Id desc";
			}	
		}else
		{	
			if($userStar==""){
				$value="RAND()";
			}else{
				$value="Id desc";
			}	
		}
			
		
		$sql = "select count(Id) as countTot  from " . TBL__PREFIX . "member where 1=1 $tail";
		//echo $sql;die;
		$query = $this->db->query($sql);
		return $query->result();
    }
	
	
	
	//------------------------------------------------------------------------------
    public function getprofile_searchreportbymemid($limit,$offset,$userStar,$userRasi,$usercaste,$userPrefer_Caste,$memcode){ 
		$gender=$this->session->userdata('gender');
		
				
		$tail='';
		
	
		
		if (!empty($_GET['status'])) {
		$status=trim($_GET['status']);              
		$tail .= " and (MaritalStatus='$status')";
		}
	
		if (!empty($_GET['Star'])) {
		$Star=trim($_GET['Star']);              
		$tail .= " and (Star='$Star')";
		}
		
		if (!empty($_GET['Rasi'])) {
		$Rasi=trim($_GET['Rasi']);              
		$tail .= " and (Rasi='$Rasi')";
		} 
		
		
		if (!empty($_GET['fromage']) && !empty($_GET['endage']) ) {
		$age_from=trim($_GET['fromage']);   
		$age_to=trim($_GET['endage']);  		
		 if($age_from!='' && $age_to!='' && $age_from!='0' && $age_to!='0'){ 
		 $tail .= " and  ( Age Between '$age_from' and '$age_to' )" ; 
		 }
		}
		        
		$tail .= " and (MemberCode='$memcode')";
		
	 
		if (!empty($_GET['complexion'])) {
		$complexion=trim($_GET['complexion']);              
		$tail .= " and (Complexion='$complexion')";
		}
		$caste="";
		if (!empty($_GET['caste'])) {
		$caste=trim($_GET['caste']); 
		}
		$pref_caste="";
		if (!empty($_GET['pref_caste'])) {
			$pref_caste=$_GET['pref_caste'];     
			$tail12="";
			if($pref_caste!=''){
			$countdiet=count($pref_caste);
				if(in_array('Any',$pref_caste)){
					$pref_caste="Any";
				}else{
					for($i=0; $i<$countdiet; $i++){
					$tail12.=$pref_caste[$i].",";
					}
					$length1=strlen($tail12)-1;
					$pref_caste = substr($tail12, 0,$length1);
				}
			}
		}

		//after login
		
		if($caste!="0" && $caste!="" && $pref_caste!="0" && $pref_caste!="" && $pref_caste!="Any" ){
		$value=$caste.",".$pref_caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste not like  '%Any%'";
		}elseif($caste!="0" && $caste!="" && $pref_caste!="0" && $pref_caste!=""  && $pref_caste=="Any"){
			$tail .= " and (CastName = $caste  and PreferenceCaste like '%$pref_caste%') ";
		}elseif($caste!="0" && $caste!="" && $pref_caste==""){
			$tail .= " and (CastName = $caste)";
		}elseif($caste=="" && $pref_caste=="Any"){
			$tail .= " and (PreferenceCaste like '%$pref_caste%')";
		}elseif($caste=="" && $pref_caste!="Any"  && $pref_caste!=""){
			$tail .= " and (PreferenceCaste in ($pref_caste)) ";
		}
		
	
		
		
		
		if($gender!=""){
			if($gender=="M"){
				$tail .= " and (Gender='F')";
			}elseif($gender=="F"){
					$tail .= " and (Gender='M')";
			}
		}else{
			if (!empty($_GET['gender'])) {
			$gender=trim($_GET['gender']);              
			$tail .= " and (Gender='$gender')";
			}
		}
		
		if($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!="" && $userPrefer_Caste!="Any" ){
		$value=$usercaste.",".$userPrefer_Caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste not like  '%Any%'";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!=""  && $userPrefer_Caste=="Any"){
			$tail .= " and (CastName = $usercaste  and PreferenceCaste like '%$userPrefer_Caste%') ";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste=="0" ){
			$tail .= " and (CastName = $usercaste)";
		}elseif($userPrefer_Caste=="Any"){
			$tail .= " and (PreferenceCaste like '%$userPrefer_Caste%')";
		}elseif($usercaste=="" && $userPrefer_Caste!="Any"  && $userPrefer_Caste!=""){
			$tail .= " and (PreferenceCaste in ($userPrefer_Caste))";
		}
		//echo $usercaste."<br>"; 
		//echo $userPrefer_Caste;die;
		
		$tail .= " and PStatus='1'  and EmailVerify='1' and PublishStatus='1' ";
		$value="";
	
		if(isset($_GET['singlebutton'])){
			if($userStar==""){
				$value="RAND()";
			}else{
				$value="Id desc";
			}	
		}else
		{	
			if($userStar==""){
				$value="RAND()";
			}else{
				$value="Id desc";
			}	
		}
		$tail .= "order by  $value limit $offset,$limit";
		$sql = "select * from " . TBL__PREFIX . "member where 1=1 $tail";
		
		
		//echo $sql;die;
		$query = $this->db->query($sql);
		return $query->result();

    }  
	

	
	//------------------------------------------------------------------------------     
    public function getprofile_searchtotal($userStar,$userRasi,$usercaste,$userPrefer_Caste)
    {
    
		$gender=$this->session->userdata('gender');
		
			
		$tail='';
		
	
		
		if (!empty($_GET['status'])) {
		$status=trim($_GET['status']);              
		$tail .= " and (MaritalStatus='$status')";
		}
	
		if (!empty($_GET['Star'])) {
		$Star=trim($_GET['Star']);              
		$tail .= " and (Star='$Star')";
		}
		
		if (!empty($_GET['Rasi'])) {
		$Rasi=trim($_GET['Rasi']);              
		$tail .= " and (Rasi='$Rasi')";
		} 
		
		
		if (!empty($_GET['fromage']) && !empty($_GET['endage']) ) {
		$age_from=trim($_GET['fromage']);   
		$age_to=trim($_GET['endage']);  		
		 if($age_from!='' && $age_to!='' && $age_from!='0' && $age_to!='0'){ 
		 $tail .= " and  ( Age Between '$age_from' and '$age_to' )" ; 
		 }
		}
		
		if (!empty($_GET['SearchByID'])) {
		$SearchByID=trim($_GET['SearchByID']);              
		$tail .= " and (MemberCode='$SearchByID')";
		}
	 
		if (!empty($_GET['complexion'])) {
		$complexion=trim($_GET['complexion']);              
		$tail .= " and (Complexion='$complexion')";
		}
		$caste="";
		if (!empty($_GET['caste'])) {
		$caste=trim($_GET['caste']); 
		}
		$pref_caste="";
		if (!empty($_GET['pref_caste'])) {
			$pref_caste=$_GET['pref_caste'];     
			$tail12="";
			if($pref_caste!=''){
			$countdiet=count($pref_caste);
				if(in_array('Any',$pref_caste)){
					$pref_caste="Any";
				}else{
					for($i=0; $i<$countdiet; $i++){
					$tail12.=$pref_caste[$i].",";
					}
					$length1=strlen($tail12)-1;
					$pref_caste = substr($tail12, 0,$length1);
				}
			}
		}
		//echo $pref_caste; die;
		
		if($caste!="0" && $caste!="" && $pref_caste!="0" && $pref_caste!="" && $pref_caste!="Any" ){
		$value=$caste.",".$pref_caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste not like  '%Any%'";
		}elseif($caste!="0" && $caste!="" && $pref_caste!="0" && $pref_caste!=""  && $pref_caste=="Any"){
			$tail .= " and (CastName = $caste  and PreferenceCaste like '%$pref_caste%') ";
		}elseif($caste!="0" && $caste!="" && $pref_caste==""){
			$tail .= " and (CastName = $caste)";
		}elseif($caste=="" && $pref_caste=="Any"){
			$tail .= " and (PreferenceCaste like '%$pref_caste%')";
		}elseif($caste=="" && $pref_caste!="Any"  && $pref_caste!=""){
			$tail .= " and (PreferenceCaste in ($pref_caste)) ";
		}
		
		
	
		if($gender!=""){
			if($gender=="M"){
				$tail .= " and (Gender='F')";
			}elseif($gender=="F"){
					$tail .= " and (Gender='M')";
			}
		}else{
			if (!empty($_GET['gender'])) {
			$gender=trim($_GET['gender']);              
			$tail .= " and (Gender='$gender')";
			}
		}
		
		
		if($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!="" && $userPrefer_Caste!="Any" ){
		$value=$usercaste.",".$userPrefer_Caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste not like  '%Any%'";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!=""  && $userPrefer_Caste=="Any"){
			$tail .= " and (CastName = $usercaste  and PreferenceCaste like '%$userPrefer_Caste%') ";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste=="0" ){
			$tail .= " and (CastName = $usercaste)";
		}
		
		if($userStar!='' && $userRasi!='' ){
				$tail .= " and (Star = $userStar)";
				$tail .= " and (Rasi = $userRasi)";
		}
		
		$tail .= " and PStatus='1' and EmailVerify='1' and PublishStatus='1' ";
	
	
	
		$sql = "select *  from " . TBL__PREFIX . "member where 1=1 $tail";
		//echo $sql;die;
		$query = $this->db->query($sql);
		return $query->num_rows();
    }
	
	
	
	
	//------------------------------------------------------------------------------
    public function getprofile_searchreport($limit,$offset,$userStar,$userRasi,$usercaste,$userPrefer_Caste){ 
		$gender=$this->session->userdata('gender');
		
				
		$tail='';
		
	
		
		if (!empty($_GET['status'])) {
		$status=trim($_GET['status']);              
		$tail .= " and (MaritalStatus='$status')";
		}
	
		if (!empty($_GET['Star'])) {
		$Star=trim($_GET['Star']);              
		$tail .= " and (Star='$Star')";
		}
		
		if (!empty($_GET['Rasi'])) {
		$Rasi=trim($_GET['Rasi']);              
		$tail .= " and (Rasi='$Rasi')";
		} 
		
		
		if (!empty($_GET['fromage']) && !empty($_GET['endage']) ) {
		$age_from=trim($_GET['fromage']);   
		$age_to=trim($_GET['endage']);  		
		 if($age_from!='' && $age_to!='' && $age_from!='0' && $age_to!='0'){ 
		 $tail .= " and  ( Age Between '$age_from' and '$age_to' )" ; 
		 }
		}
		
		if (!empty($_GET['SearchByID'])) {
		$SearchByID=trim($_GET['SearchByID']);              
		$tail .= " and (MemberCode='$SearchByID')";
		}
	 
		if (!empty($_GET['complexion'])) {
		$complexion=trim($_GET['complexion']);              
		$tail .= " and (Complexion='$complexion')";
		}
		$caste="";
		if (!empty($_GET['caste'])) {
		$caste=trim($_GET['caste']); 
		}
		$pref_caste="";
		if (!empty($_GET['pref_caste'])) {
			$pref_caste=$_GET['pref_caste'];     
			$tail12="";
			if($pref_caste!=''){
			$countdiet=count($pref_caste);
				if(in_array('Any',$pref_caste)){
					$pref_caste="Any";
				}else{
					for($i=0; $i<$countdiet; $i++){
					$tail12.=$pref_caste[$i].",";
					}
					$length1=strlen($tail12)-1;
					$pref_caste = substr($tail12, 0,$length1);
				}
			}
		}

		//after login
		
		if($caste!="0" && $caste!="" && $pref_caste!="0" && $pref_caste!="" && $pref_caste!="Any" ){
		$value=$caste.",".$pref_caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste not like  '%Any%'";
		}elseif($caste!="0" && $caste!="" && $pref_caste!="0" && $pref_caste!=""  && $pref_caste=="Any"){
			$tail .= " and (CastName = $caste  and PreferenceCaste like '%$pref_caste%') ";
		}elseif($caste!="0" && $caste!="" && $pref_caste==""){
			$tail .= " and (CastName = $caste)";
		}elseif($caste=="" && $pref_caste=="Any"){
			$tail .= " and (PreferenceCaste like '%$pref_caste%')";
		}elseif($caste=="" && $pref_caste!="Any"  && $pref_caste!=""){
			$tail .= " and (PreferenceCaste in ($pref_caste)) ";
		}
		
	
		
		
		
		if($gender!=""){
			if($gender=="M"){
				$tail .= " and (Gender='F')";
			}elseif($gender=="F"){
					$tail .= " and (Gender='M')";
			}
		}else{
			if (!empty($_GET['gender'])) {
			$gender=trim($_GET['gender']);              
			$tail .= " and (Gender='$gender')";
			}
		}
		
		if($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!="" && $userPrefer_Caste!="Any" ){
		$value=$usercaste.",".$userPrefer_Caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste not like  '%Any%'";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!=""  && $userPrefer_Caste=="Any"){
			$tail .= " and (CastName = $usercaste  and PreferenceCaste like '%$userPrefer_Caste%') ";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste=="0" ){
			$tail .= " and (CastName = $usercaste)";
		}
		//echo $usercaste."<br>"; 
		//echo $userPrefer_Caste;die;
		
		$tail .= " and PStatus='1'  and EmailVerify='1'  and PublishStatus='1' ";
		$value="";
		if(isset($_GET['per_page'])){
		$value="order by Id desc";
		}else{
			if(isset($_GET['singlebutton'])){
			if($userStar==""){
			$value="order by RAND()";
			}else{
			$value="order by Id desc";
			}	
			}else
			{	
			if($userStar==""){
			$value=" order by RAND()";
			}else{
			$value="order by Id desc";
			}	
			}
			
		}
		
		$tail .= " $value limit $offset,$limit";
		$sql = "select * from " . TBL__PREFIX . "member where 1=1 $tail";
		
		
		//echo $sql;die;
		$query = $this->db->query($sql);
		return $query->result();

    }  
	




		//------------------------------------------------------------------------------     
    public function getprofile_loginsearchtotal($userStar,$userRasi,$usercaste,$userPrefer_Caste)
    {
    
		$gender=$this->session->userdata('gender');
		
			
		$tail='';
		
		if($gender=="M"){
		$tail .= " and (Gender='F')";
		}elseif($gender=="F"){
		$tail .= " and (Gender='M')";
		}

		
		if (!empty($_GET['status'])) {
		$status=trim($_GET['status']);              
		$tail .= " and (MaritalStatus='$status')";
		}
	
	
		
		if (!empty($_GET['fromage']) && !empty($_GET['endage']) ) {
		$age_from=trim($_GET['fromage']);   
		$age_to=trim($_GET['endage']);  		
		 if($age_from!='' && $age_to!='' && $age_from!='0' && $age_to!='0'){ 
		 $tail .= " and  ( Age Between '$age_from' and '$age_to' )" ; 
		 }
		}
		
		if (!empty($_GET['SearchByID'])) {
		$SearchByID=trim($_GET['SearchByID']);              
		$tail .= " and (MemberCode='$SearchByID')";
		}
	 
		$pref_caste="";
		if (!empty($_GET['pref_caste'])) {
			$pref_caste=$_GET['pref_caste'];     
			$tail12="";
			if($pref_caste!=''){
			$countdiet=count($pref_caste);
				if(in_array('Any',$pref_caste)){
					$pref_caste="Any";
					
				}else{
					
					for($i=0; $i<$countdiet; $i++){
					$tail12.=$pref_caste[$i].",";
					}
					$length1=strlen($tail12)-1;
					$pref_caste = substr($tail12, 0,$length1);
					
				}
			}
		}
		
		
	//pref caset empty with user profile based
		if($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!="" && $userPrefer_Caste!="Any" && $pref_caste=="" ){
		$value=$usercaste.",".$userPrefer_Caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste not like  '%Any%'";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste=="Any" && $pref_caste=="" ){
		$tail .= " and (CastName = $usercaste  and PreferenceCaste like '%$userPrefer_Caste%') ";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste=="0" && $pref_caste=="" ){
			$tail .= " and ( CastName = $usercaste  )";
		}
		
		
		//pref caste without empty
		if($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!="" && $userPrefer_Caste!="Any" && $pref_caste!=""  && $pref_caste=="Any"  ){
		$value=$usercaste.",".$userPrefer_Caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste  like  '%Any%'";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!="" && $userPrefer_Caste!="Any" && $pref_caste!=""  && $pref_caste!="Any"  ){
		$value=$usercaste.",".$userPrefer_Caste.",".$pref_caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste not like  '%Any%'";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste=="Any" && $pref_caste=="Any" ){
		$tail .= " and (CastName = $usercaste  and PreferenceCaste like '%$userPrefer_Caste%') ";
		}
		
		
		
		$tail .= " and PStatus='1' and EmailVerify='1' and PublishStatus='1' ";
		$value="";
	
		if(isset($_GET['singlebutton'])){
			if($userStar==""){
				$value="RAND()";
			}else{
				$value="Id desc";
			}	
		}else
		{	
			if($userStar==""){
				$value="RAND()";
			}else{
				$value="Id desc";
			}	
		}
			
		
		$sql = "select count(Id) as countTot  from " . TBL__PREFIX . "member where 1=1 $tail";
		//echo $sql;die;
		$query = $this->db->query($sql);
		return $query->result();
    }

	
	//------------------------------------------------------------------------------
    public function getprofile_loginsearchreport($limit,$offset,$userStar,$userRasi,$usercaste,$userPrefer_Caste){ 
		$gender=$this->session->userdata('gender');
		
				
		$tail='';
		
		if($gender=="M"){
		$tail .= " and (Gender='F')";
		}elseif($gender=="F"){
		$tail .= " and (Gender='M')";
		}

		
		if (!empty($_GET['status'])) {
		$status=trim($_GET['status']);              
		$tail .= " and (MaritalStatus='$status')";
		}
	
	
		
		if (!empty($_GET['fromage']) && !empty($_GET['endage']) ) {
		$age_from=trim($_GET['fromage']);   
		$age_to=trim($_GET['endage']);  		
		 if($age_from!='' && $age_to!='' && $age_from!='0' && $age_to!='0'){ 
		 $tail .= " and  ( Age Between '$age_from' and '$age_to' )" ; 
		 }
		}
		
		if (!empty($_GET['SearchByID'])) {
		$SearchByID=trim($_GET['SearchByID']);              
		$tail .= " and (MemberCode='$SearchByID')";
		}
	 
		$pref_caste="";
	if (!empty($_GET['pref_caste'])) {
			$pref_caste=$_GET['pref_caste'];     
			$tail12="";
			if($pref_caste!=''){
			$countdiet=count($pref_caste);
		
				if(in_array('Any',$pref_caste)){
					$pref_caste="Any";
				}else{
					for($i=0; $i<$countdiet; $i++){
					$tail12.=$pref_caste[$i].",";
					}
					$length1=strlen($tail12)-1;
					$pref_caste = substr($tail12, 0,$length1);
				}
			}
		}

		
		//echo $usercaste; 
		//echo "<br>".$userPrefer_Caste;
		
		//pref caset empty with user profile based
		if($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!="" && $userPrefer_Caste!="Any" && $pref_caste=="" ){
		$value=$usercaste.",".$userPrefer_Caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste  not like   '%Any%'";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste=="Any" && $pref_caste=="" ){
		$tail .= " and (CastName = $usercaste  and PreferenceCaste like '%$userPrefer_Caste%') ";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste=="0" && $pref_caste=="" ){
			$tail .= " and ( CastName = $usercaste  )";
		}
		
		//pref caste without empty

		if($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!="" && $userPrefer_Caste!="Any" && $pref_caste!=""  && $pref_caste=="Any"  ){
		$value=$usercaste.",".$userPrefer_Caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste not like  '%Any%' ";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste!="0" && $userPrefer_Caste!="" && $userPrefer_Caste!="Any" && $pref_caste!=""  && $pref_caste!="Any"  ){
		$value=$usercaste.",".$userPrefer_Caste.",".$pref_caste;
		$tail .= " and (CastName in ($value) or PreferenceCaste in ($value)) and  PreferenceCaste not like  '%Any%'";
		}elseif($usercaste!="0" && $usercaste!="" && $userPrefer_Caste=="Any" && $pref_caste=="Any" ){
		$tail .= " and (CastName = $usercaste  and PreferenceCaste like '%$userPrefer_Caste%') ";
		}
		
	
		$tail .= " and PStatus='1'  and EmailVerify='1' and PublishStatus='1' ";
		$value="";
	
		if(isset($_GET['singlebutton'])){
			if($userStar==""){
				$value=" order by RAND()";
			}else{
				$value=" order by Id desc";
			}	
		}else
		{	
			if($userStar==""){
				$value=" order by RAND()";
			}else{
				$value="order by Id desc";
			}	
		}
			
		$tail .= "  $value limit $offset,$limit";
		$sql = "select * from " . TBL__PREFIX . "member where 1=1 $tail";
		//echo $sql;die;
		$query = $this->db->query($sql);
		return $query->result();

    }  
	


	
	//------------------------------------------------------------------------------
    public function user_search_starrasi_combination($MainStariId,$MainRasiId,$ComStarId,$ComRasiId){
    

		$sql = "select * from " . TBL__PREFIX2 . "combination where MainStariId='$MainStariId' and MainRasiId='$MainRasiId' and ComStarId='$ComStarId' and ComRasiId='$ComRasiId' and  Palan!='3' ";
		//echo $sql."<br>";
		$query1 = $this->db->query($sql);
		return $query1->result();
		
	} 
	
	
	
		//------------------------------------------------------------------------------
    public function search_starrasi_combination($MainStariId,$MainRasiId,$ComStarId,$ComRasiId){
		$sql = "select * from " . TBL__PREFIX2 . "combination where MainStariId='$MainStariId' and MainRasiId='$MainRasiId' and ComStarId='$ComStarId' and ComRasiId='$ComRasiId' ";
		//echo $sql;die;
		$query1 = $this->db->query($sql);
		return $query1->result();

    } 
	
	
	
	
	//------------------------------------------------------------------------------
    public function getmatch_combination($Id){ 
	
	
		$sql = "select * from " . TBL__PREFIX2 . "combination where Id='$Id' ";
		//echo $sql;die;
		$query1 = $this->db->query($sql);
		return $query1->result();
	
    } 
	
	//------------------------------------------------------------------------------
    public function getcaste_list(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'cast');
		$this->db->order_by("CasteName", "asc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }
	
	 //------------------------------------------------------------------------------
    public function getuserlogindetails_byid($id){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'member');
        $this->db->where('Id', $id);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }  
	 //------------------------------------------------------------------------------    
    public function Memberviewcount($data){  
	$this->db->insert(TBL__PREFIX.'profileviewcount',$data); 
	 //echo $this->db->last_query();exit;
       // return $this->db->insert_id();
    }
	
	//------------------------------------------------------------------------------
    public function gettotalviewprofile($id){ 
		$this->db->select('count(ViewCount) as totviewprofil'); 
        $this->db->from(TBL__PREFIX.'profileviewcount');
        $this->db->where('MemberId', $id);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    } 
	
	//------------------------------------------------------------------------------
    public function gettotalview_profile($id){ 
		$this->db->select('count(ViewCount) as totviewprofil'); 
        $this->db->from(TBL__PREFIX.'profileviewcount');
        $this->db->where('ViewedId', $id);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    } 
	
	
	  //------------------------------------------------------------------------------    
    public function update_password_user($data,$id){  
        $this->db->set($data); //value that used to update column  
        $this->db->where('Id', $id); //which row want to upgrade  
        $this->db->update(TBL__PREFIX.'member',$data);
        //echo $this->db->last_query();exit;
    }
	
	 //------------------------------------------------------------------------------        
    public function checkemail_Byvendor($email){

        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorlogin');
        $this->db->where('Email', $email);
        $query = $this->db->get();
       // echo $this->db->last_query();exit;
        return $query->result();
    }
	
	//------------------------------------------------------------------------------        
    public function getstarby_rasiajax($id){

        $this->db->select('*');
        $this->db->from(TBL__PREFIX2.'starrasi');
        $this->db->where('RasiId', $id);
        $query = $this->db->get();
       //echo $this->db->last_query();exit;
        return $query->result();
    }
	
	//------------------------------------------------------------------------------
    public function getvendor_categorylist(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'vendorcategory');
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }  
	//------------------------------------------------------------------------------
    public function vendor_update($data,$id){ 
        $this->db->set($data); //value that used to update column  
        $this->db->where('Id', $id); //which row want to upgrade  
        $this->db->update(TBL__PREFIX.'vendorlogin',$data);
    }    
	   
    //------------------------------------------------------------------------------
    public function getwedding_directory(){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX2.'vendorcategory');
        $this->db->where('Id!=','1');
		$query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    } 
	
	//------------------------------------------------------------------------------
    public function getvendor_weddingbycategory($id){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorlogin');
        $this->db->where('VendorCategoryId', $id);
		if (isset($_GET['State'])) {
		$state=trim($_GET['State']); 
		if($state!=''){
		$this->db->where('StateId', $state);
		}
		}
		if (isset($_GET['city'])) {
		$city=trim($_GET['city']); 
		if($city!=''){
		$this->db->where('CityId', $city);
		}
		}
		$this->db->where('PublishStatus','1');
		$this->db->where('EmailVerify','1');
		$query=$this->db->get();
		
		
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }  
	//------------------------------------------------------------------------------
    public function getVendorpaymentlist(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'vendorpayment');
		$this->db->where('Status','1');
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }  
	
	
	//------------------------------------------------------------------------------
    public function getUserpaymentlistbystatus(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'userprofilepayment');
		$this->db->where('Status','1');
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }  
	
	//------------------------------------------------------------------------------    
    public function Whishlistadd($data){  
	$this->db->insert(TBL__PREFIX.'userwhistlist',$data); 
        return $this->db->insert_id();
    }
	
	  //------------------------------------------------------------------------------
    public function getwhishlist_bypaymentiduserid($paymentid,$profid,$loginid){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'userwhistlist');
        $this->db->where('PaymentType', $paymentid);
		$this->db->where('MemberId', $loginid);
		$this->db->where('ViewedId', $profid);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }  
	
	  //------------------------------------------------------------------------------
    public function getwhish_paymentuserid($loginid){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'userwhistlist');
		$this->db->where('MemberId', $loginid);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }  
	//------------------------------------------------------------------------------
    public function userwhishlist_updatebyid($data,$id){ 
        $this->db->set($data); //value that used to update column  
        $this->db->where('Id', $id); //which row want to upgrade  
        $this->db->update(TBL__PREFIX.'userwhistlist',$data);
		     //echo $this->db->last_query();exit;
    }    
	   
	//------------------------------------------------------------------------------
    public function getstate_list(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'statemaster');
		$this->db->order_by("StateName", "asc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }
	
	//------------------------------------------------------------------------------
    public function getCity_list(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'citymaster');
		$this->db->order_by("CityName", "asc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }
	
	
	
   //------------------------------------------------------------------------------        
    public function getIndexalertlist(){  
	$this->db->select('*');
	$this->db->from(TBL__PREFIX2.'indexalert');
	$this->db->order_by("Id", "desc");
	$this->db->limit('1');
	$query = $this->db->get();
	//echo $this->db->last_query();exit;
	return $query->result();	 
    }
	
	 //------------------------------------------------------------------------------        
    public function getGroomlist(){  
	$this->db->select('*');
	$this->db->from(TBL__PREFIX.'member');
	$this->db->where('PStatus','1'); 
	$this->db->where('PublishStatus','1'); 
	$this->db->where('Gender','M');
	$this->db->order_by("Id", "desc");
	$this->db->limit('10');
	$query = $this->db->get();
	//echo $this->db->last_query();exit;
	return $query->result();	 
    }
	
	 //------------------------------------------------------------------------------        
    public function getBridelist(){  
	$this->db->select('*');
	$this->db->from(TBL__PREFIX.'member');
	$this->db->where('PStatus','1'); 
	
	$this->db->where('PublishStatus','1'); 
	$this->db->where('Gender','F');
	$this->db->order_by("Id", "desc");
	$this->db->limit('10');
	$query = $this->db->get();
	//echo $this->db->last_query();exit;
	return $query->result();	 
    }
	//------------------------------------------------------------------------------
    public function gettotaldownloadprofile($id){ 
		$this->db->select('count(Id) as totdownload');
        $this->db->from(TBL__PREFIX.'userwhistlist');
        $this->db->where('ViewedId', $id);
		$this->db->where('(Status="2" or  Status="3")');
        $query=$this->db->get();
        //echo $this->db->last_query()."<br>";
        $row = $query->result();
		return $row;
    } 
	
	//------------------------------------------------------------------------------
    public function getVendorpremimum_list(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'vendor_prempayment');
		$this->db->where("Status", "1");
		$this->db->where("Id!=", "1");
		$this->db->order_by("Amount", "asc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }
	  //------------------------------------------------------------------------------    
    public function addvendorpremimu_request($data){  
	$this->db->insert(TBL__PREFIX.'vendorprem_request',$data); 
		//echo $this->db->last_query();exit;
        return $this->db->insert_id();
    }
	//------------------------------------------------------------------------------
    public function check_vendorpremimu_request($id){ 
		$this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorprem_request');
        $this->db->where('MemberId', $id);
		$ignore = array(1,2);
		//$this->db->where_not_in('Status','1');
		$this->db->where_in('Status',$ignore);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    } 
	
	//------------------------------------------------------------------------------
    public function vendorpremimu_request($id){ 
		$this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorprem_request');
        $this->db->where('MemberId', $id);
		$this->db->where('Status','2');
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    } 
	
	
	//------------------------------------------------------------------------------
    public function vendorprofilpremimu_request($id,$payid){ 
		$this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorprem_request');
        $this->db->where('MemberId', $id);
		$this->db->where('PaymentType', $payid);
		$this->db->where('Status','1');
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }
	
	//------------------------------------------------------------------------------    
    public function userprofile_add($data){  
	$this->db->insert(TBL__PREFIX.'userprofile_photo',$data); 
	//echo $this->db->last_query();exit;
	return $this->db->insert_id();
    }
	
	  
    //------------------------------------------------------------------------------
    public function getprofileimage_byid($id){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'userprofile_photo');
        $this->db->where('MemberId', $id);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    } 
	
	 //------------------------------------------------------------------------------
    public function deleteprofile_imagebyid($id){ 
	
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'userprofile_photo');
		$this->db->where('Id', $id);
		$query=$this->db->get();
		 //echo $this->db->last_query();exit;
		$row = $query->result();
		
		foreach($row as $item){
			$FilePath=$item->FilePath;
		}
		//echo $FilePath;die;
		if($FilePath!='')
		{
			$delete_path='assets/profileimages/'.$FilePath;
			chmod($delete_path,0755);
			unlink("$delete_path");
			$this->db->where('Id', $id);
			$this->db->delete(TBL__PREFIX.'userprofile_photo'); 
		}
 
    } 
	
	//------------------------------------------------------------------------------    
    public function vendorprofileimage_add($data){  
	$this->db->insert(TBL__PREFIX.'vendorprofile_photo',$data); 
	//echo $this->db->last_query();exit;
	return $this->db->insert_id();
    }
	//------------------------------------------------------------------------------
    public function getvendorprofileimage_byid($id){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorprofile_photo');
        $this->db->where('VenoderId', $id);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    } 
	
	 //------------------------------------------------------------------------------
    public function deletevendorprofile_imagebyid($id){ 
	
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'vendorprofile_photo');
		$this->db->where('Id', $id);
		$query=$this->db->get();
		 //echo $this->db->last_query();exit;
		$row = $query->result();
		
		foreach($row as $item){
			$FilePath=$item->FilePath;
		}
		//echo $FilePath;die;
		if($FilePath!='')
		{
			$delete_path='assets/WedddingProfile/'.$FilePath;
			chmod($delete_path,0755);
			unlink("$delete_path");
			$this->db->where('Id', $id);
			$this->db->delete(TBL__PREFIX.'vendorprofile_photo'); 
		}
 
    }
	//------------------------------------------------------------------------------    
    public function spam_add($data){  
	$this->db->insert(TBL__PREFIX.'spamrequest',$data); 
        return $this->db->insert_id();
    }
	 //------------------------------------------------------------------------------        
    public function check_spam($MemberId,$ViewedId){  
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'spamrequest');
        $this->db->where('MemberId', $MemberId);
        $this->db->where('ComplaintId', $ViewedId);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }
	//------------------------------------------------------------------------------
    public function userpremimusubscr_request($id){ 
		$this->db->select('*');
        $this->db->from(TBL__PREFIX.'userprem_request');
        $this->db->where('MemberId', $id);
		$this->db->where('Status','2');
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    } 
	//------------------------------------------------------------------------------
    public function getUserpremimum_list(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'user_prempayment');
		$this->db->where("Status", "1");
		$this->db->where("Id!=", "1");
		$this->db->order_by("Amount", "asc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }
	
	//------------------------------------------------------------------------------
    public function check_userpremimu_request($id){ 
		$this->db->select('*');
        $this->db->from(TBL__PREFIX.'userprem_request');
        $this->db->where('MemberId', $id);
		$ignore = array(1,2);
		//$this->db->where_not_in('Status','1');
		$this->db->where_in('Status',$ignore);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }
	  //------------------------------------------------------------------------------    
    public function adduserpremimu_request($data){  
	$this->db->insert(TBL__PREFIX.'userprem_request',$data); 
		//echo $this->db->last_query();exit;
        return $this->db->insert_id();
    }
		//------------------------------------------------------------------------------
    public function Userprofilpremimu_request($id,$payid){ 
		$this->db->select('*');
        $this->db->from(TBL__PREFIX.'userprem_request');
        $this->db->where('MemberId', $id);
		$this->db->where('PaymentType', $payid);
		$this->db->where('Status','1');
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }
	
	
	 //------------------------------------------------------------------------------
    public function getprofileimageStatus_byid($id){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'userprofile_photo');
        $this->db->where('MemberId', $id);
		$this->db->where('Status','1');
		$this->db->limit('1');
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }

		
		//------------------------------------------------------------------------------
    public function userpaidindex_paymentlist(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'user_prempayment');
		$this->db->where('Status','1');
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }
	
	
	 //------------------------------------------------------------------------------        
    public function getpreimumGroomlist(){  
		// subquery
		$this->db->select('MemberId')->from(TBL__PREFIX.'userprem_request');
		$this->db->where('Status','2');
		$this->db->group_by('MemberId'); 
		$subQuery =  $this->db->get_compiled_select();
		// Main Query
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'member');
		$this->db->where("Id IN($subQuery)", NULL, FALSE);
		$this->db->where('PStatus','1'); 
		$this->db->where('PublishStatus','1'); 
		$this->db->where('Gender','M');
		$this->db->order_by("Id", "desc");
		$query=$this->db->get();
		//echo $query = $this->db->last_query();  exit;
		return $query->result();
    }
	 //------------------------------------------------------------------------------        
    public function getpreimumBridelist(){  
		// subquery
		$this->db->select('MemberId')->from(TBL__PREFIX.'userprem_request');
		$this->db->where('Status','2');
		$this->db->group_by('MemberId'); 
		$subQuery =  $this->db->get_compiled_select();
		// Main Query
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'member');
		$this->db->where("Id IN($subQuery)", NULL, FALSE);
		$this->db->where('PStatus','1'); 
		
		$this->db->where('PublishStatus','1'); 
		$this->db->where('Gender','F');
		$this->db->order_by("Id", "desc");
		$query=$this->db->get();
		//echo $query = $this->db->last_query();  exit;
		return $query->result();
    }
	 //------------------------------------------------------------------------------        
    public function vendor_indexpremimumlist(){  
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorlogin');
		$this->db->where('PStatus','1');	
		$this->db->where('PublishStatus','1');
		$this->db->order_by("Id", "desc");
		$this->db->limit('10');
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }
	
	
	
	 //------------------------------------------------------------------------------
    public function vendorprofileimageStatus_byid($id){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorprofile_photo');
        $this->db->where('VenoderId', $id);
		$this->db->where('Status','1');
		$this->db->group_by('VenoderId'); 
        $query=$this->db->get();
       // echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }
		//------------------------------------------------------------------------------
    public function vendorpaidindex_paymentlist(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'vendor_prempayment');
		$this->db->where('Status','1');
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }
	
	
	 //------------------------------------------------------------------------------        
    public function getpreimum_indexvendorlist(){  
		// subquery
		$this->db->select('MemberId')->from(TBL__PREFIX.'vendorprem_request');
		$this->db->where('Status','2');
		$this->db->group_by('MemberId'); 
		$subQuery =  $this->db->get_compiled_select();
		// Main Query
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'vendorlogin');
		$this->db->where("Id IN($subQuery)", NULL, FALSE);
		$this->db->where('PStatus','1');	
		$this->db->where('PublishStatus','1');
		
		$this->db->order_by("Id", "desc");
		$query=$this->db->get();
		//echo $query = $this->db->last_query();  exit;
		return $query->result();
    }
	
	//------------------------------------------------------------------------------        
    public function checkemailverify_Byuser($email,$emailotp){

        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'member');
        $this->db->where('Email', $email);
		$this->db->where('EmailOtpNumber', $emailotp);
        $query = $this->db->get();
       //echo $this->db->last_query();exit;
        return $query->result();
    }
	//------------------------------------------------------------------------------    
    public function update_profile_byuseremail($data,$id){  
        $this->db->set($data); //value that used to update column  
        $this->db->where('Email', $id); //which row want to upgrade  
        $this->db->update(TBL__PREFIX.'member',$data);
        //echo $this->db->last_query();exit;
    }
	  //------------------------------------------------------------------------------        
    public function checkemail_Byverifvendor($email){

        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorlogin');
        $this->db->where('Email', $email);
		$this->db->where('EmailVerify','0');
        $query = $this->db->get();
		//echo $this->db->last_query();exit;
        return $query->result();
    }
	  //------------------------------------------------------------------------------        
    public function checkemailverify_Byvendor($email,$emailotp){

        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorlogin');
        $this->db->where('Email', $email);
		$this->db->where('EmailOtpNumber', $emailotp);
        $query = $this->db->get();
       //echo $this->db->last_query();exit;
        return $query->result();
    }
	//------------------------------------------------------------------------------    
    public function update_profile_byVendoremail($data,$id){  
        $this->db->set($data); //value that used to update column  
        $this->db->where('Email', $id); //which row want to upgrade  
        $this->db->update(TBL__PREFIX.'vendorlogin',$data);
        //echo $this->db->last_query();exit;
    }
	
	
		//------------------------------------------------------------------------------
    public function userpremi_paymentbyid($id){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'user_prempayment');
		$this->db->where('Id',$id);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }
		//------------------------------------------------------------------------------
    public function vendorpremi_paymentbyid($id){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'vendor_prempayment');
		$this->db->where('Id',$id);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }
	
	//------------------------------------------------------------------------------
    public function getUserprodownl_byId($id){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'userprofilepayment');
		$this->db->where('Id',$id);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }  
	
	  //------------------------------------------------------------------------------
    public function getwhish_downloaduserid($id){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'userwhistlist');
		$this->db->where('Id', $id);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }  
	
	 //------------------------------------------------------------------------------    
    public function Weddingpublish_paid($data){  
	$this->db->insert(TBL__PREFIX.'vendorwedding_request',$data); 
        return $this->db->insert_id();
    }
		//------------------------------------------------------------------------------
    public function check_vendorwedding_request($id){ 
		$this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorwedding_request');
        $this->db->where('MemberId', $id);
		$ignore = array(1,2);
		//$this->db->where_not_in('Status','1');
		$this->db->where_in('Status',$ignore);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    } 
	
	//------------------------------------------------------------------------------
    public function getwedding_byId($id){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'vendorpayment');
		$this->db->where('Id',$id);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }
	
	
		 //------------------------------------------------------------------------------        
    public function getwedingpaided_vendorlist($id){  
		// subquery
		$this->db->select('MemberId')->from(TBL__PREFIX.'vendorwedding_request');
		$this->db->where('Status','2');
		$this->db->group_by('MemberId'); 
		$subQuery =  $this->db->get_compiled_select();
		// Main Query
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'vendorlogin');
		$this->db->where("Id IN($subQuery)", NULL, FALSE);
		$this->db->where('PStatus','1');	
		$this->db->where('PublishStatus','1');
		$this->db->where('VendorCategoryId', $id);
		if (isset($_GET['State'])) {
		$state=trim($_GET['State']); 
		if($state!=''){
		$this->db->where('StateId', $state);
		}
		}
		if (isset($_GET['city'])) {
		$city=trim($_GET['city']); 
		if($city!=''){
		$this->db->where('CityId', $city);
		}
		}
		$this->db->order_by("Id", "desc");
		
	
		
		$query=$this->db->get();
		//echo $query = $this->db->last_query();  exit;
		return $query->result();
    }
	 //------------------------------------------------------------------------------    
    public function wedding_viewcount($data){  
	$this->db->insert(TBL__PREFIX.'weddingviewcount',$data); 
	 //echo $this->db->last_query();exit;
       // return $this->db->insert_id();
    }
	
	  //------------------------------------------------------------------------------
    public function getwhishlist_byuserid($profid,$loginid){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'userwhistlist');
		$this->db->where('MemberId', $loginid);
		$this->db->where('ViewedId', $profid);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }  
	
//------------------------------------------------------------------------------
	public function getprofiledetails_vendorbyid($id){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'member');
		$this->db->where('VendorId', $id);
		$this->db->order_by("Id", "desc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
	}  	
	
	
//------------------------------------------------------------------------------
	public function admin_paided_vendorbyid($id){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'vendor_adminpayment');
		$this->db->where('VendorId', $id);
		$this->db->order_by("Id", "desc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
	}  	
	
	
	
	//------------------------------------------------------------------------------        
    public function getadminpay_download($id){  
		// subquery
		$this->db->select('Id')->from(TBL__PREFIX.'member');
		$this->db->where('VendorId',$id);
		$query=$this->db->get();
		//echo $query = $this->db->last_query();  exit;
		return $query->result();
    }
	
	//------------------------------------------------------------------------------        
    public function gettotdown_payiduserid($id){  
		// subquery
		$this->db->select('Id')->from(TBL__PREFIX.'member');
		$this->db->where('VendorId','44');
		$subQuery =  $this->db->get_compiled_select();
		// Main Query
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'userwhistlist');
		$this->db->where("ViewedId IN($subQuery)", NULL, FALSE);
		$this->db->where('(Status="2" or  Status="3")');
		$this->db->group_by('PaymentType,ViewedId'); 
		$query=$this->db->get();
		//echo $query = $this->db->last_query();  exit;
		return $query->result();
    }
	
	
	//------------------------------------------------------------------------------
    public function gettotdownpayiduserid($PaymentType,$ViewedId){ 
		$this->db->select('count(Id) as totdownload');
        $this->db->from(TBL__PREFIX.'userwhistlist');
        $this->db->where('PaymentType', $PaymentType);
		$this->db->where('ViewedId', $ViewedId);
        $query=$this->db->get();
       // echo $this->db->last_query()."<br>";
        $row = $query->result();
		return $row;
    } 
	
		//------------------------------------------------------------------------------
    public function searchprofile_paystatus($userid,$profileid){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'userwhistlist');
		$this->db->where('MemberId',$userid);
		$this->db->where('ViewedId',$profileid);
		$this->db->where('Status','2');
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }  
	
	
		//------------------------------------------------------------------------------
    public function getweddingdownloadprofile($id){ 
		$this->db->select('count(ViewedId) as totpro'); 
        $this->db->from(TBL__PREFIX.'weddingviewcount');
        $this->db->where('ViewedId', $id);
        $query=$this->db->get();
       // echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    } 
	
	  //------------------------------------------------------------------------------        
    public function checkemail_Byverifuser($email){

        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'member');
        $this->db->where('Email', $email);
		$this->db->where('EmailVerify','0');
        $query = $this->db->get();
		//echo $this->db->last_query();exit;
        return $query->result();
    }
	
	//------------------------------------------------------------------------------
    public function getvendor_catebyid($id){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'vendorcategory');
		$this->db->where('Id', $id);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    } 
	  //------------------------------------------------------------------------------    
    public function addmember_cart($data){  
	$this->db->insert(TBL__PREFIX.'member_cart',$data); 
			//echo $this->db->last_query();exit;
        return $this->db->insert_id();
    }
	
	//------------------------------------------------------------------------------
    public function check_cartstatus($MemberId,$ViewedId){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'member_cart');
		$this->db->where('MemberId', $MemberId);
		$this->db->where('ViewedId', $ViewedId);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    } 
		//------------------------------------------------------------------------------
    public function getusercart_count($id){ 
		$this->db->select('count(MemberId) as totcount'); 
        $this->db->from(TBL__PREFIX.'member_cart');
        $this->db->where('MemberId', $id);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    } 
		  //------------------------------------------------------------------------------
    public function getcart_byuserid($loginid){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'member_cart');
		$this->db->where('MemberId', $loginid);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }  
	
	//------------------------------------------------------------------------------
    public function deleteCart($id){ 
        $this->db->where('Id', $id);
        $this->db->delete(TBL__PREFIX.'member_cart'); 
    }   
	
		//------------------------------------------------------------------------------
    public function userpayment_updatebymemberid_viewid($data,$userid,$ViewedId){ 
        $this->db->set($data); //value that used to update column  
        $this->db->where('MemberId', $userid); //which row want to upgrade  
		$this->db->where('ViewedId', $ViewedId); //which row want to upgrade 
		$this->db->update(TBL__PREFIX.'userwhistlist',$data);
		     //echo $this->db->last_query();exit;
    } 

	//------------------------------------------------------------------------------
    public function deleteCart_bymemberid_viewid($userid,$ViewedId){ 
        $this->db->where('MemberId', $userid);  
		$this->db->where('ViewedId', $ViewedId); 
        $this->db->delete(TBL__PREFIX.'member_cart'); 
    }   


	 //------------------------------------------------------------------------------        
    public function vendor_indexpremimum_freelist(){  
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'vendorlogin');
		$this->db->where('PStatus','1');	
		$this->db->where('PublishStatus','1');
		$this->db->order_by("Id", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }

		
	 //------------------------------------------------------------------------------        
    public function mail_cart_listbyuserid($userid){  
		// subquery
		$this->db->select('ViewedId')->from(TBL__PREFIX.'member_cart');
		$this->db->where('MemberId',$userid);
		$subQuery =  $this->db->get_compiled_select();
		// Main Query
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'member');
		$this->db->where("Id IN($subQuery)", NULL, FALSE);
		$this->db->where('PStatus','1'); 
		
		$this->db->where('PublishStatus','1'); 
		$this->db->order_by("Id", "desc");
		$query=$this->db->get();
		//echo $query = $this->db->last_query();  exit;
		return $query->result();
    }
	//------------------------------------------------------------------------------
    public function userpaymentcart_updatebymemberid_viewid($data,$userid,$ViewedId){ 
        $this->db->set($data); //value that used to update column  
        $this->db->where('MemberId', $userid); //which row want to upgrade  
		$this->db->where('ViewedId', $ViewedId); //which row want to upgrade 
		$this->db->update(TBL__PREFIX.'member_cart',$data);
		     //echo $this->db->last_query();exit;
    } 
	//------------------------------------------------------------------------------
    public function Userpremimu_request($id){ 
		$this->db->select('*');
        $this->db->from(TBL__PREFIX.'userprem_request');
        $this->db->where('MemberId', $id);
		$this->db->where('Status','1');
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    }
	
	
	 //------------------------------------------------------------------------------    
    public function update_Userpremimu_request($data,$id){  
        $this->db->set($data); //value that used to update column  
        $this->db->where('Id', $id); //which row want to upgrade  
        $this->db->update(TBL__PREFIX.'userprem_request',$data);
        //echo $this->db->last_query();exit;
    }
	
	
		//------------------------------------------------------------------------------
    public function vendorwedding_reqstatusbyid($userid){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'vendorwedding_request');
		$this->db->where('MemberId',$userid);
		$this->db->where('Status','1');
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
    }  
	
	  //------------------------------------------------------------------------------    
    public function updatevendorwedding_reqstatusbyid($data,$id){  
        $this->db->set($data); //value that used to update column  
        $this->db->where('Id', $id); //which row want to upgrade  
        $this->db->update(TBL__PREFIX.'member',$data);
        //echo $this->db->last_query();exit;
    }
	
	//------------------------------------------------------------------------------        
    public function freeview_byuserid($userid){  
        $this->db->select('*');
        $this->db->from(TBL__PREFIX.'freeprofile_view');
        $this->db->where('Byadmin','1');
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }
	
	
	  //------------------------------------------------------------------------------    
    public function update_freemember($data,$userid,$freeid){  
        $this->db->set($data); //value that used to update column  
		$this->db->where('Byadmin','1');
        $this->db->where('MemberId',$userid);
		$this->db->where('Id',$freeid);
        $this->db->update(TBL__PREFIX.'freeprofile_view',$data);
        //echo $this->db->last_query();exit;
    }
	
	
	
	//------------------------------------------------------------------------------        
    public function getweddingpaid_byvendor($id){  
	
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'vendorwedding_request');
		$this->db->where('Status','2');	
		$this->db->where('MemberId', $id);
		$query=$this->db->get();
		//echo $query = $this->db->last_query();  exit;
		return $query->result();
    }
	
	
	//------------------------------------------------------------------------------        
    public function getpremiumpaid_byvendor($id){  
	
		$this->db->select('*');
		$this->db->from(TBL__PREFIX.'vendorprem_request');
		$this->db->where('Status','2');	
		$this->db->where('MemberId', $id);
		$query=$this->db->get();
		//echo $query = $this->db->last_query();  exit;
		return $query->result();
    }
	
	 
	
}

?>
