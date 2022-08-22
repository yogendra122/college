<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_controller extends CI_Controller
{

    public function  __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('googleplus');
        $this->load->model('User_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library("pagination");
    }

    function oauth2callback()
    {

        if (isset($_GET['code'])) {
            if ($this->googleplus->getAuthenticate()) {

                // Get user info from google 
                $gpInfo = $this->googleplus->getUserInfo();
                $data                   = array();
                $data['user_email']         = $gpInfo['email'];
                $data['name']               = $gpInfo['name'];
                $data['picture']            = $gpInfo['picture'];
                $data['id']                 = $gpInfo['id'];
                $data['user_email']         = $gpInfo['email'];
                $data['user_first_name']    = $gpInfo['given_name'];
                $data['user_last_name']     = $gpInfo['family_name'];

                $result                 = $this->User_model->sociallogin($data);

                if (is_array($result)) {
                    switch ($result['returnType']) {
                        case "SL":
                            $this->StoreSession($result['userInfo']);
                            redirect('/');
                            break;

                        case "WE":
                            $formdata = array('user_email' => $data['user_email'], 'user_first_name' => $data['user_first_name'], 'user_last_name' => $data['user_last_name'], 'user_name' => $data['name'], 'user_img' => $data['picture'], 'user_status' => 1, 'user_google_id' => $data['id'], 'user_login_type' => 'google');
                            $result = $this->Admin_model->insertAll('users', $formdata);

                            if ($result) {
                                $getrr = $this->User_model->sociallogin($data);
                                $this->StoreSession($getrr['userInfo']);

                                $this->session->set_flashdata('googlelogin', 'Google Login successfully');
                                redirect('/');
                            }

                            break;
                        default:
                            $response = array('status' => true, 'message' => 'User authentication successfully done', 'users' => $result['userInfo'], 'url' => 'user_dashboard');
                    }
                } else {
                    $response = array('status' => false, 'message' => 'You are not authorised for this action');
                }

                $this->session->set_flashdata('Errors', 'Somthing Wrong');
                redirect('/');
            }
        } //



    }


    function login_with_fb()
    {
        $data['user'] = array();
        // Check if user is logged in
        if ($this->facebook->is_authenticated()) {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id,name,email');
            die;
            if (!isset($user['error'])) {
                print_r($user);
                $data['user'] = $user;
                print_r($data);
                die();
            }
        }
    }

    public function index()
    {
        if (empty($_SESSION['language'])) {
            $_SESSION['language'] = 'en';
        }
        $where  = array('un_delete_status' => 0, 'un_status' => 1, 'un_public_status' => 0, 'category' => 2);

        $result['university']  = $this->Admin_model->getAll('university', $where, 'un_id', 'desc', 0, 15);

        $where  = array('country_delete_status' => 0, 'country_status' => 1, 'country_parent_id' => '');
        $result['country']  = $this->Admin_model->getAll('country', $where, 'country_id', 'ASC', 0, 6);


        $where  = array('home_id' => 1);
        $result['homepage']  = $this->Admin_model->getAll('home', $where);

        $where_ga  = array('home_id' => 1);
        $result['gallary_media']  = $this->Admin_model->getAll('multiple_image', $where_ga);

        $where  = array('rat_delete' => 0, 'rat_status' => 1, 'rat_show_inhome' => 1);
        $result['rating_home']  = $this->Admin_model->getAll('rating', $where, 'rat_id', 'desc', 0, 10);

        $where_acc = array('un_delete_status' => 0, 'un_status' => 1, 'un_public_status' => 0, 'category' => 3);
        $result['accomodation']  = $this->Admin_model->getAll('university', $where_acc, 'un_id', 'desc', 0, 15);

        $where_acc = array('un_delete_status' => 0, 'un_status' => 1, 'un_public_status' => 0, 'category' => 6);
        $result['Tourism']  = $this->Admin_model->getAll('university', $where_acc, 'un_id', 'desc', 0, 15);
        $result['google_login_url'] = $this->googleplus->loginURL();

        $this->load->view('index', $result);
    }

    //user_Change_Password
    public function user_Change_Password()
    {

        $this->load->view('user_ChangePassword');
    } //end function 


    /**
     * response of auto complete list university name json
     *
     * @return Response
     */
    public function autocomplete_uni()
    {

        $query = $this->input->get('query');
        $this->db->select('un_name');
        $this->db->like('un_name', $query);

        $where  = array('un_delete_status' => 0, 'category' => 2, 'un_status' => 1, 'un_public_status' => 0);
        $this->db->where($where);
        $data1 = $this->db->get("university")->result();
        $data = array();
        foreach ($data1 as $hsl) {
            $data[] = $hsl->un_name;
        }
        echo json_encode($data);
    }
    //End function

    /**
     * response of autocomplete travel agency list  json
     *
     * @return Response
     */
    public function autocomplete_agency()
    {

        $query = $this->input->get('query');

        $this->db->select('tur_agency');
        $this->db->like('tur_agency', $query);

        $where  = array('un_delete_status' => 0, 'category' => 6, 'un_status' => 1, 'un_public_status' => 0);
        $this->db->where($where);
        $data1 = $this->db->get("university")->result();
        $data = array();
        foreach ($data1 as $hsl) {
            $data[] = $hsl->tur_agency;
        }
        echo json_encode($data);
    }
    //End function

    //check admin login auth function 

    function checkLogin()
    {

        if (isset($_SESSION)) {
            if ($_SESSION['user_session']['user_email'] == "") {
                $this->session->set_flashdata('warning_enquiry', 'Please Login Account.');
                redirect('/');
            }
        }
    }


    //End checkLogin

    //Apply_from view
    public function Apply_from()
    {
        $this->checkLogin();
        $result['form_id'] = $_GET['id'];
        $result['in_universityid'] = $_GET['un_id'];

        $result['in_userid']  = $_SESSION['user_session']['user_id'];

        $result['new_form'] = $this->db->limit(1)->order_by('form_id', 'desc')->get_where('forms_elements', array('form_category' => $_GET['formcat_id'], 'form_id' => $_GET['id']))->result();

        $result['country'] = $this->User_model->fetch_country();

        $this->load->view('Apply_form', $result);
    }
    //End

    function fetch_state()
    {
        if ($this->input->post('country_id')) {
            echo $this->User_model->fetch_state($this->input->post('country_id'));
        }
    }

    function fetch_city()
    {
        if ($this->input->post('state_id')) {
            echo $this->User_model->fetch_city($this->input->post('state_id'));
        }
    }


    //user  fogrgo password

    public function user_forgot_Password()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => strip_tags(validation_errors()));
            $this->response($response);
        }

        $email      = $this->input->post('email');
        $response   = $this->User_model->forgotPassword($email);
        if ($response['emailType'] == 'ES') { //ES emailSend
            $response = array('status' => true, 'message' => 'Please check your mail to reset your password.', 'url' => '/');
        } elseif ($response['emailType'] == 'NS') { //NS NotSend
            $response = array('status' => false, 'message' => 'Error not able to send email', 'url' => '/');
        } elseif ($response['emailType'] == 'NE') { //NE Not exist
            $response = array('status' => false, 'message' => 'This Email does not exist', 'url' => '/');
        } elseif ($response['emailType'] == 'SL') { //SL social login
            $response = array('status' => false, 'message' => 'Social registered users are not allowed to access Forgot password', 'url' => '/');
        }
        echo json_encode($response);
    } //end function



    function create_New_ForgotPassword()
    {

        $user_secret_id = $_POST['userdata'];
        $password = $_POST['password'];
        $where          = array('user_secret_id' => $user_secret_id);
        $set = array('user_password' => password_hash($password, PASSWORD_DEFAULT));
        $update     = $this->User_model->updateFields('users', $set, $where);
        if ($update) {
            $res = array();
            if ($update) {
                $response = array('status' => true, 'message' => 'Successfully Updated', 'url' => 'user_dashboard');
            } else {
                $response = array('status' => false, 'message' => 'Failed! Please try again', 'url' => 'user_dashboard');
            }
        }
        echo json_encode($response);
    }





    //userUpdatePassword
    public function user_Update_Password()
    {


        $password       = $this->input->post('password');
        $npassword      = $this->input->post('npassword');
        $select         = "password";
        $where          = array('user_id' => $_SESSION['user_session']['user_id']);
        $user           = $this->User_model->getsingle('users', $where, 'user_password');

        if (password_verify($password, $user['user_password'])) {

            $set = array('user_password' => password_hash($this->input->post('npassword'), PASSWORD_DEFAULT));
            $update     = $this->User_model->updateFields('users', $set, $where);
            if ($update) {
                $res = array();
                if ($update) {
                    $response = array('status' => true, 'message' => 'Successfully Updated', 'url' => 'user_dashboard');
                } else {
                    $response = array('status' => false, 'message' => 'Failed! Please try again', 'url' => 'user_dashboard');
                }
            }
        } else {
            $response = array('status' => false, 'message' => 'Your Current Password is Wrong !', 'url' => 'user_dashboard', 'test' => $user);
        }
        echo json_encode($response);
    } //end function user_Update_Password

    //user_dashboard
    public function user_dashboard()
    {
        $this->load->view('User_dashboard');
    } //end function


    //user profile show
    public function user_profile()
    {

        $where              = array('user_id' => $_SESSION['user_session']['user_id']);
        $result             = $this->User_model->getsingle('users', $where);
        $data['userData']   = $result;
        $this->load->view('user_profile', $data);
    } //end function

    //user Edit profile
    public function user_edit_profile()
    {

        $this->form_validation->set_rules('user_name', 'user_name', 'trim|required');
        $this->form_validation->set_rules('user_first_name', 'user_first_name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => strip_tags(validation_errors()), 'data' => array());
            echo json_encode($response);
        } else {

            $userDetail = array();
            $userDetail['user_name'] = $this->input->post('user_name');
            $userDetail['user_first_name'] = $this->input->post('user_first_name');
            $userDetail['user_last_name'] = $this->input->post('user_last_name');
            $userDetail['user_email'] = $this->input->post('user_email');
            $userDetail['user_phone'] = $this->input->post('user_phone');
            $userDetail['user_address'] = $this->input->post('user_address');
            $userDetail['user_aboutme'] = $this->input->post('user_aboutme');

            //image uploda
            $config['upload_path'] = "upload";
            $config['allowed_types'] = "doc|docx|pdf|ppt|jpeg|jpg|png|bmp";
            // $config['encrypt_name'] = FALSE;
            $this->load->library('upload', $config);
            $user_img = "";


            if (isset($_FILES['user_img'])) {
                $user_img = $_FILES['user_img']['name'];
            }


            if ($user_img != "") {

                if ($this->upload->do_upload('user_img')) {
                    $data = array('upload_data' => $this->upload->data());
                    $licence = $data['upload_data']['file_name'];
                    $userDetail['user_img'] = $this->input->post('user_img');
                    $userDetail['user_img']        = $user_img;
                    $_SESSION['user_session']['user_img'] = $userDetail['user_img'];
                } else {
                    $error = $this->upload->display_errors();
                    $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
                    $response              = array('status' => false, 'message' => $error);
                    echo json_encode($response);
                    die;
                }
            }


            //end image upload



            $this->db->where('user_id', $_SESSION['user_session']['user_id']);
            $asb = $this->db->update('users', $userDetail);

            if ($asb) {
                $response = array('status' => true, 'message' => 'User Profile Update successfully', 'data' => array());
            } else {
                $response = array('status' => false, 'message' => 'Somethign went wrong', 'data' => array());
            }
        }
        echo json_encode($response);
    } //end function

    //Session Logout in super admin

    function user_logout()
    {

        $this->session->sess_destroy(); //destorying codeignier's session
        $this->googleplus->revokeToken(); //destorying google+ token
        redirect('/');
    }

    //End logout function

    //user register
    public function action_adduser()
    {

        $email          =  $this->input->post('email');
        $password       =  $this->input->post('password');
        $name           =  $this->input->post('name');
        $userData['user_email']     =   $email;
        $userData['user_name']      =   $name;
        $userData['user_secret_id'] =   md5($password);
        $userData['user_password']  =   password_hash($password, PASSWORD_DEFAULT);
        $result = $this->User_model->registration($userData);
        if (is_array($result)) {
            switch ($result['regType']) {
                case "NR": // Normal registration
                    $response = array('status' => true, 'message' => "Registration Done Successfully", 'data' => array());
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
    } // End registration_post function	}//end function




    //user login
    function actionuser_login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
            //$this->response($response);
            echo json_encode($response);

        } else {

            $data                   = array();
            $data['user_email']          = $this->input->post('email');
            $data['user_password']       = $this->input->post('npassword');
            $result                 = $this->User_model->login($data);

            if (is_array($result)) {
                switch ($result['returnType']) {
                    case "SL":
                        $this->StoreSession($result['userInfo']);
                        $response = array('status' => true, 'message' => 'User authentication successfully done', 'users' => $result['userInfo'], 'url' => 'user_dashboard');
                        break;
                    case "WP":
                        $response = array('status' => false, 'message' => 'Invalid Email or Password');
                        break;
                    case "WE":
                        $response = array('status' => false, 'message' => 'You are not authorised for this action');
                        break;
                    case "IU":
                        $response = array('status' => false, 'message' => 'Something went wrong. Please try again');
                        break;
                    case "WS":
                        $response = array('status' => false, 'message' => 'Something went wrong. Please try again');
                        break;
                    default:
                        $response = array('status' => true, 'message' => 'User authentication successfully done', 'users' => $result['userInfo'], 'url' => 'user_dashboard');
                }
            } else {
                $response = array('status' => false, 'message' => 'You are not authorised for this action');
            }
            echo json_encode($response);
        }
    } //End function






    //forgout password
    function changePassword()
    {
        $userId  = $this->uri->segment(2);
        $data['userData']   = $userId;
        $this->load->view('forgotpassword', $data);
    } //End function 


    //single detail university
    function UniversitysingleDetail()
    {
        $un_id = $_GET['id'];
        $where                 = array('un_id' => $un_id);
        $result['university']  = $this->User_model->getsingle('university', $where);
        $where  = array('un_id' => $un_id);
        $result['university_gallary']  = $this->Admin_model->getAll('multiple_image', $where);

        $where  = array('un_country' => $result['university']['un_country'], 'category' => $result['university']['category'], 'un_delete_status' => 0, 'un_status' => 1, 'un_public_status' => 0);
        $result['similer_university']  = $this->Admin_model->getAll('university', $where);

        $where_acc  = array('un_country' => $result['university']['un_country'], 'category' => $result['university']['category'], 'un_delete_status' => 0, 'un_status' => 1, 'un_public_status' => 0);
        $result['similer_accomodation']  = $this->Admin_model->getAll('university', $where_acc);

        $where_acc  = array('un_country' => $result['university']['un_country'], 'category' => $result['university']['category'], 'un_delete_status' => 0, 'un_status' => 1, 'un_public_status' => 0);
        $result['similer_tourism']  = $this->Admin_model->getAll('university', $where_acc);

        $where_rat  = array('rat_delete' => 0, 'rat_status' => 1, 'rat_university_id' => $un_id);
        $this->db->order_by("rat_id", "desc");
        $result['rating']  = $this->Admin_model->getAll('rating', $where_rat);

        $this->load->view('listing-single', $result);
    }
    //end function

    //add inquiry user 
    function action_addinquirey()
    {

        if (isset($_SESSION['user_session'])) {
            $userData = array();
            $userData['in_categories']                        =   $this->input->post('in_categories');
            $userData['in_message']                           =   $this->input->post('in_message');
            $userData['in_userid']                            =   $this->input->post('in_userid');
            $userData['in_universityid']                      =   $this->input->post('in_universityid');
            $userData['in_phone']                             =   $this->input->post('in_phone');
            $userData['in_form_cat']                          =   $this->input->post('in_form_cat');
            $userData['form_type']                            =  json_encode($this->input->post('form_type'));
            $userData['input_value']                          =  json_encode($this->input->post('input_value'));
            $userData['form_lable']                           =  json_encode($this->input->post('form_lable'));

            $userData['in_first_name']                        =   $this->input->post('in_first_name');
            $userData['in_last_name']                         =   $this->input->post('in_last_name');
            $userData['in_email']                             =   $this->input->post('in_email');
            $userData['in_address']                           =   $this->input->post('in_address');
            $userData['in_BirthdayDate']                      =   $this->input->post('in_BirthdayDate');
            $userData['in_send_Text_permi']                   =   $this->input->post('in_send_Text_permi');
            $userData['in_Sex_birth']                         =   $this->input->post('in_Sex_birth');
            $userData['in_country']                           =   $this->input->post('in_country');
            $userData['in_state']                             =   $this->input->post('in_state');
            $userData['in_city']                              =   $this->input->post('in_city');
            $userData['in_phone']                             =   $this->input->post('in_phone');
            $userData['in_primary_percent']                   =   $this->input->post('in_primary_percent');
            $userData['in_Secondary_percent']                 =   $this->input->post('in_Secondary_percent');
            $userData['in_message']                           =   $this->input->post('in_message');

            //accomodatin
            $userData['in_ac_room_type']                      =   $this->input->post('in_ac_room_type');
            $userData['in_ac_payable_rent']                   =   $this->input->post('in_ac_payable_rent');
            //End accomdation

            //torurism
            $userData['in_tur_travelPlace']                   =   $this->input->post('in_tur_travelPlace');
            $userData['in_tur_bud_amoutn']                    =   $this->input->post('in_tur_bud_amoutn');
            $userData['in_tur_Departure_date']                =   $this->input->post('in_tur_Departure_date');
            $userData['in_tur_Return_date']                   =   $this->input->post('in_tur_Return_date');

            //End tourism
            // echo"<pre>";
            // print_r($userData);
            // die;

            //uplode docuement
            $config['upload_path'] = "upload/document";
            $config['allowed_types'] = "doc|docx|pdf|ppt|jpeg|jpg|png|bmp";
            // $config['encrypt_name'] = FALSE;
            $this->load->library('upload', $config);
            $user_img = "";


            if (isset($_FILES['in_document'])) {
                $in_document = $_FILES['in_document']['name'];
            }


            if ($in_document != "") {

                if ($this->upload->do_upload('in_document')) {
                    $data = array('upload_data' => $this->upload->data());


                    $userData['in_document']        = $in_document;
                } else {
                    $error = $this->upload->display_errors();
                    $error = 'It will accept only doc, docx, pdf, ppt, jpeg, jpg, png, bmp format files.';
                    $response              = array('status' => false, 'message' => $error);
                    echo json_encode($response);
                    die;
                }
            }


            //end  upload





            $insert_id = $this->Admin_model->insertAll('user_inquiry', $userData);

            if ($insert_id) {
                $response = array('status' => true, 'message' => 'Your Request Successfully Done We will Inform You Shortly');
            } else {
                $response = array('status' => false, 'message' => 'Failed! Please try again');
            }
        } else {

            $response = array('status' => false, 'message' => 'Please login Account');
        }


        echo json_encode($response);
    } //end function

    //add inquiry user
    function action_add_comment()
    {

        if (isset($_SESSION['user_session'])) {
            $userData = array();
            $userData['rat_comment']            =   $this->input->post('rat_comment');
            $userData['rat_rating']       =   $this->input->post('rat_rating');
            $userData['rat_university_id']          =   $this->input->post('rat_university_id');
            $userData['rat_userid']            =   $this->input->post('rat_userid');

            $isExistReview   = $this->Admin_model->is_data_exists('rating', array('rat_userid' => $userData['rat_userid'], 'rat_university_id' => $userData['rat_university_id']));
            if (!empty($isExistReview)) {
                $response = array('status' => false, 'message' => 'You Already Comment In This University ');
                echo json_encode($response);
                die;
            }

            $insert_id = $this->Admin_model->insertAll('rating', $userData);

            if ($insert_id) {
                $response = array('status' => true, 'message' => 'Thanks For Rating');
            } else {
                $response = array('status' => false, 'message' => 'Failed! Please try again');
            }
        } else {

            $response = array('status' => false, 'message' => 'Please login Account');
        }


        echo json_encode($response);
    } //end function

    //show country wise University view
    function Countrywise_UniversityList()
    {

        $un_id = $this->uri->segment(2);
        $config = array();
        $config["base_url"] = base_url() . "CountrywiseUniversityList/$un_id";
        $config["total_rows"] = $this->Admin_model->get_count_Countrywise_uni($un_id);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $result["links"] = $this->pagination->create_links();
        $where  = array('un_delete_status' => 0, 'category' => 2, 'un_status' => 1, 'un_public_status' => 0, 'un_country' => $un_id);
        $result['university1']  = $this->Admin_model->getAll('university', $where, 'un_id', 'desc', 'all', $config["per_page"], $page);

        $this->load->view("Countryby_Uni_listing", $result);
    } //End function

    function ViewAllCountryList()
    {


        $config = array();
        $config["base_url"] = base_url() . "ViewAllCountryList";
        $config["total_rows"] = $this->Admin_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $where  = array('country_delete_status' => 0, 'country_status' => 1, 'country_parent_id' => '');
        $result['country']  = $this->Admin_model->getAll('country', $where, 'country_id', 'desc', 'all', $config["per_page"], $page);
        $result["links"] = $this->pagination->create_links();

        $this->load->view("ViewAll_CountrylistByuni", $result);
    }

    function ViewAlluniversityList()
    {


        $config = array();
        $config["base_url"] = base_url() . "ViewAlluniversityList";
        $config["total_rows"] = $this->Admin_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $where  = array('un_delete_status' => 0, 'un_status' => 1, 'un_public_status' => 0, 'category' => 2);

        $result['alluniversity']  = $this->Admin_model->getAll('university', $where, 'un_id', 'desc', 'all', $config["per_page"], $page);
        $result["links"] = $this->pagination->create_links();
        $this->load->view("ViewAll_university", $result);
    }

    function ViewAllAccomodationList()
    {


        $config = array();
        $config["base_url"] = base_url() . "ViewAllAccomodationList";
        $config["total_rows"] = $this->Admin_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $where  = array('un_delete_status' => 0, 'un_status' => 1, 'un_public_status' => 0, 'category' => 3);

        $result['allAccomodation']  = $this->Admin_model->getAll('university', $where, 'un_id', 'desc', 'all', $config["per_page"], $page);
        $result["links"] = $this->pagination->create_links();
        $this->load->view("View_Allaccomodation", $result);
    }

    function ViewAllTourismList()
    {


        $config = array();
        $config["base_url"] = base_url() . "ViewAllTourismList";
        $config["total_rows"] = $this->Admin_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $where  = array('un_delete_status' => 0, 'un_status' => 1, 'un_public_status' => 0, 'category' => 6);

        $result['AllTourismList']  = $this->Admin_model->getAll('university', $where, 'un_id', 'desc', 'all', $config["per_page"], $page);
        $result["links"] = $this->pagination->create_links();
        $this->load->view("ViewAll_Tourism", $result);
    }

    function universitysearch()
    {

        if (isset($_POST['un_name']) || $_POST['un_address']) {

            $this->db->like('un_name', $_POST['un_name']);
            $this->db->like('un_address', $_POST['un_address']);

            $st = "un_delete_status='0' AND un_status='1' AND  category='2' AND un_public_status = '0'";

            $this->db->where($st);
            $result['university1'] = $this->db->get('university')->result();
            $result['catdata'] = $this->My_model->fetchcategotybyid('2');
            $this->load->view("Countryby_Uni_listing", $result);
        } elseif (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $st = "un_delete_status='0' AND un_status='1' AND  category='2' AND un_public_status = '0' AND sub_category=$id";

            $this->db->where($st);
            $result['university1'] = $this->db->get('university')->result();
            $result['catdata'] = $this->My_model->fetchcategotybyid('2');
            $this->load->view("Countryby_Uni_listing", $result);
        } else {
            $st = "un_delete_status='0' AND un_status='1' AND  category='2' AND un_public_status = '0'";

            $this->db->where($st);
            $result['university1'] = $this->db->get('university')->result();
            $result['catdata'] = $this->My_model->fetchcategotybyid('2');
            $this->load->view("Countryby_Uni_listing", $result);
        }
    }

    function accomodationsearch()
    {
        if (isset($_POST['acc_room_type']) || $_POST['un_address']) {

            $this->db->like('acc_room_type', $_POST['acc_room_type']);
            $this->db->like('un_address', $_POST['un_address']);

            $st = "un_delete_status='0' AND un_status='1' AND  category='3' AND un_public_status = '0'";

            $this->db->where($st);
            $result['accomodation'] = $this->db->get('university')->result();
            $result['catdata'] = $this->My_model->fetchcategotybyid('3');
            $this->load->view("Countryby_Uni_listing", $result);
        } elseif (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $st = "un_delete_status='0' AND un_status='1' AND  category='3' AND un_public_status = '0' AND sub_category=$id";

            $this->db->where($st);
            $result['university1'] = $this->db->get('university')->result();
            $result['catdata'] = $this->My_model->fetchcategotybyid('3');
            $this->load->view("Countryby_Uni_listing", $result);
        } else {
            $st = "un_delete_status='0' AND un_status='1' AND  category='3' AND un_public_status = '0'";

            $this->db->where($st);
            $result['accomodation'] = $this->db->get('university')->result();
            $result['catdata'] = $this->My_model->fetchcategotybyid('3');
            $this->load->view("Countryby_Uni_listing", $result);
        }
    }

    function tourismsearch()
    {
        if (isset($_POST['tur_agency']) || $_POST['tur_place']) {

            $this->db->like('tur_agency', $_POST['tur_agency']);
            $this->db->like('tur_place', $_POST['tur_place']);

            $st = "un_delete_status='0' AND un_status='1' AND  category='6' AND un_public_status = '0'";

            $this->db->where($st);
            $result['tourism'] = $this->db->get('university')->result();
            $result['catdata'] = $this->My_model->fetchcategotybyid('6');
            $this->load->view("Countryby_Uni_listing", $result);
        } elseif (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $st = "un_delete_status='0' AND un_status='1' AND  category='6' AND un_public_status = '0' AND sub_category=$id";

            $this->db->where($st);
            $result['university1'] = $this->db->get('university')->result();
            $result['catdata'] = $this->My_model->fetchcategotybyid('6');
            $this->load->view("Countryby_Uni_listing", $result);
        } else {
            $st = "un_delete_status='0' AND un_status='1' AND  category='6' AND un_public_status = '0'";

            $this->db->where($st);
            $result['accomodation'] = $this->db->get('university')->result();
            $result['catdata'] = $this->My_model->fetchcategotybyid('6');
            $this->load->view("Countryby_Uni_listing", $result);
        }
    }



    //for session
    function StoreSession($userData)
    {
        $session_data['user_id']                = $userData->user_id;
        $session_data['user_name']              = $userData->user_name;
        $session_data['user_email']             = $userData->user_email;
        $session_data['user_status']            = $userData->user_status;
        $session_data['user_img']               = $userData->user_img;
        $session_data['user_delete_status']     = $userData->user_delete_status;
        $session_data['isLogin']                = TRUE;
        $_SESSION['user_session']               = $session_data;
        return TRUE;
    } //End function


    //for terms and condition
    function term_and_conditions()
    {
        $this->load->view('term_and_conditions');
    } //End function
    //for terms and condition
    function privacy_policy()
    {
        $this->load->view('privacy_policy');
    } //End function


    function about()
    {
        $this->load->view('about');
    } //End function


    function contact()
    {
        $this->load->view('contact');
    } //End function


    function service()
    {
        $this->load->view('service');
    } //End function


    function faq()
    {
        $this->load->view('faq');
    } //End function
    function visaApplication()
    {
        $this->load->view('visaApplication');
    } //End function

    function changeLanguage()
    {
        if (!empty($_SESSION['language'])) {
            if ($_SESSION['language'] == 'en') {
                $_SESSION['language'] = 'ar';
            } elseif ($_SESSION['language'] == 'ar') {
                $_SESSION['language'] = 'en';
            } else {
                $_SESSION['language'] = 'en';
            }
        } else {
            $_SESSION['language'] = 'en';
        }
        
        $response = array('status' => true, 'message' => 'Successfully Updated', 'url' => 'user_dashboard');
        echo json_encode($response);
    }
    //End function

}//End Class