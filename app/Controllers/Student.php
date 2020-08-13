<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\StudentModel;

class Student extends BaseController
{
	public function index()
	{
		$model = new StudentModel();

		$data = $model->findAll();
		$data = [
            'students_detail' => $model->paginate(5),
            'pager' => $model->pager
        ];
		return view('list',$data);
		
	}

	public function edit($id)
	{
	   $model = new StudentModel();
       $edit['user'] = $model->where('id', $id)->first();
       return view('edit', $edit);
	}

	public function delete($id)
	{
		$model = new StudentModel();
		$model->where("id",$id)->delete();
		session()->setFlashdata('itme','Student Deleted Succssusfully');
		return redirect()->to( base_url('student/index'));
	}

	public function insert()
	{
		$model = new StudentModel();
		helper(['form', 'url','session']);
		$img = $this->request->getFile('img');
		$newName = $img->getRandomName();
		$img->move('upload/img',$newName);

		$data = [
 
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'address' => $this->request->getVar('address'),
            'email' => $this->request->getVar('email'),
            'mobile'  => $this->request->getVar('mobile'),
            'img'=> $newName
            ];

            $save= $model->insert($data);
            //$this->$session->setFlashdata('msg', 'Daata saved Succssusfully');
            //$this->session->setFlashdata('item', 'Data saved Succssusfully');
            if($save)
            {
              session()->setFlashdata('itme','Student Added Succssusfully');
            }
            return redirect()->to( base_url('student/index'));
            
	}

		function update()
		{
		$model = new StudentModel();
		helper(['form', 'url']);

		$img = $this->request->getFile('img');
		$newName = $img->getRandomName();
		$img->move('upload/img',$newName);

		$id= $this->request->getVar('id');

		$data = [
 
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'address' => $this->request->getVar('address'),
            'email' => $this->request->getVar('email'),
            'mobile'  => $this->request->getVar('mobile'),
            'img'=> $newName
            ];

            $save= $model->update($id,$data);
            if($save)
            {
              session()->setFlashdata('itme','Student Updated Succssusfully');
            }
            return redirect()->to( base_url('student/index'));
            

		}
}


