<?php

public function redirect_to($location) {
	header("Location : " . $location);
	exit;
}

// escape any html htmlentities
// escape any link urlencode

public function confirm_logged_in()
{
	// is session set
}
