<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;

class AdvertisementController extends Controller
{
	private $allAds = ['home_top', 'home_bottom', 'home_right', 'home_left', 'showpost_right', 'showpost_left', 'internalpages_right', 'internalpages_left', 'links_top', 'links_bottom', 'getlinks_top_right' , 'getlinks_top_left', 'getlinks_bottom_right', 'getlinks_bottom_left'];

    public function __construct()
	{
		$this->middleware('IsSuperAdmin');
	}

	public function index()
	{
		$this->checkAllAds();
		$ads = Advertisement::all()->keyBy('name');
		return view('admin.advertisement.index', ['ads' => $ads]);
	}

	private function checkAllAds()
	{
		$ads = Advertisement::all()->keyBy('name');
		foreach ($this->allAds as $adsName) {
			if(! $ads->has($adsName)) {
				$newAds = new Advertisement;
				$newAds->name = $adsName;
				$newAds->save();
			}
		}
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

		foreach ($this->allAds as $adsName) {
			$this->makeAds($adsName);
		}

		return redirect()->action(
			'AdvertisementController@index'
		);
	}
}
