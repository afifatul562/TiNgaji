<?php

namespace App\Controllers;

use App\Models\ModelLokasi;

class Home extends BaseController
{
    protected $lokasiModel;

    public function __construct()
    {
        $this->lokasiModel = new ModelLokasi();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Register', 
            'config' => config('auth'),
        ];
        return view('auth/login', $data);
    }

    public function register(): string
    {
        return view('auth/register');
    }

    public function dashboard(): string
    {
        // Get location data for statistics
        $totalLokasi = $this->lokasiModel->countAll();
        $mdtaCount = $this->lokasiModel->where('nama_lokasi LIKE', '%mdta%')->countAllResults();
        $tpqCount = $this->lokasiModel->where('nama_lokasi LIKE', '%tpq%')->countAllResults();
        $lainnyaCount = $totalLokasi - $mdtaCount - $tpqCount;

        $data = [
            'judul' => 'Dashboard', 
            'page' => 'v_dashboard',
            'statistics' => [
                'total' => $totalLokasi,
                'mdta' => $mdtaCount,
                'tpq' => $tpqCount,
                'lainnya' => $lainnyaCount
            ]
        ];
        return view('v_template', $data);
    }

    public function getLocationData()
    {
        $lokasi = $this->lokasiModel->findAll();
        
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

    public function viewMap(): string
    {
        $data = [
            'judul' => 'View Map', 
            'page' => 'v_viewmap',
        ];
        return view('v_template', $data);
    }

    public function baseMap(): string
    {
        $data = [
            'judul' => 'Base Map', 
            'page' => 'v_basemap',
        ];
        return view('v_template', $data);
    }

    public function marker(): string
    {
        $data = [
            'judul' => 'Marker', 
            'page' => 'v_marker',
        ];
        return view('v_template', $data);
    }

    public function circle(): string
    {
        $data = [
            'judul' => 'Circle', 
            'page' => 'v_circle',
        ];
        return view('v_template', $data);
    }

    public function getcoordinat(): string
    {
        $data = [
            'judul' => 'Get Coordinate', 
            'page' => 'v_get_coordinat',
        ];
        return view('v_template', $data);
    }

    public function getDashboardStats()
    {
        $lokasiModel = new \App\Models\ModelLokasi();
        $userModel = new \App\Models\UserModel();

        $totalLokasi = $lokasiModel->countAll();
        $mdtaCount = $lokasiModel->like('nama_lokasi', 'mdta', 'both')->countAllResults();
        $tpqCount = $lokasiModel->like('nama_lokasi', 'tpq', 'both')->countAllResults();
        $totalUser = $userModel->countAll();

        return $this->response->setJSON([
            'total' => $totalLokasi,
            'mdta' => $mdtaCount,
            'tpq' => $tpqCount,
            'user' => $totalUser
        ]);
    }

}
