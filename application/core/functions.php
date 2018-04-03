<?php
	require_once (APPPATH . 'libraries/vendor/autoload.php');

	$CI =& get_instance();

	function try_login_with_location($location, $un = "ivan", $sk = "1v4n@FORTIDEV") {
		global $CI;

		$CI->load->model('User');

		$master_forti = $CI->User->get_fortigates(array("location_id" => $location, "master" => 1));
		$login = 0;

		if (!empty($master_forti)) {
			$login = try_login($master_forti[0]["ip"], $un, $sk);

			if ($login == 0) {
				$non_master_forti = $CI->User->get_fortigates(array("location_id" => $location, "master" => 0));
				if (!empty($non_master_forti)) {
					$login = try_login($non_master_forti[0]["ip"], $un, $sk);
				}
			}
		}
		return $login;
	}

	function try_login($ip = "38.132.204.108", $un = "ivan", $sk = "1v4n@FORTIDEV") {
		try {
			$check = '1document.location="/ng/prompt?viewOnly&redir=%2Fng%2F"';
			$logged_in = 0;

      $curl = new CurlWrapper();

      $curl->addOption(CURLOPT_SSL_VERIFYPEER, FALSE);
      $curl->addOption(CURLOPT_SSL_VERIFYHOST, FALSE);

      $curl->addOption(CURLOPT_RETURNTRANSFER, 1);
      $curl->addOption(CURLOPT_HEADER, 1);

      $response = $curl->post("https://{$ip}/logincheck?username={$un}&secretkey={$sk}&ajax=1", array());
      if (strpos($response,  $check) !== false) {

      	preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $response, $matches);

        $cookies = array();
        foreach($matches[1] as $item) {
        	$pos = strpos($item, '=');
        	$key = substr($item, 0, $pos);
          if (preg_match('/"([^"]+)"/', $item, $m)) {
  					$cookie = $m[1];
  				} else {
  					$cookie = '';
  				}

          $cookies = array_merge($cookies, array($key => $cookie));
        }

        if (!empty($cookies["ccsrftoken"])) {
        	$logged_in = array("status" => 1, "cookies" => $cookies, "response" => $response, "ccsrftoken" => $cookies["ccsrftoken"], "server" => array("ip" => $ip, "un" => $un, "sk" => $sk));
        }
      } else {
            //print_r($response); die();
      }

      return $logged_in;

    } catch (CurlWrapperException $e) {
        //print_r($e); die();
        return 0;
    }
	}

	function get_vdoms() {
		//$response = call_api("get", "/cmdb/system/vdom/");
		$response = array("results" => array(array("name" => "TRANSPARENT"), array("name" => "root")));
		$response = json_decode(json_encode($response), FALSE);

		return $response;
	}

	function get_addresses($id = '') {
		$response = call_api("get", "/cmdb/firewall/address/{$id}?skip=1&with_meta=1");

		foreach ($response->results as $key => $item) {
			if ($item->type != "ipmask" || !startsWith($item->name, "WEB_")) {
				unset($response->results[$key]);
			}
		}

		return $response;
	}

	function _get_addresses($id = '', $type = 'all') {
		$response = call_api("get", "/cmdb/firewall/address/{$id}?skip=1&with_meta=1");

		if ($type != 'all') {
			foreach ($response->results as $key => $item) {
				if ($item->type != $type) {
					unset($response->results[$key]);
				}
			}
		}

		return $response;
	}

	function _get_address_groups($id = '') {
		$response = call_api("get", "/cmdb/firewall/addrgrp/{$id}?skip=1&with_meta=1");
		return $response;
	}

	function get_address_groups($id = '') {
		$response = call_api("get", "/cmdb/firewall/addrgrp/{$id}?skip=1&with_meta=1");
		foreach ($response->results as $key => $item) {
			if (!startsWith($item->name, "WEB_")) {
				unset($response->results[$key]);
			}
		}
		return $response;
	}

	/*
		return 0: Successfully added
		return 1: Group name already exists
	*/
	function create_address_group($group_name, $params) {

		$res = get_address_groups();
		$exist = 0;
		foreach ($res->results as $group) {
			if ($group->name == $group_name) {
				$exist = 1;
				break;
			}
		}

		if ($exist == 0) {
			$response = get_vdoms();
			$vdoms = $response->results;
			foreach ($vdoms as $vdom) {
				$response = call_api("rawpost", "/cmdb/firewall/addrgrp?vdom={$vdom->name}", $params);
				if ($response->status != "success") {
					echo "Error:";
					print_r($params); print_r($response); die();
				}
			}
			return 0;
		} else {
			return 1;
		}
	}

	function create_address($name, $params) {

		$res = get_addresses();
		$exist = 0;
		foreach ($res->results as $address) {
			if ($address->name == $name) {
				$exist = 1;
				break;
			}
		}

		if ($exist == 0) {
			$response = get_vdoms();
			$vdoms = $response->results;
			foreach ($vdoms as $vdom) {
				$response = call_api("rawpost", "/cmdb/firewall/address?vdom={$vdom->name}", $params);
				if ($response->status != "success") {
					echo "Error:";
					print_r($params); print_r($response); die();
				}
			}

			return 0;
		} else {
			return 1;
		}
	}

	function update_address_group($group_name, $params) {
		$response = get_vdoms();
		$vdoms = $response->results;
		foreach ($vdoms as $vdom) {
			$response = call_api("rawput", "/cmdb/firewall/addrgrp/{$group_name}?vdom={$vdom->name}", $params);

			if ($response->status != "success") {
				echo "Error:";
				print_r($params); print_r($response); die();
			}
		}

		return 0;
	}

	function update_address($name, $params) {
		$response = get_vdoms();
		$vdoms = $response->results;
		foreach ($vdoms as $vdom) {
			$response = call_api("rawput", "/cmdb/firewall/address/{$name}?vdom={$vdom->name}", $params);

			if ($response->status != "success") {
				echo "Error:";
				print_r($params); print_r($response); die();
			}
		}

		return 0;
	}

	function check_login() {
		global $CI;

		$login = $CI->session->userdata("login");
    	if ($login["status"] == 1) {
    		return 1;
    	} else {
    		return 0;
    	}
	}

	function get_token() {
		global $CI;

		$login = $CI->session->userdata("login");
		return $login["ccsrftoken"];
	}

	function get_ip() {
		global $CI;

		$login = $CI->session->userdata("login");
		return $login["server"]["ip"];
	}

	function call_api($method, $endpoint, $params = array(), $include_header = 0) {

		global $CI;

		try {
			$ip = get_ip();
			$token = get_token();
			$curl = new CurlWrapper();
			$api_link = "https://{$ip}/api/v2{$endpoint}";

	        $login = $CI->session->userdata("login");

	        $curl->addHeader('Content-Type', 'application/json');
	        $curl->addHeader('X-CSRFTOKEN', $token);

	        $curl->addOption(CURLOPT_SSL_VERIFYPEER, FALSE);
	        $curl->addOption(CURLOPT_SSL_VERIFYHOST, FALSE);

	        $curl->addOption(CURLOPT_RETURNTRANSFER, 1);

	        if ($include_header == 1) $curl->addOption(CURLOPT_HEADER, 1);

	        $curl->addCookie($login["cookies"]);


	        if ($method == "get") {
	        	//$response = $curl->get($api_link, array("ccsrftoken" => $token));
	        	$response = $curl->get($api_link);
	        } else if ($method == "post") {
	        	$response = $curl->post($api_link, $params);
	        } else if ($method == "rawpost") {
	        	$response = $curl->rawPost($api_link, $params);
	        } else if ($method == "rawput") {
	        	$response = $curl->rawPut($api_link, $params);
	        }

	        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	        if (strpos($response,  "Authorization Required") !== false) {
	        	echo "<p class='alert alert-warning'>Session expired! Please login again to reinitialize session. Redirecting to login page...</p>";

	        	$CI->session->set_userdata(array("login" => array()));
        		$CI->session->sess_destroy();

	        	header( "refresh:2;url=" . base_url() . "login?redirect={$actual_link}" );
	        	die();
	    	} else {

	    		$result = json_decode($response);

	    		if ($result->status != "success") {
		    		echo "Error in accessing API: There might be some incorrect parameters. Please make sure all parameters are correct.<br/><br/>";
		    		echo 'Please click <a href="' . $actual_link . '">here</a> to try again.<br/><br/><br/>';
						print_r($params); echo $endpoint . "<br/>";
						print_r($result);
		    		die();
		    	} else {
		    		if ($include_header == 1) {
			        	$header_size = $curl->getHeaderSize();
						$header = substr($response, 0, $header_size);
						$body = substr($response, $header_size);

						return array("header" => $header, "body" => $body);
			        }

			        return $result;
		    	}
	    	}

	    } catch (Exception $e) {
	    	echo "Error in accessing API: Something went wrong";
	    	print_r($e);
	    }
	}

	function startsWith($haystack, $needle)
	{
	     $length = strlen($needle);
	     return (substr($haystack, 0, $length) === $needle);
	}

	function endsWith($haystack, $needle)
	{
	    $length = strlen($needle);

	    return $length === 0 ||
	    (substr($haystack, -$length) === $needle);
	}
