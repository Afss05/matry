<?php
class Wedding_model extends CI_Model
{
       
    public function __construct()
    {
		parent::__construct();	
		$this->load->library('Chsslibrary');
    }
   
   //duplicate record
   //DELETE FROM cm_citymaster WHERE Id NOT IN (SELECT * FROM (SELECT MIN(n.id) FROM cm_citymaster n GROUP BY n.CityName) x)
   
   //------------------------------------------------------------------------------    
    public function addmember($data){  
		$this->db->insert(TBL__PREFIX2.'wedding',$data); 
		//echo $this->db->last_query();exit;
		return $this->db->insert_id();
    }
	//------------------------------------------------------------------------------    
    public function addPhoto($data){  
		$this->db->insert(TBL__PREFIX2.'wedding_photo',$data); 
		//echo $this->db->last_query();exit;
		return $this->db->insert_id();
    }
	//------------------------------------------------------------------------------
	public function getwed(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'wedding');
		$this->db->order_by("Id", "desc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
	}
	
	
	//------------------------------------------------------------------------------
	public function getwed_byid($id){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'wedding');
		$this->db->where('Id', $id);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		$row = $query->result();
		return $row;
	}
	
	// ------------------------------------------------------------------------------
    
    public function update_byid($data,$id)
    {
		$this->db->set($data); //value that used to update column  
        $this->db->where('Id', $id); //which row want to upgrade  
        $this->db->update(TBL__PREFIX2.'wedding',$data);
		//echo $this->db->last_query();exit;
    }
	
	
	//------------------------------------------------------------------------------
    public function deleteProfile($id){ 
      
		$this->db->from(TBL__PREFIX2.'wedding_photo');
		$this->db->where('MemberId', $id);
		$query=$this->db->get();
		$row = $query->result();
		
		//print_r($row); die;
		foreach($row as $item){
			$FilePath=$item->FilePath;
			$delete_path='assets/Weddingimages/'.$FilePath;
			if (file_exists('assets/Weddingimages/' . $FilePath)) {
				chmod($delete_path,0755);
				unlink("$delete_path");
				$this->db->where('MemberId', $id);
				   
				$this->db->delete(TBL__PREFIX2.'wedding_photo'); 
				  // echo $this->db->last_query();exit;
			}
			
		}
		$id=$this->db->where('Id', $id);
        $this->db->delete(TBL__PREFIX2.'wedding'); 
    }  
	
	 //------------------------------------------------------------------------------
    public function getprofileimage_byid($id){ 
        $this->db->select('*');
        $this->db->from(TBL__PREFIX2.'wedding_photo');
        $this->db->where('MemberId', $id);
        $query=$this->db->get();
        //echo $this->db->last_query();exit;
        $row = $query->result();
		return $row;
    } 
	
	
	 //------------------------------------------------------------------------------
    public function deleteprofile_imagebyid($id){ 
	
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'wedding_photo');
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
			$delete_path='assets/Weddingimages/'.$FilePath;
			chmod($delete_path,0755);
			unlink("$delete_path");
			$this->db->where('Id', $id);
			$this->db->delete(TBL__PREFIX2.'wedding_photo'); 
		}
 
    } 
	
	//------------------------------------------------------------------------------
	public function getwedding_status(){ 
		$this->db->select('*');
		$this->db->from(TBL__PREFIX2.'wedding');
		$this->db->where('PStatus','1');
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result();
	}
	
	//----------------------------------------------   
    public function wedding_total()
    {
		$sql = "select *  from " . TBL__PREFIX2 . "wedding";
		//echo $sql;die;
		$query = $this->db->query($sql);
		return $query->num_rows();
    }
	
	//-----------------------------------------------
    public function wedding_report($limit,$offset){ 
	
	$tail = "";
	$tail .= " limit $offset,$limit";

	$sql="SELECT * FROM ".TBL__PREFIX2."wedding  order by Id desc $tail ";
	
	//echo $sql;die;
	$query = $this->db->query($sql);
		
	return $query->result();

    }  
}

?>
