<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\MessageModel;

class ChatController extends BaseController
{
    protected $userModel;
    protected $messageModel;
    protected $db;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->messageModel = new MessageModel();
        $this->db = \Config\Database::connect(); // Koneksi database
        helper('form');
    }

    public function chat()
    {
        // Periksa apakah pengguna sudah login
        if (!session()->has('user_id')) {
            return redirect()->to('/login');
        }
        $users = $this->userModel->findAll(); // Ambil semua pengguna
        // dd ($users);
        return view('chat_view', ['users' => $users]);
    }

    // Halaman utama chat
    public function index()
    {
        $users = $this->userModel->findAll(); // Ambil semua pengguna
        // dd ($users);
        return view('chat_view', ['users' => $users]);
    }

    // Ambil pesan antara dua pengguna
    public function getMessages($senderId, $receiverId)
    {
        $messages = $this->messageModel->getMessagesBetween($senderId, $receiverId);
        return $this->response->setJSON($messages);
    }

    // Simpan pesan ke database
   public function saveMessage() {
    // Ambil data JSON dari body request
    $data = $this->request->getJSON();

    // Validasi dan simpan pesan ke database
    $messageModel = new \App\Models\MessageModel();
    $messageModel->save([
        'sender_id' => $data->sender_id,
        'receiver_id' => $data->receiver_id,
        'message' => $data->message,
        'created_at' => date('Y-m-d H:i:s')
    ]);

    // Kirim respons bahwa pesan berhasil disimpan dalam format JSON
    return $this->response->setJSON(['success' => true]);
}


    



}
