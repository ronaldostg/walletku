<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CustomerModel;
use CodeIgniter\I18n\Time;
use Firebase\JWT\JWT;


class CustomerController extends ResourceController
{
    use ResponseTrait;


    public function listCustomer()
    {

        $customerModel = new CustomerModel();

        $dataCustomer = $customerModel->findAll();

        $response = [
            'status' => 200,
            'error' => false,
            'customer_data' => $dataCustomer,
            'message' => 'Data berhasil ditampilkan',

        ];

        return $this->respond($response, 200);
    }


    public function getDataCustomerById($idCustomer)
    {

        $customerModel = new CustomerModel();

        $customerData = $customerModel->where("customer_id", $idCustomer)->first();

        return array(
            'customer_id' => $customerData['customer_id'],
            'username' => $customerData['username'],
            'fullname' => $customerData['fullname']
        );
    }







    public function login()
    {
        $rules = [
            'username' => "required",
            'password' => "required"

        ];

        $message = [
            "username" => [
                "required" => "username required",
            ],
            "password" => [
                "required" => "password is required"
            ]
        ];

        if (!$this->validate($rules, $message)) {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];

            return $this->respondCreated($response);
        } else {


            $customerModel = new CustomerModel();

            $customerData = $customerModel->where("username", $this->request->getVar("username"))->first();
 
            if (!empty($customerData)) {

                if (password_verify($this->request->getPost("password"), $customerData['password'])) {

                    $key = $this->getKey();

                    $iat = time();
                    $nbf = $iat + 10;
                    $exp = $iat + 3600;

                    $payload = array(
                        "iss" => "The_claim",
                        "aud" => "The_Aud",
                        "iat" => $iat, // issued at
                        "nbf" => $nbf, //not before in seconds
                        "exp" => $exp, // expire time in seconds
                        "data" => $customerData,
                    );

                    $token = JWT::encode($payload, $key);

                    $response = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Berhasil login',
                        'data' => [
                            'token' => $token
                        ]
                    ];

                    return $this->respondCreated($response);
                } else {
                    $response = [
                        'status' => 500,
                        'error' => true,
                        'message' => 'ada yang salah',
                        'data' => [],
                    ];

                    return $this->respondCreated($response);
                }
            } else {
                $response = [
                    'status' => 500,
                    'error' => true,
                    'message' => 'Maaf, akun anda tidak ditemukan',
                    'data' => [],
                ];

                return $this->respondCreated($response);
            }
        }
    }


    private function getKey()
    {
        return "my_application_secret";
    }




    public function register()
    {

        $rules = [
            "fullname" => "required",
            "username" => "required",
            "password" => "required",
            "phone_number" => "required",
            "birthday" => "required",
            "gender" => "required",

        ];



        $message = [
            'fullname' => [
                "required" => "fullname is required"
            ],
            'username' => [
                "required" => "username is required",
                "valid_email" => "Email address is not in format"
            ],
            'phone_number' => [
                "required" => "phone number is required"
            ],
            'password' => [
                "required" => "password is required"
            ],

            'birthday' => [
                "required" => "birthday is required"
            ],
            'gender' => [
                "required" => "gender is required"
            ]
        ];

        if (!$this->validate($rules, $message)) {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];
 
        } else {


            $customerModel = new CustomerModel();


            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'fullname' => $this->request->getPost('fullname'),

                'phone_number' => $this->request->getPost('phone_number'),
                'birthday' => $this->request->getPost('birthday'),
                'gender' => $this->request->getPost('gender'),
                'balance' => 0,

                'created_at' => Time::now()
            ];





            if ($customerModel->insert($data)) {
                $response = [
                    'status' => 'berhasil',
                    'status' => 200,
                    'error' => false,
                    'messages' => 'Successfully, user has been registered',
                    'data' => $data
                ];
            } else {
                $response = [
                    'status' => 500,
                    'error' => true,
                    'messages' => 'Failed to create user',
                    'data' => []
                ];
            }
        }

        return $this->respondCreated($response);
 


    }
}
