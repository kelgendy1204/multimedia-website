<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;

class AdvertisementController extends Controller
{
    public function __construct()
	{
		$this->middleware('IsSuperAdmin');
	}

	public function index()
	{
		$ads = Advertisement::all()->keyBy('name');
		return view('admin.advertisement.index', ['ads' => $ads]);
	}

	private function makeAds($adsname)
	{
		$ads = Advertisement::where('name', $adsname)->first();
		$ads->link = request($adsname . '_link');

		$photolink = request($adsname . '_photolink');
		$photofile = request()->file($adsname . '_photo');

		$isphotofile = request($adsname . '_isphotofile') == "on" ? true : false;

		if (!$isphotofile) {
			$ads->photo_url = $photolink;
		} else {
			if($photofile && request()->hasFile($adsname . '_photo') && $photofile->isValid()) {
				$uniqid = uniqid($ads->id , true) . "." . $photofile->getClientOriginalExtension();
				$photofile->move('appendixadbans/', $uniqid);
				$ads->photo_url = "/appendixadbans/" . $uniqid;
			}
		}

		$ads->save();
	}


	public function update()
	{

		$allAds = ['home_top', 'home_bottom', 'home_right', 'home_left', 'showpost_right', 'showpost_left'];

		foreach ($allAds as $adsName) {
			$this->makeAds($adsName);
		}

		return redirect()->action(
			'AdvertisementController@index'
		);
	}
}
