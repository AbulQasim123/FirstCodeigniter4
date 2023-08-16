<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Employee as EmployeeModel;
use App\Models\PostModel;
use App\Models\ImgUploadModel;
use App\Models\DatatableModel;
use Dompdf\Dompdf;

// import Excel package
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Employee extends BaseController
{
    // Initialize the model
    protected $employee;
    protected $post;
    protected $imgUpload;
    protected $datatable;
    protected $db;
    public function __construct()
    {
        $this->employee = new EmployeeModel();
        $this->post = new PostModel();
        $this->imgUpload = new ImgUploadModel();
        $this->datatable = new DatatableModel();
        $this->db = \Config\Database::connect();
    }

    public function addEmployee()
    {
        $email = \Config\Services::email();
        if ($this->request->getMethod() == 'post') {
            $addEmployee = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'gender' => $this->request->getVar('gender'),
                'date_of_birth' => $this->request->getVar('date_of_birth'),
                'mobile_no' => $this->request->getVar('mobile_no'),
                'designation' => $this->request->getVar('designation'),
                'address' => $this->request->getVar('address'),
            ];

            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[employees.email]',
                'gender' => 'required',
                'date_of_birth' => 'required',
                'mobile_no' => 'required',
                'designation' => 'required',
                'address' => 'required|max_length[100]',
            ];
            $messages = [
                'name' => [
                    'required' => 'Name is requird?',
                    'min_length' => 'Name at least 3 chars long?',
                    'max_length' => 'Name is exceeded only 20 chars long'
                ],
                'email' => [
                    'required' => 'Email is required?',
                    'min_length' => 'Email at least 6 chars long?',
                    'max_length' => 'Email is exceeded only 50 chars long?',
                    'valid_email' => 'Please enter valid email address!',
                    'is_unique' => 'Email already exist!'
                ],
                'gender' => [
                    'required' => 'please choose Gender!',
                ],
                'date_of_birth' => [
                    'required' => 'Please select Date of Birth!',
                ],
                'mobile_no' => [
                    'required' => 'Mobile number is required?',
                    'max_length' => 'Mobile number extact 10 chars long'
                ],
                'designation' => [
                    'required' => 'please choose Designation!',
                ],
                'address' => [
                    'required' => 'Address is required?',
                    'max_length' => 'You have cross the limit!'
                ],
            ];

            if (!$this->validate($rules, $messages)) {
                return view('serverside/add-employee', [
                    'validation' => $this->validator,
                ]);
            } else {
                if ($this->employee->save($addEmployee) === true) {
                    session()->setFlashdata('success', 'Employee Added Successfully.');
                    $email->setTo('qasim.cloudzurf@gmail.com');
                    $email->setFrom('AbulQasim Ansari');

                    // If you need to send mail to CC and BCC
                    // $email->setCC('another@another-user.com');
                    // $email->setBCC('other@other-user.com');

                    $email->setSubject('This is Simple Mail');
                    $email->setMessage('This is Simple Mail send by CodeIgniter 4');
                    if ($email->send()) {
                        session()->setFlashdata('error', 'Mail has been Sent Successfully!');
                    } else {
                        $data = $email->printDebugger(['header']);
                        print_r($data);
                    }
                    return redirect()->to(base_url('dashboard'));
                } else {
                    session()->setFlashdata('error', 'Somethings went wrong!');
                }
            }
        }
        return view('serverside/add-employee');
    }

    public function editEmployee($id = null)
    {
        $edit_Employee = $this->employee->where('id', $id)->first();
        // print_r($edit_Employee); die;
        if ($this->request->getMethod() == 'post') {
            $addEmployee = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'gender' => $this->request->getVar('gender'),
                'date_of_birth' => $this->request->getVar('date_of_birth'),
                'mobile_no' => $this->request->getVar('mobile_no'),
                'designation' => $this->request->getVar('designation'),
                'address' => $this->request->getVar('address'),
            ];

            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'gender' => 'required',
                'date_of_birth' => 'required',
                'mobile_no' => 'required',
                'designation' => 'required',
                'address' => 'required|max_length[100]',
            ];
            $messages = [
                'name' => [
                    'required' => 'Name is requird?',
                    'min_length' => 'Name at least 3 chars long?',
                    'max_length' => 'Name is exceeded only 20 chars long'
                ],
                'email' => [
                    'required' => 'Email is required?',
                    'min_length' => 'Email at least 6 chars long?',
                    'max_length' => 'Email is exceeded only 50 chars long?',
                    'valid_email' => 'Please enter valid email address!',
                    'is_unique' => 'Email already exist!'
                ],
                'gender' => [
                    'required' => 'please choose Gender!',
                ],
                'date_of_birth' => [
                    'required' => 'Please select Date of Birth!',
                ],
                'mobile_no' => [
                    'required' => 'Mobile number is required?',
                    'max_length' => 'Mobile number extact 10 chars long'
                ],
                'designation' => [
                    'required' => 'please choose Designation!',
                ],
                'address' => [
                    'required' => 'Address is required?',
                    'max_length' => 'You have cross the limit!'
                ],
            ];

            if (!$this->validate($rules, $messages)) {
                return view('serverside/add-employee', [
                    'validation' => $this->validator,
                ]);
            } else {
                if ($this->employee->update($id, $addEmployee) === true) {
                    session()->setFlashdata('success', 'Employee Updated Successfully.');
                    return redirect()->to(base_url('dashboard'));
                } else {
                    session()->setFlashdata('error', 'Somethings went wrong!');
                }
            }
        }
        return view('serverside/edit-employee', [
            'employee' => $edit_Employee
        ]);
    }

    public function deleteEmployee($id = null)
    {
        $this->employee->delete($id);
        session()->setFlashdata('success', 'Employee Deleted Successfully.');
        return redirect()->to(base_url('dashboard'));
    }


    // Add new post request using Ajax
    public function addPost()
    {
        if ($this->request->isAJAX()) {
            $file = $this->request->getFile('post_image');
            // $fileName = $file->getRandomName();
            $ext = $file->getExtension(); // Get the original file extension
            $fileName = uniqid() . '.' . $ext; // Generate a unique filename
            $rules = [
                'post_title' => 'required|min_length[3]|max_length[55]',
                'post_category' => 'required|min_length[3]|max_length[25]',
                'post_body' => 'required|max_length[150]',
                'file' => 'uploaded[post_image]|max_size[post_image,1024]|is_image[post_image]|mime_in[post_image,image/jpg,image/jpeg,image/png]',
            ];
            $messages = [
                'post_title' => [
                    'required' => 'Post title is requird?',
                    'min_length' => 'Post title at least 3 chars long?',
                    'max_length' => 'Post title exceeded only 55 chars long'
                ],
                'post_category' => [
                    'required' => 'Post category is required?',
                    'min_length' => 'Post category at least 3 chars long?',
                    'max_length' => 'Post category exceeded only 25 chars long?',
                ],
                'post_body' => [
                    'required' => 'Post body is required',
                    'max_length' => 'Post body exceeded only 150 chars long?',
                ],
            ];

            $addPost = [
                'post_title' => $this->request->getVar('post_title'),
                'post_category' => $this->request->getVar('post_category'),
                'post_body' => $this->request->getVar('post_body'),
                'post_image' => $fileName,
                'created_at' => date('Y-m-d H:i:s')
            ];


            if (!$this->validate($rules, $messages)) {
                return $this->response->setJSON([
                    'error' => true,
                    'messages' => $this->validator->getErrors()
                ]);
            } else {
                $file->move('assets/images', $fileName);
                $this->post->save($addPost);
                return $this->response->setJSON([
                    'error' => false,
                    'messages' => 'Post Added Successfully.'
                ]);
            }
        } else {
            return view('clientside/add-post');
        }
    }

    public function fetchAllPost()
    {
        $posts = $this->post->findAll();
        $html = '';
        if ($posts) {
            foreach ($posts as $post) {
                $html .= '<div class="col s12 m6 l4 xl4">
                <div class="card z-depth-2">
                    <div class="card-image">
                        <a href="#detail_post_modal" id="' . $post['id'] . '" class="detail_post modal-trigger">
                            <img id="post_image" src="http://localhost:2025/assets/images/' . $post['post_image'] . '">
                        </a>
                    </div>
                    <div class="card-content">
                        <div class="row" style="margin-top: -35px;">
                            <div class="col s8">
                                <span style="font-weight: bold;">' . $post['post_title'] . '</span>
                            </div>
                            <div class="col s4 right-align">
                                <span class="new badge">' . $post['post_category'] . '</span>
                            </div>
                        </div>
                        <p>' . $post['post_body'] . '</p>
                    </div>
                    <div class="card-action" id="card-footer">
                        <div class="row">
                            <div class="col s6">
                                <span style="font-style: italic;">' . date('d F Y', strtotime($post['created_at'])) . '</span>
                            </div>
                            <div class="col s6 right-align">
                                <a href="#edit_post_modal" id="' . $post['id'] . '" class="btn-floating btn-small waves-effect waves-light pink modal-trigger edit_post_btn">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="#delete_post_modal" id="' . $post['id'] . '" class="btn-floating btn-small waves-effect waves-light red modal-trigger delete_post_btn">
                                    <i class="tiny material-icons">delete</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
            return $this->response->setJSON([
                'error' => false,
                'message' => $html
            ]);
        } else {
            return $this->response->setJSON([
                'error' => false,
                'message' => '<div class="center-align red-text" style="font-weight: bold; font-size: 22px">No posts found.</div>'
            ]);
        }
    }


    // handle edit post ajax request
    public function editPost($id = null)
    {
        $edit_post = $this->post->find($id);
        return $this->response->setJSON([
            'error' => false,
            'message' => $edit_post
        ]);
    }


    // handle detail post ajax request
    public function detailPost($id = null)
    {
        $detail_post = $this->post->find($id);
        return $this->response->setJSON([
            'error' => false,
            'message' => $detail_post
        ]);
    }


    // handle update post ajax request
    public function updatePost()
    {
        $id = $this->request->getPost('edit_post_id');
        $file = $this->request->getFile('edit_post_image');
        $fileName = $file->getFilename();
        if ($fileName != '') {
            // $fileName = $file->getRandomName();
            $ext = $file->getExtension(); // Get the original file extension
            $fileName = uniqid() . '.' . $ext; // Generate a unique filename

            $file->move('assets/images', $fileName);
            if ($this->request->getPost('edit_old_image') != '') {
                unlink('assets/images/' . $this->request->getPost('edit_old_image'));
            }
        } else {
            $fileName = $this->request->getPost('edit_old_image');
        }

        $rules = [
            'edit_post_title' => 'required|min_length[3]|max_length[55]',
            'edit_post_category' => 'required|min_length[3]|max_length[25]',
            'edit_post_body' => 'required|max_length[150]',
        ];
        $messages = [
            'edit_post_title' => [
                'required' => 'Post title is requird?',
                'min_length' => 'Post title at least 3 chars long?',
                'max_length' => 'Post title exceeded only 55 chars long'
            ],
            'edit_post_category' => [
                'required' => 'Post category is required?',
                'min_length' => 'Post category at least 3 chars long?',
                'max_length' => 'Post category exceeded only 25 chars long?',
            ],
            'edit_post_body' => [
                'required' => 'Post body is required',
                'max_length' => 'Post body exceeded only 150 chars long?',
            ],
        ];
        $updatePost = [
            'post_title' => $this->request->getVar('edit_post_title'),
            'post_category' => $this->request->getVar('edit_post_category'),
            'post_body' => $this->request->getVar('edit_post_body'),
            'post_image' => $fileName,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if (!$this->validate($rules, $messages)) {
            return $this->response->setJSON([
                'error' => true,
                'messages' => $this->validator->getErrors()
            ]);
        } else {
            // $file->move('assets/images', $fileName);
            $this->post->update($id, $updatePost);
            // Delete the old image if a new image is uploaded and the old image exists
            // if ($file->isValid() && !$file->hasMoved() && $oldImage != '') {
            //     unlink('uploads/avatar/' . $oldImage);
            // }
            return $this->response->setJSON([
                'error' => false,
                'message' => 'Post Updated Successfully.'
            ]);
        }
    }

    // handle delete post ajax request
    public function deletePost($id = null)
    {
        $delete_post = $this->post->find($id);
        if ($delete_post) {
            $this->post->delete($delete_post);
            unlink('assets/images/' . $delete_post['post_image']);
            return $this->response->setJSON([
                'error' => false,
                'message' => 'Post Deleted Successfully!'
            ]);
        }
    }

    // Here are About Image uploading
    public function uploadImage()
    {
        if ($this->request->getMethod() == "post") {
            $rules = [
                'name' => 'required',
                'email' => 'required|valid_email|is_unique[users.email]|max_length[50]|min_length[6]',
                'mobile' => 'required|numeric|checkLength[mobile]|mobileValidation[mobile]|is_unique[imguploads.mobile]',
                'image' => [
                    "rules" => "uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]",
                    "label" => "Profile Image",
                ],
            ];

            $messages = [
                "name" => [
                    "required" => "Mobile number required"
                ],
                "email" => [
                    "required" => "Email required"
                ],
                "mobile" => [
                    "required" => "Mobile Number is required",
                    "numeric" => "Accept Only Number",
                    "checkLength" => "Mobile number must be of 10 digits",
                    "mobileValidation" => "Number must be start from 5-9",
                    "is_unique" => "Mobile number already exists"
                ],
            ];

            if (!$this->validate($rules, $messages)) {
                $response = [
                    'success' => false,
                    'messages' => $this->validator->getErrors()
                ];
                return $this->response->setJSON($response);
            } else {
                $image = $this->request->getFile('image');
                $pro_image = $image->getName();

                // Renaming file before upload
                $temp = explode(".", $pro_image);
                $newImage = round(microtime(true)) . "." . end($temp);

                if ($image->move('uploads/Images', $newImage)) {
                    $data = [
                        'name' => $this->request->getVar('name'),
                        'email' => $this->request->getVar('email'),
                        'mobile' => $this->request->getVar('mobile'),
                        'image' => 'uploads/Images/' . $newImage
                    ];

                    if ($this->imgUpload->insert($data)) {
                        $response = [
                            'success' => true,
                            'messages' => 'Data Uploaded Successfully'
                        ];
                    } else {
                        $response = [
                            'success' => false,
                            'messages' => 'Data Uploaded Successfully'
                        ];
                    }
                    return $this->response->setJSON($response);
                } else {
                    $response = [
                        'success' => false,
                        'messages' => 'Failed to upload Data'
                    ];
                    return $this->response->setJSON($response);
                }
            }
        }
        return view('clientside/img-upload');
    }

    //  Server Side DataTable
    public function ajaxLoadData()
    {
        $draw = $this->request->getVar('draw');
        $start = $this->request->getVar('start');
        $length = $this->request->getVar('length');
        $search_value = $this->request->getVar('search')['value'];

        $query = $this->db->table('datatables');

        if (!empty($search_value)) {
            $query->like('id', $search_value)
                ->orLike('name', $search_value)
                ->orLike('email', $search_value)
                ->orLike('mobile', $search_value)
                ->orlike('designation', $search_value)
                ->orlike('gender', $search_value)
                ->orlike('status', $search_value);

            $total_count = $query->countAllResults(false); // false for unformatted count
            $data = $query->get($length, $start)->getResult();
        } else {
            $total_count = $query->countAllResults(false); // false for unformatted count
            $data = $query->get($length, $start)->getResult();
        }

        $json_array = array(
            'draw' => intval($draw),
            'recordsTotal' => $total_count,
            'recordsFiltered' => $total_count,
            'data' => $data
        );

        return $this->response->setJSON($json_array);
    }

    // Generate PDF
    public function generatePDF()
    {
        $dompdf = new \Dompdf\Dompdf();
        $data = $this->db->table('datatables')->limit(1000)->get()->getResult();
        // Sending data to view file
        $dompdf->loadHtml(view('pdf/pdf-file', ['datas' => $data]));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('document');
        return redirect()->to(base_url('img-uploads'));
    }

    // Download Excel
    public function downloadExcel()
    {
        $data = $this->db->table('datatables')->get()->getResult();
        $fileName = 'report.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Mobile');
        $sheet->setCellValue('E1', 'Designation');
        $sheet->setCellValue('F1', 'Gender');
        // $sheet->setCellValue('F1', 'Mobile');
        // $sheet->setCellValue('H1', 'Address');
        $row = 2;
        foreach ($data as $key => $value) {
            $sheet->setCellValue('A' . $row, $value->id);
            $sheet->setCellValue('B' . $row, $value->name);
            $sheet->setCellValue('C' . $row, $value->email);
            $sheet->setCellValue('D' . $row, $value->mobile);
            $sheet->setCellValue('E' . $row, $value->designation);
            $sheet->setCellValue('F' . $row, $value->gender);
            // $sheet->setCellValue('E' . $row, $value->date_of_birth);
            // $sheet->setCellValue('H' . $row, $value->address);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        // file inside public folder
        $writer->save($fileName);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . basename($fileName) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fileName));
        flush();
        readfile($fileName);
        exit;
    }



    // Read and Write Files
    public function readFile()
    {
        // Type #1 - This file will be created inside /public folder
        $file_contents = "This is a wirte test file";
        write_file('test1.txt', $file_contents);
        // Type #2 - This file will be created inside /writable folder
        write_file(WRITEPATH . 'test2.txt', $file_contents);
        // Type #3 - This file will be created inside /public folder and return value
        if (!write_file('test3.txt', $file_contents)) {
            echo "Failed to write file";
        } else {
            echo "File written Successfully.";
        }
    }

    public function writeFile()
    {
        // Type #1 - Read file from public folder
        $data1 = readFile('./test1.txt');
        print_r($data1);
        echo "<br>";
        // Type #2 - Read file from witeable folder
        $data2 = readFile(WRITEPATH . 'test2.txt');
        print_r($data2);
    }

    // How to get Local IP Address of System
    public function getIpAddress()
    {
        echo getClientIpAddress();
    }


    // Google Chart Integration
    public function chartsIntegration()
    {
        // line chart
        $year_wise = $this->db->query("SELECT COUNT(id) as total, YEAR(created_at) as year FROM datatables GROUP BY YEAR(created_at)")->getResult();
        $data['year_wise_line'] = $year_wise;

        // Bar chart
        $year_wise = $this->db->query("SELECT COUNT(id) as total, YEAR(created_at) as year FROM datatables GROUP BY YEAR(created_at)")->getResult();
        $data['year_wise_bar'] = $year_wise;

        // Pie chart
        $year_wise = $this->db->query("SELECT COUNT(id) as total, YEAR(created_at) as year FROM datatables GROUP BY YEAR(created_at)")->getResult();
        $data['year_wise_pie'] = $year_wise;


        return view('clientside/charts-integration', $data);
    }

    // Multi Image & File
    public function multiImage()
    {
        if ($this->request->getMethod() == "post") {
            $builder = $this->db->table('multipleimages');
            $session = session();
            $allowed_ext = ["image/jpg", "image/png", "image/jpeg"];
            $image_count = 0;
            if ($this->request->getFileMultiple('image')) {
                foreach ($this->request->getFileMultiple('image') as $image) {
                    $mime = $image->getClientMimeType();
                    if (in_array($mime, $allowed_ext)) {
                        $image->move(WRITEPATH . 'multiple_image');
                        $data = [
                            'name' => $image->getClientName(),
                            'path' => 'multiple_image/' . $image->getClientName()
                        ];
                        $builder->insert($data);
                        $image_count++;
                    }
                }
                if ($image_count > 0) {

                    $session->setFlashdata("success", "Files uploaded Successfully");
                } else {
                    $session->setFlashdata("error", "Please select only image file");
                }
            } else {
                $session->setFlashdata("error", "Please choose image file");
            }
        }
        return view('clientside/multi-image-file');
    }

    public function multiFile()
    {
        if ($this->request->getMethod() == "post") {
            $builder = $this->db->table('multiplefiles');
            $session = session();
            if ($this->request->getFileMultiple('file')) {
                foreach ($this->request->getFileMultiple('file') as $file) {
                    $file->move(WRITEPATH . 'multiple_file');
                    $data = [
                        'name' =>  $file->getClientName(),
                        'type'  => $file->getClientMimeType(),
                        'path' => 'multiple_file/' . $file->getClientName()
                    ];

                    $builder->insert($data);
                }
                $session->setFlashdata("success", "Files uploaded Successfully");
            } else {
                $session->setFlashdata("error", "Please choose file");
            }
        }

        return view('clientside/multi-image-file');
    }
}
