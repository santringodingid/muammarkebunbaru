<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ParticipantModel extends CI_Model
{
    public function setting()
    {
        return $this->db->get('contest_setting')->num_rows();
    }

    public function contest()
    {
        return $this->db->get('contests')->result_object();
    }

    public function checkContest($mmu, $contest, $category)
    {
        $check = $this->db->get_where('participants', [
            'school_id' => $mmu,
            'contest_id' => $contest,
            'category' => $category
        ])->num_rows();

        if ($contest == 1 && $check == 3 || $contest == 6 && $check == 3 || $contest == 9 && $check == 3) {
            return 1;
        }

        if ($contest != 1 && $contest != 6 && $contest != 9 && $check == 1) {
            return 1;
        }

        return 0;
    }

    public function save()
    {
        $mmu = $this->session->userdata('user_id');
        $category = $this->input->post('category', true);
        $address = $this->input->post('address', true);
        $name = $this->input->post('name', true);

        if ($this->setting() > 0) {
            return [
                'status' => 400,
                'message' => 'Tambah peserta sudah ditutup'
            ];
        }

        if ($category == '' || $address == '') {
            return [
                'status' => 400,
                'message' => 'Pastikan Kategori dan Alamat sudah dipilih/diisi'
            ];
        }

        $rows = 0;

        foreach ($name as $key => $value) {
            if ($key == 10 || $key == 11) {
                $k = 6;
            } elseif ($key == 12 || $key == 13) {
                $k = 1;
            } elseif ($key == 14 || $key == 15) {
                $k = 9;
            } else {
                $k = $key;
            }
            if ($this->checkContest($mmu, $k, $category) <= 0 && $value != '') {
                $this->db->insert('participants', [
                    'school_id' => $mmu,
                    'contest_id' => $k,
                    'name' => strtoupper($value),
                    'address' => ucwords($address),
                    'category' => $category
                ]);

                if ($this->db->affected_rows() > 0) {
                    $rows++;
                }
            }
        }

        if ($rows <= 0) {
            return [
                'status' => 200,
                'message' => $rows
            ];
        }

        return [
            'status' => 200,
            'message' => $rows
        ];
    }

    public function edit()
    {
        $mmu = $this->session->userdata('user_id');
        $id = $this->input->post('id_edit', true);
        $name = $this->input->post('name_edit', true);
        $address = $this->input->post('address_edit', true);

        if ($this->setting() > 0) {
            return [
                'status' => 400,
                'message' => 'Fitur tambah dan edit sudah diblokir'
            ];
        }

        $check = $this->db->get_where('participants', [
            'id' => $id, 'school_id' => $mmu
        ])->num_rows();
        if ($check <= 0) {
            return [
                'status' => 400,
                'message' => 'Data tidak ditemukan'
            ];
        }

        if ($name == '' || $address == '') {
            return [
                'status' => 400,
                'message' => 'Pastikan Nama dan Alamat sudah diisi'
            ];
        }

        $this->db->where('id', $id)->update('participants', [
            'name' => strtoupper($name),
            'address' => ucwords($address)
        ]);

        if ($this->db->affected_rows() <= 0) {
            return [
                'status' => 500,
                'message' => 'Server tidak merespon. Coba muat ulang'
            ];
        }

        return [
            'status' => 200,
            'message' => 'Sukses'
        ];
    }

    public function loadData()
    {
        $mmu = $this->session->userdata('user_id');
        $category = $this->input->post('category', true);

        $this->db->select('a.*, b.id AS contest_id, b.name AS contest_name')->from('participants AS a');
        $this->db->join('contests AS b', 'b.id = a.contest_id');
        $this->db->where('a.school_id', $mmu);
        if ($category != '') {
            $this->db->where('a.category', $category);
        }
        $this->db->order_by('b.id', 'ASC');
        $data = $this->db->get()->result_object();

        return $data;
    }

    public function delete($id)
    {
        $mmu = $this->session->userdata('user_id');
        $check = $this->db->get_where('participants', [
            'id' => $id, 'school_id' => $mmu
        ])->num_rows();
        if ($check <= 0) {
            return [
                'status' => 400,
                'message' => 'Data tidak ditemukan'
            ];
        }

        $this->db->where('id', $id)->delete('participants');
        if ($this->db->affected_rows() <= 0) {
            return [
                'status' => 500,
                'message' => 'Server tidak merespon. Coba muat ulang'
            ];
        }

        return [
            'status' => 200,
            'message' => 'Sukses'
        ];
    }

    public function getData()
    {
        $mmu = $this->session->userdata('user_id');
        $id = $this->input->post('id', true);

        $check = $this->db->get_where('participants', [
            'id' => $id, 'school_id' => $mmu
        ])->num_rows();
        if ($check <= 0) {
            return [
                'status' => 400,
                'message' => 'Data tidak ditemukan'
            ];
        }

        $this->db->select('a.*, b.id AS contest_id, b.name AS contest_name')->from('participants AS a');
        $this->db->join('contests AS b', 'b.id = a.contest_id');
        $data = $this->db->where('a.id', $id)->get()->row_object();

        if (!$data) {
            return [
                'status' => 400,
                'message' => 'Data tidak ditemukan'
            ];
        }

        return [
            'status' => 200,
            'message' => 'Sukses',
            'data' => $data
        ];
    }
}
