<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CrudApiModel;
use CodeIgniter\HTTP\Response;

class CrudApiController extends BaseController
{
    protected $crudApi;
    public function __construct()
    {
        $this->crudApi = new CrudApiModel();
    }

    // Fetching Data
    public function fetch()
    {
        $data = $this->crudApi->findAll();
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => "Data Found",
            "data" => $data,
        ];
        return response()->setJSON($response);
    }

    // Showing Single with id Data
    public function show($id = null)
    {
        $data = $this->crudApi->where('id', $id)->first();
        if ($data) {
            $response = [
                'status' => 200,
                'error' => null,
                'message' => 'Data Found',
                'data' => $data,
            ];
            return response()->setJSON($response);
        } else {
            return response()->setJSON('No Data Found with Id = ' . $id);
        }
    }

    // Creating Data
    public function create()
    {
        // Validating
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[crudapis.email]|min_length[5]',
            'phone' => 'required|is_unique[crudapis.phone]|max_length[10]',
        ];
        $messages = [
            'name' => [
                'required' => 'Name is required',
            ],
            'email' => [
                'required' => 'Email is required',
                'is_unique' => 'Email already exists',
                'valid_email' => 'Invalid Email',
                'min_length' => 'Email must be at least 5 characters long',
            ],
            'phone' => [
                'required' => 'Phone is required',
                'is_unique' => 'Phone already exists',
                'max_length' => 'Phone must be at least 10 characters long',
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];
        } else {
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
            ];

            $this->crudApi->insert($data);

            $response = [
                'status' => 200,
                'error' => null,
                'message' => 'Data Saved',
            ];
        }
        return response()->setJSON($response);
    }

    // Updating Data
    public function update($id = null)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|min_length[5]',
            'phone' => 'required|max_length[10]',
        ];
        $messages = [
            'name' => [
                'required' => 'Name is required',
            ],
            'email' => [
                'required' => 'Email is required',
                'valid_email' => 'Invalid Email',
                'min_length' => 'Email must be at least 5 characters long',
            ],
            'phone' => [
                'required' => 'Phone is required',
                'max_length' => 'Phone must be at least 10 characters long',
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];
        }else{
            $result = $this->crudApi->find($id);
            if ($result) {
                $data = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'phone' => $this->request->getVar('phone'),
                ];
    
                $this->crudApi->update($id, $data);
    
                $response = [
                    'status' => 200,
                    'error' => null,
                    'message' => 'Data Updated',
                ];
            } else {
                $response = [
                    'status' => 500,
                    'error' => 'yes',
                    'message' => 'Data Found Found with Id = ' . $id,
                ];
            }
        } 
        return response()->setJSON($response);
    }

    // Deleting Data
    public function delete($id = null)
    {
        $data = $this->crudApi->find($id);

        if ($data) {
            $this->crudApi->delete($data);
            $response = [
                'status' => 200,
                'error' => null,
                'message' => 'Data Deleted',
            ];
            return response()->setJSON($response);
        } else {
            $response = [
                'status' => 403,
                'error' => null,
                'message' => 'Data Not Found with Id = ' . $id,
            ];
            return response()->setJSON($response);
        }
    }
}
