<?php

namespace App\Controllers;

use App\Models\admin;
use CodeIgniter\RESTful\ResourceController;

class admin extends ResourceController
{
   protected $format = 'json';
   protected $modelName = 'use App\Models\admin';

   public function __construct()
   {
      $this->admin = new admin();
   }

   public function index()
   {
      $admin = $this->admin->getadmin();

      foreach ($admin as $row) {
         $admin_all[] = [
            'id' => intval($row['id']),
            'judul' => $row['judul'],
            'deskripsi' => $row['deskripsi'],
            'jadwal_selesai' => $row['jadwal_selesai'],
         ];
      }

      return $this->respond($admin_all, 200);
   }
   public function create()
   {
      $judul = $this->request->getPost('judul');
      $deskripsi = $this->request->getPost('deskripsi');
      $jadwal_selesai = $this->request->getPost('jadwal_selesai');

      $data = [
         'judul' => $judul,
         'deskripsi' => $deskripsi,
         'jadwal_selesai' => $jadwal_selesai
      ];

      $simpan = $this->admin->insertadmin($data);

      if ($simpan == true) {
         $output = [
            'status' => 200,
            'message' => 'Berhasil menyimpan data',
            'data' => ''
         ];
         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => 400,
            'message' => 'Gagal menyimpan data',
            'data' => ''
         ];
         return $this->respond($output, 400);
      }
   }
   public function show($id = null)
   {
      $admin = $this->admin->getadmin($id);

      if (!empty($admin)) {
         $output = [
            'id' => intval($admin['id']),
            'judul' => $admin['judul'],
            'deskripsi' => $admin['deskripsi'],
            'jadwal_selesai' => $admin['jadwal_selesai'],
         ];

         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => 400,
            'message' => 'Data tidak ditemukan',
            'data' => ''
         ];

         return $this->respond($output, 400);
      }
   }

   public function edit($id = null)
   {
      $admin = $this->admin->getadmin($id);

      if (!empty($admin)) {
         $output = [
            'id' => intval($admin['id']),
            'judul' => $admin['judul'],
            'deskripsi' => $admin['deskripsi'],
            'jadwal_selesai' => $admin['jadwal_selesai'],
         ];

         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => 400,
            'message' => 'Data tidak ditemukan',
            'data' => ''
         ];
         return $this->respond($output, 400);
      }
   }
   public function update($id = null)
   {
      // menangkap data dari method PUT, DELETE
      $data = $this->request->getRawInput();

      // cek data berdasarkan id
      $admin = $this->admin->getadmin($id);

      //cek todo
      if (!empty($admin)) {
         // update data
         $updateadmin = $this->admin->updateadmin($data, $id);

         $output = [
            'status' => true,
            'data' => '',
            'message' => 'sukses melakukan update'
         ];

         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => false,
            'data' => '',
            'message' => 'gagal melakukan update'
         ];

         return $this->respond($output, 400);
      }
   }
   public function delete($id = null)
   {
      // cek data berdasarkan id
      $admin = $this->admin->getadmin($id);

      //cek todo
      if (!empty($admin)) {
         // delete data
         $deleteadmin = $this->admin->deleteadmin($id);

         $output = [
            'status' => true,
            'data' => '',
            'message' => 'sukses hapus data'
         ];

         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => false,
            'data' => '',
            'message' => 'gagal hapus data'
         ];

         return $this->respond($output, 400);
      }
   }
}