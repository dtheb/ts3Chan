<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Requests extends Eloquent
{
	protected $fillable = array('name', 'email', 'cname', 'note', 'status', 'reason');

	public function newRequest($data)
	{
		$this->create(array(
			'email' 	=> htmlspecialchars($data['email']),
			'name'  	=> htmlspecialchars($data['name']),
			'cname' 	=> htmlspecialchars($data['cname']),
			'note'		=> htmlspecialchars($data['note']),
			'status' 	=> 0,
			'reason' 	=> null
		));
		return true;
	}

    public function scopeLimitCheck($query, $email)
    {
    	return $query->whereEmail($email)->get();
    }

    public function updateRequest($data){
    	$req = $this->find($data['id']);

    	if ($data['action'] == 'y') {
    		$ts3 = new TsAPI;
			// send TS3 create request
			$token = $ts3->createChan($req->cname);
			if ($token) {
				$req->reason = htmlspecialchars($data['msg']);
				$req->status = 1;
				$req->save();

				if ($data['email']) {
					$email = new Email;
					$email->sendYes(array('req' => $req, 'token' => $token));
				}
				return 1;
			}
		}elseif($data['action'] == 'n') {
    		$req->reason = htmlspecialchars($data['msg']);
			$req->status = 2;
			$req->save();
			if ($data['email']) {
				$email = new Email;
				$email->sendNo(array('req' => $req));
			}
			return 2;
		}
	}
	
    public function getCnameAttribute($value)
    {
        return htmlspecialchars_decode($value);
    }

    public function getNoteAttribute($value)
    {
        return htmlspecialchars_decode($value);
    }

    public function getNameAttribute($value)
    {
        return htmlspecialchars_decode($value);
    } 

}
