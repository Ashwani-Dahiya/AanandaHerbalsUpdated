<?php

namespace App\Http\Controllers;

use App\Models\CompanyDetailsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyDetailsController extends Controller
{

    public function getDataToShare()
    {
        $company = CompanyDetailsModel::first();
        $data = [];
        if ($company) {
            $data = [
                'web_title' => $company->web_title,
                'comp_name' => $company->name,
                'comp_mob' => $company->company_mobile_1,
                'comp_mob1' => $company->company_mobile_2,
                'comp_email' => $company->company_email_1,
                'comp_email2' => $company->company_email_2,
                'comp_web' => $company->company_website,
                'comp_add' => $company->company_address,
                'comp_map_link' => $company->company_map_link,
                'search' => "",
            ];
        } else {

            $data = [];
        }

        return $data;
    }
    public function update_detail_page()
    {
        $info = CompanyDetailsModel::first();
        return view('admin.company_details', compact('info'));
    }
    public function update_company_detail(Request $request)
    {


        $info = CompanyDetailsModel::first();
        if ($info) {
            $info->update(
                [
                    'company_name' => $request->comp_name,
                    'web_title' => $request->comp_web_title,
                    'company_mobile_1' => $request->comp_mob_1,
                    'company_mobile_2' => $request->comp_mob_2,
                    'company_email_1' => $request->comp_email_1,
                    'company_email_2' => $request->comp_email_2,
                    'company_website' => $request->comp_website,
                    'company_address' => $request->comp_address,
                    'company_map_link' => $request->comp_map_link,

                ]
            );
            return redirect()->back()->with('success', 'Details Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Something is Wrong');
        }
    }
}
