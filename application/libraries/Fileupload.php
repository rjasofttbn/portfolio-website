<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fileupload {

    // To load this model
    // $this->fileupload->do_upload($upload_path = 'assets/images/profile/', $field_name = 'userfile');

    function do_upload($upload_path = null, $field_name = null) {
        if (empty($_FILES[$field_name]['name'])) {
            return null;
        } else {
            $ci = & get_instance();
            $ci->load->helper('url');

            //folder upload
            $file_path = $upload_path . date('Y-m-d') . "/";
            if (!is_dir($file_path))
                mkdir($file_path, 0755, true);
            //ends of folder upload 
            //set config 
            $config = [
                'upload_path' => $file_path,
                'allowed_types' => 'gif|jpg|png|jpeg|ico|pdf|svg|docx',
                'max_filename' => 5,
                'overwrite' => false,
                'maintain_ratio' => true,
                'encrypt_name' => true,
                'remove_spaces' => true,
                'file_ext_tolower' => true
            ];
            $ci->load->library('upload', $config);

            if (!$ci->upload->do_upload($field_name)) {
                $error = $ci->upload->display_errors();
                $ci->session->set_flashdata('file_uploaderror', $error);
                return false;
            } else {
                $file = $ci->upload->data();
                return $file_path . $file['file_name'];
            }
        }
    }

    public function do_resize($file_path = null, $width = null, $height = null) {
        $ci = & get_instance();
        $ci->load->library('image_lib');
        $config = [
            'image_library' => 'gd2',
            'source_image' => $file_path,
            'create_thumb' => false,
            'maintain_ratio' => false,
            'width' => $width,
            'height' => $height,
        ];
        $ci->image_lib->initialize($config);
        $ci->image_lib->resize();
    }

//    =========== its for update do upload with unlink =============
    function update_doupload($id, $upload_path = null, $field_name = null) {
        if (empty($_FILES[$field_name]['name'])) {
            return null;
        } else {
            $ci = & get_instance();
            $ci->load->helper('url');

            //folder upload
            $file_path = $upload_path . date('Y-m-d') . "/";
            if (!is_dir($file_path))
                mkdir($file_path, 0755, true);
            //ends of folder upload 
            //set config 
            $config = [
                'upload_path' => $file_path,
                'allowed_types' => 'gif|jpg|png|jpeg|ico|pdf|svg|docx',
                'max_filename' => 5,
                'overwrite' => false,
                'maintain_ratio' => true,
                'encrypt_name' => true,
                'remove_spaces' => true,
                'file_ext_tolower' => true
            ];
            $ci->load->library('upload', $config);

            if (!$ci->upload->do_upload($field_name)) {
                $error = $ci->upload->display_errors();
                echo $error;
                $ci->session->set_flashdata('file_uploaderror', $error);
                return false;
            } else {
                $picture_unlink = $ci->db->select('*')->from('picture_tbl')->where('from_id', $id)->get()->row();
                if (@$picture_unlink->picture) {
                    $img_path = FCPATH . @$picture_unlink->picture;
                    unlink($img_path);
                }
                $file = $ci->upload->data();
                return $file_path . $file['file_name'];
            }
        }
    }

//    =========== its for delete file ============
    public function delete_uploadedfile($id) {
        $ci = & get_instance();
        $picture_unlink = $ci->db->select('*')->from('picture_tbl')->where('from_id', $id)->get()->row();

        if ($id && (!empty($picture_unlink->picture))) {
            $img_path = FCPATH . $picture_unlink->picture;
            unlink($img_path);
        }
        return true;
    }

}
