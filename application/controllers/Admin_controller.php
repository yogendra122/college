<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_controller extends CI_Controller
{

  function admin()
  {
    $this->load->view('admin/login');
  }

  //action admin login 

  function actionLogin()
  {

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $res = $this->Admin_model->admin_login($email, $password);
    if ($res) {
      $sessionData = array('admin_id' => $res[0]->admin_id, 'admin_email' => $res[0]->admin_email, 'admin_name' => $res[0]->admin_name, 'admin_type' => $res[0]->admin_type, 'Permissions' => $res[0]->Permissions, 'admin_img' => $res[0]->profile);
      $this->session->set_userdata($sessionData);
      $this->session->set_flashdata('updated_event', 'Welcome to ');
      // if ($res[0]->admin_id == 1) {
      redirect('dashboard');
      // } else {
      //   redirect('classes');
      // }
    } else {
      $this->session->set_flashdata('error', 'Email Password Wrong');
      redirect('admin');
    }
  }
  //function action login end


  //Session Logout in super admin

  function logout()
  {
    session_destroy();
    redirect('admin');
  }

  //End logout function


  //check super admin trainer permission

  function checkadminpermission()
  {
    if ($this->session->userdata('admin_type') != "superadmin") {
      redirect('login');
    }
  }

  //End checkadminpermission fucntion

  //check admin login auth function 

  function checkLogin()
  {
    if (isset($_SESSION)) {
      if ($this->session->userdata('admin_email') == "") {
        redirect('login');
      }
    }
  }

  //End checkLogin


  //superadmin_profile 
  function superadmin_profile()
  {

    $id = $_SESSION['admin_id'];
    $where                     = array('admin_id' => $id);
    $result['data']           = $this->User_model->getsingle('admin', $where);
    $this->load->view('admin/admin_profile', $result);
  }
  //End superadmin_profile


  //Edit_admin_profile 
  function Edit_admin_profile()
  {


    $custompermissoin = explode(",", $_SESSION['Permissions']);

    if (in_array("1", $custompermissoin) == true || in_array("10", $custompermissoin) == true) {

      $userData = array();
      $userData['admin_name']           =   $this->input->post('admin_name');
      $userData['admin_email']          =   $this->input->post('admin_email');
      $userData['phone']                =   $this->input->post('phone');

      //image uploda
      $config['upload_path'] = "upload";
      $config['allowed_types'] = "*";
      $config['encrypt_name'] = true;
      $this->load->library('upload', $config);

      if (isset($_FILES['profile'])) {
        $user_img = $_FILES['profile']['name'];
      }

      if ($user_img != "") {

        if ($this->upload->do_upload('profile')) {
          $data = array('upload_data' => $this->upload->data());
          $userData['profile']  = $data['upload_data']['file_name'];
          // $userData['profile']   =   $user_img;
        } else {
          $error = $this->upload->display_errors();
          $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
          $response              = array('status' => false, 'message' => $error);
          echo json_encode($response);
          die;
        }
      }

      $where          = array('admin_id' => $this->input->post('admin_id'));

      $update     = $this->User_model->updateFields('admin', $userData, $where);
      if ($update) {

        if ($update) {
          $response = array('status' => true, 'message' => 'Successfully Updated', 'url' => 'superadmin_profile');
        } else {
          $response = array('status' => false, 'message' => 'Failed! Please try again');
        }
      }
      echo json_encode($response);
    } else {

      $response = array('status' => false, 'message' => '        You dont have permission.',);
      echo json_encode($response);
    }
  }
  //End Edit_admin_profile


  //Enquiry_detail view
  function Enquiry_detail()
  {

    $id = $_GET['id'];
    $where                     = array('in_id' => $id);
    $result['data']           = $this->User_model->getsingle('user_inquiry', $where);
    $result['new_form']      = $this->db->get_where('user_inquiry', array('in_id' => $id))->result();

    $this->load->view('admin/admin_Enquiry_Detail', $result);
  }
  //End Enquiry_detail

  //superadmin dashboard page
  function dashboard()
  {
    $this->checkLogin();
    $this->load->view('admin/admin');
  } //end function



  //show list city
  function Allcity()
  {
    $this->load->view('admin/admin-all-city');
  } //end function
  //show list country
  function Allcountry()
  {
    $this->load->view('admin/admin-all-country');
  } //end function

  //show list state
  function Allstate()
  {
    $result['datalist'] = $this->Admin_model->get_statelist();

    $this->load->view('admin/adminAllState', $result);
  } //end function

  //add city and contry view
  function Addcity()
  {
    $where  = array('country_delete_status' => 0);
    $result['contry'] = $this->Admin_model->getAll('country', $where);

    $this->load->view('admin/admin-city-add', $result);
  } //end function

  //add city and contry view
  function Addstate()
  {
    $where  = array('country_delete_status' => 0);
    $result['contry'] = $this->Admin_model->getAll('country', $where);

    $this->load->view('admin/admin-state-add', $result);
  } //end function

  //add country  view
  function Addcountry()
  {
    $where  = array('country_delete_status' => 0);
    $result['contry'] = $this->Admin_model->getAll('country', $where);

    $this->load->view('admin/admin-country-add', $result);
  } //end function
  //add country  view

  //add city 
  function action_addcity()
  {

    $userData = array();
    $userData['country_name']            =   $this->input->post('country_name');
    $userData['country_parent_id']       =   $this->input->post('country_parent_id');
    $userData['country_status']          =   $this->input->post('country_status');
    $userData['country_desc']            =   $this->input->post('country_desc');
    $userData['country_latitude']        =   $this->input->post('country_latitude');
    $userData['country_longitude']       =   $this->input->post('country_longitude');
    $userData['location']       =   $this->input->post('location');
    $userData['phone_number']       =   $this->input->post('phone_number');

    //image uploda
    $config['upload_path'] = "upload";
    $config['allowed_types'] = "*";
    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);

    if (isset($_FILES['country_img'])) {
      $user_img = $_FILES['country_img']['name'];
    }




    if ($user_img != "") {

      if ($this->upload->do_upload('country_img')) {
        $data = array('upload_data' => $this->upload->data());
        $userData['country_img'] = $data['upload_data']['file_name'];
        // $userData['country_img']   =   $user_img;
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }



    //   $formdata = array('country_name' => $this->input->post('country_name'), 'country_parent_id' => $this->input->post('country_parent_id'), 'country_status' => $this->input->post('country_status'));

    $this->Admin_model->insertAll('country', $userData);
    $this->session->set_flashdata('succes', 'Add Location Successfully');
    redirect('Addcity');
  } //end function

  //add city 
  function action_addstate()
  {

    $userData = array();
    $userData['state_name']            =   $this->input->post('country_name');
    $userData['state_country_id']       =   $this->input->post('country_parent_id');
    $userData['state_status']          =   $this->input->post('country_status');
    $userData['state_desc']            =   $this->input->post('country_desc');
    $userData['state_latitude']        =   $this->input->post('country_latitude');
    $userData['state_longitude']       =   $this->input->post('country_longitude');

    //image uploda
    $config['upload_path'] = "upload";
    $config['allowed_types'] = "*";
    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);

    if (isset($_FILES['country_img'])) {
      $user_img = $_FILES['country_img']['name'];
    }




    if ($user_img != "") {

      if ($this->upload->do_upload('country_img')) {
        $data = array('upload_data' => $this->upload->data());
        $userData['state_img'] = $data['upload_data']['file_name'];
        // $userData['country_img']   =   $user_img;
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }



    //   $formdata = array('country_name' => $this->input->post('country_name'), 'country_parent_id' => $this->input->post('country_parent_id'), 'country_status' => $this->input->post('country_status'));

    $this->Admin_model->insertAll('state', $userData);
    $this->session->set_flashdata('succes', 'Add state successfully');
    redirect('Addstate');
  } //end function

  //add city 
  function action_addcategory()
  {

    if (!empty($_POST['eid'])) {

      $category = array();
      $category['cat_name'] = $this->input->post('cname');
      $category['cat_status'] = $this->input->post('status');

      if (!empty($_POST['cat_parent_id'])) {
        $category['cat_parent_id'] = $this->input->post('cat_parent_id');
      }

      $where = array('cat_id' => $_POST['eid']);
      $this->Admin_model->update('category', $category, $where);
      $this->session->set_flashdata('succes', ' Successfully Update Category');
      redirect('Addcategory');
      die();
    }


    $formdata = array(
      'cat_name' => $this->input->post('cname'),
      'cat_parent_id' => $this->input->post('cat_parent_id'),
      'cat_status' => $this->input->post('status')
    );

    $this->Admin_model->insertAll('category', $formdata);
    $this->session->set_flashdata('succes', ' Successfully Add Category');
    redirect('Addcategory');
  } //end function

  //edit city 
  function action_Editcategory()
  {

    $id = $_GET['id'];
    $where                     = array('cat_id' => $id, 'cat_delete_status' => 0);
    $result['data']           = $this->User_model->getsingle('category', $where);
    $where_par                     = array('cat_delete_status' => 0);
    $result['category'] = $this->Admin_model->getAll('category', $where_par);
    $this->load->view('admin/Edit_category', $result);
  } //end function



  //edit city 
  function action_Editcity()
  {

    $id = $_GET['id'];
    $where                     = array('country_id' => $id, 'country_delete_status' => 0);
    $result['data']           = $this->User_model->getsingle('country', $where);
    $where                     = array('country_delete_status' => 0);
    $result['contry'] = $this->Admin_model->getAll('country', $where);
    $this->load->view('admin/Edit_city_country', $result);
  } //end function


  //update country & city 
  function action_updatecity()
  {



    $userData = array();
    $userData['country_name']            =   $this->input->post('country_name');
    $userData['country_status']          =   $this->input->post('country_status');
    $userData['country_desc']            =   $this->input->post('country_desc');
    $userData['country_latitude']        =   $this->input->post('country_latitude');
    $userData['country_longitude']       =   $this->input->post('country_longitude');
    $userData['location']        =   $this->input->post('location');
    $userData['phone_number']       =   $this->input->post('phone_number');
    if (!empty($_POST['country_parent_id'])) {
      $userData['country_parent_id']       =   $this->input->post('country_parent_id');
    }

    //image uploda
    $config['upload_path'] = "upload";
    $config['allowed_types'] = "*";
    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);

    if (isset($_FILES['country_img'])) {
      $user_img = $_FILES['country_img']['name'];
    }




    if ($user_img != "") {

      if ($this->upload->do_upload('country_img')) {
        $data = array('upload_data' => $this->upload->data());
        $userData['country_img'] = $data['upload_data']['file_name'];
        // $userData['country_img']   =   $user_img;
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }

    $where          = array('country_id' => $this->input->post('country_id'));

    // $set = array('country_name' => $this->input->post('country_name'), 'country_parent_id' => $this->input->post('country_parent_id'), 'country_status' => $this->input->post('country_status'));
    $update     = $this->User_model->updateFields('country', $userData, $where);
    if ($update) {
      $res = array();
      if ($update) {
        $response = array('status' => true, 'message' => 'Successfully Updated', 'url' => 'Allcity');
      } else {
        $response = array('status' => false, 'message' => 'Failed! Please try again');
      }
    }
    echo json_encode($response);
  } //end function


  //city list
  function citylist()
  {

    $list = $this->Admin_model->get_datatables();

    $city = array();
    $country = array();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $customers) {

      if ($customers->country_parent_id == '' || empty($customers->country_parent_id)) {
        $country = $customers->country_name;
        $city = "country";
      } else {


        $array = array('country_id' => $customers->country_parent_id);
        $this->db->where($array);
        $query = $this->db->get('country')->row();

        // foreach ($query as $rows) {

        // if ($rows->country_id == $customers->country_parent_id) {
        $country = $query->country_name;

        // }

        // }
        $city = $customers->country_name;
      }


      if ($customers->country_status == 1) {
        $action = '<button type="button" name="update" id="' . $customers->country_id . '" class="btn btn-warning btn-xs Activeinactive">Active</button>';
      } else {
        $action = '<button type="button" name="update" id="' . $customers->country_id . '" class="btn btn-primary btn-xs Activeinactive">Block</button>';
      }

      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $country;
      $row[] = $city;
      $row[] = $action;
      $row[] = '<a type="button"  href="action_Editcity?id=' . $customers->country_id . '" ><button type="button" class="btn btn-primary">Edit</button></a> <button type="button" name="delete" id="' . $customers->country_id . '" class="btn btn-primary btn-xs deletestetuscountry">Delete</button>';
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Admin_model->count_all(),
      "recordsFiltered" => $this->Admin_model->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  } //end function
  //country list
  function countrylist()
  {

    $list = $this->Admin_model->get_datatables();

    $city = array();
    $country = array();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $customers) {

      if ($customers->country_parent_id == '' || empty($customers->country_parent_id)) {
        $country = $customers->country_name;
        $city = "country";
      }
      // else {


      //   $array = array('country_id' => $customers->country_parent_id);
      //   $this->db->where($array);
      //   $query = $this->db->get('country')->row();

      //   // foreach ($query as $rows) {

      //   // if ($rows->country_id == $customers->country_parent_id) {
      //   $country = $query->country_name;

      //   // }

      //   // }
      //   $city = $customers->country_name;
      // }


      if ($customers->country_status == 1) {
        $action = '<button type="button" name="update" id="' . $customers->country_id . '" class="btn btn-warning btn-xs Activeinactive">Active</button>';
      } else {
        $action = '<button type="button" name="update" id="' . $customers->country_id . '" class="btn btn-primary btn-xs Activeinactive">Block</button>';
      }

      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $country;
      //  $row[] = $city;
      $row[] = $action;
      $row[] = '<a type="button"  href="action_Editcity?id=' . $customers->country_id . '" ><button type="button" class="btn btn-primary">Edit</button></a> <button type="button" name="delete" id="' . $customers->country_id . '" class="btn btn-primary btn-xs deletestetuscountry">Delete</button>';
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Admin_model->count_all(),
      "recordsFiltered" => $this->Admin_model->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  } //end function
  //end function

  //state list
  function statelist()
  {

    $result['list'] = $this->Admin_model->get_statelist();

    $this->load->view('admin/admin-all-state', $result);
  } //end function


  //FormManageList list
  function FormManageList()
  {
    $this->load->view('admin/FormManageList');
  } //end function

  //EditMange_form 
  function EditMange_form()
  {

    $result['form_id'] = $_GET['id'];
    //$where = array('form_id' =>$_GET['id'],'delete_status'=>0, 'status' => 1);
    //$result['form_field'] = $this->Admin_model->getAll('forms_elements', $where);
    $result['form_field'] =  $this->db->order_by('form_id', 'desc')->get_where('forms_elements', array('form_id' => $_GET['id'], 'delete_status' => 0, 'status' => 1))->result();


    $this->load->view('admin/EditMange_form', $result);
  } //end function

  function fetch_category_from()
  {

    //$formcat_id = $this->input->post('formcat_id');
    //$form_id = $this->input->post('form_id');
    $result =  $this->db->order_by('form_id', 'desc')->get_where('forms_elements', array('form_id' =>  $this->input->post('form_id'), 'form_category' =>  $this->input->post('formcat_id'), 'delete_status' => 0, 'status' => 1))->result();
    echo json_encode($result);
    //die;

  }

  //Action_addmanageform 
  function Action_addmanageform()
  {
    $result['form_field'] =  $this->db->order_by('form_id', 'desc')->get_where('forms_elements', array('form_id' => $this->input->post('form_id'), 'form_category' => $this->input->post('form_category'), 'delete_status' => 0, 'status' => 1))->result();
    // echo"<pre>";
    // print_r($result);
    // die;
    if (!empty($result['form_field'])) {
      $array1  = $result['form_field'][0]->lable_name;
      $array_1  = $result['form_field'][0]->form_type;
      $siblings = array(

        'form_id' => $this->input->post('form_id'),
        'form_category' => $this->input->post('form_category'),
        'form_type' => json_encode($this->input->post('form_type')),
        'lable_name' => json_encode($this->input->post('lable_name'))

      );
      $array2 = $siblings['lable_name'];
      $decode_one = json_decode($array1, TRUE);
      $decode_two = json_decode($array2, TRUE);
      $arrayAB = array_merge($decode_one, $decode_two);
      $array_2 = $siblings['form_type'];
      $decode_one_type = json_decode($array_1, TRUE);
      $decode_two_type = json_decode($array_2, TRUE);
      $arrayAB_type = array_merge($decode_one_type, $decode_two_type);
      $userData = array(
        'lable_name' => json_encode($arrayAB),
        'form_type' => json_encode($arrayAB_type)
      );
      $where  = array('form_id' => $this->input->post('form_id'), 'form_category' => $this->input->post('form_category'), 'delete_status' => 0, 'status' => 1);
      $this->db->where($where);
      $a = $this->db->update('forms_elements', $userData);
      if ($this->db->affected_rows() > 0) {
        $response = array('status' => true, 'message' => ' Add successfully', 'data' => array(), 'url' => 'FormManageList');
      } else {
        $response = array('status' => false, 'message' => 'Somethign went wrong', 'data' => array());
      }

      echo json_encode($response);
    } else {

      $formdata = array(

        'form_id' => $this->input->post('form_id'),
        'form_type' => json_encode($this->input->post('form_type')),
        'lable_name' => json_encode($this->input->post('lable_name')),
        'form_category' => ($this->input->post('form_category'))

      );

      $ab = $this->Admin_model->insertAll('forms_elements', $formdata);
      if ($ab) {
        $response = array('status' => true, 'message' => 'Successfully Add Filed', 'url' => 'FormManageList');
      } else {
        $response = array('status' => false, 'message' => 'Failed! Please try again');
      }

      echo json_encode($response);
    }
  } //end function
  //Action_addmanageform 
  function updatemanageform()
  {

    $json = $this->db->order_by('form_id', 'desc')->get_where('forms_elements', array('id' => $this->input->post('id'), 'delete_status' => 0, 'status' => 1))->result();
    $updat_key = $this->input->post('key');


    $decoded_json = json_decode($json[0]->lable_name);

    foreach ($decoded_json as $key =>  $object) {

      if ($key == $updat_key) {
        $decoded_json55[$key] = $this->input->post('lable_name');
      } else {
        $decoded_json55[$key] = $decoded_json[$key];
      }
    }
    $lable_name = json_encode($decoded_json55);


    $userData = array(
      'lable_name' => $lable_name
    );


    $where  = array('id' => $this->input->post('id'));
    $this->db->where($where);
    $a = $this->db->update('forms_elements', $userData);


    if ($this->db->affected_rows() > 0) {
      $response = array('status' => true, 'message' => ' Update successfully', 'data' => array(), 'url' => 'FormManageList');
    } else {
      $response = array('status' => false, 'message' => 'Somethign went wrong', 'data' => array());
    }

    echo json_encode($response);
  } //end function

  //Action_EditMange_form 
  function Action_EditMange_form()
  {


    $id = $_GET['id'];
    $key = $_GET['key'];
    $where          = array('id' => $id);
    $result['data']  = $this->User_model->getsingle('forms_elements', $where);
    // $result['data'] =  $this->db->limit(1)->order_by('form_id','desc')->get_where('forms_elements',array('id'=>$id,'delete_status'=>0, 'status' => 1));
    $label_name = $result['data']['lable_name'];
    $someArray = json_decode($label_name, true);
    $fieldtype = $result['data']['form_type'];
    $fieldtype_name = json_decode($fieldtype, true);
    $la_name =  $someArray[$key];
    $form_type_name =  $fieldtype_name[$key];
    $result['lableName'] = $la_name;
    $result['fieldtype'] = $form_type_name;
    $result['key_name']  = $key;

    $this->load->view('admin/Action_EditMange_form', $result);
  } //end function


  //change country statsu
  function changecountrystatus()
  {

    $id            = $_POST["user_id"];
    $where              = array('country_id' => $id);
    $dataExist          = $this->Admin_model->is_data_exists('country', $where);
    if ($dataExist) {
      $status         = $dataExist->country_status ? 0 : 1;
      $dataExist      = $this->Admin_model->updateFields('country', array('country_status' => $status), $where);
      $showmsg        = ($status == 1) ? 'Task published successfully' : 'Task Unpublished successfully';
      $response       = array('status' => true, 'message' => $showmsg, 'change_status' => $status);
    } else {
      $response       = array('status' => false, 'message' => 'somthing wrong');
    }
    echo json_encode($response);
  } //End function


  //delete country data
  function deletestetuscountry()
  {
    $id            = $_POST["user_id"];
    $where              = array('country_id' => $id);
    $dataExist          = $this->Admin_model->is_data_exists('country', $where);

    if ($dataExist) {
      $status         = 1;
      $dataExist      = $this->Admin_model->updateFields('country', array('country_delete_status' => $status), $where);
      $showmsg        = ($status == 1) ? 'Delete Successfully' : 'Task Unpublished successfully';
      $response       = array('status' => true, 'message' => $showmsg, 'change_status' => $status);
    } else {
      $response       = array('status' => false, 'message' => 'somthing wrong');
    }

    echo json_encode($response);
  } //End function


  //delete country data
  function deleteFormfield()
  {
    $id            = $_POST["cat_id"];
    $updat_key     = $_POST["key_id"];
    $json = $this->db->order_by('form_id', 'desc')->get_where('forms_elements', array('id' => $id, 'delete_status' => 0, 'status' => 1))->result();


    $decoded_json = json_decode($json[0]->lable_name);
    $decoded_form_type = json_decode($json[0]->form_type);

    if (count($decoded_json) == 1 && count($decoded_form_type) == 1) {
      $where  = array('id' => $id);
      $this->db->where($where);
      $this->db->delete('forms_elements');
      if ($this->db->affected_rows() > 0) {
        $response = array('status' => true, 'message' => ' Update successfully', 'data' => array(), 'url' => 'FormManageList');
      }
    } else {
      $decoded_json55 = array();
      foreach ($decoded_json as $key =>  $object) {

        if ($key != $updat_key) {
          $decoded_json55[$key] = $decoded_json[$key];
        }
      }
      $lable_name = json_encode(array_values($decoded_json55));


      $userData = array(
        'lable_name' => $lable_name
      );


      $where  = array('id' => $id);
      $this->db->where($where);
      $a = $this->db->update('forms_elements', $userData);


      if ($this->db->affected_rows() > 0) {
        $response = array('status' => true, 'message' => ' Update successfully', 'data' => array(), 'url' => 'FormManageList');
      } else {
        $response = array('status' => false, 'message' => 'Somethign went wrong', 'data' => array());
      }

      // echo json_encode($response);


    }

    // if(count($decoded_form_type)==1)
    // {
    //   $where  = array('id' => $id);
    //   $this->db->where($where);
    //   $this->db->delete('forms_elements');
    //   if ($this->db->affected_rows() > 0) {
    //     $response = array('status' => true, 'message' => ' Update successfully', 'data' => array(), 'url' => 'FormManageList');
    //   }
    // }
    // else
    // {

    $decoded_json66 = array();
    foreach ($decoded_form_type as $key =>  $object) {

      if ($key != $updat_key) {
        $decoded_json66[$key] = $decoded_form_type[$key];
      }
    }
    $format_name = json_encode(array_values($decoded_json66));


    $userData = array(
      'form_type' => $format_name
    );


    $where  = array('id' => $id);
    $this->db->where($where);
    $a = $this->db->update('forms_elements', $userData);


    if ($a) {
      $response = array('status' => true, 'message' => ' Update successfully', 'data' => array(), 'url' => 'FormManageList');
    } else {
      $response = array('status' => false, 'message' => 'Somethign went wrong', 'data' => array());
    }

    //echo json_encode($response);

    // }


    echo json_encode($response);
  } //End function


  //delete category data
  function deletestetuscategory()
  {
    $id            = $_POST["cat_id"];
    $where              = array('cat_id' => $id);
    $dataExist          = $this->Admin_model->is_data_exists('category', $where);

    if ($dataExist) {
      $status         = 1;
      $dataExist      = $this->Admin_model->updateFields('category', array('cat_delete_status' => $status), $where);
      $showmsg        = ($status == 1) ? 'Delete Successfully' : 'Task Unpublished successfully';
      $response       = array('status' => true, 'message' => $showmsg, 'change_status' => $status);
    } else {
      $response       = array('status' => false, 'message' => 'somthing wrong');
    }

    echo json_encode($response);
  } //End function



  //all user list view
  function admin_All_userlist()
  {
    $this->load->view('admin/admin_All_userlist');
  } //End function


  //all user Inquiry list view
  function userInquiry_listview()
  {
    $this->load->view('admin/admin-userInquiry_list');
  } //End function


  //all user Review list view
  function userReview_listview()
  {
    $this->load->view('admin/admin_user_Reviewlist');
  } //End function


  //all user list ajax
  function userlist()
  {

    $data = array();
    $list = $this->User_model->get_datatables();


    $no = $_POST['start'];
    foreach ($list as $customers) {

      if ($customers->user_status == 1) {
        $status = '<button type="button" name="statusupdate" id="' . $customers->user_id . '" class="btn btn-warning btn-xs UserActiveinactive">Active</button>';
      } else {
        $status = '<button type="button" name="statusupdate" id="' . $customers->user_id . '" class="btn btn-primary btn-xs UserActiveinactive">Block</button>';
      }

      if (empty($customers->user_login_type)) {
        $user_img =  base_url('upload/' . $customers->user_img);
      } else {
        $user_img = $customers->user_img;
      }


      $no++;
      $row = array();
      $row[] = $no;
      $row[] = '<img  style="width: 60px;"src="' . $user_img . '" onerror=this.src="upload/user_placeholder.png">';
      $row[] = $customers->user_name;
      $row[] = $customers->user_phone;
      $row[] = $customers->user_email;
      $row[] = date('Y-m-d', strtotime($customers->user_createdate));
      $row[] = $status;
      $row[] = '<a type="button"  href="ActionadminEdituser?id=' . $customers->user_id . '" ><button type="button" class="btn btn-primary">Edit</button></a> <button type="button" name="delete" id="' . $customers->user_id . '" class="btn btn-primary btn-xs deletestetususer">Delete</button>';
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->User_model->count_all(),
      "recordsFiltered" => $this->User_model->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  } //End function


  function UserActiveinactive()
  {

    $id            = $_POST["user_id"];
    $where              = array('user_id' => $id);
    $dataExist          = $this->Admin_model->is_data_exists('users', $where);
    if ($dataExist) {
      $status         = $dataExist->user_status ? 0 : 1;
      $dataExist      = $this->Admin_model->updateFields('users', array('user_status' => $status), $where);
      $showmsg        = ($status == 1) ? 'User Status Active successfully' : 'User Status Deactivate successfully';
      $response       = array('status' => true, 'message' => $showmsg, 'change_status' => $status);
    } else {
      $response       = array('status' => false, 'message' => 'somthing wrong');
    }
    echo json_encode($response);
  } //End function


  function catActiveinactive()
  {

    $id            = $_POST["cat_id"];
    $where              = array('cat_id' => $id);
    $dataExist          = $this->Admin_model->is_data_exists('category', $where);
    if ($dataExist) {
      $status         = $dataExist->cat_status ? 0 : 1;
      $dataExist      = $this->Admin_model->updateFields('category', array('cat_status' => $status), $where);
      $showmsg        = ($status == 1) ? 'Category Status Active successfully' : 'Category Status Deactivate successfully';
      $response       = array('status' => true, 'message' => $showmsg, 'change_status' => $status);
    } else {
      $response       = array('status' => false, 'message' => 'somthing wrong');
    }
    echo json_encode($response);
  } //End function




  //review active inactive
  function ChangeReviewystatus()
  {
    $id            = $_POST["rat_id"];
    $where              = array('rat_id' => $id);
    $dataExist          = $this->Admin_model->is_data_exists('rating', $where);
    if ($dataExist) {
      $status         = $dataExist->rat_status ? 0 : 1;
      $dataExist      = $this->Admin_model->updateFields('rating', array('rat_status' => $status), $where);
      $showmsg        = ($status == 1) ? 'Review Status Active successfully' : 'Review Status Deactivate successfully';
      $response       = array('status' => true, 'message' => $showmsg, 'change_status' => $status);
    } else {
      $response       = array('status' => false, 'message' => 'somthing wrong');
    }
    echo json_encode($response);
  } //End function





  //review active inactive
  function homeActiveinactive()
  {

    $id            = $_POST["rat_id"];

    $where              = array('rat_id' => $id);
    $dataExist          = $this->Admin_model->is_data_exists('rating', $where);
    if ($dataExist) {
      $status         = $dataExist->rat_show_inhome ? 0 : 1;
      $dataExist      = $this->Admin_model->updateFields('rating', array('rat_show_inhome' => $status), $where);
      $showmsg        = ($status == 1) ? 'Review Show In Home' : 'Status Deactivate successfully';
      $response       = array('status' => true, 'message' => $showmsg, 'change_status' => $status);
    } else {
      $response       = array('status' => false, 'message' => 'somthing wrong');
    }
    echo json_encode($response);
  } //End function



  //user delete by admin
  function deletestetususer()
  {

    $id            = $_POST["user_id"];
    $where              = array('user_id' => $id);
    $dataExist          = $this->Admin_model->is_data_exists('users', $where);

    if ($dataExist) {
      $status         = 1;
      $dataExist      = $this->Admin_model->updateFields('users', array('user_delete_status' => $status), $where);
      $showmsg        = ($status == 1) ? 'Delete Successfully' : 'Task Unpublished successfully';
      $response       = array('status' => true, 'message' => $showmsg, 'change_status' => $status);
    } else {
      $response       = array('status' => false, 'message' => 'somthing wrong');
    }

    echo json_encode($response);
  } //end function

  //show user form in admin
  function admin_adduser()
  {
    $this->load->view('admin/addUser_admin.php');
  } //end function

  //add user by admin
  function Action_adduser_byadmin()
  {

    $user_name          =  $this->input->post('user_name');
    $user_first_name          =  $this->input->post('user_first_name');
    $user_last_name          =  $this->input->post('user_last_name');
    $user_email          =  $this->input->post('user_email');
    $user_phone          =  $this->input->post('user_phone');
    $user_address       =  $this->input->post('user_address');
    $user_aboutme           =  $this->input->post('user_aboutme');
    $password           =  $this->input->post('password');


    $userData = array();
    $userData['user_name']     =   $user_name;
    $userData['user_first_name']     =   $user_first_name;
    $userData['user_last_name']     =   $user_last_name;
    $userData['user_email']     =   $user_email;
    $userData['user_phone']     =   $user_phone;
    $userData['user_address']     =   $user_address;
    $userData['user_aboutme']      =   $user_aboutme;
    $userData['user_secret_id'] =   md5($password);
    $userData['user_password']  =   password_hash($password, PASSWORD_DEFAULT);
    $userData['user_img'] = $this->input->post('user_img');


    //image uploda
    $config['upload_path'] = "upload";
    $config['allowed_types'] = "doc|docx|pdf|ppt|jpeg|jpg|png|bmp";
    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);
    $user_img = "";

    if (isset($_FILES['user_img'])) {
      $user_img = $_FILES['user_img']['name'];
    }


    if ($user_img != "") {

      if ($this->upload->do_upload('user_img')) {
        $data = array('upload_data' => $this->upload->data());
        $user_img = $data['upload_data']['file_name'];
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }
    $userData['user_img']        = $user_img;
    //end image upload


    $result = $this->User_model->registration($userData);
    if (is_array($result)) {
      switch ($result['regType']) {
        case "NR": // Normal registration
          $response = array('status' => true, 'message' => "Registration Done Successfully", 'data' => array(), 'url' => 'adminAlluserlist');
          break;
        case "AE": // User already registered
          $response = array('status' => false, 'message' => "User already Exist", 'data' => array());
          break;
        default:
          $response = array('status' => false, 'message' => 'something went wrong', 'data' => array());
      }
    } else {
      $response = array('status' => false, 'message' => 'something went wrong', 'data' => array());
    }
    echo json_encode($response);
  } //End function

  //edite user detail show
  function Action_Edituser_byadmin()
  {

    $id = $_GET['id'];
    $where          = array('user_id' => $id);
    $result['data']  = $this->User_model->getsingle('users', $where);
    $this->load->view('admin/edituserprofile_admin', $result);
  } //end function


  function Action_updateuser_byadmin()
  {

    $user_name          =  $this->input->post('user_name');
    $user_first_name          =  $this->input->post('user_first_name');
    $user_last_name          =  $this->input->post('user_last_name');
    $user_email          =  $this->input->post('user_email');
    $user_phone          =  $this->input->post('user_phone');
    $user_address       =  $this->input->post('user_address');
    $user_aboutme           =  $this->input->post('user_aboutme');
    $password           =  $this->input->post('password');


    $userData = array();
    $userData['user_id']     =   $this->input->post('user_id');
    $userData['user_name']     =   $user_name;
    $userData['user_first_name']     =   $user_first_name;
    $userData['user_last_name']     =   $user_last_name;
    $userData['user_email']     =   $user_email;
    $userData['user_phone']     =   $user_phone;
    $userData['user_address']     =   $user_address;
    $userData['user_aboutme']      =   $user_aboutme;
    $userData['user_secret_id'] =   md5($password);

    //image uploda
    $config['upload_path'] = "upload";
    $config['allowed_types'] = "doc|docx|pdf|ppt|jpeg|jpg|png|bmp";
    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);
    $user_img = "";

    if (isset($_FILES['user_img'])) {
      $user_img = $_FILES['user_img']['name'];
    }


    if ($user_img != "") {

      if ($this->upload->do_upload('user_img')) {
        $data = array('upload_data' => $this->upload->data());
        $userData['user_img'] = $data['upload_data']['file_name'];
        // $userData['user_img']        = $user_img;
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }

    $this->db->where('user_id', $userData['user_id']);
    $this->db->update('users', $userData);
    if ($this->db->affected_rows() > 0) {
      $response = array('status' => true, 'message' => 'User Profile Update successfully', 'data' => array(), 'url' => 'adminAlluserlist');
    } else {
      $response = array('status' => false, 'message' => 'Somethign went wrong', 'data' => array());
    }

    echo json_encode($response);
  }
  //admin change password view
  function adminChangePassword()
  {
    $this->load->view('admin/adminChangepassword');
  } //end function

  //action change password
  function Action_adminChangePassword()
  {

    $custompermissoin = explode(",", $_SESSION['Permissions']);

    if (in_array("12", $custompermissoin) == true || in_array("10", $custompermissoin) == true) {

      $id = $_SESSION['admin_id'];
      $password       = md5($this->input->post('password'));
      $npassword      = $this->input->post('npassword');
      $where          = array('admin_id' => $id);
      $admin           = $this->User_model->getsingle('admin', $where, 'admin_password');
      $resu = $this->Admin_model->admin_changepas($password);
      if ($resu) {

        $set = array('admin_password' => md5($this->input->post('npassword')), 'pwd' => $this->input->post('npassword'));
        $update     = $this->User_model->updateFields('admin', $set, $where);
        if ($update) {
          $res = array();
          if ($update) {
            $response = array('status' => true, 'message' => 'Successfully Updated', 'url' => 'logout');
          } else {
            $response = array('status' => false, 'message' => 'Failed! Please try again', 'url' => 'adminChangePassword');
          }
        }
      } else {
        $response = array('status' => false, 'message' => 'Your Current Password is Wrong !', 'url' => 'adminChangePassword', 'test' => $admin);
      }
      echo json_encode($response);
    } else {
      $response = array('status' => false, 'message' => '        You dont have permission.',);
      echo json_encode($response);
    }
  } //end function


  //show listing view
  function showlisting_form()
  {
    $where = array('country_parent_id' => "", 'country_delete_status' => 0, "country_status" => 1);
    $result['contry'] = $this->Admin_model->getAll('country', $where);
    $where_ct = array('cat_parent_id' => "", 'cat_delete_status' => 0, "cat_status" => 1);
    $result['select_cat'] = $this->Admin_model->getAll('category', $where_ct);

    $this->load->view('admin/add-University', $result);
  }
  //end function

  //image preview
  public function imagepreview()
  {
    $config['upload_path'] = "upload/preview";
    $config['allowed_types'] = 'doc|docx|pdf|ppt|jpeg|jpg|png|bmp';
    $config['encrypt_name'] = TRUE;
    $this->load->library('upload', $config);

    if (isset($_FILES['licence_media'])) {
      if ($this->upload->do_upload('licence_media')) {
        $data = array('upload_data' => $this->upload->data());
        $licence = $data['upload_data']['file_name'];
      }
    } else if (isset($_FILES['insurence_certificate_media'])) {
      if ($this->upload->do_upload('insurence_certificate_media')) {
        $data = array('upload_data' => $this->upload->data());
        $licence = $data['upload_data']['file_name'];
      }
    } else if (isset($_FILES['profileImage_media'])) {
      if ($this->upload->do_upload('profileImage_media')) {
        $data = array('upload_data' => $this->upload->data());
        $licence = $data['upload_data']['file_name'];
      }
    } else if (isset($_FILES['filedata'])) {
      if ($this->upload->do_upload('filedata')) {
        $data = array('upload_data' => $this->upload->data());
        $licence = $data['upload_data']['file_name'];
        $fileName = $data['upload_data']['file_name'];
        echo json_encode(array(
          'name' => $fileName,
          'file_path' => base_url('upload/') . $licence,
          'status' => 'success',
          'message' => 'File Upload Successfully'
        ));
        die;
      } else {
        $error = $this->upload->display_errors();
        echo json_encode(array(
          'name' => "",
          'file_path' => "",
          'status' => 'fail',
          'message' => strip_tags($error)
        ));
        die;
      }
    }

    $mediapath = base_url('upload/preview/') . $licence;
    if (@is_array(getimagesize($mediapath))) {
      $image = 1;
    } else {
      $image = 0;
    }

    if ($image == 0) {
      $chromePath = 'https://docs.google.com/viewer?url=' . $mediapath . '&embedded=true';
      $data = '<div>
        <object style="width:225px; overflow:hidden;" src="' . $mediapath . '">
          <iframe style="width:450px;height:400px;" src="' . $chromePath . '">
          </iframe>
        </object>
      </div>';
      echo $data;
    } else {
      $location = base_url() . 'upload/preview/' . $licence;
      echo '<img src="' . $location . '" height="150" width="175" class="img   -thumbnail" />';
    }
  }
  //add university form
  function universityform()
  {

    if ($this->input->post('Public')) {
      $submit = 0;
    }
    if ($this->input->post('Public') == 'Draft') {
      $submit = 1;
    }


    //image uploda
    $config['upload_path'] = "upload";
    $config['allowed_types'] = "*";
    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);
    $user_img = "";
    $un_video = "";
    if (isset($_FILES['user_img'])) {
      $user_img = $_FILES['user_img']['name'];
    }

    if (isset($_FILES['un_video'])) {
      $un_video = $_FILES['un_video']['name'];
    }


    if ($user_img != "") {

      if ($this->upload->do_upload('user_img')) {
        $data = array('upload_data' => $this->upload->data());
        $user_img = $data['upload_data']['file_name'];
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }

    if ($un_video != "") {

      if ($this->upload->do_upload('un_video')) {
        $data = array('upload_data' => $this->upload->data());
        $un_video = $data['upload_data']['file_name'];
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }
    if (isset($_POST['un_facility'])) {
      $checkbox1 = $_POST['un_facility'];

      $chk = "";
      foreach ($checkbox1 as $chk1) {
        $chk .= $chk1 . ",";
      }
    } else {
      $chk = "";
    }


    $un_secret_id =   md5($this->input->post('un_name'));
    if ($this->input->post('category') == '2') {
      $formdata = array(


        'un_name' => $this->input->post('un_name'),
        'category' => $this->input->post('category'),
        'sub_category' => $this->input->post('sub_category'),
        'un_email' => $this->input->post('un_email'),
        'facebook_url' => $this->input->post('facebook_url'),
        'twitter_url' => $this->input->post('twitter_url'),
        'instagram_url' => $this->input->post('instagram_url'),
        'un_facility' => $chk,
        //'un_latitude' => $this->input->post('un_latitude'),
        // 'un_longitude' => $this->input->post('un_longitude'),
        'un_country' => $this->input->post('country'),
        // 'un_student' => $this->input->post('un_student'),
        //'un_teaching_staff' => $this->input->post('un_teaching_staff'),
        //'un_award' => $this->input->post('un_award'),
        'un_city' => $this->input->post('city'),
        'un_address' => $this->input->post('un_address'),
        'un_description' => $this->input->post('un_description'),
        'un_contactno' => $this->input->post('un_contactno'),
        //   'un_startdate' => $this->input->post('un_startdate'),
        //   'un_achivement' => $this->input->post('un_achivement'),
        //   'un_course' => $this->input->post('un_course'),
        'un_public_status' => $submit,
        'un_media' => $user_img,
        'un_video' => $un_video,
        'un_secret_id' => $un_secret_id

      );
    } else {

      $formdata = array(

        'un_name' => $this->input->post('un_name'),
        'un_name' => $this->input->post('un_name'),
        'category' => $this->input->post('category'),
        'sub_category' => $this->input->post('sub_category'),
        'tur_price' => $this->input->post('tur_price'),
        'tur_place' => $this->input->post('tur_place'),
        'tur_enddate' => $this->input->post('tur_enddate'),
        'tur_discount' => $this->input->post('tur_discount'),
        'tur_travel_by' => $this->input->post('tur_travel_by'),
        'tur_Inclusions' => $this->input->post('tur_Inclusions'),
        'tur_duration' => $this->input->post('tur_duration'),
        'tur_agency' => $this->input->post('tur_agency'),


        'acc_rent' => $this->input->post('acc_rent'),
        'acc_room_size' => $this->input->post('acc_room_size'),
        'acc_room_type' => $this->input->post('acc_room_type'),
        'un_email' => $this->input->post('un_email'),
        'facebook_url' => $this->input->post('facebook_url'),
        'twitter_url' => $this->input->post('twitter_url'),
        'instagram_url' => $this->input->post('instagram_url'),
        'un_facility' => $chk,
        'un_latitude' => $this->input->post('un_latitude'),
        'un_longitude' => $this->input->post('un_longitude'),
        'un_country' => $this->input->post('country'),
        //   'un_student' => $this->input->post('un_student'),
        //   'un_teaching_staff' => $this->input->post('un_teaching_staff'),
        //   'un_award' => $this->input->post('un_award'),
        'un_city' => $this->input->post('city'),
        'un_address' => $this->input->post('un_address'),
        'un_description' => $this->input->post('un_description'),
        'un_contactno' => $this->input->post('un_contactno'),
        //   'un_startdate' => $this->input->post('un_startdate'),
        //   'un_achivement' => $this->input->post('un_achivement'),
        //   'un_course' => $this->input->post('un_course'),
        'un_public_status' => $submit,
        'un_media' => $user_img,
        'un_video' => $un_video,
        'un_secret_id' => $un_secret_id

      );
    }
    $ab = $this->Admin_model->insertAll('university', $formdata);


    if (isset($_POST['all_docs']) && $_POST['all_docs'] != "") {
      $all_docs = explode(",", $_POST['all_docs']);
      foreach ($all_docs as $all_doc1) {
        $array = array(
          'user_type' => 'superadmin',
          'user_id' => $_SESSION['admin_id'],
          'un_id'  => $ab,
          'file_name' => $all_doc1
        );


        $this->db->insert('multiple_image', $array);
      }
    }


    if ($ab) {
      $response = array('status' => true, 'message' => 'Successfully Add Form', 'url' => 'UniversityViewlist');
    } else {
      $response = array('status' => false, 'message' => 'Failed! Please try again');
    }

    echo json_encode($response);
  } //end function

  // get city in univercity form
  function fetch_city()
  {

    $id  = $_POST["country_id"];
    $this->db->where('country_parent_id', $id);
    $query = $this->db->get('country')->result();
    echo json_encode($query);
  } //end function

  // get sub category of place
  function fetch_subcat()
  {

    $id  = $_POST["cat_id"];
    $where = array('cat_parent_id' => $id, 'cat_delete_status' => 0, 'cat_status' => 1);
    $this->db->where($where);
    $query = $this->db->get('category')->result();
    echo json_encode($query);
  } //end function



  //show view table
  function University_viewlist()
  {
    $where_ct = array('cat_parent_id' => "", 'cat_delete_status' => 0, "cat_status" => 1);
    $result['select_cat'] = $this->Admin_model->getAll('category', $where_ct);
    $this->load->view('admin/admin_university_list', $result);
  } //end function

  //function accomodationlist
  function accomodationlist()
  {


    $list = $this->Accomodation_model->get_datatables();

    // $pushData = array();
    // foreach($list as  $data)
    // {
    //     if ($data->un_delete_status=='0') {
    //         array_push($pushData, $data);
    //     }
    // }

    $data = array();
    $room_type = array();
    $no = $_POST['start'];
    foreach ($list as $university) {


      if ($university->un_status == 1) {
        $status = '<button type="button" name="update" id="' . $university->un_id . '" class="btn btn-warning btn-xs UnActiveinactive">Active</button>';
      } else {
        $status = '<button type="button" name="update" id="' . $university->un_id . '" class="btn btn-primary btn-xs UnActiveinactive">Block</button>';
      }


      if ($university->un_public_status == 0) {
        $public = '<button type="button" name="update" id="' . $university->un_id . '" class="btn btn-warning btn-xs publicstatus">Public</button>';
      } else {
        $public = '<button type="button" name="update" style="background-color: #e41208;" id="' . $university->un_id . '" class="btn btn-primary btn-xs publicstatus">Draft</button>';
      }
      if ($university->acc_room_type == 1) {
        $room_type = 'Standard Room';
      }
      if ($university->acc_room_type == 2) {
        $room_type = 'Family Room';
      }
      if ($university->acc_room_type == 3) {
        $room_type = 'Private Room';
      }
      if ($university->acc_room_type == 4) {
        $room_type = 'Female Dorm Room(6 people)';
      }
      if ($university->acc_room_type == 5) {
        $room_type = 'Female Dorm Room(6 people)';
      }
      if ($university->acc_room_type == 6) {
        $room_type = 'Male Dorm (6 people)';
      }

      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $room_type;
      $row[] = $university->un_address;
      $row[] = $university->acc_rent;
      $row[] = $university->un_contactno;
      $row[] = $university->un_startdate;
      $row[] = $public;
      $row[] = $status;
      $row[] = '<a type="button"  href="actionEditaccomodationform?id=' . $university->un_id . '" ><button type="button" class="btn btn-primary">Edit</button></a> <button type="button" name="delete" id="' . $university->un_id . '" class="btn btn-primary btn-xs deletestatusUn">Delete</button>';
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Accomodation_model->count_all(),
      "recordsFiltered" => $this->Accomodation_model->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  } //End function

  //function Tourismlist
  function Tourismlist()
  {


    $list = $this->Tourism_model->get_datatables();

    $data = array();
    $no = $_POST['start'];
    foreach ($list as $university) {


      if ($university->un_status == 1) {
        $status = '<button type="button" name="update" id="' . $university->un_id . '" class="btn btn-warning btn-xs UnActiveinactive">Active</button>';
      } else {
        $status = '<button type="button" name="update" id="' . $university->un_id . '" class="btn btn-primary btn-xs UnActiveinactive">Block</button>';
      }


      if ($university->un_public_status == 0) {
        $public = '<button type="button" name="update" id="' . $university->un_id . '" class="btn btn-warning btn-xs publicstatus">Public</button>';
      } else {
        $public = '<button type="button" name="update" style="background-color: #e41208;" id="' . $university->un_id . '" class="btn btn-primary btn-xs publicstatus">Draft</button>';
      }

      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $university->tur_place;
      $row[] = $university->tur_price;
      $row[] = $university->tur_duration;
      $row[] = $university->un_contactno;
      $row[] = $university->un_startdate;
      $row[] = $public;
      $row[] = $status;
      $row[] = '<a type="button"  href="actionEdittourismform?id=' . $university->un_id . '" ><button type="button" class="btn btn-primary">Edit</button></a> <button type="button" name="delete" id="' . $university->un_id . '" class="btn btn-primary btn-xs deletestatusUn">Delete</button>';
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Tourism_model->count_all(),
      "recordsFiltered" => $this->Tourism_model->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  } //End function



  //function Universitylist
  function Universitylist()
  {


    $list = $this->University_model->get_datatables();

    $data = array();
    $no = $_POST['start'];
    foreach ($list as $university) {


      if ($university->un_status == 1) {
        $status = '<button type="button" name="update" id="' . $university->un_id . '" class="btn btn-warning btn-xs UnActiveinactive">Active</button>';
      } else {
        $status = '<button type="button" name="update" id="' . $university->un_id . '" class="btn btn-primary btn-xs UnActiveinactive">Block</button>';
      }


      if ($university->un_public_status == 0) {
        $public = '<button type="button" name="update" id="' . $university->un_id . '" class="btn btn-warning btn-xs publicstatus">Public</button>';
      } else {
        $public = '<button type="button" name="update" style="background-color: #e41208;" id="' . $university->un_id . '" class="btn btn-primary btn-xs publicstatus">Draft</button>';
      }

      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $university->un_name;
      $row[] = $university->un_address;
      $row[] = $university->un_contactno;
      $row[] = $university->un_startdate;
      $row[] = $public;
      $row[] = $status;
      $row[] = '<a type="button"  href="actionEdituniversity?id=' . $university->un_id . '" ><button type="button" class="btn btn-primary">Edit</button></a> <button type="button" name="delete" id="' . $university->un_id . '" class="btn btn-primary btn-xs deletestatusUn">Delete</button>';
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->University_model->count_all(),
      "recordsFiltered" => $this->University_model->count_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  } //End function


  //university public
  function un_publicstatus()
  {


    $id            = $_POST["user_id"];
    $where              = array('un_id' => $id);
    $dataExist          = $this->Admin_model->is_data_exists('university', $where);
    if ($dataExist) {
      $status         = $dataExist->un_public_status ? 0 : 1;
      $dataExist      = $this->Admin_model->updateFields('university', array('un_public_status' => $status), $where);
      $showmsg        = ($status == 1) ? 'Public Status Change successfully' : 'Public Status Change successfully';
      $response       = array('status' => true, 'message' => $showmsg, 'change_status' => $status);
    } else {
      $response       = array('status' => false, 'message' => 'somthing wrong');
    }
    echo json_encode($response);
  } //end function


  //university active inactive
  function UnActiveinactive()
  {


    $id            = $_POST["user_id"];
    $where              = array('un_id' => $id);
    $dataExist          = $this->Admin_model->is_data_exists('university', $where);
    if ($dataExist) {
      $status         = $dataExist->un_status ? 0 : 1;
      $dataExist      = $this->Admin_model->updateFields('university', array('un_status' => $status), $where);
      $showmsg        = ($status == 1) ? 'Status Active successfully' : 'Status Deactivate successfully';
      $response       = array('status' => true, 'message' => $showmsg, 'change_status' => $status);
    } else {
      $response       = array('status' => false, 'message' => 'somthing wrong');
    }
    echo json_encode($response);
  } //end function


  //delete country data
  function deletestatusUn()
  {
    $id            = $_POST["user_id"];
    $where              = array('un_id' => $id);
    $dataExist          = $this->Admin_model->is_data_exists('university', $where);

    if ($dataExist) {
      $status         = 1;
      $dataExist      = $this->Admin_model->updateFields('university', array('un_delete_status' => $status), $where);
      $showmsg        = ($status == 1) ? 'Delete Successfully' : 'Task Unpublished successfully';
      $response       = array('status' => true, 'message' => $showmsg, 'change_status' => $status);
    } else {
      $response       = array('status' => false, 'message' => 'somthing wrong');
    }

    echo json_encode($response);
  } //End function


  //edit university form show
  function action_Edituniversity()
  {

    $id = $_GET['id'];
    $where          = array('un_id' => $id);
    $result['data']  = $this->User_model->getsingle('university', $where);

    $where  = array('country_delete_status' => 0, 'country_status' => 1, 'country_parent_id' => "");
    $result['contry']  = $this->Admin_model->getAll('country', $where);
    $result['input'] = '1';
    $where  = array('un_id' => $id);
    $result['gallary_media']  = $this->Admin_model->getAll('multiple_image', $where);
    $where_sub  = array('cat_delete_status' => 0, 'cat_status' => 1, 'cat_parent_id' => $result['data']['category']);

    $result['form_cat']  = $this->Admin_model->getAll('category', $where_sub);


    $this->load->view('admin/admin_editUniversity', $result);
  } //end function
  //edit tourism form show
  function action_Edittourismform()
  {

    $id = $_GET['id'];
    $where          = array('un_id' => $id);
    $result['data']  = $this->User_model->getsingle('university', $where);

    $where  = array('country_delete_status' => 0, 'country_status' => 1, 'country_parent_id' => "");
    $result['contry']  = $this->Admin_model->getAll('country', $where);
    $result['inputtorism'] = '2';
    $where  = array('un_id' => $id);
    $result['gallary_media']  = $this->Admin_model->getAll('multiple_image', $where);
    $where_sub  = array('cat_delete_status' => 0, 'cat_status' => 1, 'cat_parent_id' => $result['data']['category']);

    $result['form_cat']  = $this->Admin_model->getAll('category', $where_sub);

    $this->load->view('admin/admin_editUniversity', $result);
  } //end function
  //tourism form edit

  //edit accomodation form show
  function action_Editaccomodationform()
  {

    $id = $_GET['id'];
    $where          = array('un_id' => $id);
    $result['data']  = $this->User_model->getsingle('university', $where);

    $where  = array('country_delete_status' => 0, 'country_status' => 1, 'country_parent_id' => "");
    $result['contry']  = $this->Admin_model->getAll('country', $where);
    $result['inputaccomodation'] = '3';
    $where  = array('un_id' => $id);
    $result['gallary_media']  = $this->Admin_model->getAll('multiple_image', $where);
    $where_sub  = array('cat_delete_status' => 0, 'cat_status' => 1, 'cat_parent_id' => $result['data']['category']);

    $result['form_cat']  = $this->Admin_model->getAll('category', $where_sub);

    $this->load->view('admin/admin_editUniversity', $result);
  } //end function
  //tourism form edit

  function Edituniversityform()
  {

    if ($this->input->post('Public')) {
      $submit = 0;
    }
    if ($this->input->post('Public') == 'Draft') {
      $submit = 1;
    }

    if (isset($_POST['un_facility'])) {
      $checkbox1 = $_POST['un_facility'];

      $chk = "";
      foreach ($checkbox1 as $chk1) {
        $chk .= $chk1 . ",";
      }
    } else {
      $chk = "";
    }

    $userData = array();
    $userData['un_id']              =   $this->input->post('un_id');
    $userData['un_name']            =   $this->input->post('un_name');
    $userData['un_email']           =   $this->input->post('un_email');
    $userData['category']           =   $this->input->post('category');
    $userData['sub_category']       =   $this->input->post('sub_category');


    $userData['acc_rent']           =   $this->input->post('acc_rent');
    $userData['acc_room_size']      =   $this->input->post('acc_room_size');
    $userData['acc_room_type']      =   $this->input->post('acc_room_type');

    $userData['tur_place']          =   $this->input->post('tur_place');
    $userData['tur_travel_by']      =   $this->input->post('tur_travel_by');
    $userData['tur_price']          =   $this->input->post('tur_price');
    $userData['tur_Inclusions']     =   $this->input->post('tur_Inclusions');
    $userData['tur_discount']       =   $this->input->post('tur_discount');
    $userData['tur_duration']       =   $this->input->post('tur_duration');
    $userData['tur_agency']         =   $this->input->post('tur_agency');



    $userData['un_facility']        =   $chk;
    $userData['facebook_url']       =   $this->input->post('facebook_url');
    $userData['twitter_url']        =   $this->input->post('twitter_url');
    $userData['instagram_url']      =   $this->input->post('instagram_url');
    $userData['un_country']         =   $this->input->post('country');
    $userData['un_city']            =   $this->input->post('city');
    $userData['un_address']            =   $this->input->post('un_address');
    $userData['un_student']         =   $this->input->post('un_student');
    $userData['un_award']           =   $this->input->post('un_award');
    $userData['un_teaching_staff']  =   $this->input->post('un_teaching_staff');
    $userData['un_latitude']        =   $this->input->post('un_latitude');
    $userData['un_longitude']       =   $this->input->post('un_longitude');
    $userData['un_description']     =   $this->input->post('un_description');
    $userData['un_contactno']       =   $this->input->post('un_contactno');
    $userData['un_startdate']       =   $this->input->post('un_startdate');
    $userData['un_achivement']      =   $this->input->post('un_achivement');
    $userData['un_course']          =   $this->input->post('un_course');
    $userData['un_secret_id']       =   md5($this->input->post('un_name'));
    $userData['un_public_status']   =   $submit;


    //image uploda
    $config['upload_path'] = "upload";
    $config['allowed_types'] = "*";
    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);

    if (isset($_FILES['un_media'])) {
      $user_img = $_FILES['un_media']['name'];
    }

    if (isset($_FILES['un_video'])) {
      $un_video = $_FILES['un_video']['name'];
    }


    if ($user_img != "") {

      if ($this->upload->do_upload('un_media')) {
        $data = array('upload_data' => $this->upload->data());
        $userData['un_media']  = $data['upload_data']['file_name'];
        // $userData['un_media']   =   $user_img;
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }

    if ($un_video != "") {

      if ($this->upload->do_upload('un_video')) {
        $data = array('upload_data' => $this->upload->data());
        $userData['un_video'] = $data['upload_data']['file_name'];
        //$userData['un_video']   =   $un_video;
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }



    if (isset($_POST['all_docs']) && $_POST['all_docs'] != "") {
      $all_docs = explode(",", $_POST['all_docs']);
      foreach ($all_docs as $all_doc1) {
        $array = array(
          'user_type' => 'superadmin',
          'user_id' => $_SESSION['admin_id'],
          'un_id'  => $userData['un_id'],
          'file_name' => $all_doc1
        );


        $this->db->insert('multiple_image', $array);
      }
    }

    $this->db->where('un_id', $userData['un_id']);
    $result = $this->db->update('university', $userData);
    if ($result == 1) {
      $response = array('status' => true, 'message' => 'Form Update successfully', 'data' => array(), 'url' => 'UniversityViewlist');
    } else {
      $response = array('status' => false, 'message' => 'Somethign went wrong', 'data' => array());
    }

    echo json_encode($response);
  } //End function

  //home page mange form
  function Homepageform()
  {


    $userData = array();
    $userData['home_un_desc']           =   $this->input->post('home_un_desc');
    $userData['home_listing_desc']      =   $this->input->post('home_listing_desc');
    $userData['home_country_desc']      =   $this->input->post('home_country_desc');
    $userData['home_howit_desc']        =   $this->input->post('home_howit_desc');
    $userData['home_title1']            =   $this->input->post('home_title1');
    $userData['home_subtitle1']         =   $this->input->post('home_subtitle1');
    $userData['home_title2']            =   $this->input->post('home_title2');
    $userData['home_subtitle2']         =   $this->input->post('home_subtitle2');
    $userData['home_title3']            =   $this->input->post('home_title3');
    $userData['home_subtitle3']         =   $this->input->post('home_subtitle3');
    $userData['home_reviews_desc']      =   $this->input->post('home_reviews_desc');
    $userData['all_docs']               =   $this->input->post('all_docs');
    $userData['home_footer_desc']       =   $this->input->post('home_footer_desc');
    $userData['home_email']             =   $this->input->post('home_email');
    $userData['home_address']           =   $this->input->post('home_address');
    $userData['home_phone']             =   $this->input->post('home_phone');
    $userData['home_fb_url']            =   $this->input->post('home_fb_url');
    $userData['home_insta_url']         =   $this->input->post('home_insta_url');
    $userData['home_twitter_url']       =   $this->input->post('home_twitter_url');



    //image uploda
    $config['upload_path'] = "upload";
    $config['allowed_types'] = "*";
    $config['encrypt_name'] = TRUE;
    $this->load->library('upload', $config);


    if (isset($_FILES['logo_img'])) {
      $user_img = $_FILES['logo_img']['name'];
    }

    if ($user_img != "") {

      if ($this->upload->do_upload('logo_img')) {
        $data = array('upload_data' => $this->upload->data());
        $userData['logo_img'] = $data['upload_data']['file_name'];
        //$userData['logo_img']   =   $user_img;
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }
    // university background Image
    if (isset($_FILES['un_bg_img'])) {
      $un_bg_img = $_FILES['un_bg_img']['name'];
    }

    if ($un_bg_img != "") {

      if ($this->upload->do_upload('un_bg_img')) {
        $data = array('upload_data' => $this->upload->data());
        $userData['un_bg_img'] = $data['upload_data']['file_name'];
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }
    if (isset($_FILES['tur_bg_img'])) {
      $tur_bg_img = $_FILES['tur_bg_img']['name'];
    }

    if ($tur_bg_img != "") {

      if ($this->upload->do_upload('tur_bg_img')) {
        $data = array('upload_data' => $this->upload->data());
        $userData['tur_bg_img'] = $data['upload_data']['file_name'];
        //$userData['tur_bg_img']   =   $tur_bg_img;
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }
    if (isset($_FILES['acc_bg_img'])) {
      $acc_bg_img = $_FILES['acc_bg_img']['name'];
    }

    if ($acc_bg_img != "") {

      if ($this->upload->do_upload('acc_bg_img')) {
        $data = array('upload_data' => $this->upload->data());
        $userData['acc_bg_img'] = $data['upload_data']['file_name'];
        // $userData['acc_bg_img']   =   $acc_bg_img;
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }

    //End  university background Image

    if (isset($_POST['all_docs']) && $_POST['all_docs'] != "") {
      $all_docs = explode(",", $_POST['all_docs']);
      foreach ($all_docs as $all_doc1) {
        $array = array(
          'user_type' => 'superadmin',
          'user_id' => 1,
          'home_id'  => 1,
          'file_name' => $all_doc1
        );


        $this->db->insert('multiple_image', $array);
      }
    }

    $this->db->where('home_id', 1);
    $result = $this->db->update('home', $userData);
    if ($result == 1) {
      $response = array('status' => true, 'message' => 'Home page Update successfully', 'data' => array());
    } else {
      $response = array('status' => false, 'message' => 'Somethign went wrong', 'data' => array());
    }

    echo json_encode($response);
  }
  //End function



  //deleteLicense
  public function deletegallary()
  {
    $this->db->where('id', $this->input->post('id'));
    $this->db->delete('multiple_image');
    echo json_encode(array('status' => 'success', 'message' => 'Delete Gallary Image Successfully.'));
  } //End function


  //User Inquiry  list 
  function UserInquiry_list()
  {

    $data = array();
    $list = $this->User_model->Inget_datatables();


    $no = $_POST['start'];
    foreach ($list as $customers) {


      if ($customers->in_status == 1) {
        $status = '<button type="button" name="statusupdate" id="' . $customers->in_id . '" class="btn btn-warning btn-xs UserActiveinactive">Active</button>';
      } else {
        $status = '<button type="button" name="statusupdate" id="' . $customers->in_id . '" class="btn btn-primary btn-xs UserActiveinactive">Block</button>';
      }
      // $this->db->where('user_id', $customers->in_userid);
      // $userinfo = $this->db->get('users')->result();

      if ($customers->in_form_cat == '2') {
        $Enquiry_type = 'University Enquiry';
      } elseif ($customers->in_form_cat == '3') {
        $Enquiry_type = 'Accomdation Enquiry';
      } else {
        $Enquiry_type = 'Tourism Enquiry';
      }

      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $customers->in_first_name;
      $row[] = $customers->in_email;
      $row[] = $customers->in_phone;
      $row[] = $Enquiry_type;
      $row[] = date('Y-m-d', strtotime($customers->in_createdate));
      $row[] = '<a type="button"  href="Enquiry_detail?id=' . $customers->in_id . '" ><button type="button" class="btn btn-primary">View</button></a> ';
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->User_model->Incount_all(),
      "recordsFiltered" => $this->User_model->Incount_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  } //End function



  //User Inquiry  list 
  function userReview_list()
  {

    $data = array();
    $list = $this->User_model->Review_get_datatables();


    $no = $_POST['start'];
    foreach ($list as $Reviews) {

      if ($Reviews->rat_status == 1) {
        $status = '<button type="button" name="statusupdate" id="' . $Reviews->rat_id . '" class="btn btn-warning btn-xs ReviewActiveinactive">Active</button>';
      } else {
        $status = '<button type="button" name="Reviewstatusupdate" id="' . $Reviews->rat_id . '" class="btn btn-primary btn-xs ReviewActiveinactive">Block</button>';
      }
      if ($Reviews->rat_show_inhome == 1) {
        $home_status = '<button type="button" name="home_statusupdate" id="' . $Reviews->rat_id . '" class="btn btn-warning btn-xs homeActiveinactive">Show</button>';
      } else {
        $home_status = '<button type="button" name="home_showstatusupdate" id="' . $Reviews->rat_id . '" class="btn btn-primary btn-xs homeActiveinactive">Block</button>';
      }

      $this->db->where('user_id', $Reviews->rat_userid);
      $userinfo = $this->db->get('users')->result();

      $this->db->where('un_id', $Reviews->rat_university_id);
      $Universityinfo = $this->db->get('university')->result();


      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $userinfo[0]->user_name;
      $row[] = $Universityinfo[0]->un_name;
      $row[] = $Reviews->rat_comment;
      $row[] = $Reviews->rat_rating;
      $row[] = $home_status;
      $row[] = date('Y-m-d', strtotime($Reviews->rat_createdate));;
      $row[] = $status;
      $row[] = '<a type="button"  href="ActionadminEditreview?id=' . $Reviews->rat_id . '" ><button type="button" class="btn btn-primary">Edit</button></a>
       <a type="button"  href="Actionadmindeletereview?id=' . $Reviews->rat_id . '" >
        <button type="button" name="delete" id="' . $Reviews->rat_id . '" class="btn btn-primary btn-xs deletestetususer">Delete</button></a>';
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->User_model->Reviewcount_all(),
      "recordsFiltered" => $this->User_model->Reviewcount_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  } //End function

  //HomepageMange function
  function HomepageMange()
  {

    $where  = array('home_id' => 1);
    $result['homepage']  = $this->Admin_model->getAll('home', $where);

    $where_ga  = array('home_id' => 1);
    $result['gallary_media']  = $this->Admin_model->getAll('multiple_image', $where_ga);

    $this->load->view('admin/admin_Homepage_manage', $result);
  } //End function


  //Addcategory view
  function Addcategory()
  {

    $result['cat'] = $this->Admin_model->fetch_category();

    $this->load->view('admin/admin_addCategory', $result);
  }
  //End function


  //Allcategorylist

  function Allcategory_list()
  {

    $data = array();
    $category = array();

    $list = $this->User_model->catget_datatables();

    $no = $_POST['start'];
    foreach ($list as $catdata) {

      if ($catdata->cat_status == 1) {
        $status = '<button type="button" name="statusupdate" id="' . $catdata->cat_id . '" class="btn btn-warning btn-xs catActiveinactive">Active</button>';
      } else {
        $status = '<button type="button" name="Reviewstatusupdate" id="' . $catdata->cat_id . '" class="btn btn-primary btn-xs catActiveinactive">Block</button>';
      }


      if ($catdata->cat_parent_id == '' || empty($catdata->cat_parent_id)) {

        $category = $catdata->cat_name;
        $Parent_Cat = "";
        $action = '';
      } else {


        $array = array('cat_id' => $catdata->cat_parent_id);
        $this->db->where($array);
        $query = $this->db->get('category')->row();
        $category = $query->cat_name;
        $Parent_Cat = $catdata->cat_name;
        $action = '<a type="button"  href="action_Editcategory?id=' . $catdata->cat_id . '" ><button type="button" class="btn btn-primary">Edit</button></a> <button type="button" name="delete" id="' . $catdata->cat_id . '" class="btn btn-primary btn-xs deletestetuscategory">Delete</button>';
      }




      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $category;
      $row[] = $Parent_Cat;
      $row[] = $status;
      $row[] = $action;
      $data[] = $row;
    }

    $output = array(

      "draw" => $_POST['draw'],
      "recordsTotal" => $this->User_model->catcount_all(),
      "recordsFiltered" => $this->User_model->catcount_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  } //End function



  //Allcategory_View view
  function Allcategory_View()
  {
    $this->load->view('admin/Allcategory_View');
  }
  //End function




  //----------------------------------- SUB ADMIN -----------------------------------//

  //add subadmin
  public function Add_subadmin_view()
  {
    $this->load->view('admin/Add_Subadmin');
  }

  public function ActionaddSubadmin()
  {
    $chk = "";
    if (isset($_POST['Permissions'])) {
      $checkbox1 = $_POST['Permissions'];

      foreach ($checkbox1 as $chk1) {
        $chk .= $chk1 . ",";
      }
    }



    $admin_name               =  $this->input->post('admin_name');
    $user_first_name         =  $this->input->post('first_name');
    $user_last_name          =  $this->input->post('last_name');
    $user_email              =  $this->input->post('admin_email');
    $user_phone              =  $this->input->post('phone');
    $user_aboutme            =  $this->input->post('aboutme');
    $password                =  $this->input->post('admin_password');


    $userData = array();
    $userData['admin_name']          =   $admin_name;
    $userData['first_name']          =   $user_first_name;
    $userData['last_name']           =   $user_last_name;
    $userData['admin_email']         =   $user_email;
    $userData['phone']               =   $user_phone;
    $userData['aboutme']             =   $user_aboutme;
    $userData['admin_type']          =   $this->input->post('admin_type');
    $userData['admin_password']      =   md5($password);
    $userData['pwd']                 =   $password;
    $userData['profile']             =   $this->input->post('profile');
    $userData['admin_status']        =  '1';
    $userData['Permissions']         =   $chk;



    //image uploda
    $config['upload_path'] = "upload";
    $config['allowed_types'] = "doc|docx|pdf|ppt|jpeg|jpg|png|bmp";
    $config['encrypt_name'] = TRUE;
    $this->load->library('upload', $config);
    $user_img = "";

    if (isset($_FILES['profile'])) {
      $user_img = $_FILES['profile']['name'];
    }


    if ($user_img != "") {

      if ($this->upload->do_upload('profile')) {
        $data = array('upload_data' => $this->upload->data());
        $user_img  = $data['upload_data']['file_name'];
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }
    $userData['profile']        = $user_img;

    //end image upload


    $result = $this->User_model->registration_admin($userData);
    if (is_array($result)) {
      switch ($result['regType']) {
        case "NR": // Normal registration
          $response = array('status' => true, 'message' => "Admin  Add Successfully", 'data' => array(), 'url' => 'Allsub_adminlist');
          break;
        case "AE": // User already registered
          $response = array('status' => false, 'message' => "Admin already Exist", 'data' => array());
          break;
        default:
          $response = array('status' => false, 'message' => 'something went wrong', 'data' => array());
      }
    } else {
      $response = array('status' => false, 'message' => 'something went wrong', 'data' => array());
    }
    echo json_encode($response);
  }
  //End function

  //all subadmin list ajax

  function ViewEditSubAdmin()
  {

    $id = $_GET['id'];
    $where                     = array('admin_id' => $id);
    $result['data']           = $this->User_model->getsingle('admin', $where);
    $this->load->view('admin/Action_Subadmin_Edit', $result);
  }

  function Subadminist()
  {

    $data = array();
    $list = $this->Admin_model->get_admin_datatables();


    $no = $_POST['start'];
    foreach ($list as $customers) {

      if ($customers->admin_status == 1) {
        $status = '<button type="button" name="statusupdate" id="' . $customers->admin_id . '" class="btn btn-warning btn-xs adminActiveinactive">Active</button>';
      } else {
        $status = '<button type="button" name="statusupdate" id="' . $customers->admin_id . '" class="btn btn-primary btn-xs adminActiveinactive">Block</button>';
      }

      $no++;
      $row = array();
      $row[] = $no;
      $row[] = '<img  style="width: 60px;"src="upload/' . $customers->profile . '" onerror=this.src="upload/user_placeholder.png">';
      $row[] = $customers->admin_name;
      $row[] = $customers->phone;
      $row[] = $customers->admin_email;
      $row[] = date('Y-m-d', strtotime($customers->admin_createdate));
      $row[] = $status;
      $row[] = '<a type="button"  href="ViewEditSubAdmin?id=' . $customers->admin_id . '" ><button type="button" class="btn btn-primary">Edit</button></a> <button type="button" name="delete" id="' . $customers->admin_id . '" class="btn btn-primary btn-xs deletestetusadmin">Delete</button>';
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Admin_model->count_admin_all(),
      "recordsFiltered" => $this->Admin_model->count_admin_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  }


  //End function

  function Allsub_adminlist()
  {
    $this->load->view('admin/Allsub_adminlist');
  }


  function adminActiveinactive()
  {

    $id            = $_POST["admin_id"];
    $where              = array('admin_id' => $id);
    $dataExist          = $this->Admin_model->is_data_exists('admin', $where);
    if ($dataExist) {
      $status         = $dataExist->admin_status ? 0 : 1;
      $dataExist      = $this->Admin_model->updateFields('admin', array('admin_status' => $status), $where);
      $showmsg        = ($status == 1) ? 'Status Active successfully' : 'Status Deactivate successfully';
      $response       = array('status' => true, 'message' => $showmsg, 'change_status' => $status);
    } else {
      $response       = array('status' => false, 'message' => 'somthing wrong');
    }
    echo json_encode($response);
  }

  function deletestetusadmin()
  {

    $id                 = $_POST["admin_id"];
    $where              = array('admin_id' => $id);
    $dataExist          = $this->Admin_model->is_data_exists('admin', $where);

    if ($dataExist) {
      $status         = 1;
      $dataExist      = $this->Admin_model->updateFields('admin', array('admin_delete' => $status), $where);
      $showmsg        = ($status == 1) ? 'Delete Successfully' : 'delete Unpublished faild';
      $response       = array('status' => true, 'message' => $showmsg, 'change_status' => $status);
    } else {
      $response       = array('status' => false, 'message' => 'somthing wrong');
    }

    echo json_encode($response);
  }


  function Action_Edit_Subadmin()
  {

    $chk = "";
    if (isset($_POST['Permissions'])) {
      $checkbox1 = $_POST['Permissions'];

      foreach ($checkbox1 as $chk1) {
        $chk .= $chk1 . ",";
      }
    }

    $userData = array();
    $userData['admin_name']           =   $this->input->post('admin_name');
    $userData['first_name']           =   $this->input->post('first_name');
    $userData['last_name']            =   $this->input->post('last_name');
    $userData['admin_email']          =   $this->input->post('admin_email');
    $userData['phone']                =   $this->input->post('phone');
    $userData['aboutme']              =   $this->input->post('aboutme');
    $userData['admin_password']       =   md5($this->input->post('admin_password'));
    $userData['pwd']                  =   $this->input->post('admin_password');
    $userData['Permissions']          =   $chk;

    //image uploda
    $config['upload_path'] = "upload";
    $config['allowed_types'] = "*";
    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);

    if (isset($_FILES['profile'])) {
      $user_img = $_FILES['profile']['name'];
    }

    if ($user_img != "") {

      if ($this->upload->do_upload('profile')) {
        $data = array('upload_data' => $this->upload->data());
        $userData['profile'] = $data['upload_data']['file_name'];
        //$userData['profile']   =   $user_img;
      } else {
        $error = $this->upload->display_errors();
        $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
        $response              = array('status' => false, 'message' => $error);
        echo json_encode($response);
        die;
      }
    }

    $where          = array('admin_id' => $this->input->post('admin_id'));

    $update     = $this->User_model->updateFields('admin', $userData, $where);
    if ($update) {

      if ($update) {
        $response = array('status' => true, 'message' => 'Successfully Updated', 'url' => 'Allsub_adminlist');
      } else {
        $response = array('status' => false, 'message' => 'Failed! Please try again');
      }
    }
    echo json_encode($response);
  }


  //----------------------------------- End SUB ADMIN0------------------------------//

  //7-5-2021
  //delete review 

  function  Actionadmindeletereview()
  {
    if (!empty($_GET['id'])) {
      $id = $_GET['id'];
      $this->db->query("delete from rating where rat_id ='$id'");
      $this->session->set_flashdata('succes', ' Delete review successfully');
      redirect('UserReviewList');
    } else {
      $this->session->set_flashdata('error', ' Something want wrong');
      redirect('UserReviewList');
    }
  }
  //end delete review function

  //update review in admin panel
  function ActionadminEditreview()
  {
    if (!empty($_GET['id'])) {
      $id = $_GET['id'];
      $where_ct = array('rat_id' => $id,);
      $result['data'] = $this->Admin_model->getAll('rating', $where_ct);
      $this->load->view('admin/edit_review', $result);
    } else {
      $this->session->set_flashdata('error', ' Something want wrong');
      redirect('UserReviewList');
    }
  }
  //update review in admin panel
  function actionEditrevew()
  {
    if (!empty($_POST['id'])) {
      $id = $_POST['id'];
      $review = array();
      $review['rat_rating'] = $this->input->post('ratingno');
      $review['rat_comment'] = $this->input->post('comment');

      $where = array('rat_id ' => $id);
      $this->Admin_model->update('rating', $review, $where);

      $this->session->set_flashdata('succes', ' Update review successfully');
      redirect('UserReviewList');
    } else {
      $this->session->set_flashdata('error', ' Something want wrong');
      redirect('UserReviewList');
    }
  }


  //add subadmin
  public function managecontactus()
  {
    $this->load->view('admin/contact');
  }

  //add subadmin
  public function manageaboutus()
  {
    $where_ct = array('slug' => 'about');
    $result['data'] = $this->Admin_model->getAll('cms_page', $where_ct);
    $this->load->view('admin/about', $result);
  }

  //add subadmin
  public function manageservice()
  {
    $this->load->view('admin/service');
  }


  //languageList

  function languageList()
  {

    $data = array();
    $category = array();

    $list = $this->User_model->language_get_datatables();

    $no = $_POST['start'];
    foreach ($list as $catdata) {
      $constantName = $catdata->constantName;
      if ($catdata->status == 'active') {
        $status = '<button type="button" name="statusupdate" id="' . $catdata->id . '" class="btn btn-warning btn-xs catActiveinactive">Active</button>';
      } else {
        $status = '<button type="button" name="Reviewstatusupdate" id="' . $catdata->id . '" class="btn btn-primary btn-xs catActiveinactive">Block</button>';
      }

      $action = '<a type="button"  href="action_Editlanguage?id=' . $catdata->id . '" ><button type="button" class="btn btn-primary">Edit</button></a>';
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $constantName;
      $row[] = $catdata->value_1;
      $row[] = $catdata->value_2;
      $row[] = $action;
      $data[] = $row;
    }

    $output = array(

      "draw" => $_POST['draw'],
      "recordsTotal" => $this->User_model->lancount_all(),
      "recordsFiltered" => $this->User_model->catcount_filtered(),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  } //End function



  //Allcategory_View view
  function languageView()
  {

    $this->load->view('admin/language_View');
  }
  //End function
  //Allcategory_View view
  function action_Editlanguage()
  {
    $id = $_GET['id'];
    $where                     = array('id' => $id, 'status' => 'active');
    $result['data']           = $this->User_model->getsingle('tbl_constant', $where);
    $where_par                     = array('status' => 'active');
    $result['lan'] = $this->Admin_model->getAll('tbl_constant', $where_par);
    $this->load->view('admin/Edit_language', $result);
  }
  //Allcategory_View view
  function action_updatecategory()
  {
    if (!empty($_POST['eid'])) {

      $category = array();
      $category['constantName'] = $this->input->post('constantName');
      $category['value_1'] = $this->input->post('value_1');
      $category['value_2'] = $this->input->post('value_2');

      $where = array('id' => $_POST['eid']);
      $this->Admin_model->update('tbl_constant', $category, $where);
      $this->session->set_flashdata('succes', ' Successfully Update');
      redirect('languageView');
      die();
    }
  }
} //End class
