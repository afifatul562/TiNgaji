<?php

namespace App\Controllers;

use App\Models\ModelLokasi;

class Lokasi extends BaseController
{
    protected $ModelLokasi;
    
    public function __construct()
    {
        $this->ModelLokasi = new ModelLokasi();
    }
    
    public function index(): string
    {
        $data = [
            'judul' => 'Data Lokasi', 
            'page' => 'Lokasi/v_data_lokasi',
            'lokasi' => $this->ModelLokasi->getAllData(),
        ];
        return view('v_template', $data);
    }

    public function inputLokasi(): string
    {
        $data = [
            'judul' => 'Input Lokasi', 
            'page' => 'Lokasi/v_input_lokasi',
        ];
        return view('v_template', $data);
    }

    public function insertData()
{
    if ($this->validate([
        'nama_lokasi' => [
            'label' => 'Nama Lokasi',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} tidak boleh kosong!!'
            ]
        ],
        'alamat_lokasi' => [
            'label' => 'Alamat Lokasi',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} tidak boleh kosong!!'
            ]
        ],
        'latitude' => [
            'label' => 'Latitude',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} tidak boleh kosong!!'
            ]
        ],
        'longitude' => [
            'label' => 'Longitude',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} tidak boleh kosong!!'
            ]
        ],
        'foto_lokasi' => [
            'label' => 'Foto Lokasi',
            'rules' => 'uploaded[foto_lokasi]|max_size[foto_lokasi,1024]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/png]',
            'errors' => [
                'uploaded' => '{field} tidak boleh kosong!!',
                'max_size' => 'Ukuran {field} maksimal 1024 kb!!',
                'mime_in' => 'Format {field} harus jpg, jpeg, png!!',
            ]
        ]
    ])) {
        $foto_lokasi = $this->request->getFile('foto_lokasi');
        $nama_file_foto = $foto_lokasi->getRandomName();

        // Jika lolos validasi
        $data = [
            'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'foto_lokasi' => $nama_file_foto,
        ];
        $foto_lokasi->move('foto', $nama_file_foto);

        // Kirim data ke function insert data di model lokasi
        $this->ModelLokasi->insertData($data);

        // Notifikasi data berhasil disimpan
        session()->setFlashdata('pesan', 'Data Lokasi Berhasil Ditambahkan !!!');
        return redirect()->to('Lokasi/inputLokasi');
    } else {
        // Jika validasi gagal
        return redirect()->to('Lokasi/inputLokasi')->withInput()->with('errors', $this->validator->getErrors());
    }
}


    public function pemetaanLokasi() {
        $data = [
            'judul' => 'Pemetaan Lokasi', 
            'page' => 'Lokasi/v_pemetaan_lokasi',
            'lokasi' => $this->ModelLokasi->getAllData(),
        ];
        return view('v_template', $data);
    }

    public function editLokasi($id_lokasi): string
    {
        $data = [
            'judul' => 'Edit Lokasi', 
            'page' => 'Lokasi/v_edit_lokasi',
            'lokasi' => $this->ModelLokasi->getDataById($id_lokasi),
        ];
        return view('v_template', $data);
    }

    public function updateData($id_lokasi)
    {
        if ($this->validate([
            'nama_lokasi' => [
                'label' => 'Nama Lokasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong!!'
                ]
                ], 'alamat_lokasi' => [
                    'label' => 'Alamat Lokasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!!'
                ]
                ], 'latitude' => [
                    'label' => 'Latitude',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!!'
                ]
                ], 'longitude' => [
                    'label' => 'Longitude',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!!'
                ]
                ], 'foto_lokasi' => [
                    'label' => 'Foto Lokasi',
                    'rules' => 'max_size[foto_lokasi,1024]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran {field} maksimal 1024 kb!!',
                        'mime_in' => 'Format {field} harus jpg, jpeg, png!!!!',
                ]
            ]
        ])) {
            $foto_lokasi =$this->request->getFile('foto_lokasi');

            $lokasi = $this->ModelLokasi->getDataById($id_lokasi);
            if ($foto_lokasi->getError() == 4) {
                $nama_file_foto = $lokasi['foto_lokasi'];
            }else {
                $nama_file_foto = $foto_lokasi->getRandomName();
                $foto_lokasi->move('foto', $nama_file_foto);
            }
            //jika lolos validasi
            $data = [
                'id_lokasi' => $id_lokasi,
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'foto_lokasi' => $nama_file_foto,
            ];
            
            //kirim data ke function insert data di model lokasi
            $this->ModelLokasi->updateData($data);
            //notifikasi data berhasil disimpan
            session()->setFlashdata('pesan','Data Lokasi Berhasil di Update !!!');
            return redirect()->to('Lokasi/index');
        } else {
            //jika tidak lolos validasi
            return redirect()->to('Lokasi/editLokasi/'.$id_lokasi)->withInput();        }
    }

    public function deleteLokasi($id_lokasi) {
        $data = [
            'id_lokasi' => $id_lokasi,
        ];
        
        //kirim data ke function insert data di model lokasi
        $this->ModelLokasi->deleteData($data);
        //notifikasi data berhasil disimpan
        session()->setFlashdata('pesan','Data Lokasi Berhasil di Delete !!!');
        return redirect()->to('Lokasi/index');
    }

    public function totalData()
    {
        $ModelLokasi = new ModelLokasi();
        $data['totalLokasi'] = $ModelLokasi->countAll(); // Menghitung total data di tabel lokasi
        return $this->response->setJSON($data);
    }

    // API endpoint untuk mendapatkan data lokasi untuk peta
    public function getLocationData()
    {
        $lokasi = $this->ModelLokasi->getAllData();
        
        $formattedData = [];
        foreach ($lokasi as $item) {
            $formattedData[] = [
                'id' => $item['id_lokasi'],
                'name' => $item['nama_lokasi'],
                'address' => $item['alamat_lokasi'],
                'lat' => (float) $item['latitude'],
                'lng' => (float) $item['longitude'],
                'type' => $this->determineLocationType($item['nama_lokasi']),
                'image' => $item['foto_lokasi'] ?: 'default.jpg'
            ];
        }
        
        return $this->response->setJSON($formattedData);
    }

    private function determineLocationType($namaLokasi)
    {
        $namaLower = strtolower($namaLokasi);
        if (strpos($namaLower, 'mdta') !== false) {
            return 'mdta';
        } elseif (strpos($namaLower, 'tpq') !== false) {
            return 'tpq';
        } else {
            return 'lainnya';
        }
    }
}