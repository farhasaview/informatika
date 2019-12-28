<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
   
 class Lupa_password extends CI_Controller {  
   
   
     public function index()  
     {  
         $this->load->model('M_account');
         $this->form_validation->set_rules('email', 'Email', 'required|valid_email');   
         
         if($this->form_validation->run() == FALSE) {  
             $data['title'] = 'Halaman Reset Password';  
             $this->load->view('admin/lupa_pw',$data);  
         }else{  
             $email = $this->input->post('email');   
             $clean = $this->security->xss_clean($email);  
             $userInfo = $this->M_account->getUserInfoByEmail($clean);  
               
             if(!$userInfo){  
               $this->session->set_flashdata('sukses', 'email address salah, silakan coba lagi.');  
               redirect(base_url('login'),'refresh');   
             }    
               
             //build token             
             $token = $this->M_account->insertToken($userInfo->user_id);              
             $qstring = $this->base64url_encode($token);           
             $url = base_url() . '/lupa_password/reset_password/token/' . $qstring;  
             $link = '<a href="' . $url . '">' . $url . '</a>';   
               
             $message = '';             
             $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
                 password anda.</strong><br>';  
             $message .= '<strong>Silakan klik link ini:</strong> ' . $link;         
   
             $this->send_email($message, $email); //send this through mail  
             exit;   
         }
     }
   
     public function reset_password()  
     {  
      $this->load->model('M_account');
       $token = $this->base64url_decode($this->uri->segment(4));           
       $cleanToken = $this->security->xss_clean($token);  
         
       $user_info = $this->M_account->isTokenValid($cleanToken); //either false or array();          
         
       if(!$user_info){  
         $this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');  
         redirect(base_url('login'),'refresh');   
       }    
   
       $data = array(  
         'title'=> 'Halaman Reset Password',  
         'nama'=> $user_info->nama,   
         'email'=>$user_info->email,   
         'token'=>$this->base64url_encode($token)  
       );  
         
       $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');  
       $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');         
         
       if ($this->form_validation->run() == FALSE) {    
         $this->load->view('admin/v_reset_password', $data);  
       }else{  
                           
         $post = $this->input->post(NULL, TRUE);          
         $cleanPost = $this->security->xss_clean($post);          
         $hashed = md5($cleanPost['password']);          
         $cleanPost['password'] = $hashed;  
         $cleanPost['user_id'] = $user_info->user_id;  
         unset($cleanPost['passconf']);          
         if(!$this->M_account->updatePassword($cleanPost)){  
           $this->session->set_flashdata('sukses', 'Update password gagal.');  
         }else{  
           $this->session->set_flashdata('sukses', 'Password anda sudah  
             diperbaharui. Silakan login.');  
         }  
         redirect(base_url('login'),'refresh');         
       }  
     }

     //kirim token reset password lewat email
      public function send_email($param, $email) 
      {  
        $this->load->model('M_account');
         $config = Array(  
          'protocol' => 'smtp',  
          'smtp_host' => 'ssl://smtp.googlemail.com',  
          'smtp_port' => 465,  
          'smtp_user' => 'gmailandreams@gmail.com',   
          'smtp_pass' => 'passwordgmailandreams',   
          'mailtype' => 'html',   
          'charset' => 'iso-8859-1'  
       );  
       $this->load->library('email', $config);  
       $this->email->set_newline("\r\n");  
       $this->email->from('andreams.clothing', 'Admin AI');   
       $this->email->to($email);   
       $this->email->subject('Reset Password');   
       $this->email->message($param);  
       if (!$this->email->send()) {  
        show_error($this->email->print_debugger());   
       }else{  
        echo '<html>
<head>
<title>Reset password</title>
</head>
<body bgcolor="#ADE8E6">
<br />
<h1><font color="#0000CD"><center>Berhasil mengirim tautan reset password..</center></font></h1>
<br />
<hr />
<br />
<p><font color="#000080"><center>Silahkan cek email dari Admin AI, lalu klik link yang telah dikirimkan untuk mereset password..</center><br><center>Jika email tidak muncul pada Kotak masuk, maka priksa pada spam..</center></font></p>
<br />
<hr />
</body>
</html>';   
       }  
      }
       
   public function base64url_encode($data) {   
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');   
   }   
   
   public function base64url_decode($data) {   
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));   
   }    
 }  
