<?php namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Files\File;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;	
use App\Models\ConfigurationModel;
require 'vendor/autoload.php';
class Master_model extends Model
{
	public function __construct() {
		
		$email = \Config\Services::email();
		
		//require APPPATH.'library/My_PHPMailer.php';
	

		// Load Composer's autoloader
	
		
	}
	
	/*
		# function getRecordCount($tbl_name,$condition=FALSE)
		# * indicates paramenter is must
		# Use : 
			1) return number of rows
		# Parameters : 
			$tbl_name* =name of table 
			$condition=array('column_name1'=>$column_val1,'column_name2'=>$column_val2);
		
		# How to call:
			$this->master_model->getRecordCount('tbl_name',$condition_array);
	*/
	
	public function getRecordCount($tbl_name,$condition=array(),$like=array())
	{
		$db      = \Config\Database::connect();
		$builder = $db->table($tbl_name);
		if($condition!="" && count($condition)>0)
		{
			foreach($condition as $key=>$val)
			{
				$builder->where($key,$val);
			}
		}
		if(@count($like)>0 && $like!="")
		{
			foreach($like as $key=>$val)
			{$builder->like($key,$val);}
		}
		$num=$builder->countAllResults();
		
		return $num;
	}

	
	public function getRecords($tbl_name,$condition=array(),$select=FALSE,$order_by=array(),$start=FALSE,$limit=FALSE,$like=array())
	{
		
		$db      = \Config\Database::connect();
		$builder = $db->table($tbl_name);
		if($select!="")
		{$builder->select($select);}
		
		if(@count($condition)>0 && $condition!="")
		{
			$condition=$condition;
		}
		else
		{$condition=array();}
		if(@count($order_by)>0 && $order_by!="")
		{
			foreach($order_by as $key=>$val)
			{$builder->orderBy($key,$val);}
		}
		if(@count($like)>0 && $like!="")
		{
			foreach($like as $key=>$val)
			{$builder->like($key,$val);}
		}
		if($limit!="" || $start!="")
		{
			 $builder->limit($limit,$start);
		}
		
		$builder->where($condition);
		$rst=$builder->get();
		
		return $rst->getResultArray();
	}
	public function getRecordsWhereIn($tbl_name, $condition = array(), $select = FALSE, $order_by = array(), $start = FALSE, $limit = FALSE, $like = array(), $where_in = array())
	{
	    $db = \Config\Database::connect();
	    $builder = $db->table($tbl_name);
	    
	    if ($select != "") {
	        $builder->select($select);
	    }
	    
	    // Handle the basic conditions
	    if (count($condition) > 0) {
	        $builder->where($condition);
	    }
	    
	    // Handle WHERE IN conditions
	    if (count($where_in) > 0) {
	        foreach ($where_in as $key => $values) {
	            if (is_array($values)) {
	                $builder->whereIn($key, $values);
	            }
	        }
	    }
	    
	    // Handle ORDER BY
	    if (count($order_by) > 0) {
	        foreach ($order_by as $key => $val) {
	            $builder->orderBy($key, $val);
	        }
	    }
	    
	    // Handle LIKE conditions
	    if (count($like) > 0) {
	        foreach ($like as $key => $val) {
	            $builder->like($key, $val);
	        }
	    }
	    
	    // Handle LIMIT and OFFSET
	    if ($limit !== FALSE || $start !== FALSE) {
	        $builder->limit($limit, $start);
	    }
	    
	    $rst = $builder->get();
	    
	    return $rst->getResultArray();
	}

	public function getRecordsObj($tbl_name,$condition=array(),$select=FALSE,$order_by=array(),$start=FALSE,$limit=FALSE)
	{
		
		$db      = \Config\Database::connect();
		$builder = $db->table($tbl_name);
		if($select!="")
		{$builder->select($select);}
		
		if(@count($condition)>0 && $condition!="")
		{
			$condition=$condition;
		}
		else
		{$condition=array();}
		if(@count($order_by)>0 && $order_by!="")
		{
			foreach($order_by as $key=>$val)
			{$builder->orderBy($key,$val);}
		}
		if($limit!="" || $start!="")
		{
			 $builder->limit($limit,$start);
		}
		$builder->where($condition);
		$rst=$builder->get();
		
		return $rst->getResult();
	}
	public function getRecordsObjRow($tbl_name,$condition=array(),$select=FALSE,$order_by=array(),$start=FALSE,$limit=FALSE)
	{
		
		$db      = \Config\Database::connect();
		$builder = $db->table($tbl_name);
		if($select!="")
		{$builder->select($select);}
		
		if(@count($condition)>0 && $condition!="")
		{
			$condition=$condition;
		}
		else
		{$condition=array();}
		if(@count($order_by)>0 && $order_by!="")
		{
			foreach($order_by as $key=>$val)
			{$builder->orderBy($key,$val);}
		}
		if($limit!="" || $start!="")
		{
			 $builder->limit($limit,$start);
		}
		$builder->where($condition);
		$rst=$builder->get();
		
		return $rst->getRow();
	}
	public function insertRecord($tbl_name,$data_array,$insert_id=true)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table($tbl_name);
		if($builder->insert($data_array))
		{
			
			if($insert_id==true)
			{return $db->insertID(); }
			else
			{return true;}
		}
		else
		{return false;}
	}
	public function insertRecordBatch($tbl_name,$data_array)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table($tbl_name);
		if($builder->insertBatch($data_array))
		{
		  return true;
		}
		else
		{return false;}
	}
	

	public function updateRecord($tbl_name,$data_array,$pri_col,$id)
	{
		$db      = \Config\Database::connect();        
		$builder = $db->table($tbl_name);
		$builder->where($pri_col,$id);
		if($builder->update($data_array))
		
		
		{return true;}
		else
		{return false;}
	}
	public function updateRecordArr($tbl_name,$data_array,$whereArr)
	{
		$db      = \Config\Database::connect();        
		$builder = $db->table($tbl_name);
		$builder->where($whereArr);
		if($builder->update($data_array))
		
		
		{return true;}
		else
		{return false;}
	}
	public function getLastQuery()
	{
		$db      = \Config\Database::connect();
		$query = $db->getLastQuery();
		return (string)$query;exit;
	}
	/* create slug */
	function removeSpecalChars($string){
		return $result = preg_replace("/[^A-Za-z0-9 \s._\/]/", "", $string);
	}
	function create_slug($phrase,$tbl_name,$slug_col,$pri_col='',$id='',$maxLength=100000000000000)
	{
		$result = strtolower($phrase);
		$result = preg_replace("/[^A-Za-z0-9-\s._\/]/", "", $result);
		$result = trim(preg_replace("/[-\s]+/", " ", $result));
		$result = trim(substr($result, 0, $maxLength));
		$result = preg_replace("/\s/", "-", $result);
		$slug=$result;
		
		$db      = \Config\Database::connect();        
		$builder = $db->table($tbl_name);
		
		if($id!="")
		{  
			$builder->where($pri_col.' !=' ,$id);
			
		}
		
		$builder->where(array($slug_col=>$slug));
		$rst=$builder->get();
		
		
		// if($rst->getRow() > 0)
		// {
		// 	$count=$rst->getRow()+1;
		// 	return $slug=$slug.$count;
		// }
		// else
		// {return $slug;}
		// harshal below
		if ($rst->getNumRows() > 0) {
			$count = $rst->getNumRows() + 1;
			return $slug . '-' . $count;
		} else {
			return $slug;
		}
	}
	
	/*
		# function deleteRecord($tbl_name,$pri_col,$id)
		# * indicates paramenter is must
		# Use : 
			1) delete record from table, on successful deletion returns true.
		# Parameters : 
			1) $tbl_name* = name of table 
			2) $pri_col* = primary key or column name depending on which update query need to fire.
			3) $id* = primary column or condition column value.

		# How to call:
			$this->master_model->deleteRecord('tbl_name','pri_col',$id)
		# It will useful while deleting record from  single table. delete join will not work here.
	*/
	public function deleteRecord($tbl_name,$pri_col,$id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table($tbl_name);
		$builder->where($pri_col,$id);
		if($builder->delete())
		{return true;}
		else
		{return false;}
	}
	public function deleteRecordArr($tbl_name,$condition=array())
	{
		$db      = \Config\Database::connect();
		$builder = $db->table($tbl_name);
		$builder->where($condition);
		if($builder->delete())
		{return true;}
		else
		{return false;}
	}




	public function fSendMail($sToEmail = null, $sMessage = null, $sSubject = null)
    {
        $aEmailConfiguration = (new ConfigurationModel())->where('is_active', 0)->first();
        $emailConfig = config('Email');
        $email = \Config\Services::email();
        // $email->initialize($emailConfig);

         $email->initialize([
            'protocol' => !empty($aEmailConfiguration) ? $aEmailConfiguration['email_protocol'] : '',
            'SMTPHost' => !empty($aEmailConfiguration) ? $aEmailConfiguration['smtp_host'] : '',
            'SMTPPort' => !empty($aEmailConfiguration) ? intval($aEmailConfiguration['smtp_port']) : '',
            'SMTPUser' => !empty($aEmailConfiguration) ? $aEmailConfiguration['smtp_user'] : '',
            'SMTPPass' => !empty($aEmailConfiguration) ? $aEmailConfiguration['smtp_password'] : '',
            'mailType' => !empty($aEmailConfiguration) ? $aEmailConfiguration['smtp_crypto_type'] : '',
            'mailType' => 'html',
        ]);

        $email->setFrom(!empty($aEmailConfiguration) ? $aEmailConfiguration['mail_from'] :'info@zeplinix.com', $_ENV['PROJECT_NAME']);
        $email->setTo($sToEmail);
        $email->setSubject($sSubject);
        $email->setMessage($sMessage);
        if ($email->send()) {
            return true;
        } else {
            $errors = $email->printDebugger(['headers', 'body']);
            log_message('error', 'Email sending failed. ' . print_r($errors, true));
            return false;
        }
    }

    // filter date for db 
    function convertDateFormat($dateInMMDDYYYY) {
	    // Create a DateTime object from the input date
	    $date = \DateTime::createFromFormat('m-d-Y', $dateInMMDDYYYY);
	    
	    if ($date) {
	        // Return the date in YYYY-MM-DD format
	        return $date->format('Y-m-d');
	    } else {
	        // Handle error: invalid date format
	        return false;
	    }
	}

	function generateUniqueOrderNo() {
        // Example format: ORD-20240819-12345678 (PE + date + random number)
        return 'PE' . date('Ymd') . '' . strtoupper(substr(uniqid(), -8));
    }

    function generateUniqueSalesNo() {
        return date('Ymd') . '' .mt_rand(100000, 999999);
    }
		
	public function pagination($count, $per_page = 2,$page = 1, $url = '?'){        
    	/*$query = "SELECT COUNT(*) as `num` FROM {$query}";
    	$row = mysql_fetch_array(mysql_query($query));*/
    	$total = $count;
        $adjacents = "2"; 

    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
    	$prev = $page - 1;							
    	$next = $page + 1;
        $lastpage = ceil($total/$per_page);
    	$lpm1 = $lastpage - 1;
    	
    	$pagination = "";
    	if($lastpage > 1)
    	{	
    		$pagination .= "<ul class='pagination'>";
                    $pagination .= "<li class='details'>Page $page of $lastpage</li>";
    		if ($lastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $lastpage; $counter++)
    			{
    				if ($counter == $page)
    					$pagination.= "<li><a class='current'>$counter</a></li>";
    				else
    					$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    			}
    		}
    		elseif($lastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    				}
    				$pagination.= "<li class='dot'>...</li>";
    				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
    				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
    				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
    				$pagination.= "<li class='dot'>...</li>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    				}
    				$pagination.= "<li class='dot'>..</li>";
    				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
    				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
    			}
    			else
    			{
    				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
    				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
    				$pagination.= "<li class='dot'>..</li>";
    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    				}
    			}
    		}
    		
    		if ($page < $counter - 1){ 
    			$pagination.= "<li><a href='{$url}page=$next'>Next</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage'>Last</a></li>";
    		}else{
    			$pagination.= "<li><a class='current'>Next</a></li>";
                $pagination.= "<li><a class='current'>Last</a></li>";
            }
    		$pagination.= "</ul>\n";		
    	}
      
    
        return $pagination;
    } 
	
	 /******************************
    * Rand ID Generator
    ******************************/
	public function transID($mode = 3, $len = 12)
    {
        $result = "";
        if($mode == 1):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 2):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        elseif($mode == 3):
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 4):
            $chars = "0123456789";
        endif;

        $charArray = str_split($chars);
        for($i = 0; $i < $len; $i++) {
                $randItem = array_rand($charArray);
                $result .="".$charArray[$randItem];

        }
        return $result;

    }
    public function randomID($mode = 2, $len = 6)
    {
        $result = "";
        if($mode == 1):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 2):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        elseif($mode == 3):
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 4):
            $chars = "0123456789";
        endif;

        $charArray = str_split($chars);
        for($i = 0; $i < $len; $i++) {
                $randItem = array_rand($charArray);
                $result .="".$charArray[$randItem];

        }
        return $result;

    }
	/* 
		# function createThumb($file_name,$path,$width,$height,$maintain_ratio=FALSE)
		# * indicates paramenter is must
		# Use : 
			1) create thumb of uploaded image.
		# Parameters : 
			1) $file_name* = name of uploaded file 
			2) $path* = path of directory
			3) $width* = width of thumb
			4) $height* = height of thumb
			5) $maintain_ratio = if need to maintain ration of original image then pass true, in this case thumb may vary in
								height and width provided. default it is FALSE.

		# How to call:
			$this->master_model->createThumb($file_name,$path,$width,$height,$maintain_ratio=FALSE)
			
		# !!Important : thumb foler  name must be 'thumb'
	*/
	 public function captcha($resp)
    {
        $request 				= \Config\Services::request();
		$recaptchaResponse 	= $resp;
        $userIp				=  $request->getIPAddress();
        $secret 			= google_secret;
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
         
        $status= json_decode($output, true);
 
        if ($status['success']) {
           return true;
        }else{
            return false;
        }
 
       
    } 
	
	public function send_email($post=array())
	{
           		return true;	
       		
	}
	function sendsms_get($mobile_no,$message,$templaitId)
	{
		
		$sendtext = urlencode("$message");
		$username   = 'Ddauth';
		$password   = 'm1kw6vu2';
		$peid		= '1201159308150125712';
		$senderID 	= 'DDASVY';
		$ch = curl_init();
		$url 		= "https://gateway.leewaysoftech.com/xml-transconnect-api.php?username=$username&password=$password&mobile=$mobile_no&message=$sendtext&senderid=$senderID&peid=$peid&contentid=$templaitId";
		
		curl_setopt($ch,CURLOPT_URL,  $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POST, FALSE);
		//curl_setopt($ch, CURLOPT_POSTFIELDS,"");
		$buffer = curl_exec($ch);
		
		if(empty ($buffer))
		{ 
		 $error_msg = curl_error($ch);
		echo $error_msg; exit;
		}
	
		else
		{ return $buffer;  } // $buffer;
		curl_close($ch);
		return true;
			

	/*$sendsms = "https://api.infobip.com/api/v3/sendsms/plain?user=xpertcash&password=*****&sender=****&SMSText=$sendtext&GSM=$to&type=longSMS";


	$result = file_get_contents($sendsms);*/

	}
	function sendsms($mobile_no,$message,$templaitId)
	{
		return true;exit;
		$sendtext = urlencode("$message");
		$url 		= 'https://gateway.leewaysoftech.com/xml-transconnect-api.php';
		//$url 		= 'https://demoaaravsoftware.in/home/testSMS1';
		$username   = 'Ddauth';
		$password   = 'm1kw6vu2';
		$peid		= '1201159308150125712';
		$senderID 	= 'DDASVY';
		$ch = curl_init();
		 
		curl_setopt($ch,CURLOPT_URL,  $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"username=$username&password=$password&mobile=$mobile_no&message=$sendtext&senderid=$senderID&peid=$peid&contentid=$templaitId");
		//curl_setopt($ch, CURLOPT_POSTFIELDS,"mobile_no=$mobile_no&message=$message&templaitId=$templaitId");
		$buffer = curl_exec($ch);
		
		if(empty ($buffer))
		{ 
		 $error_msg = curl_error($ch);
		 return false;
		//echo $error_msg; exit;
		}
	
		else
		{ return $buffer;  } // $buffer;
		curl_close($ch);
		return true;
			

	/*$sendsms = "https://api.infobip.com/api/v3/sendsms/plain?user=xpertcash&password=*****&sender=****&SMSText=$sendtext&GSM=$to&type=longSMS";


	$result = file_get_contents($sendsms);*/

	}
	
	function sendsmsOld($mobile_no,$message,$templaitId){
	$sendtext = urlencode("$message");
	
		$url 		= 'http://online.dda.org.in/SMSSERVICE/API.ASMX/SendSMSWithTemplateId';
		$senderID 	= 'DDASVY';
		$ch = curl_init();
		 
		curl_setopt($ch,CURLOPT_URL,  $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "message=$message&mobileNumber=$mobile_no&senderId=$senderID&templateId=$templaitId");
		$buffer = curl_exec($ch);
		if(empty ($buffer))
		{ echo " buffer is empty "; }
		else
		{ return $buffer;  } // $buffer;
		curl_close($ch);
		return true;
			

	/*$sendsms = "https://api.infobip.com/api/v3/sendsms/plain?user=xpertcash&password=*****&sender=****&SMSText=$sendtext&GSM=$to&type=longSMS";


	$result = file_get_contents($sendsms);*/

	}
	/*this function used only for forgot pass and mail verification as on 18-Nov-2020*/
/*this function used only for forgot pass and mail verification as on 18-Nov-2020*/
	public function send_email_w_old($post=array())
	{
		$dt = $this->getRecords('email_id_master',array('mcount >'=>0),'',array('id'=>'RANDOM'));
		
		$mcount 	= $dt[0]['mcount']+1;
		$mail_id 	= $dt[0]['id'];
		$mailuser	= $dt[0]['mail'];
		$passcode 	= $dt[0]['passcode'];
		
		//print_r($dt);exit;
		define('SMTP_HOST','smtp.mail.gov.in'); //smtp.mail.gov.in mail.dda.org.in  smtp.openxchange.eu  smtpout.secureserver.net relay-hosting.secureserver.net
		define('SMTP_PORT',25);
		define('SMTP_USERNAME',$mailuser);
		define('SMTP_PASSWORD',$passcode);
		define('SMTP_AUTH',true);
		
		
		
		//$mail = new My_PHPMailer_File();
		$mail = new PHPMailer(true);
		//$mail = $mail->My_PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   			= SMTP_AUTH; // enabled SMTP authentication
        $mail->SMTPSecure			= ''; //Keep blank for non secure or for  
		//$mail->SMTPAutoTLS 			= true; 
		$mail->SMTPDebug = 4;
		// prefix for secure protocol to connect to the server
        $mail->Host       			= SMTP_HOST;      // setting GMail as our SMTP server
        $mail->Port       			= SMTP_PORT;      // SMTP port to connect to GMail
        $mail->Username   			= SMTP_USERNAME;  // user email address
        $mail->Password   			= SMTP_PASSWORD;  // password in GMail
        $mail->Charset				=  'iso-8859-1';   // password in GMail
        $mail->SetFrom($mailuser, $post['title']); //Who is sending the email
        $mail->AddReplyTo($mailuser,$post['title']);  //email address that receives the response
        $mail->Subject    = $post['subject'];
	    $mail->IsHTML(true);
		$data['base_url']=base_url();
		$htmlContent = $post['message'];
         //if(isset($post['view'])) { $view = $post['view']; }else{ $view = 'common-email'; }
		//$mail->MsgHTML($htmlContent); 
		
			$mail->MsgHTML(view('email/'.$post['view'],$post)); 
			$tou = explode('@',$post['to']);
			$mail->AddAddress($post['to'], $tou[0]);
			
		
		
			if(!$mail->Send()) {
				 //return true;
				 echo   "Error: " . $mail->ErrorInfo;
				echo $this->email->print_debugger();exit;
			
			
			} else 
				 {
					 $this->updateRecord('email_id_master',array('mcount'=>$mcount),'id',$mail_id);
					return true;	//echo 'hoiiiiiii';exit;
			 }
		try{	 }
		catch(Exception $e){
			 //$this->updateRecord('tbl_user_reg_master',array('mail_send'=>2),'email',$post['to']);
		 return true;
		} 
		
		     
       
       
	
	
	}
	 
		public function send_email_w($post=array(),$file_name=false)
	{
		return true;
		if($post['to']!='')
		{
			$dt = $this->getRecords('email_id_master',array('mcount >'=>0),'',array('id'=>'RANDOM'));
			$mcount 	= $dt[0]['mcount']+1;
			$mail_id 	= $dt[0]['id'];
			$mailuser	= $dt[0]['mail'];
			$passcode 	= $dt[0]['passcode'];
			
			//print_r($dt);exit;
			define('SMTP_HOST','relay.nic.in'); //smtp.mail.gov.in mail.dda.org.in  smtp.openxchange.eu  smtpout.secureserver.net relay-hosting.secureserver.net
			define('SMTP_PORT',25);
			define('SMTP_USERNAME',$mailuser);
			define('SMTP_PASSWORD',$passcode);
			define('SMTP_AUTH',false);
			
		   /*define('SMTP_HOST','smtp-relay.sendinblue.com'); //smtp.mail.gov.in mail.dda.org.in  smtp.openxchange.eu  smtpout.secureserver.net relay-hosting.secureserver.net
			define('SMTP_PORT',587);
			define('SMTP_USERNAME','impulseincare@gmail.com');
			define('SMTP_PASSWORD','kC0WtREN6TqM9IJV');
			define('SMTP_AUTH',true);*/
			
			$mail = new PHPMailer(true);
			//$mail = $mail->My_PHPMailer();
			$mail->IsSMTP(); // we are going to use SMTP
			$mail->SMTPAuth   			= SMTP_AUTH; // enabled SMTP authentication
			$mail->SMTPSecure			= ''; //Keep blank for non secure or for  
			$mail->SMTPAutoTLS 			= false; 
			// prefix for secure protocol to connect to the server
			$mail->Host       			= SMTP_HOST;      // setting GMail as our SMTP server
			$mail->Port       			= SMTP_PORT;      // SMTP port to connect to GMail
			$mail->Username   			= SMTP_USERNAME;  // user email address
			$mail->Password   			= SMTP_PASSWORD;  // password in GMail
			  $mail->Charset				=  'iso-8859-1';   // password in GMail
			$mail->SetFrom($mailuser, $post['title']); //Who is sending the email
			$mail->AddReplyTo($mailuser,$post['title']);  //email address that receives the response
			$mail->Subject    = $post['subject'];
			$mail->IsHTML(true);
			$data['base_url']=base_url();
			$htmlContent = $post['message'];
			 
			if($file_name!='')
			{
			$mail->addAttachment("public/uploadsdata/payment_notice/".$file_name);
			}
			try{ 
			$mail->MsgHTML(view('email/'.$post['view'],$post)); 
			$tou = explode('@',$post['to']);
			$mail->AddAddress($post['to'], $tou[0]);
			
				if(!$mail->Send()) {
					return false;
					 //echo   "Error: " . $mail->ErrorInfo;
					//echo $this->email->print_debugger();
			} else {
					 $this->updateRecord('email_id_master',array('mcount'=>$mcount),'id',$mail_id);
						return true;	//echo 'hoiiiiiii';exit;
					 }
			}
			catch(Exception $e){
				 //$this->updateRecord('tbl_user_reg_master',array('mail_send'=>2),'email',$post['to']);
			 return true;
			} 
		}else{
			 return false;
		}
	
	}
		public function send_multiple_email_w($post=array())
	{
		// return true;
		if($post['to']!='')
		{
			$dt = $this->getRecords('email_id_master',array('mcount >'=>0),'',array('id'=>'RANDOM'));
			$mcount 	= $dt[0]['mcount']+1;
			$mail_id 	= $dt[0]['id'];
			$mailuser	= $dt[0]['mail'];
			$passcode 	= $dt[0]['passcode'];
			
			//print_r($dt);exit;
				/*define('SMTP_HOST','relay.nic.in'); //smtp.mail.gov.in mail.dda.org.in  smtp.openxchange.eu  smtpout.secureserver.net relay-hosting.secureserver.net
			define('SMTP_PORT',25);
			define('SMTP_USERNAME',$mailuser);
			define('SMTP_PASSWORD',$passcode);
			define('SMTP_AUTH',false);*/
			
		   define('SMTP_HOST','smtp-relay.sendinblue.com'); //smtp.mail.gov.in mail.dda.org.in  smtp.openxchange.eu  smtpout.secureserver.net relay-hosting.secureserver.net
			define('SMTP_PORT',587);
			define('SMTP_USERNAME','impulseincare@gmail.com');
			define('SMTP_PASSWORD','kC0WtREN6TqM9IJV');
			define('SMTP_AUTH',true);
			//$mail = new My_PHPMailer_File();
			$mail = new PHPMailer(true);
			//$mail = $mail->My_PHPMailer();
			$mail->IsSMTP(); // we are going to use SMTP
			$mail->SMTPAuth   			= SMTP_AUTH; // enabled SMTP authentication
			$mail->SMTPSecure			= ''; //Keep blank for non secure or for  
			$mail->SMTPAutoTLS 			= false; 
			// prefix for secure protocol to connect to the server
			$mail->Host       			= SMTP_HOST;      // setting GMail as our SMTP server
			$mail->Port       			= SMTP_PORT;      // SMTP port to connect to GMail
			$mail->Username   			= SMTP_USERNAME;  // user email address
			$mail->Password   			= SMTP_PASSWORD;  // password in GMail
			  $mail->Charset				=  'iso-8859-1';   // password in GMail
			$mail->SetFrom($mailuser, $post['title']); //Who is sending the email
			$mail->AddReplyTo($mailuser,$post['title']);  //email address that receives the response
			$mail->Subject    = $post['subject'];
			$mail->IsHTML(true);
			$data['base_url']=base_url();
			$htmlContent = $post['message'];
			$mail->MsgHTML(view('email/'.$post['view'],$post)); 
			$tou = explode('@',$post['to']);
			$mail->AddAddress($post['to'], $tou[0]);
			
				if(!$mail->Send()) {
					return false;
					 //echo   "Error: " . $mail->ErrorInfo;
					//echo $this->email->print_debugger();
			} else {
					 $this->updateRecord('email_id_master',array('mcount'=>$mcount),'id',$mail_id);
						return true;	//echo 'hoiiiiiii';exit;
					 }
			try{ }
			catch(Exception $e){
				 //$this->updateRecord('tbl_user_reg_master',array('mail_send'=>2),'email',$post['to']);
			 return true;
			} 
		}else{
			 return false;
		}
	
	}
	
	public function getCountry($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('tbl_country_master');
		$dts = $builder->select('country')
		->where('id',$id)
		->get()
		->getRow();
		return $dts->country;
	}
	public function getState($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('tbl_state_master');
		$dts =$builder->select('state')
		->where('id',$id)
		->get()
		->getRow();
		return $dts->state;
	}
	public function getCity($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('tbl_city_master');
		$dts = $builder->select('city')
		->where('id',$id)
		->get()
		->getRow();
		return $dts->city;
		
	}
	public function getComplexTitle($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('tbl_complex_master as cm');
		$dts = $builder->select('cm.fld_type,cm.fld_complex_id,cm.title_name,cm.fld_complex_name')
		->where('cm.fld_complex_id',$id)
		->get()
		->getRow();
		return $dts;
		
	}
	public function getUserData($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('tbl_user_master as u');
		$dts = $builder->select('u.marital_status,u.fld_sixty_age_status,u.fld_sixty_date,u.fld_membership_expiry,mem.fld_membership_short_name,mem.fld_is_two_level_approval,u.application_no,u.fld_mebership_no,u.link_generate_date,cm.fld_type,u.fld_debar_status,mem.fld_mem_type,u.first_name,u.last_name,u.mobile,u.user_email,cm.fld_complex_id,cm.fld_user_reg_count,cm.title_name,cm.fld_complex_name,u.membership_type,u.complex_name,u.user_id,u.fld_admin_verify,u.fld_seceretary_verify,u.fld_seceretary_co_verify,u.fld_comm_verify,u.fld_dir_sport_verify')
		->join('tbl_complex_master as cm','cm.fld_complex_id=u.complex_name')
		->join('tbl_membership_type_master as mem','mem.fld_mem_type_id=u.membership_type')
		->where('user_id',$id)
		->get()
		->getRow();
		return $dts;
		
	}
	public function getDependantDetais($userID=false){
		
		$db      = \Config\Database::connect(); 
		$builder = $db->table('tbl_user_master user');
		$builder->select("	user.user_email,
							user.user_id,
							user.fld_membership_expiry,
							user.membership_type,
							m.fld_dp_email as dp_email,
							user.mobile,
							m.fld_dp_membership_no as fld_mebership_no,
							user.address,
							user.pincode,
							user.adhaar_number,
							user.application_no,
							m.fld_dp_fname as first_name,
							m.fld_dp_lname as last_name,
							cm.fld_complex_name as complex_name,
							cm.fld_complex_id,
							cm.title_name
							"
						 );
		$builder->where('m.fld_dp_id',$userID);
		$builder->join('tbl_membership_type_master as mt','mt.fld_mem_type_id=user.membership_type','left');
		$builder->join('tbl_complex_master as cm','cm.fld_complex_id=user.complex_name','left');
		$builder->join('tbl_dependant_master as m','m.fld_dp_user_id=user.user_id','left');
			
		$rst			= $builder->get();
		$members= $rst->getRow();
		return $members;
	}
	public function getCasualData($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('tbl_causal_user_master as user');
		$dts = $builder->select('user.fld_user_email as user_email,
							user.fld_ca_user_id as user_id,
							user.fld_mobile as mobile,
							user.fld_gender as sex,
							user.fld_birth_date as birth_date,
							user.fld_father_name as father_name,
							user.fld_ca_membership_no as fld_mebership_no,
							user.fld_adhaar_number as adhaar_number,
							user.fld_user_photo as user_photo,
							user.fld_first_name as first_name,
							user.fld_last_name as last_name,
							user.fld_complex_name as fld_complex_id,
							cm.fld_complex_name as complex_name,
							cm.title_name
							'
						)
		->join('tbl_complex_master as cm','cm.fld_complex_id=user.fld_complex_name','left')
		->where('user.fld_ca_user_id',$id)
		->get()
		->getRow();
		return $dts;
		
	}
	public function getUserPaymentDetials($user_id)
	{
		
		$userd = $this->getRecords('tbl_user_master',array('user_id'=>$user_id),
	   'membership_type,membership_period,complex_name,subcategory_name,nationaility,fld_mebership_no');
	  
		$db      = \Config\Database::connect();
		$builder = $db->table('tbl_complex_membership_price_master');
		$builder->select("fld_currency,fld_member_entry_fee,fld_member_entry_fee_gst,fld_total_member_entry_fee");
		$builder->where('fld_complex_id',$userd[0]['complex_name']);
		$builder->where('fld_membership_ids',$userd[0]['membership_type']);
		$builder->where('fld_from_date <=',date('Y-m-d'));
		$builder->orderBy('fld_from_date','DESC');
		$builder->limit(1);
		//$builder->where('fld_membership_ids',$userd[0]['membership_type']);
		if($userd[0]['subcategory_name']!='')
		{	
			$builder->where('fld_subcategory_name',$userd[0]['subcategory_name']);
		}
		if($userd[0]['nationaility']!='')
		{	
			$builder->where('fld_nationaility',$userd[0]['nationaility']);
		}
		if($userd[0]['membership_period']!=0 && $userd[0]['membership_period']!=''){
			$builder->where('fld_membership_period',$userd[0]['membership_period']);
		}
		
		 
		$dts =$builder->get();
		$dts = $dts ->getRow();
		return $dts;
		
	}
	public function getUserDataSpous($id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('tbl_user_spouse_master as u');
		$dts = $builder->select('mem.fld_membership_short_name,mem.fld_is_two_level_approval,u.application_no,u.mobile,u.fld_mebership_no,u.link_generate_date,cm.fld_type,u.fld_debar_status,mem.fld_mem_type,u.first_name,u.last_name,u.user_email,cm.fld_complex_id,cm.fld_user_reg_count,cm.title_name,cm.fld_complex_name,u.membership_type,u.complex_name,u.user_id,u.fld_admin_verify,u.fld_seceretary_verify,u.fld_seceretary_co_verify,u.fld_comm_verify,u.fld_dir_sport_verify')
		->join('tbl_complex_master as cm','cm.fld_complex_id=u.complex_name')
		->join('tbl_membership_type_master as mem','mem.fld_mem_type_id=u.membership_type')
		->where('user_id',$id)
		->get()
		->getRow();
		return $dts;
		
	}
	public function insertRequestDetails($data_array=array(),$insert_id=true)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('tbl_request_master');
		if($builder->insert($data_array))
		{
			
			if($insert_id==true)
			{return $db->insertID(); }
			else
			{return true;}
		}
		else
		{return false;}
		
	}
	public function getRequestDetails($user_id)
	{
		
		$db      = \Config\Database::connect(); 
		$builder = $db->table('tbl_request_master r');
		$builder->select("r.fld_user_id,r.fld_membership_no,cm.fld_complex_name as complex_name,m.fld_mem_type as membership_name,r.fld_reject_reason,r.fld_request_status,a.role_id,a.firstname,a.lastname,r.fld_created_date");
		$builder->where('r.fld_user_id',$user_id);
		$builder->where('r.fld_user_reg_type',0);
		$builder->orderBy('r.fld_request_id','DESC');
		$builder->join('tbl_complex_master as cm','cm.fld_complex_id=r.fld_complex_id','left');
		$builder->join('tbl_membership_type_master as m','m.fld_mem_type_id=r.fld_membership_id','left');
		$builder->join('admin as a','a.id=r.fld_created_by');
		$rst=$builder->get();
		
		return $rst->getResultArray();
	}
	public function getRequestDetailsTrackApp($user_id)
	{
		
		$db      = \Config\Database::connect(); 
		$builder = $db->table('tbl_request_master r');
		$builder->select("r.fld_user_id,r.fld_membership_no,cm.fld_complex_name as complex_name,m.fld_mem_type as membership_name,r.fld_reject_reason,r.fld_request_status,a.role_id,a.firstname,a.lastname,r.fld_created_date");
		$builder->where('r.fld_user_id',$user_id);
		$builder->where('r.fld_user_reg_type',0);
		$builder->where('r.fld_request_status',2);
		$builder->limit(1);
		$builder->orderBy('r.fld_request_id','DESC');
		$builder->join('tbl_complex_master as cm','cm.fld_complex_id=r.fld_complex_id','left');
		$builder->join('tbl_membership_type_master as m','m.fld_mem_type_id=r.fld_membership_id','left');
		$builder->join('admin as a','a.id=r.fld_created_by');
		$rst=$builder->get();
		
		return $rst->getResultArray();
	}
	public function getAgeCount($date,$endDate=false)
	{
			$datetime1 = date_create($date);//1989-10-01 date in YYYY-MM-DD Format
			if($endDate==''){
			$curDate	= date('Y-m-d');
			$datetime2 = date_create($curDate);
			}else{
				$curDate	= date('Y-m-d',strtotime($endDate));
				$datetime2 = date_create($curDate);
			}
		 
		  // Calculates the difference between DateTime objects
		  $interval = date_diff($datetime1, $datetime2);
		 
		  // Printing result in years & months format
		  return $interval->format('%y');
	}
	
	function getMonthCountOLD($startDate, $endDate) {
		$retval = "";

		// Assume YYYY-mm-dd - as is common MYSQL format
		$splitStart = explode('-', $startDate);
		$splitEnd = explode('-', $endDate);

		if (is_array($splitStart) && is_array($splitEnd)) {
			$difYears = $splitEnd[0] - $splitStart[0];
			$difMonths = $splitEnd[1] - $splitStart[1];
			$difDays = $splitEnd[2] - $splitStart[2];

			$retval = ($difDays >= 0) ? $difMonths : $difMonths - 1;
			$retval += $difYears * 12;
		}
		return $retval;
	}
	function getAgeMonthCount($startD, $endD) {
		$retval = "";

			$d1 = strtotime($startD);
			$d2 = strtotime('first day of next month',strtotime($endD));
			$min_date = min($d1, $d2);
			$max_date = max($d1, $d2);
			$i = 0;
			 
			while (($min_date = strtotime("+1 MONTH", $min_date)) < $max_date) 
			{
				$i++;
				//$startDate 	= date('Y-m-d',$min_date);
				//$endDate 	=  date('Y-m-d',strtotime('last day of this month',strtotime($startDate)));
			}
			
		return $i;
	}
	function getMonthCount($startD, $endD) {
		$retval = "";

			$d1 = strtotime("-1 MONTH",strtotime($startD));
			$d2 = strtotime('first day of next month',strtotime($endD));
			$min_date = min($d1, $d2);
			$max_date = max($d1, $d2);
			$i = 0;
			 
			while (($min_date = strtotime("+1 MONTH", $min_date)) < $max_date) 
			{
				$i++;
				//$startDate 	= date('Y-m-d',$min_date);
				//$endDate 	=  date('Y-m-d',strtotime('last day of this month',strtotime($startDate)));
			}
			
		return $i;
	}
	public function getRequestDetailsSpouse($user_id)
	{
		
		$db      = \Config\Database::connect(); 
		$builder = $db->table('tbl_request_master r');
		$builder->select("r.fld_user_id,r.fld_membership_no,cm.fld_complex_name as complex_name,m.fld_mem_type as membership_name,r.fld_reject_reason,r.fld_request_status,a.role_id,a.firstname,a.lastname,r.fld_created_date");
		$builder->where('r.fld_user_id',$user_id);
		$builder->where('r.fld_user_reg_type',2);
		$builder->orderBy('r.fld_request_id','DESC');
		$builder->join('tbl_complex_master as cm','cm.fld_complex_id=r.fld_complex_id','left');
		$builder->join('tbl_membership_type_master as m','m.fld_mem_type_id=r.fld_membership_id','left');
		$builder->join('admin as a','a.id=r.fld_created_by');
		$rst=$builder->get();
		
		return $rst->getResultArray();
	}
	public function getNotificationDetails($user_id=false)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('tbl_notification_master r');
		$builder->limit(5);
		$builder->select("cm.fld_complex_name as complex_name,
		r.fld_membership_no,
		m.fld_mem_type as membership_name,
		r.fld_reject_reason,
		r.fld_request_status,
		a.role_id,
		a.firstname,
		a.lastname,
		u.user_photo,
		u.first_name,
		u.last_name,
		r.fld_created_date"
		);
		$builder->where('r.fld_seen_status',0);
		if($user_id!=''){
		$builder->where('r.fld_user_id',$user_id);
		}
		$builder->orderBy('r.fld_request_id','DESC');
		
		$builder->join('tbl_complex_master as cm','cm.fld_complex_id=r.fld_complex_id','left');
		$builder->join('tbl_membership_type_master as m','m.fld_mem_type_id=r.fld_membership_id','left');
		$builder->join('admin as a','a.id=r.fld_created_by');
		$builder->join('tbl_user_master as u','u.user_id=r.fld_user_id');
		
		$rst=$builder->get();
		
		return $rst->getResultArray();
	}
	public function getNotificationDetailsSec()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('tbl_notification_master r');
		$builder->limit(5);
		$builder->select("cm.fld_complex_name as complex_name,
		r.fld_membership_no,
		m.fld_mem_type as membership_name,
		r.fld_reject_reason,
		r.fld_request_status,
		a.role_id,
		a.firstname,
		a.lastname,
		u.user_photo,
		u.first_name,
		u.last_name,
		r.fld_created_date"
		);
		$builder->where('r.fld_seen_sec_status',0);
		$builder->orderBy('r.fld_request_id','DESC');
		
		$builder->join('tbl_complex_master as cm','cm.fld_complex_id=r.fld_complex_id','left');
		$builder->join('tbl_membership_type_master as m','m.fld_mem_type_id=r.fld_membership_id','left');
		$builder->join('admin as a','a.id=r.fld_created_by');
		$builder->join('tbl_user_master as u','u.user_id=r.fld_user_id');
		$rst=$builder->get();
		
		return $rst->getResultArray();
	}
	
	public function getIndianCurrency(float $number)
	{
		$decimal = round($number - ($no = floor($number)), 2) * 100;
		$hundred = null;
		$digits_length = strlen($no);
		$i = 0;
		$str = array();
		$words = array(0 => '', 1 => 'one', 2 => 'two',
			3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
			7 => 'seven', 8 => 'eight', 9 => 'nine',
			10 => 'ten', 11 => 'eleven', 12 => 'twelve',
			13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
			16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
			19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
			40 => 'forty', 50 => 'fifty', 60 => 'sixty',
			70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
		$digits = array('', 'hundred','thousand','lakh', 'crore');
		while( $i < $digits_length ) {
			$divider = ($i == 2) ? 10 : 100;
			$number = floor($no % $divider);
			$no = floor($no / $divider);
			$i += $divider == 10 ? 1 : 2;
			if ($number) {
				$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
			} else $str[] = null;
		}
		$Rupees = implode('', array_reverse($str));
		$paise = ($decimal > 0) ? "And " . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
		
		return  ucwords(($Rupees ? $Rupees . ' ' : '') . $paise) .' Only';
	}
	public function encrypt($plainText,$key)
		{
			$key = $this->hextobin(md5($key));
			$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
			$openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
			$encryptedText = bin2hex($openMode);
			return $encryptedText;
		}

		/*
		* @param1 : Encrypted String
		* @param2 : Working key provided by CCAvenue
		* @return : Plain String
		*/
	public function decrypt($encryptedText,$key)
		{
			$key = $this->hextobin(md5($key));
			$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
			$encryptedText = $this->hextobin($encryptedText);
			$decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
			return $decryptedText;
		}
   
	public function hextobin($hexString) 
		 { 
			$length = strlen($hexString); 
			$binString="";   
			$count=0; 
			while($count<$length) 
			{       
				$subString =substr($hexString,$count,2);           
				$packedString = pack("H*",$subString); 
				if ($count==0)
				{
					$binString=$packedString;
				} 
				
				else 
				{
					$binString.=$packedString;
				} 
				
				$count+=2; 
			} 
				return $binString; 
		  }
	 public function decryptPass($ciphertext, $password) {
    $ciphertext = base64_decode($ciphertext);
    if (substr($ciphertext, 0, 8) != "Salted__") {
        return false;
    }
    $salt = substr($ciphertext, 8, 8);
    $keyAndIV = $this->evpKDF($password, $salt);
    $decryptPassword = openssl_decrypt(
            substr($ciphertext, 16), 
            "aes-256-cbc",
            $keyAndIV["key"], 
            OPENSSL_RAW_DATA, // base64 was already decoded
            $keyAndIV["iv"]);

    return $decryptPassword;
	}
	public function evpKDF($password, $salt, $keySize = 8, $ivSize = 4, $iterations = 1, $hashAlgorithm = "md5") {
    $targetKeySize = $keySize + $ivSize;
    $derivedBytes = "";
    $numberOfDerivedWords = 0;
    $block = NULL;
    $hasher = hash_init($hashAlgorithm);
    while ($numberOfDerivedWords < $targetKeySize) {
        if ($block != NULL) {
            hash_update($hasher, $block);
        }
        hash_update($hasher, $password);
        hash_update($hasher, $salt);
        $block = hash_final($hasher, TRUE);
        $hasher = hash_init($hashAlgorithm);

        // Iterations
        for ($i = 1; $i < $iterations; $i++) {
            hash_update($hasher, $block);
            $block = hash_final($hasher, TRUE);
            $hasher = hash_init($hashAlgorithm);
        }

        $derivedBytes .= substr($block, 0, min(strlen($block), ($targetKeySize - $numberOfDerivedWords) * 4));

        $numberOfDerivedWords += strlen($block)/4;
    }

    return array(
        "key" => substr($derivedBytes, 0, $keySize * 4),
        "iv"  => substr($derivedBytes, $keySize * 4, $ivSize * 4)
    );
}
	public function updateExpiryTemp(){
		$db      = \Config\Database::connect(); 
		$builder = $db->table('tbl_user_master user');
		 
		$builder->select(	
							"user.user_email,
							user.user_id,
							user.fld_mebership_no,
							user.first_name,user.last_name,
							user.membership_type as meber_type,
						    user.fld_membership_assign_date,
							user.fld_membership_expiry,
							 
							");
		$builder->where('user.reg_step5',1);
		$builder->where('user.fld_is_transfer',0);
		$builder->where('user.fld_debar_status',0);			
		$builder->where('user.fld_membership_cancel',0);			
		$builder->where('user.fld_mebership_no !=',NULL);			
		$builder->where('user.fld_membership_assign_date !=',NULL);			
		$builder->where('user.fld_membership_expiry',NULL);			
		//$builder->where('user.membership_type',10);			
		$builder->orderBy('user.user_id','DESC');
		$membership_type = 10;
		$mebArray=array(10,13);
		$builder->wherein('user.membership_type',$mebArray);
		//$builder->Orwhere('user.membership_type',13);
		 
		 
		
		$rst			= $builder->get();
		$data['members'] = $members	= $rst->getResultArray();
		//echo '<pre>'; print_r($data['members']);exit;
		foreach($members as $memb)
		{
			$user_id = $memb['user_id'];
			if($memb['meber_type']==10)
			{
			$memEndDate1 = date('Y-m-d',strtotime('+85 Days',strtotime($memb['fld_membership_assign_date'])));
			$memEndDate  = date('Y-m-d',strtotime('Last day of this month',strtotime($memEndDate1)));
			$UpArray  = array('fld_membership_expiry' =>$memEndDate);
			$this->updateRecord('tbl_user_master',$UpArray,'user_id',$user_id);
			}
			if($memb['meber_type']==13)
			{
			 
			$memEndDate  = date('Y-m-d',strtotime('Last day of this month',strtotime($memb['fld_membership_assign_date'])));
			$UpArray  = array('fld_membership_expiry' =>$memEndDate);
			$this->updateRecord('tbl_user_master',$UpArray,'user_id',$user_id);
			}
			
		}
		return true;
	}
	
		  
}

?>