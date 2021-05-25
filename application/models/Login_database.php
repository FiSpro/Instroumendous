<?php
<<<<<<< HEAD

class Login_database extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	// Insert registration data in database
	public function registration_insert($data)
	{

		// Query to check whether email already exist or not
		$condition = "email =" . "'" . $data['email'] . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {

			// Query to insert data in database
			$this->db->insert('user', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}

	// Read data using username and password
	public function login($data)
	{

		$condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	// Read data from database to show data in admin page
	public function read_user_information($email)
	{

		$condition = "email =" . "'" . $email . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function insertvid($data)
	{

		$condition = "username =" . "'" . $data['u_id'] . "'";
		$this->db->select('id');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		$data['u_id'] = $query->result()[0]->id;

		return $this->db->insert('video_lesson', $data);
	}

	public function getVideos($data)
	{
		$selection = "v.id, v.title, v.date, v.location, v.instrument, v.type, u.username, u.email";
		$condition = "v.type =" . "'" . $data['type'] . "' AND v.instrument =" . "'" . $data['instrument'] . "' AND v.u_id = u.id";
		$fromtables = 'video_lesson v, user u';
		$this->db->select($selection);
		$this->db->from($fromtables);
		$this->db->where($condition);
		$query = $this->db->get();
		$uploads = $query->result_array();

		$posts_arr = array();
		foreach ($uploads as $upload) {
			$id = $upload['id'];
			$title = $upload['title'];
			$date = $upload['date'];
			$type = $upload['type'];
			$location = $upload['location'];
			$username = $upload['username'];
			$email = $upload['email'];
			$instrument = $upload['instrument'];

			$this->db->select('value');
			$this->db->from('rating');
			$this->db->where("u_id", $data['user_id']);
			$this->db->where("v_id", $id);
			$userRatingquery = $this->db->get();

			$userpostResult = $userRatingquery->result_array();

			$userRating = 0;
			if (count($userpostResult) > 0) {
				$userRating = $userpostResult[0]['value'];
			}


			$condition2 = "v_id = " . $id . " AND value = 1";
			$this->db->select('COUNT(*) as totallikes');
			$this->db->from('rating');
			$this->db->where($condition2);
			$ratingquery = $this->db->get();

			$postResult = $ratingquery->result_array();

			$likes = $postResult[0]['totallikes'];

			if ($likes == '') {
				$likes = 0;
			}

			$condition3 = "v_id = " . $id . " AND value = 2";
			$this->db->select('COUNT(*) as dis');
			$this->db->from('rating');
			$this->db->where($condition3);
			$ratingquery = $this->db->get();

			$postResult = $ratingquery->result_array();

			$dislikes = $postResult[0]['dis'];

			if ($dislikes == '') {
				$dislikes = 0;
			}

			$condition = 'u.id = c.u_id AND c.v_id = v.id AND v.id = ' . $id;
			$this->db->select('username, c.content');
			$this->db->from('user u, comment c, video_lesson v');
			$this->db->where($condition);
			$commentsquery = $this->db->get();

			$commentsResult = $commentsquery->result_array();

			$posts_arr[] = array("id" => $id, "title" => $title, "type" => $type, "instrument" => $instrument, "location" => $location, "date" => $date, "username" => $username, "email" => $email, "likes" => $likes, "dislikes" => $dislikes, "comments" => $commentsResult);
		}

		return $posts_arr;
	}

	public function publish_comment($video_id, $user_id, $text)
	{

		$post_data = array(
			'v_id' => $video_id,
			'u_id' => $user_id,
			'content' => $text,
		);

		$this->db->insert('comment', $post_data);
	}

	public function getUserIDfromemail($data)
	{

		$condition = "email =" . "'" . $data . "'";
		$this->db->select('id');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}

	public function userRating($userid, $video_id, $value)
	{
		$this->db->select('*');
		$this->db->from('rating');
		$this->db->where("v_id", $video_id);
		$this->db->where("u_id", $userid);
		$userRatingquery = $this->db->get();

		$userRatingResult = $userRatingquery->result_array();

		if (count($userRatingResult) > 0) {

			$postRating_id = $userRatingResult[0]['id'];
			// Update
			$value = array('value' => $value);
			$this->db->where('id', $postRating_id);
			$this->db->update('rating', $value);
		} else {
			$userRating = array(
				"v_id" => $video_id,
				"u_id" => $userid,
				"value" => $value
			);

			$this->db->insert('rating', $userRating);
		}
		$returnArr = array();
		$condition2 = "v_id = " . $video_id . " AND value = 1";
		$this->db->select('COUNT(*) as totallikes');
		$this->db->from('rating');
		$this->db->where($condition2);
		$ratingquery = $this->db->get();

		$postResult = $ratingquery->result_array();


		$returnArr['likes'] = $postResult[0]['totallikes'];

		if ($returnArr['likes'] == '') {
			$returnArr['likes'] = 0;
		}

		$condition3 = "v_id = " . $video_id . " AND value = -1";
		$this->db->select('COUNT(*) as totaldislikes');
		$this->db->from('rating');
		$this->db->where($condition3);
		$ratingquery = $this->db->get();

		$postResult = $ratingquery->result_array();

		$returnArr['dislikes'] = $postResult[0]['totaldislikes'];

		if ($returnArr['dislikes'] == '') {
			$returnArr['dislikes'] = 0;
		}

		return $returnArr;
	}



}
=======
class Login_database extends CI_Model {

public function __construct(){
    $this->load->database();
}
// Insert registration data in database
public function registration_insert($data) {

    // Query to check whether username already exist or not
    $condition = "username =" . "'" . $data['username'] . "'";
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {

        // Query to insert data in database
        $this->db->insert('user', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
    } else {
        return false;
    }
}

// Read data using username and password
public function login($data) {

    $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
        return true;
    } else {
        return false;
    }
}

// Read data from database to show data in admin page
public function read_user_information($username) {

    $condition = "username =" . "'" . $username . "'";
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
        return $query->result();
    } else {
        return false;
    }
}


}
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
